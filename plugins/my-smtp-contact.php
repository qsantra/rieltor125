<?php

if(!defined('IN_GS')){ die('you cannot load this page directly.'); }

/*
Plugin Name: my-smtp-contact
Description: Contact form with a captcha, alternative fields and the ability to send emails via SMTP
Version: 1.0.6 / sep 2019
Author: NetExplorer
Email: netexplorer@yandex.ru
Author URI: http://netexplorer.h1n.ru

This plugin will help you to set up a contact form with captcha and checkbox. 
Plugin can be used SMTP (Simple Mail Transfer Protocol) to send mail.

How to install a contact form?

Unzip and place file in the plugin folder of GetSimple. Then activate the plugin. 
Add this line of code to the template where you would like to display the contact form. 
For example, place this code in the side column of the template. 
Or create a component and paste this code into it.

<?php if ( function_exists('GetMSC') ) { GetMSC(); } ?>

Standard PHP mail sending is enabled by default.
SMTP tested with @yandex.ru, @mail.ru, @gmail.com ...

The plugin can be translated into other languages. See /lang/en.php, ru.php ... 
Make your translation and upload the "xx.php" file to the directory - /lang/ - then select your language file in the plugin settings.
Do not use 'id', 'name' attribute for alternative fields.
*/

// Get correct id for plugin
$m_smtp_c_thisfile = basename(__FILE__, '.php');

// Load configuration
require($m_smtp_c_thisfile.'/cfg.php');

// Load language
require($m_smtp_c_thisfile.'/lang/'.$m_smtp_c_language.'.php');

// Register plugin
register_plugin(
    $m_smtp_c_thisfile,    // ID of plugin, should be filename minus php
    $m_smtp_c_plugin_name,    // Title of plugin
    '1.0.6',    // Version of plugin
    'NetExplorer',    // Author of plugin
    'http://netexplorer.h1n.ru',    // Author URL
    $m_smtp_c_small_description,    // Plugin Description
    'plugins',    // Page type of plugin
    'm_smtp_c_options'    // Function that displays content
);

// Creates a menu option on the Admin/Theme sidebar
add_action('plugins-sidebar', 'createSideMenu', array($m_smtp_c_thisfile, $m_smtp_c_plugin_name));

// Show options in plugin page
function m_smtp_c_options() {
	global $m_smtp_c_thisfile, $m_smtp_c_language;
	
	// Load language
	require($m_smtp_c_thisfile.'/lang/'.$m_smtp_c_language.'.php');
	
	// Please do not remove the donation links
	echo $m_smtp_c_description . '
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" style="display: inline;">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="netexplorer@yandex.ru">
<input type="hidden" name="currency_code" value="USD">
<input type="submit" border="0" name="submit" class="button" value="'.$m_smtp_c_admin_donate.'" title="Donate with PayPal button" alt="Donate with PayPal button">
</form> &nbsp; <a href="https://money.yandex.ru/to/410012986152433" target="_blank">Yandex.Money</a>
';

	// Load plugin settings
	require($m_smtp_c_thisfile.'/admin.php');
}



//*** Get My SMTP Contact ***//
function GetMSC() {
		
	global $m_smtp_c_thisfile;
	
	// Load configuration
	require($m_smtp_c_thisfile.'/cfg.php');
	// Load language
	require($m_smtp_c_thisfile.'/lang/'.$m_smtp_c_language.'.php');
	
	function m_smtp_c_StrToLower($string) {
	return function_exists('mb_strtolower') ? mb_strtolower($string, 'UTF-8') : strtolower($string);
	}
	
	function m_smtp_c_StrLen($string) {
	return function_exists('mb_strlen') ? mb_strlen($string, 'UTF-8') : strlen(utf8_decode($string));
	}
	
	function m_smtp_c_SafeEmail($string) {
	$string = (string) $string;
	$string = str_replace(array('\n', '\r'), ' ', $string);
	$string = preg_replace('/\s+/', ' ', $string);
	$string = trim($string);
	return $string;
	}

	function m_smtp_c_GetFileFormat($arr_names) {
	$tmp_arr = explode('.', $arr_names);
	$file_format = m_smtp_c_StrToLower(end($tmp_arr));
	return htmlspecialchars($file_format);	  
	}

	function m_smtp_c_Translit($string) {
	$string = (string) $string; // convert to string value
	$string = strip_tags($string); // remove HTML tags
	$string = str_replace(array('\n', '\r'), ' ', $string); // remove the carriage return
	$string = preg_replace('/\s+/', ' ', $string); // remove duplicate spaces
	$string = trim($string); // remove spaces at the beginning and end of the line
	$string = m_smtp_c_StrToLower($string); // translate the string to lowercase (sometimes you need to set the locale)
	$string = strtr($string, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
	$string = preg_replace('/[^0-9a-z-_ \.]/i', '', $string); // clear the string of invalid characters
	$count = substr_count($string, '.');
	$string = preg_replace('/\./', '', $string, --$count); // remove all points except the last one
	$string = str_replace(' ', '-', $string); // replace spaces with a minus sign
	return $string;
	}


//*** FORM ***//
echo '
<script>
   function m_smtp_c_setTagAttributes(selector, tag, tag_attribute, iflag)
	{
		
			if ( document.querySelectorAll(selector) ) 
			 {
			    var elements = document.querySelectorAll(selector);					
				for (var i = 0; i < elements.length; i++) 
					{
						if ( !elements[i].getAttribute(tag) ) // if no attribute
						 {	 
							 if (iflag) { elements[i].setAttribute(tag, tag_attribute + i); } else { elements[i].setAttribute(tag, tag_attribute); }
						 }
						 
						 if ( document.getElementById(tag_attribute + i) ) 
						  { 
							if ( document.querySelector("#" + tag_attribute + i + " + label") ) // if label
							 { 
							  element = document.querySelector("#" + tag_attribute + i + " + label");
							  if ( !element.getAttribute("for") )  
							   {
							    element.setAttribute("for", tag_attribute + i);
							   }
							 }
						  }			 
					}	
			 }	
			 
	}';

// Verify or no on client (alternative fields)
if ($m_smtp_c_alternative_fields == 'on' && $m_smtp_c_client_server == 'client_server') {
echo '
   function m_smtp_c_BeforeSubmit() 
	{
		
	 function in_array(value, array) 
      {
       for(var i = 0; i < array.length; i++)
	    {
         if( value == array[i]) return true;
        }
      return false;
      }
		
	  var arr_fields_Name = '.json_encode($m_smtp_c_arr_fields_Name).';
	  var valid_file_format = '.json_encode($m_smtp_c_valid_file_format).';
	  var fields_Name_err_size = "", fields_Name_err_format = "";
	  var ext = "";
	  var error = 0, error_msg = "";
	  var arr_form_elements = document.querySelector("#m_smtp_c_form").childNodes.length;
	  
	  for (var i = 0; i < arr_form_elements; i++) 
	   { 
	    if ( document.querySelector(".m_smtp_c #m_smtp_c_qty_field_"+i+" input") ) 
		 {
		  var input = document.querySelector(".m_smtp_c #m_smtp_c_qty_field_"+i+" input");
		  
		  if ( input.getAttribute("type") === "file" ) 
		   {
			if ( input.files[0] )
			 {
			  var file = input.files[0];
			  var parts = file.name.split("."); if (parts.length > 1) { ext = parts.pop().toLowerCase(); }
			  
			   // validation of the file size 
			   if (file.size > '.$m_smtp_c_limit_file_size.') 
			    {  
				 fields_Name_err_size = fields_Name_err_size + arr_fields_Name[i]+ "'.strip_tags($m_smtp_c_Maxsize_error).'\n";
				 error = 1;
				}
			 
			   // file format validation
			   if ( !in_array(ext, valid_file_format) )
			    {
				 fields_Name_err_format = fields_Name_err_format + arr_fields_Name[i]+ "'.strip_tags($m_smtp_c_Format_error).'\n";
				 error = 1;
			    }
			 }
		   }
		   
		 }
	   }
	    
	  if (error == 1) 
	   { 
	    if (fields_Name_err_size) { error_msg = error_msg + fields_Name_err_size; }
	    if (fields_Name_err_format) { error_msg = error_msg + fields_Name_err_format; }
		 
		alert(error_msg); return false; 
	   }
	   
	 return true;
	}';
}

echo '
   function m_smtp_c_AfterSubmit()
    {
		
	 function set_value(i, elements, values, cflag) 
	  {
		if ( elements[i] )
		 {
	      for (var key in values) 
		   { 
			if ( elements[i].getAttribute("name") === key )
			 {
	           if (!cflag) { elements[i].value = values[key]; }
			 }
			 
			 if ( elements[i].getAttribute("value") === values[key] )
			 { 
	           if (cflag) { elements[i].setAttribute("checked", ""); }
			 }
	       }
		 }
	  }
		
	 var arr_fields_value = '.json_encode($_POST).';
	 var arr_form_elements = document.querySelector("#m_smtp_c_form").childNodes.length;
	 var arr_inputs = document.querySelectorAll(".m_smtp_c input");
	 var arr_textareas = document.querySelectorAll(".m_smtp_c textarea");
	 var arr_selects = document.querySelectorAll(".m_smtp_c select");
	 for (var i = 0; i < arr_form_elements; i++) 
	  {
	   if (arr_inputs[i]) 
	   {
	    if (arr_inputs[i].getAttribute("type") != "file" &&
            arr_inputs[i].getAttribute("type") != "radio" &&
			arr_inputs[i].getAttribute("type") != "checkbox" &&
			arr_inputs[i].getAttribute("type") != "reset" &&
			arr_inputs[i].getAttribute("type") != "button" &&
			arr_inputs[i].getAttribute("type") != "submit" &&
			arr_inputs[i].getAttribute("type") != "hidden")
		 {  
		  set_value(i, arr_inputs, arr_fields_value);
		 }
		 
		if (arr_inputs[i].getAttribute("type") === "radio" || arr_inputs[i].getAttribute("type") === "checkbox") 
		 {
		  set_value(i, arr_inputs, arr_fields_value, true);
		 }
	   }
	   	   
	   set_value(i, arr_selects, arr_fields_value);
	     
	   set_value(i, arr_textareas, arr_fields_value);
	  }
	  
	 var captcha_code = document.querySelector("#my_captcha_code_input");
	 if (captcha_code) { captcha_code.value = ""; }
	  
	}
</script>';
	
echo '
<div class="m_smtp_c">';

// Form
if (in_array('file', $m_smtp_c_arr_fields_Type)) { 
$multipart_form_data = 'enctype="multipart/form-data"'; 
if ($m_smtp_c_alternative_fields == 'on' && $m_smtp_c_client_server == 'client_server') { $before_submit = 'm_smtp_c_BeforeSubmit();'; } else { $before_submit = ''; } // verify or no on client (alternative fields)
$max_file_size = '<input type="hidden" name="max_file_size" value="'.$m_smtp_c_limit_file_size.'">';
} 
else { 
$multipart_form_data = '';
$before_submit = '';
$max_file_size = '';
}

if ($m_smtp_c_agree_checkbox == 'on') { // with checkbox
echo '
<form id="m_smtp_c_form" class="m_smtp_c_form" name="m_smtp_c_form" method="post" onsubmit="if (document.getElementById(\'m_smtp_c_agree\').checked) { return '.$before_submit.' this.submit(); } else { alert(\''.$m_smtp_c_agree_error.'\'); return false; }" '.$multipart_form_data.'>
'.$max_file_size.'';
}
else { // without checkbox
echo '
<form id="m_smtp_c_form" class="m_smtp_c_form" name="m_smtp_c_form" method="post" onsubmit="return '.$before_submit.' this.submit();" '.$multipart_form_data.'>
'.$max_file_size.'';
}

// Alternative fields
if ($m_smtp_c_alternative_fields == 'on') {
 for ($i = 0; $i < $m_smtp_c_qty_fields; $i++) :
  if (array_key_exists($i, $m_smtp_c_arr_fields_Name)) 
  {  
   if ($m_smtp_c_arr_fields_Name[$i] != '' && $m_smtp_c_arr_fields_Code[$i] != '') // if filled
   {
	echo '
	<p id="m_smtp_c_qty_field_'.$i.'" class="m_smtp_c_qty_field">';
	if ($m_smtp_c_arr_fields_Name_ok[$i] == 'ok') {
	echo
	$m_smtp_c_arr_fields_Name[$i];
	}
	echo
	htmlspecialchars_decode($m_smtp_c_arr_fields_Code[$i]).'
	</p>';	
	}
   }
 endfor;
 
 echo '
 <script>
	m_smtp_c_setTagAttributes(".m_smtp_c .m_smtp_c_qty_field input", "id", "m_smtp_c_qty_input_", true);
	m_smtp_c_setTagAttributes(".m_smtp_c .m_smtp_c_qty_field textarea", "id", "m_smtp_c_qty_textarea_", true);
	m_smtp_c_setTagAttributes(".m_smtp_c .m_smtp_c_qty_field select", "id", "m_smtp_c_qty_select_", true);
	
	var arr_tags_Name = '.json_encode($m_smtp_c_arr_tags_Name).';
	var arr_fields_Required = '.json_encode($m_smtp_c_arr_fields_Required).';
	var arr_fields_Type = '.json_encode($m_smtp_c_arr_fields_Type).';
	var arr_fields_Maxlength = '.json_encode($m_smtp_c_arr_fields_Maxlength).';
	var client_server = "'.$m_smtp_c_client_server.'";
	for (var i = 0; i < '.$m_smtp_c_qty_fields.'; i++)
	 {
		m_smtp_c_setTagAttributes(".m_smtp_c #m_smtp_c_qty_field_"+i+" input", "name", "alt_field_"+arr_tags_Name[i], false);
		m_smtp_c_setTagAttributes(".m_smtp_c #m_smtp_c_qty_field_"+i+" textarea", "name", "alt_field_"+arr_tags_Name[i], false);
		m_smtp_c_setTagAttributes(".m_smtp_c #m_smtp_c_qty_field_"+i+" select", "name", "alt_field_"+arr_tags_Name[i], false);
		
		if (arr_fields_Type[i] != "---") 
		 {
		   m_smtp_c_setTagAttributes(".m_smtp_c #m_smtp_c_qty_field_"+i+" input", "type", arr_fields_Type[i], false);
		 }
		
		if (client_server === "client_server") // verify or no on client
		{
		 if (arr_fields_Maxlength[i] != "---") 
		 {
		   m_smtp_c_setTagAttributes(".m_smtp_c #m_smtp_c_qty_field_"+i+" input", "maxlength", arr_fields_Maxlength[i], false);
		   m_smtp_c_setTagAttributes(".m_smtp_c #m_smtp_c_qty_field_"+i+" textarea", "maxlength", arr_fields_Maxlength[i], false); 
		 }
			
		 if (arr_fields_Required[i] != "---") 
		 {
		   m_smtp_c_setTagAttributes(".m_smtp_c #m_smtp_c_qty_field_"+i+" input", "required", "", false);
		   m_smtp_c_setTagAttributes(".m_smtp_c #m_smtp_c_qty_field_"+i+" textarea", "required", "", false);		   
		 }
		}
		
		if (arr_fields_Type[i] === "checkbox") 
		 {
		  var checkbox_inputs = document.querySelectorAll(".m_smtp_c #m_smtp_c_qty_field_"+i+" input[type=\'checkbox\']"); 
          for (var j = 0; j < checkbox_inputs.length; j++) {
             if ( !checkbox_inputs[j].getAttribute("onclick") ) { checkbox_inputs[j].setAttribute("onclick", "m_smtp_c_forCheckbox(this)"); }
		  }
		}
	
	 }

// checked only one (group checkboxes in one field)
function m_smtp_c_forCheckbox(element) {
		  var checkbox_inputs = document.querySelectorAll("input[type=\'checkbox\'][name=\'" + element.name + "\']");
          for (var i = 0; i < checkbox_inputs.length; i++) {
            if (checkbox_inputs[i]) { checkbox_inputs[i].onchange = checkboxHandler; }
		  }
          function checkboxHandler(e) {
            for (var j = 0; j < checkbox_inputs.length; j++) {
                if (checkbox_inputs[j].checked && checkbox_inputs[j] !== this) {
                    checkbox_inputs[j].checked = false;
				}
			}
          }
}
 </script>';
}

// Fields
else {
echo '
<p id="m_smtp_c_std_field_0" class="m_smtp_c_std_field">
'.$m_smtp_c_Name.'<br>
<input id="m_smtp_c_std_input_0" size="26" type="text" value="" name="m_smtp_c_name_value" '.($m_smtp_c_client_server == 'client_server' ? 'maxlength="200" required' : '').'>
</p>
<p id="m_smtp_c_std_field_1" class="m_smtp_c_std_field">
'.$m_smtp_c_Email.'<br>
<input id="m_smtp_c_std_input_1" size="26" type="'.($m_smtp_c_client_server == 'client_server' ? 'email' : 'text').'" value="" name="m_smtp_c_email_value" '.($m_smtp_c_client_server == 'client_server' ? 'maxlength="200" required' : '').'>
</p>
<p id="m_smtp_c_std_field_2" class="m_smtp_c_std_field">
'.$m_smtp_c_Message.'<br>
<textarea id="m_smtp_c_std_textarea_0" rows="5" cols="40" name="m_smtp_c_message_value" '.($m_smtp_c_client_server == 'client_server' ? 'maxlength="5000" required' : '').'></textarea>
</p>';
}

// Captcha
if ($m_smtp_c_digital_captcha == 'on') {
echo '
<p id="m_smtp_c_std_field_captcha" class="m_smtp_c_std_field">
<a href="#" onclick="document.getElementById(\'my_captcha\').src = \'/plugins/'.$m_smtp_c_thisfile.'/captcha.php?\' + Math.random(); document.getElementById(\'my_captcha_code_input\').value = \'\'; return false;">
<img id="my_captcha" src="/plugins/'.$m_smtp_c_thisfile.'/captcha.php?rand='.m_smtp_c_Rand(0, 9999).'" alt="captcha"></a>
<br>
'.$m_smtp_c_Captcha.'
<br>
<input id="my_captcha_code_input" type="text" name="m_smtp_c_captcha_name" value="" size="6" maxlength="5" onkeyup="this.value = this.value.replace(/[^\d]+/g, \'\');" pattern="\d{5}" '.($m_smtp_c_client_server == 'client_server' ? 'required' : '').'>
</p>';
}

// Checkbox
if ($m_smtp_c_agree_checkbox == 'on') {
echo '
<p id="m_smtp_c_std_field_agree" class="m_smtp_c_std_field">
<input id="m_smtp_c_agree" style="vertical-align: middle;" type="checkbox" name="m_smtp_c_agree" value="ok">
<label for="m_smtp_c_agree">'.$m_smtp_c_agree.'</label>
</p>';
}

// Simple spam protect & submitted test
echo '
<p style="display:none!important;">
<input id="m_smtp_c_submitted" type="hidden" value="true" name="m_smtp_c_submitted">
<input id="m_smtp_c_sender_e-mail" size="6" type="text" value="" name="m_smtp_c_sender_e-mail" placeholder="do not fill" maxlength="200">
</p>';

// Submit button
echo '
<p class="m_smtp_c_Submit">
<input id="m_smtp_c_Submit" type="submit" name="m_smtp_c_Submit" value="'.$m_smtp_c_Submit.'">
</p>

</form>

</div>';


//*** MAIL ***//
	$error = 0;
    $m_smtp_c_success_msg = '';
	$j = 0;
	
    if (isset($_POST['m_smtp_c_submitted'])) {
			
		// Alternative fields
		if ($m_smtp_c_alternative_fields == 'on') {
			
		 $m_smtp_c_arr_fields_value = array(); 
		 		 	 	 
		 for ($i = 0; $i < $m_smtp_c_qty_fields; $i++) {
			 
		 if (array_key_exists($i, $m_smtp_c_arr_fields_Name)) 
         {
		  $m_smtp_c_arr_fields_value[$i] = htmlspecialchars(@$_POST['alt_field_'.$i]);
		  //echo "$i - $m_smtp_c_arr_fields_Name[$i] - $m_smtp_c_arr_fields_value[$i] <br>";
		  
		  // maxlength
		  if ($m_smtp_c_arr_fields_Maxlength[$i] != '---') { 
		   if ( m_smtp_c_StrLen($m_smtp_c_arr_fields_value[$i]) > intval($m_smtp_c_arr_fields_Maxlength[$i]) ) {
		    $m_smtp_c_success_msg .= '<p class="m_smtp_c_field_error">'.$m_smtp_c_arr_fields_Name[$i].' '.$m_smtp_c_Maxlength_error.'</p>';
			$error = 1;
		   }
		  }
		 
		  // required without file
		  if ($m_smtp_c_arr_fields_Type[$i] != 'file' && $m_smtp_c_arr_fields_value[$i] == '') {
		   if ($m_smtp_c_arr_fields_Required[$i] == 'required' && $m_smtp_c_arr_fields_value[$i] == '') { 
			$m_smtp_c_success_msg .= '<p class="m_smtp_c_field_error">'.$m_smtp_c_arr_fields_Name[$i].' '.$m_smtp_c_Required_error.'</p>';
            $error = 1;
		   }
		  }
		  
		  // email
		  if ($m_smtp_c_arr_fields_Type[$i] == 'email') {
		   if (!preg_match("/^[^@]+@[^@.]+\.[^@]+$/", $m_smtp_c_arr_fields_value[$i])) { 
            $m_smtp_c_success_msg .= '<p class="m_smtp_c_field_error">'.$m_smtp_c_arr_fields_Name[$i].' '.$m_smtp_c_Email_error.'</p>';
            $error = 1;
           }
		  }
		  
		  // file
		  if ($m_smtp_c_arr_fields_Type[$i] == 'file') {
		   $m_smtp_c_S_FILES = array_values($_FILES);
		   
		    if ($m_smtp_c_S_FILES[$j]['name'] != '') {
			 if ($m_smtp_c_S_FILES[$j]['error'] != 0) {
			  $m_smtp_c_success_msg .= '<p class="m_smtp_c_field_error">'.$m_smtp_c_arr_fields_Name[$i].' '.$m_smtp_c_Upload_error.' '.$m_smtp_c_S_FILES[$j]['error'].'.</p>';
              $error = 1;
             }
			 else {
			  // validation of the file size
			  if ($m_smtp_c_S_FILES[$j]['size'] > $m_smtp_c_limit_file_size) { 
			   $m_smtp_c_success_msg .= '<p class="m_smtp_c_field_error">'.$m_smtp_c_arr_fields_Name[$i].' '.$m_smtp_c_Maxsize_error.'</p>';
			   $error = 1;
              }
			  // file format validation
			  $m_smtp_c_file_format = m_smtp_c_GetFileFormat($m_smtp_c_S_FILES[$j]['name']);
			  if (!in_array($m_smtp_c_file_format, $m_smtp_c_valid_file_format)) {
			   $m_smtp_c_success_msg .= '<p class="m_smtp_c_field_error">'.$m_smtp_c_arr_fields_Name[$i].' '.$m_smtp_c_Format_error.'</p>';
			   $error = 1;
			  }
			 }
		    }
			// required with file
			elseif ($m_smtp_c_arr_fields_Required[$i] == 'required') { 
			  $m_smtp_c_success_msg .= '<p class="m_smtp_c_field_error">'.$m_smtp_c_arr_fields_Name[$i].' '.$m_smtp_c_Required_error.'</p>';
              $error = 1;
			 }
		   $j++;
		  } 
		 
		 }
		 }

		} 
		
		// Fields
		else {
     	 $m_smtp_c_name_value = htmlspecialchars($_POST['m_smtp_c_name_value']);
         $m_smtp_c_email_value = htmlspecialchars($_POST['m_smtp_c_email_value']);
         $m_smtp_c_message_value = htmlspecialchars($_POST['m_smtp_c_message_value']);
		 
		 if ( m_smtp_c_StrLen($m_smtp_c_name_value) > 200 || m_smtp_c_StrLen($m_smtp_c_email_value) > 200 || m_smtp_c_StrLen($m_smtp_c_message_value) > 5000 ) {
		    $m_smtp_c_success_msg .= '<p class="m_smtp_c_field_error">'.$m_smtp_c_Maxlength_error.'</p>';
			$error = 1;
		 }
		
		 if (empty($m_smtp_c_name_value) || empty($m_smtp_c_email_value) || empty($m_smtp_c_message_value)) {
            $m_smtp_c_success_msg .= '<p class="m_smtp_c_field_error">'.$m_smtp_c_NameEmailMessage_error.'</p>';
            $error = 1;
         }
         if (!preg_match("/^[^@]+@[^@.]+\.[^@]+$/", $m_smtp_c_email_value)) {
            $m_smtp_c_success_msg .= '<p class="m_smtp_c_field_error">'.$m_smtp_c_Email_error.'</p>';
            $error = 1;
         }
		}

		// For all fields
		// captcha
		if ($m_smtp_c_digital_captcha == 'on') { 
		 if (md5($_POST['m_smtp_c_captcha_name'] . $m_smtp_c_digitSalt) != $_COOKIE['MSC_digit']) {
            $m_smtp_c_success_msg .= '<p class="m_smtp_c_field_error">'.$m_smtp_c_Captcha_error.'</p>';
            $error = 1;  		
         }
		}
		
		// simple spam protect
		if ($_POST['m_smtp_c_sender_e-mail'] != '') { 
			$m_smtp_c_success_msg .= '<p class="m_smtp_c_field_error">'.$m_smtp_c_StopSpam_error.'</p>';
            $error = 1;
		}
		
        // If no erors
        if ($error != 1) {
			
			$m_smtp_c_success_msg = '<p class="m_smtp_c_field_success">'.$m_smtp_c_Success.'</p>';
			
			$site = htmlspecialchars($_SERVER['HTTP_HOST']);
			$ip = htmlspecialchars($_SERVER['REMOTE_ADDR']);
			$useragent = htmlspecialchars($_SERVER['HTTP_USER_AGENT']);
			$footer = '
				<hr>
				<p>
					<a href="http://'.$site.'">http://'.$site.'</a><br>
					IP: '.$ip.'<br>
					'.$useragent.'
				</p>';
			
			// Alternative fields
			if ($m_smtp_c_alternative_fields == 'on') {
				  $message = '
				<h1>'.$m_smtp_c_subject.'</h1>
				<ul>';
				for ($i = 0; $i < $m_smtp_c_qty_fields; $i++) :
				if (array_key_exists($i, $m_smtp_c_arr_fields_Name)) {
				 if ($m_smtp_c_arr_fields_Type[$i] != 'file' && $m_smtp_c_arr_fields_Type[$i] != 'button' && $m_smtp_c_arr_fields_Type[$i] != 'reset') {
				  $message .= '
					<li><strong>'.$m_smtp_c_arr_fields_Name[$i].'</strong> '.m_smtp_c_SafeEmail($m_smtp_c_arr_fields_value[$i]).'</li>';
				 }
				}
				endfor;
				  $message .= '
				</ul>';
				  $message .= $footer;
			}
			
			// Fields
			else {
				  $message = '
				<h1>'.$m_smtp_c_subject.'</h1>
				<ul>';
				  $message .= '
					<li><strong>'.$m_smtp_c_Name.'</strong> '.m_smtp_c_SafeEmail($m_smtp_c_name_value).'</li>
					<li><strong>'.$m_smtp_c_Email.'</strong> '.m_smtp_c_SafeEmail($m_smtp_c_email_value).'</li>
					<li><strong>'.$m_smtp_c_Message.'</strong> '.m_smtp_c_SafeEmail($m_smtp_c_message_value).'</li>';				  
				  $message .= '
				</ul>';
				  $message .= $footer;
			}
			
			if ($m_smtp_c_smtp_or_standard == 'smtp') { // SMTP
				require($m_smtp_c_thisfile.'/SendMailSmtpClass.php');
				$mail = new SendMailSmtpClass($m_smtp_c_email_from, $m_smtp_c_email_from_password, $m_smtp_c_email_from_ssl, $m_smtp_c_email_from_port, "UTF-8");
				$from = array($m_smtp_c_sender_name, $m_smtp_c_email_from);
				
				goto SEND;
			} 
			elseif ($m_smtp_c_smtp_or_standard == 'standard') { // standard php
				require($m_smtp_c_thisfile.'/SendMailClass.php');
				$mail = new SendMailClass;
				$mail->from($m_smtp_c_standard_email_from, $m_smtp_c_sender_name);
				$mail->to($m_smtp_c_email_to, '');
				$mail->subject = $m_smtp_c_subject;
				
				goto SEND;
			}

			SEND:
			    if ($m_smtp_c_alternative_fields == 'on') { 
			    // Adding files to the letter and send
				if (in_array('file', $m_smtp_c_arr_fields_Type)) {
				for ($i = 0, $count_m_smtp_c_S_FILES = count($m_smtp_c_S_FILES); $i < $count_m_smtp_c_S_FILES; $i++) :
				 if ($m_smtp_c_S_FILES[$i]['tmp_name'] != '') { 
				  $m_smtp_c_file_format = m_smtp_c_GetFileFormat($m_smtp_c_S_FILES[$i]['name']);
				  //$uploadfile = tempnam(sys_get_temp_dir(), sha1($m_smtp_c_S_FILES[$i]['name']));  																	 			 // +
				  $uploadfile = 'plugins/'.$m_smtp_c_thisfile.'/tmp/'.md5(m_smtp_c_Rand(0, 9999).$m_smtp_c_S_FILES[$i]['name'].m_smtp_c_Rand(0, 9999)).'.'.$m_smtp_c_file_format; 	 // -
				  if (move_uploaded_file($m_smtp_c_S_FILES[$i]['tmp_name'], $uploadfile)) {
				   $mail->addFile($uploadfile, 'file-'.($i+1).'-'.m_smtp_c_Translit($m_smtp_c_S_FILES[$i]['name']));
				   if ( file_exists($uploadfile) ) { unlink($uploadfile); } 															 								 			 // -
			      } 
				  else { 
				   $m_smtp_c_success_msg .= $m_smtp_c_Move_error.' '.htmlspecialchars($m_smtp_c_S_FILES[$i]['name']);
				  }
				 }
				endfor;
				}
			    }
				
				if ($m_smtp_c_smtp_or_standard == 'smtp') { // SMTP
				$mail->send($m_smtp_c_email_to, $m_smtp_c_subject, $message, $from);
				}
				elseif ($m_smtp_c_smtp_or_standard == 'standard') { // standard php
				$mail->body = $message;
				$mail->send();
				}
			
			$_POST = array(); //$_FILES = array();
            $m_smtp_c_email_value = $m_smtp_c_name_value = $m_smtp_c_message_value = '';
        }
		else {
			  echo '
			  <script>;
				m_smtp_c_AfterSubmit();
			  </script>';
		}
		
	 // Message
	 echo $m_smtp_c_success_msg;
		
    } 
}


?>