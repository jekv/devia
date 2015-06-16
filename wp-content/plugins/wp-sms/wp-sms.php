<?php
/*
Plugin Name: Wordpress SMS
Plugin URI: http://wp-sms-plugin.com/
Description: Send a SMS via WordPress, Subscribe for sms newsletter and send an SMS to the subscriber newsletter.
Version: 2.8
Author: Mostafa Soufi
Author URI: http://mostafa-soufi.ir/
Text Domain: wp-sms
License: GPL2
*/
	define('WP_SMS_VERSION', '2.8');
	define('WP_SMS_DIR_PLUGIN', plugin_dir_url(__FILE__));
	
	define('WP_SMS_MOBILE_REGEX', '/^[\+|\(|\)|\d|\- ]*$/');
	
	include_once dirname( __FILE__ ) . '/different-versions.php';
	include_once dirname( __FILE__ ) . '/install.php';
	include_once dirname( __FILE__ ) . '/upgrade.php';
	
	register_activation_hook(__FILE__, 'wp_sms_install');
	
	load_plugin_textdomain('wp-sms', false, dirname( plugin_basename( __FILE__ ) ) . '/languages');
	__('Send a SMS via WordPress, Subscribe for sms newsletter and send an SMS to the subscriber newsletter.', 'wp-sms');

	global $wp_sms_db_version, $wpdb;
	
	$date = date('Y-m-d H:i:s' ,current_time('timestamp',0));

	function wp_sms_page() {

		if (function_exists('add_options_page')) {

			add_menu_page(__('Wordpress SMS', 'wp-sms'), __('Wordpress SMS', 'wp-sms'), 'manage_options', __FILE__, 'wp_sendsms_page');
			add_submenu_page(__FILE__, __('Send SMS', 'wp-sms'), __('Send SMS', 'wp-sms'), 'manage_options', __FILE__, 'wp_sendsms_page');
			add_submenu_page(__FILE__, __('Posted SMS', 'wp-sms'), __('Posted', 'wp-sms'), 'manage_options', 'wp-sms/posted', 'wp_posted_sms_page');
			add_submenu_page(__FILE__, __('Members Newsletter', 'wp-sms'), __('Subscribers', 'wp-sms'), 'manage_options', 'wp-sms/subscribe', 'wp_subscribes_page');
			add_submenu_page(__FILE__, __('Setting', 'wp-sms'), __('Setting', 'wp-sms'), 'manage_options', 'wp-sms/setting', 'wp_sms_setting_page');
			add_submenu_page(__FILE__, __('Addons', 'wp-sms'), __('Addons', 'wp-sms'), 'manage_options', 'wp-sms/addons', 'wp_sms_addons_page');
		}

	}
	add_action('admin_menu', 'wp_sms_page');
	
	function wp_sms_icon() {
	
		global $wp_version;
		
		if( version_compare( $wp_version, '3.8-RC', '>=' ) || version_compare( $wp_version, '3.8', '>=' ) ) {
			wp_enqueue_style('wps-admin-css', plugin_dir_url(__FILE__) . 'assets/css/admin.css', true, '1.0');
		} else {
			wp_enqueue_style('wps-admin-css', plugin_dir_url(__FILE__) . 'assets/css/admin-old.css', true, '1.0');
		}
	}
	add_action('admin_head', 'wp_sms_icon');
	
	if(get_option('wp_webservice')) {

		$webservice = get_option('wp_webservice');
		include_once dirname( __FILE__ ) . "/includes/classes/wp-sms.class.php";
		include_once dirname( __FILE__ ) . "/includes/classes/webservice/{$webservice}.class.php";

		$sms = new $webservice;
		
		$sms->username = get_option('wp_username');
		$sms->password = get_option('wp_password');
		
		if($sms->has_key && get_option('wps_key')) {
			$sms->has_key = get_option('wps_key');
		}
		
		$sms->from = get_option('wp_number');

		if($sms->unitrial == true) {
			$sms->unit = __('Credit', 'wp-sms');
		} else {
			$sms->unit = __('SMS', 'wp-sms');
		}
	}
	
	if( !get_option('wp_sms_mcc') )
		update_option('wp_sms_mcc', '09');
	
	function wp_subscribes($description = null) {
		global $wpdb, $table_prefix;
		if(!$description)
			$description = __('Enter your information for SMS Subscribe', 'wp-sms');
		
		$get_group_result = $wpdb->get_results("SELECT * FROM `{$table_prefix}sms_subscribes_group`");
		include_once dirname( __FILE__ ) . "/includes/templates/wp-sms-subscribe-form.php";
	}
	add_shortcode('subscribe', 'wp_subscribes');
	
	function wp_sms_loader(){
		wp_enqueue_style('wpsms-css', plugin_dir_url(__FILE__) . 'assets/css/subscribe.css', true, '1.1');
		
		if( get_option('wp_call_jquery') )
			wp_enqueue_script('jquery');
	}
	add_action('wp_enqueue_scripts', 'wp_sms_loader');

	function wp_sms_adminbar() {
		global $wp_admin_bar;
		
		if(is_super_admin() && is_admin_bar_showing()) {
			if(get_option('wp_last_credit') && get_option('wp_sms_cam')) {
				global $sms;
				$wp_admin_bar->add_menu(array(
					'id'		=>	'wp-credit-sms',
					'title'		=>	'<span class="ab-icon"></span>'.get_option('wp_last_credit'),
					'href'		=>	get_bloginfo('url').'/wp-admin/admin.php?page=wp-sms/setting',
				));
			}
			
			$wp_admin_bar->add_menu(array(
				'id'		=>	'wp-send-sms',
				'parent'	=>	'new-content',
				'title'		=>	__('SMS', 'wp-sms'),
				'href'		=>	get_bloginfo('url').'/wp-admin/admin.php?page=wp-sms/wp-sms.php'
			));
		}
	}
	add_action('admin_bar_menu', 'wp_sms_adminbar');

	function wp_sms_rightnow_discussion() {
		global $sms;
		echo "<tr><td class='b'><a href='".get_bloginfo('url')."/wp-admin/admin.php?page=wp-sms/wp-sms.php'>".get_option('wp_last_credit')."</a></td><td><a href='".get_bloginfo('url')."/admin.php?page=wp-sms/wp-sms.php'>".__('Credit', 'wp-sms')." (".$sms->unit.")</a></td></tr>";
	}
	add_action('right_now_discussion_table_end', 'wp_sms_rightnow_discussion');

	function wp_sms_rightnow_content() {
		global $wpdb, $table_prefix;
		$usernames = $wpdb->get_var("SELECT COUNT(*) FROM {$table_prefix}sms_subscribes");
		echo "<tr><td class='b'><a href='".get_bloginfo('url')."/wp-admin/admin.php?page=wp-sms/subscribe'>".$usernames."</a></td><td><a href='".get_bloginfo('url')."/wp-admin/admin.php?page=wp-sms/subscribe'>".__('Newsletter Subscriber', 'wp-sms')."</a></td></tr>";
	}
	add_action('right_now_content_table_end', 'wp_sms_rightnow_content');
	
	function wp_sms_glance() {
		global $wpdb, $table_prefix;
		$admin_url = get_bloginfo('url')."/wp-admin";
		$subscribe = $wpdb->get_var("SELECT COUNT(*) FROM {$table_prefix}sms_subscribes");
		echo "<li class='wpsms-subscribe-count'><a href='{$admin_url}/admin.php?page=wp-sms/subscribe'>".sprintf(__('%s Subscriber', 'wp-sms'), $subscribe)."</a></li>";
		echo "<li class='wpsms-credit-count'><a href='{$admin_url}/admin.php?page=wp-sms/setting&tab=web-service'>".sprintf(__('%s SMS Credit', 'wp-sms'), get_option('wp_last_credit'))."</a></li>";
	}
	add_action('dashboard_glance_items', 'wp_sms_glance');
	
	function wp_sms_enable() {
		$get_bloginfo_url = get_admin_url() . "admin.php?page=wp-sms/setting&tab=web-service";
		echo '<div class="error"><p>'.sprintf(__('Please check the <a href="%s">SMS credit</a> the settings', 'wp-sms'), $get_bloginfo_url).'</p></div>';
	}

	if(!get_option('wp_username') || !get_option('wp_password'))
		add_action('admin_notices', 'wp_sms_enable');
	
	function wp_sms_pointer($hook_suffix) {
		wp_enqueue_style('wp-pointer');
		wp_enqueue_script('wp-pointer');
		wp_enqueue_script('utils');
	}
	add_action('admin_enqueue_scripts', 'wp_sms_pointer');
	
	function wp_sendsms_page() {
		if (!current_user_can('manage_options')) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
		
		global $sms, $wpdb, $table_prefix, $date;
		
		wp_enqueue_script('functions', plugin_dir_url(__FILE__) . 'assets/js/functions.js', true, '1.0');
		
		$get_group_result = $wpdb->get_results("SELECT * FROM `{$table_prefix}sms_subscribes_group`");
		$get_users_mobile = $wpdb->get_col("SELECT `meta_value` FROM `{$table_prefix}usermeta` WHERE `meta_key` = 'mobile'");
		
		if(get_option('wp_webservice') && !$sms->GetCredit()) {
			$get_bloginfo_url = get_admin_url() . "admin.php?page=wp-sms/setting&tab=web-service";
			echo '<div class="error"><p>' . sprintf(__('Please check the <a href="%s">SMS credit</a> the settings', 'wp-sms'), $get_bloginfo_url) . '</p></div>';
			return;
		} else if(!get_option('wp_webservice')) {
			return;
		}
		
		if(isset($_POST['SendSMS'])) {
			if($_POST['wp_get_message']) {
				if($_POST['wp_send_to'] == "wp_subscribe_username") {
					if( $_POST['wpsms_group_name'] == 'all' ) {
						$sms->to = $wpdb->get_col("SELECT mobile FROM {$table_prefix}sms_subscribes WHERE `status` = '1'");
					} else {
						$sms->to = $wpdb->get_col("SELECT mobile FROM {$table_prefix}sms_subscribes WHERE `status` = '1' AND `group_ID` = '".$_POST['wpsms_group_name']."'");
					}
				} else if($_POST['wp_send_to'] == "wp_users") {
					$sms->to = $get_users_mobile;
				} else if($_POST['wp_send_to'] == "wp_tellephone") {
					$sms->to = explode(",", $_POST['wp_get_number']);
				}
				
				$sms->msg = $_POST['wp_get_message'];

				if($_POST['wp_flash'] == "true") {
					$sms->isflash = true;
				}
				elseif($_POST['wp_flash'] == "false") {
					$sms->isflash = false;
				}

				if($sms->SendSMS()) {
					$to = implode($wpdb->get_col("SELECT mobile FROM {$table_prefix}sms_subscribes"), ",");
					echo "<div class='updated'><p>" . __('SMS was sent with success', 'wp-sms') . "</p></div>";
					update_option('wp_last_credit', $sms->GetCredit());
				}
			} else {
				echo "<div class='error'><p>" . __('Please enter a message', 'wp-sms') . "</p></div>";
			}
		}
		
		include_once dirname( __FILE__ ) . "/includes/templates/send/send-sms.php";
	}
	
	function wp_posted_sms_page() {
		if (!current_user_can('manage_options')) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
		
		global $wpdb, $table_prefix;
		
		wp_enqueue_style('pagination-css', plugin_dir_url(__FILE__) . 'assets/css/pagination.css', true, '1.0');
		include_once dirname( __FILE__ ) . '/includes/classes/pagination.class.php';
		
		if(isset($_POST['doaction']) && isset($_POST['column_ID'])) {
			$get_IDs = implode(",", $_POST['column_ID']);
			
			$check_ID = $wpdb->query($wpdb->prepare("SELECT * FROM {$table_prefix}sms_send WHERE ID IN (%s)", $get_IDs));

			switch($_POST['action']) {
			
				case 'trash':
					if($check_ID) {
					
						foreach($_POST['column_ID'] as $items) {
							$wpdb->delete("{$table_prefix}sms_send", array('ID' => $items) );
						}
						
						echo "<div class='updated'><p>" . __('With success was removed', 'wp-sms') . "</div></p>";
					} else {
						echo "<div class='error'><p>" . __('Not Found', 'wp-sms') . "</div></p>";
					}
				break;
			}
		}
		
		$total = $wpdb->get_results("SELECT * FROM `{$table_prefix}sms_send`");
		
		include_once dirname( __FILE__ ) . "/includes/templates/posted/posted.php";
	}
	
	function wp_subscribes_page() {
	
		if (!current_user_can('manage_options')) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
		}
		
		global $wpdb, $table_prefix, $date;
		
		if(isset($_GET['group'])) {
			$total = $wpdb->query($wpdb->prepare("SELECT * FROM `{$table_prefix}sms_subscribes` WHERE `group_ID` = '%s'", $_GET['group']));
		} else {
			$total = $wpdb->get_results("SELECT * FROM `{$table_prefix}sms_subscribes`");
			$total = count($total);
		}
		
		if(isset($_POST['search'])) {
			$search_query = "%" . $_POST['s'] . "%";
			$total = $wpdb->query($wpdb->prepare("SELECT * FROM `{$table_prefix}sms_subscribes` WHERE `name` LIKE '%s' OR `mobile` LIKE '%s'", $search_query, $search_query));
		}
		
		$get_group_result = $wpdb->get_results("SELECT * FROM `{$table_prefix}sms_subscribes_group`");
		
		/* Pagination */
		wp_enqueue_style('pagination-css', plugin_dir_url(__FILE__) . 'assets/css/pagination.css', true, '1.0');
		include_once dirname( __FILE__ ) . '/includes/classes/pagination.class.php';
		
		// Instantiate pagination smsect with appropriate arguments
		$pagesPerSection = 10;
		$options = array(25, "All");
		$stylePageOff = "pageOff";
		$stylePageOn = "pageOn";
		$styleErrors = "paginationErrors";
		$styleSelect = "paginationSelect";

		$Pagination = new Pagination($total, $pagesPerSection, $options, false, $stylePageOff, $stylePageOn, $styleErrors, $styleSelect);

		$start = $Pagination->getEntryStart();
		$end = $Pagination->getEntryEnd();
		/* Pagination */
		
		if(isset($_POST['doaction'])) {
			$get_IDs = implode(",", $_POST['column_ID']);
			$check_ID = $wpdb->query($wpdb->prepare("SELECT * FROM {$table_prefix}sms_subscribes WHERE ID IN (%s)", $get_IDs));

			switch($_POST['action']) {
				case 'trash':
					if($check_ID) {
					
						foreach($_POST['column_ID'] as $items) {
							$wpdb->delete("{$table_prefix}sms_subscribes", array('ID' => $items) );
						}
						
						echo "<div class='updated'><p>" . __('With success was removed', 'wp-sms') . "</div></p>";
					} else {
						echo "<div class='error'><p>" . __('Not Found', 'wp-sms') . "</div></p>";
					}
				break;
				
				case 'active':
					if($check_ID) {
						
						foreach($_POST['column_ID'] as $items) {
							$wpdb->update("{$table_prefix}sms_subscribes", array('status' => '1'), array('ID' => $items) );
						}
						
						echo "<div class='updated'><p>" . __('User is active.', 'wp-sms') . "</div></p>";
					} else {
						echo "<div class='error'><p>" . __('Not Found', 'wp-sms') . "</div></p>";
					}
				break;
				
				case 'deactive':
					if($check_ID) {
					
						foreach($_POST['column_ID'] as $items) {
							$wpdb->update("{$table_prefix}sms_subscribes", array('status' => '0'), array('ID' => $items) );
						}
						
						echo "<div class='updated'><p>" . __('User is Deactive..', 'wp-sms') . "</div></p>";
					} else {
						echo "<div class='error'><p>" . __('Not Found', 'wp-sms') . "</div></p>";
					}
				break;
			}
		}
		
		if(isset($_POST['wp_subscribe_name']))
			$name = trim($_POST['wp_subscribe_name']);
		
		if(isset($_POST['wp_subscribe_mobile']))
			$mobile	= trim($_POST['wp_subscribe_mobile']);
		
		if(isset($_POST['wpsms_group_name']))
			$group	= trim($_POST['wpsms_group_name']);
		
		if(isset($_POST['wp_add_subscribe'])) {
		
			if($name && $mobile && $group) {
			
				if(preg_match(WP_SMS_MOBILE_REGEX, $mobile)) {
				
					$check_mobile = $wpdb->query($wpdb->prepare("SELECT * FROM `{$table_prefix}sms_subscribes` WHERE `mobile` = '%s'", $mobile));
					
					if(!$check_mobile) {
					
						$check = $wpdb->insert(
							"{$table_prefix}sms_subscribes", 
							array(
								'date'		=> $date,
								'name'		=> $name,
								'mobile'	=> $mobile,
								'status'	=> '1',
								'group_ID'	=> $group,
							)
						);
						
						if($check) {
							echo "<div class='updated'><p>" . sprintf(__('username <strong>%s</strong> was added successfully.', 'wp-sms'), $name) . "</div></p>";
						}
						
					} else {
						echo "<div class='error'><p>" . __('Phone number is repeated', 'wp-sms') . "</div></p>";
					}
				} else {
					echo "<div class='error'><p>" . __('Please enter a valid mobile number', 'wp-sms') . "</div></p>";
				}
			} else {
				echo "<div class='error'><p>" . __('Please complete all fields', 'wp-sms') . "</div></p>";
			}
			
		}
		
		if(isset($_POST['wpsms_add_group'])) {
		
			if($group) {
			
				$check_group = $wpdb->query($wpdb->prepare("SELECT * FROM `{$table_prefix}sms_subscribes_group` WHERE `name` = '%s'", $group));
				
				if(!$check_group) {
				
					$check = $wpdb->insert(
						"{$table_prefix}sms_subscribes_group", 
						array(
							'name'	=> $group
						)
					);
					
					if($check) {
						echo "<div class='updated'><p>" . sprintf(__('Group <strong>%s</strong> was added successfully.', 'wp-sms'), $group) . "</div></p>";
					}
					
				} else {
					echo "<div class='error'><p>" . __('Group name is repeated', 'wp-sms') . "</div></p>";
				}
			} else {
				echo "<div class='error'><p>" . __('Please complete field', 'wp-sms') . "</div></p>";
			}
		}
		
		if(isset($_POST['wpsms_delete_group'])) {
		
			if($group) {
				
				$check_group = $wpdb->query($wpdb->prepare("SELECT * FROM `{$table_prefix}sms_subscribes_group` WHERE `ID` = '%s'", $group));
				
				if($check_group) {
				
					$group_name = $wpdb->get_row($wpdb->prepare("SELECT * FROM `{$table_prefix}sms_subscribes_group` WHERE `ID` = '%s'", $group));
					$check = $wpdb->delete("{$table_prefix}sms_subscribes_group", array('ID' => $group) );
					
					if($check) {
						echo "<div class='updated'><p>" . sprintf(__('Group <strong>%s</strong> was successfully removed.', 'wp-sms'), $group_name->name) . "</div></p>";
					}
					
				}
			} else {
				echo "<div class='error'><p>" . __('Nothing found!', 'wp-sms') . "</div></p>";
			}
			
		}
		
		if(isset($_POST['wp_edit_subscribe'])) {
		
			if($name && $mobile && $group) {
				if(preg_match(WP_SMS_MOBILE_REGEX, $mobile)) {
				
					$check = $wpdb->update("{$table_prefix}sms_subscribes",
						array(
							'name'		=> $name,
							'mobile'	=> $mobile,
							'status'	=> $_POST['wp_subscribe_status'],
							'group_ID'	=> $group
						),
						array(
							'ID'		=> $_GET['ID']
						)
					);
					
					if($check) {
						echo "<div class='updated'><p>" . sprintf(__('username <strong>%s</strong> was update successfully.', 'wp-sms'), $name) . "</div></p>";
					}
					
				} else {
					echo "<div class='error'><p>" . __('Please enter a valid mobile number', 'wp-sms') . "</div></p>";
				}
			} else {
				echo "<div class='error'><p>" . __('Please complete all fields', 'wp-sms') . "</div></p>";
			}
			
		}
		
		if(!$get_group_result) {
			add_action('admin_print_footer_scripts', 'wpsms_group_pointer');
		}
		
		if(isset($_GET['action'])) {
			if($_GET['action'] == 'import') {
				
				include_once dirname( __FILE__ ) . "/includes/classes/excel-reader.class.php";
				
				$get_mobile = $wpdb->get_col("SELECT `mobile` FROM {$table_prefix}sms_subscribes");
				
				if(isset($_POST['wps_import'])) {
					if(!$_FILES['wps-import-file']['error']) {
					
						$data = new Spreadsheet_Excel_Reader($_FILES["wps-import-file"]["tmp_name"]);
						
						foreach($data->sheets[0]['cells'] as $items) {
							
							// Check and count duplicate items
							if(in_array($items[2], $get_mobile)) {
								$duplicate[] = $items[2];
								continue;
							}
							
							// Count submited items.
							$total_submit[] = $data->sheets[0]['cells'];
							
							$result = $wpdb->insert("{$table_prefix}sms_subscribes",
								array(
									'date'		=>	date('Y-m-d H:i:s' ,current_time('timestamp', 0)),
									'name'		=>	$items[1],
									'mobile'	=>	$items[2],
									'status'	=>	'1',
									'group_ID'	=>	$_POST['wpsms_group_name']
								)
							);
							
						}
						
						if($result)
							echo "<div class='updated'><p>" . sprintf(__('<strong>%s</strong> items was successfully added.', 'wp-sms'), count($total_submit)) . "</div></p>";
						
						if($duplicate)
							echo "<div class='error'><p>" . sprintf(__('<strong>%s</strong> Mobile numbers Was repeated.', 'wp-sms'), count($duplicate)) . "</div></p>";
							
					} else {
						echo "<div class='error'><p>" . __('Please complete all fields', 'wp-sms') . "</div></p>";
					}
				}
				
				include_once dirname( __FILE__ ) . "/includes/templates/subscribe/import.php";
				
			} else if($_GET['action'] == 'export') {
				include_once dirname( __FILE__ ) . "/includes/templates/subscribe/export.php";
			} else {
				include_once dirname( __FILE__ ) . "/includes/templates/subscribe/subscribes.php";
			}
		} else {
			include_once dirname( __FILE__ ) . "/includes/templates/subscribe/subscribes.php";
		}
		
	}
	
	function wp_sms_setting_page() {
	
		global $sms;
		
		if (!current_user_can('manage_options')) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
			
			settings_fields('wp_sms_options');
		}
		
		$sms_page['about'] = get_bloginfo('url') . "/admin.php?page=wp-sms/setting&tab=about";
		
		if(isset($_GET['tab'])) {
			switch($_GET['tab']) {
				case 'web-service':
					wp_enqueue_style('chosen', plugin_dir_url(__FILE__) . 'assets/css/chosen.min.css', true, '1.2.0');
					wp_enqueue_script('chosen', plugin_dir_url(__FILE__) . 'assets/js/chosen.jquery.min.js', true, '1.2.0');
					
					if(isset($_GET['action']) == 'reset') {
						delete_option('wp_webservice');
						delete_option('wp_username');
						delete_option('wp_password');
						echo '<meta http-equiv="refresh" content="0; url=admin.php?page=wp-sms/setting&tab=web-service" />';
					}
					
					include_once dirname( __FILE__ ) . "/includes/templates/settings/web-service.php";
					
					if(get_option('wp_webservice'))
						update_option('wp_last_credit', $sms->GetCredit());
					break;
				
				case 'newsletter':
					include_once dirname( __FILE__ ) . "/includes/templates/settings/newsletter.php";
				break;
				
				case 'features':
					include_once dirname( __FILE__ ) . "/includes/templates/settings/features.php";
				break;
				
				case 'notification':
					include_once dirname( __FILE__ ) . "/includes/templates/settings/notification.php";
				break;
				
				case 'about':
					include_once dirname( __FILE__ ) . "/includes/templates/settings/about.php";
				break;
			}
		} else {
			include_once dirname( __FILE__ ) . "/includes/templates/settings/setting.php";
		}
	}
	
	function wp_sms_addons_page() {
		if (!current_user_can('manage_options')) {
			wp_die(__('You do not have sufficient permissions to access this page.'));
			
			settings_fields('wp_sms_options');
		}
		
		$json_url = file_get_contents('http://wp-sms-plugin.com/addons.php?lang=' . get_locale());
		$json = json_decode($json_url);
		
		include_once dirname( __FILE__ ) . "/includes/templates/addons/addons.php";
	}
	
	include_once dirname( __FILE__ ) . '/widget.php';
	include_once dirname( __FILE__ ) . '/newslleter.php';
	include_once dirname( __FILE__ ) . '/features.php';
	include_once dirname( __FILE__ ) . '/notifications.php';
	