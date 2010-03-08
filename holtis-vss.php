<?php
// Add a custom field to the form in "Profile Options"
function holtis_visit_site_setting_check_box($user) {
?>
	<tr>
		<th scope="row">Visit Site Setting</th>
		<td><label for="holtis_open_new">
		<input name="holtis_vss" type="checkbox" id="holtis_vss" value="1" <?php checked('1', $user->holtis_vss); ?> /> Open Visit Site in a New Window. <a href="http://holtis.com/visit-site-settings/" target="_blank" title="More information">More information</a>
		</label></td>
	</tr>
<?php
}
// Handle data that's posted and sanitize before saving it
function holtis_save_user_setting_check_box( $user_id ) {
	$holtis_vss = ( !empty($_POST['holtis_vss']) ? 1 : 0 );
	update_usermeta( $user_id, 'holtis_vss', $holtis_vss );
}
// Set the visit site link to open in a new window per user settings
function holtis_visit_site_setting_open_new() {
	if( get_user_option('holtis_vss') ) {
echo <<<JS
<script type="text/javascript">
//<![CDATA[
jQuery('#site-heading a').attr('target', '_blank');
//]]>
JS;
}}
// Add a custom menu holtis support page
function holtis_plugins_menu() {
	add_menu_page('Support', 'Support', 8, basename(__FILE__), 'holtis_support_page', WP_PLUGIN_URL . '/visit-site-settings/holtis16.png');
	add_submenu_page(basename(__FILE__), 'WordPress Support', 'WordPress Support', 8, basename(__FILE__), 'holtis_support_page');
	add_action('admin_menu', 'holtis_plugins_menu');
}
function holtis_support_page() {
?>
<div class="wrap">
<div class="icon32" id="icon-options-general"><br /></div>
<h2>WordPress Support</h2>
<h3>Holt Information Systems - Outsourced IT, Web Design & Development</h3>
<a href="http://holtis.com/" target="_blank" title="WordPress Support">http://holtis.com</a>
<p style="width:600px;">Need help with your current installation of WordPress? Holt Information Systems is a leading provider of support for WordPress themes and plugins.</p>
<h3>Services Include:</h3>
<ul>
	<li>Theme/Plugin Installation &amp; Modifications</li>
	<li>Website Maintenance, Site &amp; Database Backups, Optimization</li>
	<li>Search Engine Optimization</li>
	<li>Google Apps Integration</li>
	<li>Social Media Marketing (FaceBook, Twitter, etc.)</li>
	<li>WordPress Hosting</li>

</ul>
<br />
<a href="http://holtis.com/get-started/" target="_blank" title="WordPress Support by Holt Information Systems"><img src="http://holtis.com/wp-content/uploads/2009/11/getstartedbtn.png" alt="holtis.com" /></a>
</div>
<?php
}
// Now we set the function up to execute when the admin menu action is called
add_action('admin_menu', 'holtis_plugins_menu');
// Now we set the functinon up to execute when the personal_options action is called
add_action('personal_options', 'holtis_visit_site_setting_check_box');
// Now we set the function up to execute when the personal_options_update action is called
add_action('personal_options_update', 'holtis_save_user_setting_check_box');
// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'holtis_visit_site_setting_open_new');
?>