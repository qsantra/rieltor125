<?php
 
if(!defined('IN_GS')){ die('you cannot load this page directly.'); }

// 
// Plugin settings
//

require('../plugins/'.$m_smtp_c_thisfile.'/cfg.php');
$act = @$_POST['act'];

echo '
<script>
function m_smtp_c_random(n)
{
	var r = \'\';
	var arr = \'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789\';
	var al = arr.length
	for( var i=0; i < n; i++ ){
		r += arr[Math.floor(Math.random() * al)];
	}
	return r;
}
</script>';

function m_smtp_c_Select($label, $name, $value, $key, $ch1, $tr1, $ch2, $tr2) {
			echo '
			<label>'.$label.'</label>
			<p>
			<select class="text" name="'.$name.'">';
				if($value == $key){
					echo '<option value="'.$ch1.'" selected>'.$tr1.'';
					echo '<option value="'.$ch2.'">'.$tr2.'';
				} 
				else {
					echo'<option value="'.$ch2.'" selected>'.$tr2.'';
					echo'<option value="'.$ch1.'">'.$tr1.'';
				}
			echo '
			</select>
			</p>';
}

function m_smtp_c_alt_fields_Select($m_smtp_c_qty_fields, $themes_ch, $i, $themes_name, $themes_option, $themes_arr) { 

			$tmp_themes_arr = '';
			if (!array_key_exists($m_smtp_c_qty_fields, $themes_ch)) { $themes_ch[] = ''; }
			for ( $l = 0, $count_themes_arr = count($themes_arr); $l < $count_themes_arr; $l++ )
			{ 
			  if ($themes_arr[$l] == @$themes_ch[$i]) 
			  { 
			    $tmp_themes_arr = $themes_arr[$l]; 
                unset($themes_arr[$l]); 
			  }
			}
			if ($tmp_themes_arr != '') 
			{
			  array_unshift($themes_arr, $tmp_themes_arr); 
			}
		    echo '
		    <select class="text title" style="max-width: 75px;" name="'.$themes_name.'[]">
			<option disabled>'.$themes_option.'</option>';
            foreach ($themes_arr as $key => $value) 
			{
               echo '<option value='.$themes_arr[$key].'>'.$value.'</option>'; 
            }
		    echo '
            </select>';
			
	return $themes_ch;
}

echo '
<p><hr style="height: 1px; border: none; color: #dddddd; background: #dddddd; margin: 0 0 20px 0;"></p>
<h3>'.$m_smtp_c_admin_plugin_settings.'</h3>

	<form class="largeform" id="m_smtp_c_settingsform" name="m_smtp_c_settingsform" action="load.php?id='.$m_smtp_c_thisfile.'" method="post" accept-charset="utf-8">
		
		<INPUT TYPE="hidden" NAME="act" VALUE="addsettings">
		
		<div class="leftsec">';
		
			echo '
		    <p>
			<label>'.$m_smtp_c_admin_language_file.'</label>';
			$m_smtp_c_array_languages = scandir('../plugins/'.$m_smtp_c_thisfile.'/lang/'); // scan the directory, get an array
			for ( $i = 0; $i < count($m_smtp_c_array_languages); $i++ )
			{
			  if ($m_smtp_c_array_languages[$i] == $m_smtp_c_language.'.php') // if matches
			  {
			    $m_smtp_c_tmp_language = $m_smtp_c_array_languages[$i]; // write to variable
                unset($m_smtp_c_array_languages[$i]); // remove from array
			  }
			}
			array_unshift($m_smtp_c_array_languages, $m_smtp_c_tmp_language); // add the first element to the array
			
		    echo '
		    <select class="text" name="m_smtp_c_language">';
            foreach ($m_smtp_c_array_languages as $key => $value) 
			{
			  if (strripos($m_smtp_c_array_languages[$key], '.php') !== false)
			  { 
                echo '<option value='.$m_smtp_c_array_languages[$key].'>'.$value.'</option>'; // output (the first element)
			  }
            }
		    echo '
            </select>
			</p>';
			
			echo '		
			<p><label>'.$m_smtp_c_admin_email_to.'</label><input class="text" name="m_smtp_c_email_to" type="text" value="'.$m_smtp_c_email_to.'"></p>';
		    
			m_smtp_c_Select($m_smtp_c_admin_standard_or_smtp, 'm_smtp_c_smtp_or_standard', $m_smtp_c_smtp_or_standard, 'standard', 'standard', $m_smtp_c_admin_standard, 'smtp', $m_smtp_c_admin_smtp);
			
			m_smtp_c_Select($m_smtp_c_admin_digital_captcha, 'm_smtp_c_digital_captcha', $m_smtp_c_digital_captcha, 'on', 'on', $m_smtp_c_admin_select_on, 'off', $m_smtp_c_admin_select_off);
			
			echo '		
			<p>
			<label>'.$m_smtp_c_admin_digitSalt.'</label>
			<input class="text" name="m_smtp_c_digitSalt" id="m_smtp_c_digitSalt" type="text" value="'.$m_smtp_c_digitSalt.'">
			<a href="javascript:void(0);" onclick="document.getElementById(\'m_smtp_c_digitSalt\').value = m_smtp_c_random(32)">'.$m_smtp_c_admin_digitSalt_generate.'</a>
			</p>';

			m_smtp_c_Select($m_smtp_c_admin_agree_checkbox, 'm_smtp_c_agree_checkbox', $m_smtp_c_agree_checkbox, 'on', 'on', $m_smtp_c_admin_select_on, 'off', $m_smtp_c_admin_select_off);			
			
			m_smtp_c_Select($m_smtp_c_admin_verification, 'm_smtp_c_client_server', $m_smtp_c_client_server, 'client_server', 'client_server', $m_smtp_c_admin_verification_client_server, 'server', $m_smtp_c_admin_verification_server);
		
		echo '
		</div>';
		
		echo '
		<div class="rightsec">';
		
		echo '
            <p><label>'.$m_smtp_c_admin_verification_sender_name.'</label>
			<input class="text" name="m_smtp_c_sender_name" type="text" value="'.$m_smtp_c_sender_name.'">
			</p>
			<p><label>'.$m_smtp_c_admin_verification_subject.'</label>
			<input class="text" name="m_smtp_c_subject" type="text" value="'.$m_smtp_c_subject.'">
			</p>
			<p><label>'.$m_smtp_c_admin_smtp.'</label>
			'.$m_smtp_c_admin_email_from.'<input class="text" name="m_smtp_c_email_from" type="text" value="'.$m_smtp_c_email_from.'">
			'.$m_smtp_c_admin_email_from_password.'<input class="text" name="m_smtp_c_email_from_password" type="text" value="'.$m_smtp_c_email_from_password.'">
			'.$m_smtp_c_admin_email_from_ssl.'<input class="text" name="m_smtp_c_email_from_ssl" type="text" value="'.$m_smtp_c_email_from_ssl.'">
			'.$m_smtp_c_admin_email_from_port.'<input class="text" name="m_smtp_c_email_from_port" type="text" value="'.$m_smtp_c_email_from_port.'">
			</p>
			<p><label>'.$m_smtp_c_admin_standard.'</label>
			'.$m_smtp_c_admin_email_from.'<input class="text" name="m_smtp_c_standard_email_from" type="text" value="'.$m_smtp_c_standard_email_from.'">
			</p>';
			
		echo '
		</div>';
		
		echo '
		<div class="clear"></div>';
		
		echo '
		<hr style="height: 1px; border: none; color: #dddddd; background: #dddddd; margin: 0 0 20px 0;">
		<div class="leftsec">';
			m_smtp_c_Select($m_smtp_c_admin_alternative_fields, 'm_smtp_c_alternative_fields', $m_smtp_c_alternative_fields, 'on', 'on', $m_smtp_c_admin_select_on, 'off', $m_smtp_c_admin_select_off);
		echo '
		</div>';
			
		echo '
		<div class="edit-nav">
			<a href="#" id="metadata_toggle" accesskey="">'.$m_smtp_c_admin_properties.'</a>
			<div class="clear"></div>
		</div>	
			<!-- metadata toggle screen -->
			<div style="display: none;" id="metadata_window">
			  <div>
				<p class="inline clearfix">';
				 echo '<p>'.$m_smtp_c_admin_qty_fields.' <input class="text title" type="number" name="m_smtp_c_qty_fields" value="'.$m_smtp_c_qty_fields.'" style="max-width:53px;" pattern="^\d+$" required min="1" max="1000"> 
					      <button class="button" style="float: right;" type="submit">'.$m_smtp_c_admin_submit.'</button>
					   </p>
					   <p>'.$m_smtp_c_admin_limit_file_size.' <input class="text title" type="number" name="m_smtp_c_limit_file_size" value="'.($m_smtp_c_limit_file_size / 1024 / 1024).'" style="max-width:53px;" pattern="^\d+$" required min="1" max="25">
					      '.$m_smtp_c_admin_valid_file_format.' <input class="text title" type="text" name="m_smtp_c_valid_file_format" value="'.implode(',', $m_smtp_c_valid_file_format).'" style="max-width:237px;" required>
					   </p>';
				 
				 for ($i = 0; $i < $m_smtp_c_qty_fields; $i++) :
				  if ( empty($m_smtp_c_arr_tags_Name[$i]) ) { $m_smtp_c_arr_tags_Name[$i] = $i; }
					echo ($i+1).' <input placeholder="'.$m_smtp_c_admin_designation.'" class="text title" type="text" name="m_smtp_c_arr_fields_Name[]" value="'.@$m_smtp_c_arr_fields_Name[$i].'" style="max-width: 100px;">';
			
					$m_smtp_c_arr_fields_Name_ok = m_smtp_c_alt_fields_Select($m_smtp_c_qty_fields, $m_smtp_c_arr_fields_Name_ok, $i, 'm_smtp_c_arr_fields_Name_ok', $m_smtp_c_admin_yes_or_no_designation, array('ok', '---'));
					
					echo ' <input placeholder="tag \'name\'" class="text title" type="hidden" name="m_smtp_c_arr_tags_Name[]" value="'.$m_smtp_c_arr_tags_Name[$i].'" style="max-width: 53px;" pattern="^\d+$">';
					
					$m_smtp_c_arr_fields_Required = m_smtp_c_alt_fields_Select($m_smtp_c_qty_fields, $m_smtp_c_arr_fields_Required, $i, 'm_smtp_c_arr_fields_Required', $m_smtp_c_admin_yes_or_no_required, array('---', 'required'));
					
					$m_smtp_c_arr_fields_Type = m_smtp_c_alt_fields_Select($m_smtp_c_qty_fields, $m_smtp_c_arr_fields_Type, $i, 'm_smtp_c_arr_fields_Type', $m_smtp_c_admin_field_type, array('---', 'button', 'checkbox', 'color', 'date', 'datetime-local', 'email', 'file', 'hidden', 'image', 'month', 'number', 'password', 'radio', 'range', /*'reset',*/ 'search', /*'submit',*/ 'tel', 'text', 'time', 'url', 'week'));
					
					$m_smtp_c_arr_fields_Maxlength = m_smtp_c_alt_fields_Select($m_smtp_c_qty_fields, $m_smtp_c_arr_fields_Maxlength, $i, 'm_smtp_c_arr_fields_Maxlength', $m_smtp_c_admin_Maxlength, array('---', '5', '10', '25', '50', '100', '200', '300', '500', '1000', '3000', '5000', '10000', '50000', '100000'));
						
					echo '
					<textarea placeholder="'.$m_smtp_c_admin_Code.'" class="text title" type="text" name="m_smtp_c_arr_fields_Code[]" style="margin-top: 2px!important;">'.@$m_smtp_c_arr_fields_Code[$i].'</textarea>
					<p> </p>';
				 endfor;
				 
				echo '
				</p>
			  </div>
			</div>';
		
		echo '
		<div class="clear"></div>
		<p id="submit_line"><span><input class="submit" type="submit" name="" value="'.$m_smtp_c_admin_submit.'"></span> &nbsp;&nbsp;'.$m_smtp_c_admin_or.'&nbsp;&nbsp; <a class="cancel" href="plugins.php">'.$m_smtp_c_admin_backward.'</a></p>
		
	</form>
';

if ($act == 'addsettings') { 

$m_smtp_c_arr_fields_Name = $_POST['m_smtp_c_arr_fields_Name']; // array - Names
$m_smtp_c_arr_tags_Name = $_POST['m_smtp_c_arr_tags_Name']; // array - Tag Names
$m_smtp_c_arr_fields_Name_ok = $_POST['m_smtp_c_arr_fields_Name_ok']; // array - ok
$m_smtp_c_arr_fields_Required = $_POST['m_smtp_c_arr_fields_Required']; // array - required
$m_smtp_c_arr_fields_Type = $_POST['m_smtp_c_arr_fields_Type']; // array - email
$m_smtp_c_arr_fields_Maxlength = $_POST['m_smtp_c_arr_fields_Maxlength']; // array - maxlength
$m_smtp_c_arr_fields_Code = $_POST['m_smtp_c_arr_fields_Code']; // array - Codes

file_put_contents( '../plugins/'.$m_smtp_c_thisfile.'/cfg.php', 
'<?php
if (!function_exists("m_smtp_c_Rand")) { function m_smtp_c_Rand($begin, $end) { return function_exists("mt_rand") ? mt_rand($begin, $end) : rand($begin, $end); } } 
'); 
	for ($i = 0; $i < $m_smtp_c_qty_fields; $i++) :
	 if ($m_smtp_c_arr_fields_Name[$i] != '' && $m_smtp_c_arr_fields_Code[$i] != '') // if filled
	 {
	  file_put_contents('../plugins/'.$m_smtp_c_thisfile.'/cfg.php', '$m_smtp_c_arr_fields_Name['.$i.']="'.htmlspecialchars($m_smtp_c_arr_fields_Name[$i]).'";', FILE_APPEND);
	  file_put_contents('../plugins/'.$m_smtp_c_thisfile.'/cfg.php', '$m_smtp_c_arr_tags_Name['.$i.']="'.intval($m_smtp_c_arr_tags_Name[$i]).'";', FILE_APPEND);	  
	  file_put_contents('../plugins/'.$m_smtp_c_thisfile.'/cfg.php', '$m_smtp_c_arr_fields_Name_ok['.$i.']="'.htmlspecialchars($m_smtp_c_arr_fields_Name_ok[$i]).'";', FILE_APPEND);	  
	  file_put_contents('../plugins/'.$m_smtp_c_thisfile.'/cfg.php', '$m_smtp_c_arr_fields_Required['.$i.']="'.htmlspecialchars($m_smtp_c_arr_fields_Required[$i]).'";', FILE_APPEND);
	  file_put_contents('../plugins/'.$m_smtp_c_thisfile.'/cfg.php', '$m_smtp_c_arr_fields_Type['.$i.']="'.htmlspecialchars($m_smtp_c_arr_fields_Type[$i]).'";', FILE_APPEND);
	  file_put_contents('../plugins/'.$m_smtp_c_thisfile.'/cfg.php', '$m_smtp_c_arr_fields_Maxlength['.$i.']="'.htmlspecialchars($m_smtp_c_arr_fields_Maxlength[$i]).'";', FILE_APPEND);
	  file_put_contents('../plugins/'.$m_smtp_c_thisfile.'/cfg.php', '$m_smtp_c_arr_fields_Code['.$i.']="'.htmlspecialchars($m_smtp_c_arr_fields_Code[$i]).'";', FILE_APPEND);
	 }
	endfor;
file_put_contents( '../plugins/'.$m_smtp_c_thisfile.'/cfg.php', '
$m_smtp_c_language="'.str_replace('.php', '', htmlspecialchars($_POST['m_smtp_c_language'])).'";
$m_smtp_c_email_to="'.str_replace(' ', '', htmlspecialchars(trim($_POST['m_smtp_c_email_to'], ','))).'";
$m_smtp_c_smtp_or_standard="'.htmlspecialchars($_POST['m_smtp_c_smtp_or_standard']).'";
$m_smtp_c_sender_name="'.htmlspecialchars(trim($_POST['m_smtp_c_sender_name'])).'";
$m_smtp_c_subject="'.htmlspecialchars(trim($_POST['m_smtp_c_subject'])).'";
$m_smtp_c_email_from="'.htmlspecialchars(trim($_POST['m_smtp_c_email_from'])).'";
$m_smtp_c_email_from_password="'.htmlspecialchars(trim($_POST['m_smtp_c_email_from_password'])).'";
$m_smtp_c_email_from_ssl="'.htmlspecialchars(trim($_POST['m_smtp_c_email_from_ssl'])).'";
$m_smtp_c_email_from_port="'.htmlspecialchars(trim($_POST['m_smtp_c_email_from_port'])).'";
$m_smtp_c_standard_email_from="'.htmlspecialchars(trim($_POST['m_smtp_c_standard_email_from'])).'";
$m_smtp_c_digital_captcha="'.htmlspecialchars($_POST['m_smtp_c_digital_captcha']).'";
$m_smtp_c_digitSalt="'.htmlspecialchars(trim($_POST['m_smtp_c_digitSalt'])).'";
$m_smtp_c_agree_checkbox="'.htmlspecialchars($_POST['m_smtp_c_agree_checkbox']).'";
$m_smtp_c_client_server="'.htmlspecialchars($_POST['m_smtp_c_client_server']).'";
$m_smtp_c_qty_fields="'.intval($_POST['m_smtp_c_qty_fields']).'";
$m_smtp_c_limit_file_size="'.(intval($_POST['m_smtp_c_limit_file_size']) * 1024 * 1024).'";
$m_smtp_c_valid_file_format=array("'.str_replace(array(' ', ','), array('', '","'), mb_strtolower(htmlspecialchars(trim($_POST['m_smtp_c_valid_file_format'], ',')))).'");
$m_smtp_c_alternative_fields="'.htmlspecialchars($_POST['m_smtp_c_alternative_fields']).'";
?>', FILE_APPEND);
require('../plugins/'.$m_smtp_c_thisfile.'/cfg.php');
require('../plugins/'.$m_smtp_c_thisfile.'/lang/'.$m_smtp_c_language.'.php');
echo '<script> if (document.querySelector(\'.main\')) { document.querySelector(\'.main\').innerHTML = \'\'; } </script> <div class="updated" style="display: block;"><p>'.$m_smtp_c_admin_updating_settings.'</p></div>';
?>
<script type="text/javascript">
setTimeout('window.location.href = \'load.php?id=<?php echo $m_smtp_c_thisfile; ?>\';', 3000);
</script>
<?php
}

?>