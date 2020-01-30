<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File: 		functions.php
* @Package:		GetSimple
* @Action:		Boom theme for GetSimple CMS
*
*****************************************************/

/**
 * Innovation Settings
 *
 * This defines variables based on the theme plugin's settings
 *
 * @return bool
 */
function Innovation_Settings() {
	$file = GSDATAOTHERPATH . 'InnovationSettings.xml';
	if (file_exists($file)) {
		$p = getXML($file);
		return $p;
	} else {
		return false;
	}
}
