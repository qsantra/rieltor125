<?php

//
// FIELDS
//
$m_smtp_c_Name = 'Name';

$m_smtp_c_Email = 'Email';

$m_smtp_c_Message = 'Message';

$m_smtp_c_Captcha = 'Enter the numbers from the image';

$m_smtp_c_agree = 'I agree to the processing of personal data';

$m_smtp_c_Submit = 'Send';


//
// MESSAGES
//
$m_smtp_c_NameEmailMessage_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Please, fill all fields.</span>';

$m_smtp_c_Email_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Incorrect email address.</span>';

$m_smtp_c_Captcha_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">The numbers in the image are entered incorrectly.</span>';

$m_smtp_c_StopSpam_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Spam protection failed.</span>';

$m_smtp_c_agree_error = 'It is necessary to agree to processing of personal data';

$m_smtp_c_Success = '<span class="m_smtp_c_success" style="color:green; text-align:left;">Thanks, your message is sent.</span>';

// v1.0.6 
$m_smtp_c_Maxlength_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">More characters than allowed are entered.</span>';

$m_smtp_c_Upload_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">File upload error:</span>';

$m_smtp_c_Maxsize_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">The file size exceeds the allowed.</span>';

$m_smtp_c_Format_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">The file format is not valid.</span>';

$m_smtp_c_Move_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">Failed to move file:</span>';

$m_smtp_c_Required_error = '<span class="m_smtp_c_error" style="color:red; text-align:left;">The field is required.</span>';


//
// DESCRIPTIONS
//
$m_smtp_c_plugin_name = 'My SMTP Contact'; // Plugin name
$m_smtp_c_small_description = 'This plugin will help you to set up a contact form with captcha and checkbox. Plugin can be used SMTP (Simple Mail Transfer Protocol) to send mail.'; // Plugin Description
$m_smtp_c_description = "
<h2>How to install a contact form?</h2>
<p>Activate the plugin. Add this line of code to the template where you would like to display the contact form. For example, place this code in the side column of the template. Or create a component and paste this code into it.</p>
<p><strong>&lt;?php if (function_exists('GetMSC')) { GetMSC(); } ?&gt;</strong></p> 
Standard PHP mail sending is enabled by default. Captcha uses cookies. The plugin can be translated into other languages. See /lang/en.php, ru.php ... Make your translation and upload the \"xx.php\" file to the directory - /lang/ - then select your language file in the plugin settings. Do not use 'id', 'name' attributes for alternative fields.</p>
";


//
// PLUGIN SETTINGS
//
$m_smtp_c_admin_donate = 'Donate';

$m_smtp_c_admin_plugin_settings = 'Plugin settings';

$m_smtp_c_admin_language_file = 'Language file:';

$m_smtp_c_admin_email_to = 'E-mail address to receive mail:';

$m_smtp_c_admin_standard_or_smtp = 'Mail sending method:';

$m_smtp_c_admin_standard = 'Standard send';

$m_smtp_c_admin_smtp = 'Send via SMTP';

$m_smtp_c_admin_digital_captcha = 'Captcha:';

$m_smtp_c_admin_digitSalt = 'Captcha salt:';

$m_smtp_c_admin_digitSalt_generate = 'Generate new salt';

$m_smtp_c_admin_agree_checkbox = 'Checkbox:';

$m_smtp_c_admin_email_from = 'Address to send the mail:';

$m_smtp_c_admin_email_from_password = 'Password:';

$m_smtp_c_admin_email_from_ssl = 'Server:';

$m_smtp_c_admin_email_from_port = 'Port:';

$m_smtp_c_admin_submit = 'Save changes';

$m_smtp_c_admin_or = 'or';

$m_smtp_c_admin_backward = 'Go back';

$m_smtp_c_admin_updating_settings = 'Updating settings, please wait...';

// v1.0.6 
$m_smtp_c_admin_verification = 'Verification:';

$m_smtp_c_admin_verification_client_server = 'Client and server';

$m_smtp_c_admin_verification_server = 'Server only';

$m_smtp_c_admin_verification_sender_name = 'Sender name:';

$m_smtp_c_admin_verification_subject = 'Subject:';

$m_smtp_c_admin_alternative_fields = 'Alternative fields:';

$m_smtp_c_admin_select_on = 'On';

$m_smtp_c_admin_select_off = 'Off';

$m_smtp_c_admin_properties = 'Properties';

$m_smtp_c_admin_qty_fields = 'Quantity of fields:';

$m_smtp_c_admin_limit_file_size = 'Max file size (mb):';

$m_smtp_c_admin_valid_file_format = 'Allowed formats (,):';

$m_smtp_c_admin_designation = 'Designation';

$m_smtp_c_admin_yes_or_no_designation = 'Select whether show the field designation on the page or not';

$m_smtp_c_admin_yes_or_no_required = 'Select whether the field should be required';

$m_smtp_c_admin_field_type = 'Select field type';

$m_smtp_c_admin_Maxlength = 'Select the maximum number of characters in the field';

$m_smtp_c_admin_Code = 'Code';

?>