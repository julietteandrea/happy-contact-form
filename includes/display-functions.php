<?php

/* our display functions for outputting information*/


function hcf_contact_info($content) {

	global $hcf_options;

$output = <<<EOD
<h1 align="center">Let's get in touch</h1>
<p align="center">Want to work together or simply want to have a chat? Drop me an email at the email address below.</p>


EOD;

$content .= $output;

echo $content;
	
}
add_action( 'get_footer', 'hcf_contact_info' );

/*<p align="center"><img src="https://www.godigitalmarketing.com/assets/img/products/TargetedEmail.svg" style="width:35px;height:35px;">
<a>email address</a><br>

<a href="' . $hcf_options['linkedin_url'] . '" target="_blank"><img src="https://cdn3.iconfinder.com/data/icons/free-social-icons/67/linkedin_circle_black-512.png" style="width:35px;height:35px;"> 

<a href="' . $hcf_options['github_url'] . '" target="_blank"><img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/github-512.png" style="width:32px;height:32px;">
</p>*/