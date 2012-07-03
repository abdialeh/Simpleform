<?php 
// Module Name
$config['module_simpleform_name'] = "Simpleform";

// Contact Form

//$config['simpleform_YourFormName_model'] = array(
//	'modelName' => 'YourModelName',
//	'modelFunction' => 'YourModelFunctionName'
//);

$config['simpleform_contact_email'] = 'youremail@address.com';
$config['simpleform_contact_email_title'] = 'module_simpleform_email_title';
$config['simpleform_contact_email_view'] = 'simpleform_mail_template';
$config['simpleform_contact'] = array(
	'firstname' => 'trim|required|min_length[2]|xss_clean',
	'lastname' => 'trim|required|min_length[2]|xss_clean',
	'email' => 'trim|required|min_length[5]|valid_email|xss_clean',
	'subject' => 'required|xss_clean',
	'message' => 'required|xss_clean',
	'glass' => 'antispam'
);