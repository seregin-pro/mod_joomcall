<?php
/**
* @package   JoomCall 1.1.0 module 09.11.2014
* @author    Sergey Pronin http://seregin-pro.ru/
* @copyright Copyright (C) SEREGIN-PRO. All rights reserved.
* @license   GNU General Public License version 2
*/
	defined('_JEXEC') or die('STOP');
	$path = "/modules/mod_joomcall/";
	$document =& JFactory::getDocument();
	$link = JURI::root().$path.'tmpl/css/style.css';
	$attribs = array('type' => 'text/css');
	$document->addHeadLink(JRoute::_($link), 'stylesheet', 'rel', $attribs);

if($jquery == 1){ 
	$document->addScript($path.'tmpl/js/jquery-2.1.1.min.js');
		}
	$document->addScript($path.'tmpl/js/jquery.mask.min.js');
	$document->addScript($path.'tmpl/js/emailpost.js');
	
	$scriptMask  = 'jQuery(document).ready(function(){';
	$scriptMask .= 'jQuery("#phone-joomcall").mask("' .$countryCode. ' (999) 999-99-99");';
	$scriptMask .= '});';
	$document->addScriptDeclaration($scriptMask);
?> 

<span class="email-joomcall"><?php echo JText::_('MOD_JOOMCALL_TITLE');?></span>
<div class="wrapper-joomcall"></div>
	<div id="form-action-joomcall">
		<form action="" method="post">
			<img class="close-joomcall" title="<?php echo JText::_('MOD_JOOMCALL_CLOSE');?>" src="<?php 
			echo JURI::root(); ?>/media/system/images/modal/closebox.png" />
			<div style="clear:both;"></div>
			<p class="jc-text"><?php echo JText::_('MOD_JOOMCALL_TEXT');?></p>
<div class="block-joomcall"> <!-- Name -->
	<label class="label-name" for="name-joomcall"><?php echo JText::_('NAME_SENDER');?></label>	
		<div class="ok-name-joomcall" id="ok-joomcall"></div><div id="error-joomcall" class="error-name-joomcall"></div>	
	<div class="input-joomcall">
		<input id="name-joomcall" type="text" maxlength="50"/>
	</div>
</div>
<div class="block-joomcall">  <!-- Phone -->
	<label class="label-name" for="phone-joomcall"><?php echo JText::_('MOD_JOOMCALL_PHONE_SENDER');?></label>
		<div class="ok-name-joomcall" id="ok1-joomcall"></div><div id="error1-joomcall" class="error-name-joomcall"></div>
	<div class="input-joomcall">
		<input id="phone-joomcall" type="text" />
	</div>
</div>
<?php
if($timeList != ''){ ?>
<div class="block-joomcall"> <!-- Time -->
	<label class="label-name" for="time-joomcall"><?php echo JText::_('MOD_JOOMCALL_TIME_SEND');?></label>
	<div class="input-joomcall">
		<select id="time-joomcall">
			<?php 
			$array = explode("\n", $timeList); 
			foreach($array as $timeValue){ 
				echo '<option value="' .$timeValue. '">' .$timeValue. '</option>';
			}
			?>
		</select>
	</div>
</div>
<?php } ?>
<div class="block-joomcall">
		<label class="label-name" for="msg-joomcall"><?php echo JText::_('MOD_JOOMCALL_MSG');?></label>
		<div class="input-joomcall">
			<textarea id="msg-joomcall" maxlength="2000"></textarea>
		</div>
</div>
<?php if($captcha == "1"){ ?>
<div class="block-joomcall">
	<label class="label-name" for="a-joomcall"><?php echo JText::_('VERIFICATION_CODE');?></label>
		<div class="ok-name-joomcall" id="ok4-joomcall"></div><div id="error4-joomcall" class="error-name-joomcall"></div>
		<div class="input-joomcall-code">
	<input class="code-joomcall" id="a-joomcall" type="text" />&nbsp;+
	<input class="code-joomcall" id="b-joomcall" type="text" />&nbsp;=
	<input class="code-joomcall" id="c-joomcall" type="text" />
</div>
</div>
<?php } ?>
<div class="button-joomcall"><input type="button" id="submit-joomcall" onclick="sendJoomCall();" value="<?php echo JText::_('SUBMIT_BUTTON')?>"/></div>
	</form> 
</div> 
<?php
function formFilter($post_name){
		$filter_name = strip_tags(trim($post_name));
	return $filter_name;
}
$timeText = '';
if(isset($_POST['time']) && $_POST['time'] != '') {
	$timeText = JText::_("MOD_JOOMCALL_TIME_SEND").' '.formFilter($_POST['time'])."\r\n";
}
if(isset($_POST['name']) && isset($_POST['phone'])){
	$name    = formFilter($_POST['name']);
	$msg     = formFilter($_POST['msg']);
	$phone   = formFilter($_POST['phone']); 
	$message = "";
if($msg != ""){
	$message = "\r\n".JText::_("MOD_JOOMCALL_MSG").$msg."\r\n";
}
	$headers = "Content-type: text/plain; charset=utf-8\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "From:".$to."\r\n";
	
	$current_url = JFactory::getURI();
	
	mail($to, JText::_("MOD_JOOMCALL_TITLE"), 
		JText::_("MOD_JOOMCALL_GREETING_MSG")."\r\n\r\n".
		JText::_("MOD_JOOMCALL_FROM_NAME").$name."\r\n".
		JText::_("MOD_JOOMCALL_PHONE").$phone."\r\n".
		$timeText.
		$message.
		"\r\n".JText::_("MOD_JOOMCALL_URL").$current_url."\r\n", $headers);
}
if($powered_by == 0){
	echo "<p id='copyright-joomcall'>";
	echo "<a href='http://seregin-pro.ru/extensions/4-joomcall.html'>JoomCall</a>";
	echo "</p>";
}
?>