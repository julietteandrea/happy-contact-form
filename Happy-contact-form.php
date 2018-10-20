<?php
/*
Plugin Name: Happy contact form
Plugin URI: 
Description: A very simple get-to-the-point contact form. It includes linkedin and github icons that will open a new tab to your profile. When activated, this plugin will also show you random positive quotes in the upper right of your admin screen on every page. 
Author: Juliette Gil
Version: 1.0
Author URI: https://www.linkedin.com/in/juliettegil-
Text Domain: happy-contact-form
*/

/******************
* global variables
******************/

$hcf_plugin_name = "Happy contact form";

//retrieve our plugins settings from the options table
$hcf_options = get_option('hcf_settings');

/******************
* includes
******************/

include 'includes/scripts.php'; // this controls all JS/CSS
include 'includes/display-functions.php';
 // displays content functions
include 'includes/admin-settings.php'; // the plugin options page HTML and save functions

