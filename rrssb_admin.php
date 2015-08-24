<?php

/* Admin Menu */

function admin_init_rrssb() {
	register_setting('rrssb', 'show_twitter');
	register_setting('rrssb', 'show_facebook');
	register_setting('rrssb', 'show_google');
	register_setting('rrssb', 'show_github');
	register_setting('rrssb', 'show_email');
	register_setting('rrssb', 'show_linkedin');
	register_setting('rrssb', 'show_reddit');
	register_setting('rrssb', 'show_pocket');
	register_setting('rrssb', 'show_instagram');
	register_setting('rrssb', 'show_pinterest');
	register_setting('rrssb', 'show_tumblr');
	register_setting('rrssb', 'show_youtube');
	
	register_setting('rrssb', 'github_link');
	register_setting('rrssb', 'instagram_link');
	register_setting('rrssb', 'pinterest_link');
	register_setting('rrssb', 'tumblr_link');
	register_setting('rrssb', 'youtube_link');
	
	register_setting('rrssb', 'give_rrssb_credit');
	register_setting('rrssb', 'show_buttons_below_post');
	register_setting('rrssb', 'show_buttons_above_post');
	register_setting('rrssb', 'use_rrssb_jquery');
	register_setting('rrssb', 'help_improve_rrssb');
	register_setting('rrssb', 'rrssb_css');
	register_setting('rrssb', 'rrssb_css_classes');
}

function admin_menu_rrssb() {
  add_options_page(
		'Ridiculously Responsive Social Sharing Buttons',
		'RRSSB Options',
		'manage_options',
		'rrssb',
		'options_page_rrssb');
}

function options_page_rrssb() {
  include( 'rrssb_options.php' );  
}

if (is_admin()) {
  add_action('admin_init', 'admin_init_rrssb');
  add_action('admin_menu', 'admin_menu_rrssb');
}

/* END FILE */
?>
