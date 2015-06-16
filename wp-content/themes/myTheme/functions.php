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
add_action('wp_sms_subscribe', 'send_sms_when_subscribe_new_user', 10, 2);

add_action( 'widgets_init', 'arphabet_widgets_init' );

add_action( 'init', 'register_my_menus' );

add_theme_support('post-thumbnails'); 
