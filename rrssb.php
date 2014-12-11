<?php
/*
Plugin Name: Ridiculously Responsive Social Sharing Buttons
Plugin URI: https://github.com/alan-reed/rrssb
Description: Ridiculously Responsive Social Sharing Buttons adapted from https://github.com/kni-labs/rrssb.
Version: 2.1
Author: Alan Reed
Author URI: http://www.alanreed.org
Date: 10 December 2014

License: GNU General Public License (GPL) version 3
License URI: https://www.gnu.org/licenses/gpl.html
*/

include( 'rrssb_admin.php' );

/* On Activation & Decativation */

function activate_rrssb() {	
	add_option('show_email' 	, 1);
	add_option('show_facebook' 	, 1);
	add_option('show_linkedin' 	, 1);
	add_option('show_twitter' 	, 1);
	add_option('show_reddit'	, 1);
	add_option('show_google'	, 1);
	add_option('show_pocket'	, 0);
	add_option('show_github'	, 0);
	add_option('show_instagram' , 0);
	add_option('show_pinterest' , 0);
	add_option('show_tumblr' 	, 0);
	add_option('show_youtube' 	, 0);
	
	add_option('github_link'	, "alan-reed");
	add_option('instagram_link' , "");
	add_option('pinterest_link'	, "");
	add_option('tumblr_link'	, "");
	add_option('youtube_link'	, "");
	
	add_option('give_rrssb_credit' 		, 0);
	add_option('show_buttons_below_post', 1);
	add_option('show_buttons_above_post', 1);
	add_option('use_rrssb_jquery'		, 0);
	add_option('help_improve_rrssb' 	, 0);
	add_option('rrssb_css' 				, ".no-margin li {margin: 0!important;}");
	add_option('rrssb_css_classes' 		, "no-margin");
}

function deactive_rrssb() {  
  	delete_option('show_email');
	delete_option('show_facebook');
	delete_option('show_linkedin');
	delete_option('show_twitter');
	delete_option('show_reddit');
	delete_option('show_google');
	delete_option('show_pocket');
	delete_option('show_github');
	delete_option('show_instagram');
	delete_option('show_pinterest');
	delete_option('show_tumblr');
	delete_option('show_youtube');
	
	delete_option('github_link');
	delete_option('instagram_link');
	delete_option('pinterest_link');
	delete_option('tumblr_link');
	delete_option('youtube_link');
	
	delete_option('give_rrssb_credit');
	delete_option('show_buttons_below_post');
	delete_option('show_buttons_above_post');
	delete_option('use_rrssb_jquery');
	delete_option('help_improve_rrssb');
	delete_option('rrssb_css');
	delete_option('rrssb_css_classes');
}

register_activation_hook(__FILE__, 'activate_rrssb');
register_deactivation_hook(__FILE__, 'deactive_rrssb');

/* CSS and JS */

function rrssb_js()
{
    // Use rrssb jqeury file.
    // wp_register_script('rrssb-jqeury', plugins_url('/js/vendor/jquery.1.10.2.min.js', __FILE__ ) );
    // wp_enqueue_script('rrssb-jqeury');
    
    wp_register_script('rrssb-modern-min-script', plugins_url('/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js', __FILE__ ) );
    wp_enqueue_script('rrssb-modern-min-script');
	
    wp_register_script('rrssb-min-script', plugins_url('/js/rrssb.min.js', __FILE__ ), array('jquery') );
    wp_enqueue_script('rrssb-min-script');
}
add_action('wp_enqueue_scripts', 'rrssb_js' );

function rrssb_css()
{
    wp_register_style('norm_stylesheet', plugins_url('css/normalize.min.css', __FILE__));
    wp_enqueue_style('norm_stylesheet');
	
    wp_register_style('rrssb_stylesheet', plugins_url('css/rrssb.css', __FILE__));
    wp_enqueue_style('rrssb_stylesheet');
}
add_action('wp_enqueue_scripts', 'rrssb_css' );

/* Add shortcode */

function rrssb_show_buttons_shortcode()
{
	return rrssb_show_buttons("");
}
add_shortcode('rrssb', 'rrssb_show_buttons_shortcode');


/* Add buttons */

function rrssb_show_buttons($rrssb_content)
{
	$rrssb_content .= '
		<script>window.jQuery || document.write(\'<script src="js/vendor/jquery.1.10.2.min.js"><\/script>\')</script>
		<style>
			' . get_option('rrssb_css') . '
		</style>
		<div class="share-container clearfix">
		<ul class="rrssb-buttons clearfix ' . get_option('rrssb_css_classes') . '">';
	
	if ( 1 == get_option('show_facebook') ) 
		$rrssb_content .= rrssb_facebook_btn();
	if ( 1 == get_option('show_twitter') ) 
		$rrssb_content .= rrssb_twitter_btn();
	if ( 1 == get_option('show_google') ) 
		$rrssb_content .= rrssb_google_btn();
	if ( 1 == get_option('show_linkedin') ) 
		$rrssb_content .= rrssb_linkedin_btn();
	if ( 1 == get_option('show_reddit') ) 
		$rrssb_content .= rrssb_reddit_btn();
	if ( 1 == get_option('show_email') ) 
		$rrssb_content .= rrssb_email_btn();
	if ( 1 == get_option('show_pinterest') ) 
		$rrssb_content .= rrssb_pinterest_btn();	
	if ( 1 == get_option('show_instagram') ) 
		$rrssb_content .= rrssb_instagram_btn();	
	if ( 1 == get_option('show_youtube') ) 
		$rrssb_content .= rrssb_youtube_btn();
	if ( 1 == get_option('show_tumblr') ) 
		$rrssb_content .= rrssb_tumblr_btn();
	if ( 1 == get_option('show_pocket') ) 
		$rrssb_content .= rrssb_pocket_btn();
	if ( 1 == get_option('show_github') ) 
		$rrssb_content .= rrssb_github_btn();
	
	$rrssb_content .= '</ul>';
	
	if ( 1 == get_option('give_rrssb_credit') )
		$rrssb_content .= '
		<label><small>Buttons by 
		<a href="https://wordpress.org/plugins/ridiculously-responsive-social-sharing-buttons/">RRSSB</a>
		</small></label>';
		
	$rrssb_content .= '
		</div>';
    
	return $rrssb_content;
}

/* Show buttons above post */

function rrssb_show_buttons_above_post($content)
{
	if ( is_single() && ( 1 == get_option('show_buttons_above_post') ) ) {
		$rrssb_content = rrssb_show_buttons("");
		$rrssb_content .= $content;
		return $rrssb_content;
	}
	else {
		return $content;
	}
}
add_filter('the_content', 'rrssb_show_buttons_above_post');

/* Show buttons below post */

function rrssb_show_buttons_below_post($rrssb_content)
{
    if ( is_single() && ( 1 == get_option('show_buttons_below_post') ) ) {
		$rrssb_content = rrssb_show_buttons($rrssb_content);
	}
	return $rrssb_content;
}
add_filter('the_content', 'rrssb_show_buttons_below_post');

/* Functions for each button */

function rrssb_email_btn()
{
	$icon = file_get_contents('icons/mail.svg',true);
    	$rrssb_content = '<li class="rrssb-email">
		<a href="mailto:?subject='.urlencode(get_the_title()) .'&body=' .urlencode(get_permalink()). '" class="popup">
		<span class="rrssb-icon">
		'. $icon . '
		</span>
		<span class="rrssb-text">email</span></a></li>';
    	return $rrssb_content;
}

function rrssb_facebook_btn()
{
	$icon = file_get_contents('icons/facebook.svg',true);
    	$rrssb_content = '<li class="rrssb-facebook">
		<a href="https://www.facebook.com/sharer/sharer.php?u=' .urlencode(get_permalink() ) . ' " class="popup">
		<span class="rrssb-icon">
		'. $icon . '
		</span>
		<span class="rrssb-text">facebook</span></a></li>';
    	return $rrssb_content;
}

function rrssb_linkedin_btn()
{
	$icon = file_get_contents('icons/linkedin.svg',true);
    	$rrssb_content = '<li class="rrssb-linkedin">
		<a href="http://www.linkedin.com/shareArticle?mini=true&url=' .  urlencode(get_permalink()) . '&title=' . urlencode(get_the_title() ) . '" class="popup">
		<span class="rrssb-icon">
		'. $icon . '
		</span>
		<span class="rrssb-text">linkedin</span></a></li>';
    return $rrssb_content;
}

function rrssb_twitter_btn()
{
	$icon = file_get_contents('icons/twitter.svg',true);
	$rrssb_content = '<li class="rrssb-twitter">
		<a href="http://twitter.com/home?status=' . urlencode(get_the_title() )  . ' - ' . urlencode(wp_get_shortlink() ). '" class="popup">
		<span class="rrssb-icon">
		'. $icon . '
		</span>
		<span class="rrssb-text">twitter</span></a></li>';
    	return $rrssb_content;
}

function rrssb_reddit_btn()
{
	$icon = file_get_contents('icons/reddit.svg',true);
    	$rrssb_content = '<li class="rrssb-reddit">
		<a href="http://www.reddit.com/submit?url=' . urlencode(get_permalink() ) . '" class="popup">
		<span class="rrssb-icon">
		'.$icon.'
		</span>
		<span class="rrssb-text">reddit</span></a></li>';
    	return $rrssb_content;
}

function rrssb_google_btn()
{
	$icon = file_get_contents('icons/google_plus.svg',true);
    	$rrssb_content = '<li class="rrssb-googleplus">
		<a href="https://plus.google.com/share?url=' . urlencode(get_the_title() ) . ' - ' . urlencode( get_permalink() ) .'" class="popup">
		<span class="rrssb-icon">
		'. $icon . '
		</span>
		<span class="rrssb-text">google+</span></a></li>';
    	return $rrssb_content;
}

function rrssb_github_btn()
{
	$icon = file_get_contents('icons/github.svg',true);
    	$rrssb_content = '<li class="rrssb-github">
		<a href="https://github.com/'.get_option('github_link').'" target="_blank">
		<span class="rrssb-icon">
		'. $icon . '
		</span>
		<span class="rrssb-text">github</span></a></li>';
    	return $rrssb_content;
}

function rrssb_instagram_btn()
{
	$icon = file_get_contents('icons/instagram.svg',true);
    	$rrssb_content = '<li class="rrssb-instagram">
		<a href="https://instagram.com/'.get_option('instagram_link').'" target="_blank">
		<span class="rrssb-icon">
		'. $icon . '
		</span>
		<span class="rrssb-text">instagram</span></a></li>';
    	return $rrssb_content;
}

function rrssb_pinterest_btn()
{
	$icon = file_get_contents('icons/pinterest.svg',true);
    	$rrssb_content = '<li class="rrssb-pinterest">
		<a href="https://pinterest.com/'.get_option('pinterest_link').'" target="_blank">
		<span class="rrssb-icon">
		'. $icon . '
		</span>
		<span class="rrssb-text">pinterest</span></a></li>';
    	return $rrssb_content;
}

function rrssb_tumblr_btn()
{
	$icon = file_get_contents('icons/tumblr.svg',true);
    	$rrssb_content = '<li class="rrssb-tumblr">
		<a href="https://tumblr.com/'.get_option('tumblr_link').'" target="_blank">
		<span class="rrssb-icon">
		'. $icon . '
		</span>
		<span class="rrssb-text">tumblr</span></a></li>';
    	return $rrssb_content;
}

function rrssb_youtube_btn()
{
	$icon = file_get_contents('icons/youtube.svg',true);
    	$rrssb_content = '<li class="rrssb-youtube">
		<a href="https://youtube.com/'.get_option('youtube_link').'" target="_blank">
		<span class="rrssb-icon">
		'. $icon . '
		</span>
		<span class="rrssb-text">youtube</span></a></li>';
    	return $rrssb_content;
}

function rrssb_pocket_btn()
{
	$icon = file_get_contents('icons/pocket.svg',true);
	$rrssb_content = '<li class="rrssb-pocket">
		<a href="https://getpocket.com/save?url=' . urlencode( get_permalink() ) . '" class="popup">
		<span class="rrssb-icon">
		' . $icon . '
		<span class="rrssb-text">pocket</span></a></li>';
	return $rrssb_content;
}

/* END FILE */
?>
