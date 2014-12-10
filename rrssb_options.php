<div class="wrap">
<h2>Ridiculously Responsive Social Sharing Buttons</h2>

<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('rrssb');?>

<p>Configure RRSSB with the options below. Use the checkbox below to show buttons under all posts or use the [rrssb] shortcode to show buttons anywhere!</p>

<p>Please <a href="http://alanreed.org/donate" target="_blank">donate</a> and <a href="https://wordpress.org/support/view/plugin-reviews/ridiculously-responsive-social-sharing-buttons" target="_blank">rate</a> RRSSB plugin! Thank you!</a>

<h3>General Options</h3>
<label><input type="checkbox" name="give_rrssb_credit" value="1" 
<?php if ( 1 == get_option('give_rrssb_credit') ) echo 'checked="checked"'; ?> /> Give RRSSB Credit. </label> <br />
<label><input type="checkbox" name="show_buttons_below_post" value="1" 
<?php if ( 1 == get_option('show_buttons_below_post') ) echo 'checked="checked"'; ?> /> Show buttons below all posts. </label> <br />
<label><input type="checkbox" name="show_buttons_above_post" value="1" 
<?php if ( 1 == get_option('show_buttons_above_post') ) echo 'checked="checked"'; ?> /> Show buttons above all posts. </label> <br />
<label><input type="checkbox" name="use_rrssb_jquery" value="1" 
<?php if ( 1 == get_option('use_rrssb_jquery') ) echo 'checked="checked"'; ?> /> Use RRSSB's JQuery file. If RRSSB breaks your site, try unchecking this box. </label> <br />
<label><input type="checkbox" name="help_improve_rrssb" value="1" 
<?php if ( 1 == get_option('help_improve_rrssb') ) echo 'checked="checked"'; ?> /> Help improve RRSSB by sharing usage information. It will never be made public. </label> <br />

<h3>Enter CSS to fix or modify how your buttons look</h3>
<p>Define css classes here.</p>
<textarea name="rrssb_css" cols="40" rows="5" ><?php echo get_option('rrssb_css'); ?></textarea><br />
<p>List the CSS classes to apply to the RRSSB container. Seperate with a space.</p>
<input type="text" name="rrssb_css_classes" value="<?php echo get_option('rrssb_css_classes'); ?>" />

<h3>Decide which buttons to show</h3>
<label><input type="checkbox" name="show_email" value="1" 
<?php if ( 1 == get_option('show_email') ) echo 'checked="checked"'; ?> /> Show Email button. </label><br />
<label><input type="checkbox" name="show_facebook" value="1" 
<?php if ( 1 == get_option('show_facebook') ) echo 'checked="checked"'; ?> /> Show Facebook button. </label><br />
<label><input type="checkbox" name="show_linkedin" value="1" 
<?php if ( 1 == get_option('show_linkedin') ) echo 'checked="checked"'; ?> /> Show Linkedin button. </label><br />
<label><input type="checkbox" name="show_twitter" value="1" 
<?php if ( 1 == get_option('show_twitter') ) echo 'checked="checked"'; ?> /> Show Twitter button. </label><br />
<label><input type="checkbox" name="show_reddit" value="1" 
<?php if ( 1 == get_option('show_reddit') ) echo 'checked="checked"'; ?> /> Show Reddit button. </label><br />
<label><input type="checkbox" name="show_google" value="1" 
<?php if ( 1 == get_option('show_google') ) echo 'checked="checked"'; ?> /> Show Google button. </label><br />
<label><input type="checkbox" name="show_pocket" value="1" 
<?php if ( 1 == get_option('show_pocket') ) echo 'checked="checked"'; ?> /> Show Pocket button. </label><br />
<label><input type="checkbox" name="show_github" value="1" 
<?php if ( 1 == get_option('show_github') ) echo 'checked="checked"'; ?> /> Show Github button. </label><br />
<label><input type="checkbox" name="show_instagram" value="1" 
<?php if ( 1 == get_option('show_instagram') ) echo 'checked="checked"'; ?> /> Show Instagram button. </label><br />
<label><input type="checkbox" name="show_pinterest" value="1" 
<?php if ( 1 == get_option('show_pinterest') ) echo 'checked="checked"'; ?> /> Show Pinterest button. </label><br />
<label><input type="checkbox" name="show_tumblr" value="1" 
<?php if ( 1 == get_option('show_tumblr') ) echo 'checked="checked"'; ?> /> Show Tumblr button. </label><br />
<label><input type="checkbox" name="show_youtube" value="1" 
<?php if ( 1 == get_option('show_youtube') ) echo 'checked="checked"'; ?> /> Show Youtube button. </label><br />

<h3>Enter your URLs below</h3>
<table class="form-table">
<tr valign="top"><th scope="row">http://www.github.com/</th>
<td><input type="text" name="github_link" value="<?php echo get_option('github_link'); ?>" /></td></tr>
<tr valign="top"><th scope="row">http://www.instagram.com/</th>
<td><input type="text" name="instagram_link" value="<?php echo get_option('instagram_link'); ?>" /></td></tr>
<tr valign="top"><th scope="row">http://www.pinterest.com/</th>
<td><input type="text" name="pinterest_link" value="<?php echo get_option('pinterest_link'); ?>" /></td></tr>
<tr valign="top"><th scope="row">http://www.tumblr.com/</th>
<td><input type="text" name="tumblr_link" value="<?php echo get_option('tumblr_link'); ?>" /></td></tr>
<tr valign="top"><th scope="row">http://www.youtube.com/</th>
<td><input type="text" name="youtube_link" value="<?php echo get_option('youtube_link'); ?>" /></td></tr>
</table>

<input type="hidden" name="action" value="update" />

<p>Thanks for using RRSSB!</p>
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
</p>

</form>
</div>
