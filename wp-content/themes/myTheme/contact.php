<?php
/**
 * This file can be used to validate that the WordPress wp_mail() function is working.
 * To use, change the email address in $to below, save, and upload to your WP root.
 * Then browse to the file in your browser.
 * 
 * For full discussion and instructions, see the associated post here:
 * http://b.utler.co/9L
 * 
 * Author:      Chad Butler
 * Author URI:  http://butlerblog.com/
 */
 
// Set $to as the email you want to send the test to
$to = "jekvx.x@gmail.com";
 
// No need to make changes below this line
 
// Email subject and body text
$subject = 'wp_mail function test';
$message = 'This is a test of the wp_mail function: wp_mail is working';
$headers = '';
 
// Load WP components, no themes
define('WP_USE_THEMES', false);
require('wp-load.php');
 
// send test message using wp_mail function
$sent_message = wp_mail( $to, $subject, $message, $headers );

//display message based on the result.
if ( $sent_message ) {
    // the message was sent...
    echo 'The test message was sent. Check your email inbox.';
} else {
    // the message was not sent...
    echo 'The message was not sent!';
}