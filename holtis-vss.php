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
// Now we set the functinon up to execute when the personal_options action is called
add_action('personal_options', 'holtis_visit_site_setting_check_box');
// Now we set the function up to execute when the personal_options_update action is called
add_action('personal_options_update', 'holtis_save_user_setting_check_box');
// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'holtis_visit_site_setting_open_new');
?>