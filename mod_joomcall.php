<?php 
/**
* @package   JoomCall module 30.03.2013
* @author    Sergey Pronin http://seregin-pro.ru/
* @copyright Copyright (C) SEREGIN-PRO. All rights reserved.
* @license   GNU General Public License version 2
*/
defined('_JEXEC') or die('Restricted access');
require_once dirname(__FILE__).'/helper.php';
    $to          = $params->get('mail_to');
	$captcha	 = $params->get('captcha');
	$powered_by  = $params->get('powered_by');
	$jquery	     = $params->get('jquery');
	$countryCode = $params->get('country_code');
	$timeList	 = $params->get('time_list');
require(JModuleHelper::getLayoutPath('mod_joomcall'));
?>