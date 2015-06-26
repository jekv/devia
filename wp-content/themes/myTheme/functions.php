<?php

	function styleshit(){

		wp_enqueue_style('style', get_stylesheet_uri());
     wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 

	}

	add_action('wp_enqueue_scripts', 'styleshit');

	function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}

function arphabet_widgets_init() {

    register_sidebar( array(
        'name' => 'Home right sidebar',
        'id' => 'home_right_1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="rounded">',
        'after_title' => '</h2>',
    ) );
}



function send_sms_when_subscribe_new_user($name, $mobile) {
    global $sms;
    $sms->to = array($mobile);
    $sms->msg = "Hi {$name}, Thanks for subscribing.";
    $sms->SendSMS();
}

function url_is_image( $url ) {
  if ( ! filter_var( $url, FILTER_VALIDATE_URL ) ) {
    return FALSE;
  }
  $ext = array( 'jpeg', 'jpg', 'gif', 'png' );
  $info = (array) pathinfo( parse_url( $url, PHP_URL_PATH ) );
  return isset( $info['extension'] )
    && in_array( strtolower( $info['extension'] ), $ext, TRUE );
}

function thumbnail_url_field( $html ) {
  global $post;
  $value = get_post_meta( $post->ID, '_thumbnail_ext_url', TRUE ) ? : "";
  $nonce = wp_create_nonce( 'thumbnail_ext_url_' . $post->ID . get_current_blog_id() );
  $html .= '<input type="hidden" name="thumbnail_ext_url_nonce" value="' 
    . esc_attr( $nonce ) . '">';
  $html .= '<div><p>' . __('Or', 'txtdomain') . '</p>';
  $html .= '<p>' . __( 'Enter the url for external image', 'txtdomain' ) . '</p>';
  $html .= '<p><input type="url" name="thumbnail_ext_url" value="' . $value . '"></p>';
  if ( ! empty($value) && url_is_image( $value ) ) {
    $html .= '<p><img style="max-width:150px;height:auto;" src="' 
      . esc_url($value) . '"></p>';
    $html .= '<p>' . __( 'Leave url blank to remove.', 'txtdomain' ) . '</p>';
  }
  $html .= '</div>';
  return $html;
}

function thumbnail_url_field_save( $pid, $post ) {
  $cap = $post->post_type === 'page' ? 'edit_page' : 'edit_post';
  if (
    ! current_user_can( $cap, $pid )
    || ! post_type_supports( $post->post_type, 'thumbnail' )
    || defined( 'DOING_AUTOSAVE' )
  ) {
    return;
  }
  $action = 'thumbnail_ext_url_' . $pid . get_current_blog_id();
  $nonce = filter_input( INPUT_POST, 'thumbnail_ext_url_nonce', FILTER_SANITIZE_STRING );
  $url = filter_input( INPUT_POST,  'thumbnail_ext_url', FILTER_VALIDATE_URL );
  if (
    empty( $nonce )
    || ! wp_verify_nonce( $nonce, $action )
    || ( ! empty( $url ) && ! url_is_image( $url ) )
  ) {
    return;
  }
  if ( ! empty( $url ) ) {
    update_post_meta( $pid, '_thumbnail_ext_url', esc_url($url) );
    if ( ! get_post_meta( $pid, '_thumbnail_id', TRUE ) ) {
      update_post_meta( $pid, '_thumbnail_id', 'by_url' );
    }
  } elseif ( get_post_meta( $pid, '_thumbnail_ext_url', TRUE ) ) {
    delete_post_meta( $pid, '_thumbnail_ext_url' );
    if ( get_post_meta( $pid, '_thumbnail_id', TRUE ) === 'by_url' ) {
      delete_post_meta( $pid, '_thumbnail_id' );
    }
  }
}

function thumbnail_external_replace( $html, $post_id ) {
  $url =  get_post_meta( $post_id, '_thumbnail_ext_url', TRUE );
  if ( empty( $url ) || ! url_is_image( $url ) ) {
    return $html;
  }
  $alt = get_post_field( 'post_title', $post_id ) . ' ' .  __( 'thumbnail', 'txtdomain' );
  $attr = array( 'alt' => $alt );
  $attr = apply_filters( 'wp_get_attachment_image_attributes', $attr, NULL );
  $attr = array_map( 'esc_attr', $attr );
  $html = sprintf( '<img src="%s"', esc_url($url) );
  foreach ( $attr as $name => $value ) {
    $html .= " $name=" . '"' . $value . '"';
  }
  $html .= ' />';
  return $html;
}

add_filter( 'admin_post_thumbnail_html', 'thumbnail_url_field' );

add_action( 'save_post', 'thumbnail_url_field_save', 10, 2 );

add_filter( 'post_thumbnail_html', 'thumbnail_external_replace', 10, PHP_INT_MAX );

add_action('wp_sms_subscribe', 'send_sms_when_subscribe_new_user', 10, 2);

add_action( 'widgets_init', 'arphabet_widgets_init' );

add_action( 'init', 'register_my_menus' );

add_theme_support('post-thumbnails'); 

