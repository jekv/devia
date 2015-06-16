<div class="wrap">
	<?php include( dirname( __FILE__ ) . '/tabs.php' ); ?>
	<table class="form-table">
		<form method="post" action="options.php" name="form">
			<?php wp_nonce_field('update-options');?>
			<tr>
				<td><?php _e('Your Mobile Number', 'wp-sms'); ?>:</td>
				<td>
					<input type="text" dir="ltr" style="width: 200px;" name="wp_admin_mobile" value="<?php echo get_option('wp_admin_mobile'); ?>"/>
					<p class="description"><?php echo sprintf(__('Enter your mobile number for get sms from plugin. Your mobile should like <code>%s</code>', 'wp-sms'), $sms->validateNumber); ?></p>
				</td>
			</tr>
			
			<tr>
				<td><?php _e('Your mobile country code', 'wp-sms'); ?>:</td>
				<td>
					<input type="text" dir="ltr" style="width: 200px;" name="wp_sms_mcc" value="<?php echo get_option('wp_sms_mcc'); ?>"/>
					<p class="description"><?php _e('Enter your mobile country code.', 'wp-sms'); ?></p>
				</td>
			</tr>
			
			<?php if(get_option('wp_webservice')) { ?>
			<tr>
				<td><?php _e('Show Credit in Admin menu', 'wp-sms'); ?>:</td>
				<td>
					<input type="checkbox" name="wp_sms_cam" id="wp_sms_cam" <?php echo get_option('wp_sms_cam') ==true? 'checked="checked"':'';?>/>
					<label for="wp_sms_cam"><?php _e('Active', 'wp-sms'); ?></label>
					<p class="description"><?php _e('Show your credit account in admin menu.', 'wp-sms'); ?></p>
				</td>
			</tr>
			<?php } ?>
			
			<tr>
				<td>
					<p class="submit">
						<input type="hidden" name="action" value="update" />
						<input type="hidden" name="page_options" value="wp_admin_mobile,wp_sms_mcc,wp_sms_cam" />
						<input type="submit" class="button-primary" name="Submit" value="<?php _e('Update', 'wp-sms'); ?>" />
					</p>
				</td>
			</tr>
		</form>	
	</table>
</div>