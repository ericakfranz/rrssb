<?php
/*
Plugin Name: Ridiculously Responsive Social Sharing Buttons
Plugin URI: https://github.com/kni-labs/rrssb
Description: Ridiculously Responsive Social Sharing Buttons adapted from https://github.com/kni-labs/rrssb.
Version: 1.0
Author: Alan Reed
Author URI: http://www.alanreed.org
Date: 8 March 2014


This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/



/* CSS and JS */

function rrssb_js()
{
	// Use rrssb jqeury file.
    wp_register_script('rrssb-jqeury', plugins_url('/js/vendor/jquery-1.9.1.min.js', __FILE__ ) );
    wp_enqueue_script('rrssb-jqeury');
    
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

/* Main function */

function rrssb_main($content)
{
    if (is_single()) {
        
		//$content .= rrssb_hide_unitl_load();
        $content .= '
			<style>
			.no-margin li {margin: 0!important;}
			.fix-line-height a {line-height: 1.3em;}
			</style>
			<div class="share-container clearfix">
			<!-- buttons start here -->
			<ul class="rrssb-buttons clearfix no-margin fix-line-height">';

	
	/*
	 * Edit below to reorder the buttons.
	 * NOTE: Lines prefixed with `//` are ignored.
	 *
	 **/

        $content .= rrssb_email_btn();
        $content .= rrssb_facebook_btn();
        $content .= rrssb_linkedin_btn();
        $content .= rrssb_twitter_btn();
        $content .= rrssb_reddit_btn();
        $content .= rrssb_google_btn();
        // $content .= rrssb_github_btn();
        // $content .= rrssb_instagram_btn();
        // $content .= rrssb_pinterest_btn();
        // $content .= rrssb_tumblr_btn();
        // $content .= rrssb_youtube_btn();
	
        
        $content .= '
			</ul>
			<!-- buttons end here -->
			</div>';
    }
    return $content;
}

add_filter('the_content', 'rrssb_main');

/* Hide the buttons until after everything loads.
 * This prevents the buttons from displaying before
 *	adjusting to the container size.
 **/
function rrssb_hide_unitl_load()
{
	$hide_buttons = "<style>.share-container{display:none;}</style>";
	$show_buttons = "
	<script>
		$( document ).ready(function() {
		
			$('.share-container').show();
			
			$(window).trigger('resize');
			
		});
	</script>
	";
	return $hide_buttons . $show_buttons;
}

/* Functions for each different kind of button */

function rrssb_email_btn()
{
	$icon = file_get_contents('icons/mail.svg',true);
    $content = '<li class="email">
		<a href="mailto:?subject='.urlencode(get_the_title()) .'&body=' .urlencode(get_permalink()). '" class="popup">
		<span class="icon">
		'. $icon . '
		</span>
		<span class="text">email</span></a></li>';
    return $content;
}
function rrssb_facebook_btn()
{
	$icon = file_get_contents('icons/facebook.svg',true);
    $content = '<li class="facebook">
		<a href="https://www.facebook.com/sharer/sharer.php?u=' .urlencode(get_permalink() ) . ' " class="popup">
		<span class="icon">
		'. $icon . '
		</span>
		<span class="text">facebook</span></a></li>';
    return $content;
}
function rrssb_linkedin_btn()
{
	$icon = file_get_contents('icons/linkedin.svg',true);
    $content = '<li class="linkedin">
		<a href="http://www.linkedin.com/shareArticle?mini=true&url=' .  urlencode(get_permalink()) . '&title=' . urlencode(get_the_title() ) . '" class="popup">
		<span class="icon">
		'. $icon . '
		</span>
		<span class="text">linkedin</span></a></li>';
    return $content;
}
function rrssb_twitter_btn()
{
	$icon = file_get_contents('icons/twitter.svg',true);
    $content = '<li class="twitter">
		<a href="http://twitter.com/home?status=' . urlencode(get_the_title() )  . ' - ' . urlencode(wp_get_shortlink() ). '" class="popup">
		<span class="icon">
		'. $icon . '
		</span>
		<span class="text">twitter</span></a></li>';
    return $content;
}

function rrssb_reddit_btn()
{
	$icon = file_get_contents('icons/reddit.svg',true);
    $content = '<li class="reddit">
		<a href="http://www.reddit.com/submit?url=' . urlencode(get_permalink() ) . '" class="popup">
		<span class="icon">
		'.$icon.'
		</span>
		<span class="text">reddit</span></a></li>';
    return $content;
}

function rrssb_google_btn()
{
	$icon = file_get_contents('icons/google_plus.svg',true);
    $content = '<li class="googleplus">
		<a href="https://plus.google.com/share?url=' . urlencode(get_the_title() ) . ' - ' . urlencode( get_permalink() ) .'" class="popup">
		<span class="icon">
		'. $icon . '
		</span>
		<span class="text">google+</span></a></li>';
    return $content;
}
function rrssb_github_btn()
{
	$icon = file_get_contents('icons/github.svg',true);
    $content = '<li class="github">
		<a href="https://github.com/###" class="popup">
		<span class="icon">
		'. $icon . '
		</span>
		<span class="text">github</span></a></li>';
    return $content;
}
function rrssb_instagram_btn()
{
	$icon = file_get_contents('icons/instagram.svg',true);
    $content = '<li class="instagram">
		<a href="https://instagram.com/###" class="popup">
		<span class="icon">
		'. $icon . '
		</span>
		<span class="text">instagram</span></a></li>';
    return $content;
}
function rrssb_pinterest_btn()
{
	$icon = file_get_contents('icons/pinterest.svg',true);
    $content = '<li class="pinterest">
		<a href="https://pinterest.com/###" class="popup">
		<span class="icon">
		'. $icon . '
		</span>
		<span class="text">pinterest</span></a></li>';
    return $content;
}
function rrssb_tumblr_btn()
{
	$icon = file_get_contents('icons/tumblr.svg',true);
    $content = '<li class="tumblr">
		<a href="https://tumblr.com/### class="popup">
		<span class="icon">
		'. $icon . '
		</span>
		<span class="text">tumblr</span></a></li>';
    return $content;
}
function rrssb_youtube_btn()
{
	$icon = file_get_contents('icons/youtube.svg',true);
    $content = '<li class="youtube">
		<a href="https://youtube.com/###" class="popup">
		<span class="icon">
		'. $icon . '
		</span>
		<span class="text">youtube</span></a></li>';
    return $content;
}



/* END FILE */
?>