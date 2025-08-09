<?php

#####################################################
##### BLUEPRINT - CREATE AJAX CALL
#####################################################

add_action('wp_ajax_nopriv_blueprint_contact_form_post_action', 'blueprint_ajax_callback');
add_action('wp_ajax_blueprint_contact_form_post_action', 'blueprint_ajax_callback');

function blueprint_ajax_callback () {

$cf_name = stripslashes($_POST['name']);
$cf_email = stripslashes($_POST['email']);
$cf_message = stripslashes($_POST['message']);
$cf_phone = stripslashes($_POST['phone']);
$cf_website = stripslashes($_POST['website']);
$cf_admin_email = of_get_option("admin_email");
$cf_email_subject = __("Website Enquiry", "village");
$cf_email_body = 'Name: ' . $cf_name . "\n\n" . 'Email: ' . $cf_email . "\n\n" . 'Message: ' . $cf_message . "\n\n" . 'Phone: ' . $cf_phone . "\n\n" . 'Website: ' . $cf_website;
$cf_email_headers = 'From: ' . $cf_email . "\r\n";

if (mail($cf_admin_email, $cf_email_subject, $cf_email_body, $cf_email_headers)) {

	_e("Your message has been sent successfully.", "village");

}

exit;

}

?>