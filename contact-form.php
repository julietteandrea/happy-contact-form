<?php
/**
 * @package Happy_contact
 * @version 1.6
 */
/*
Plugin Name: Happy contact form
Plugin URI: 
Description: A very simple get-to-the-point contact form. It includes linkedin and github icons that will open a new tab to your profile. When activated, this plugin will also show you random positive quotes in the upper right of your admin screen on every page. 
Author: Juliette Gil
Version: 1.6
Author URI: https://www.linkedin.com/in/juliettegil-
Text Domain: happy-contact-form
*/

// created a settings page //
add_action('admin_menu', function() {
  add_options_page( 'Happy Contact form', 'My simple plugin', 'manage_options', 'my-plugin-pg', 'my_happy_plugin_page' );
});

add_action( 'admin_init', function() {
    // register options here, copy and paste the following line and to add options beside map_name (map: my awesome plugin 😉 )
    register_setting( 'my-happy-plugin-settings', '$title' );
    register_setting( 'my-happy-plugin-settings', '$sub_title' );
    register_setting( 'my-happy-plugin-settings', '$email' );
    register_setting( 'my-happy-plugin-settings', '$linkedin' );
    register_setting( 'my-happy-plugin-settings', '$github' );
});

function my_happy_plugin_page() {
 ?>
      <div class="wrap">
     <form action="options.php" method="post">
       <?php
       settings_fields( 'my-happy-plugin-settings' );
       do_settings_sections( 'my-happy-plugin-settings' );
       ?>
       <table><h1>Happy Contact Form</h1>
       	<tr>
       		<th>Title</th>
       <td><input type="text" placeholder="Let's get in Touch..." name="title" cols="50"></td>
   </tr>
   <tr>
   	<th>Subtitle</th>
   	<td><textarea name="sub_title" placeholder="Drop me an email at the email address below..." rows="2" cols="50"></textarea></td>
   </tr>
   <tr>
   	<th>Email</th>
   	<td><input type="email" name="email" cols="50"></td>
   </tr>
   <tr>
   	<th>Linkedin URL</th>
   	<td><input type="text" name="linkedin" cols="50"></td>
   </tr>
   <tr>
   	<th>Github URL</th>
   	<td><input type="text" name="github" cols="50"></td>
   </tr>
   <tr>
       <td><input type="submit" name="submit"></td>
   </tr>
</table>
     </form>
   </div>
 <?php
}


function happy_quotes() {
	/** These are random quotes */
	$quotes = "First, solve the problem. Then, write the code
Well, hello again
It's so nice to have you back where you belong
You're lookin' swell
Creativity takes courage
You're still glowin', you're still crowin'
You're still goin' strong
Technology is best when it brings people together
It always seems impossible until it's done
Strive for progress not perfection
A problem is a chance for you to do your best
Never go away again
It's so nice to have you back where you belong
Don't count the days, make the days count
You're still glowin', you're still crowin'
You're still goin' strong
I feel the room swayin'
While the band's playin'
So, golly, gee, fellas
Have a little faith in me, fellas
You're an inspiration
Promise, you'll never go away
when something is important enough, you do it even if the odds aren't in your favour";

	// Here we split it into lines
	$quotes = explode( "\n", $quotes );

	// And then randomly choose a line
	return wptexturize( $quotes[ mt_rand( 0, count( $quotes ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_world() {
	$chosen = happy_quotes();
	echo "<p id='world'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_world' );

// We need some CSS to position the paragraph
function quotes_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#world {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 15px;
	}
	</style>
	";
}

add_action( 'admin_head', 'quotes_css' );


function themeslug_footer_hook() {
		$title = $_GET['$title'];
		$sub_title = "Want to work together or simply want to have a chat? Drop me an email at the email address below.";
		$email = "julietteandrea1@gmail.com";
	    $linkedin = "https://www.linkedin.com/in/juliettegil-";
	    $github = "https://www.github.com/julietteandrea";

$output = <<<EOD
<h1 align="center">$title</h1>
<p align="center">$sub_title</p>
<p align="center"><img src="https://www.godigitalmarketing.com/assets/img/products/TargetedEmail.svg" style="width:35px;height:35px;">
<a href="mailto:$email?Subject=Hello%20from%20WordPress" target="_top">$email</a><br><a href="$linkedin" target="_blank"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/linkedin_circle_black-512.png" style="width:35px;height:35px;"> <a href="$github" target="_blank"><img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/github-512.png" style="width:32px;height:32px;">
</p>
EOD;

echo $output;
	
}
add_action( 'get_footer', 'themeslug_footer_hook' );