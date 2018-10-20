<?php

function hcf_options_page() {

	global $hcf_options;

	ob_start(); ?>	
	<div class="wrap">
		<h2>My First WordPress Plugin Options</h2>
		<form method="post" action="options.php">

			<?php settings_fields('hcf_settings_group'); ?>

			<table><h3>Contact Information</h3>
			<p>
				<tr>
				<th><label class="description" for="hcf_settings[email_address]"><?php _e('Enter your email address','hcf_domain'); ?></label></th>
				<td><input id="hcf_settings[email_address]" name="hcf_settings[email_address]" type='text' value="<?php echo $hcf_options['email_address']; ?>"/><br></td>
			</tr>
			<tr>

				<th><label class="description" for="hcf_settings[linkedin_url]"><?php _e('Enter your Linkedin url', 'hcf_domain'); ?></label></th>
				<td><input id="hcf_settings[linkedin_url]" name="hcf_settings[linkedin_url]" type='text' value="<?php echo $hcf_options['linkedin_url']; ?>"/><br></td>
			</tr>
			<tr>

				<th><label class="description" for="hcf_settings[github_url]"><?php _e('Enter your Github url', 'hcf_domain'); ?></label></th>
				<td><input id="hcf_settings[github_url]" name="hcf_settings[github_url]" type='text' value="<?php echo $hcf_options['github_url']; ?>"/></td>
			</tr>
		</p>
		<td><p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Options', 'hcf_domain'); ?>" /></p></td>
		</form>
	</table>

	</div>
	<?php

	echo ob_get_clean();
}

function hcf_options_link() {
	add_options_page('Happy contact form plugin options', 'HCF options', 'manage_options', 'hcf_options', 'hcf_options_page');
	//(page title/tab, name on menu, (capabilites)who has access to page, (slug) url, name of the function that's gonna output all of the contents)
}

add_action('admin_menu', 'hcf_options_link');

function hcf_register_settings() {
	register_setting('hcf_settings_group', 'hcf_settings');
}

add_action('admin_init','hcf_register_settings');