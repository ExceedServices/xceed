<?php
require_once "connect.php";
echo full("dashboard", array(
	"css" => "color-picker/colorPicker",
	"js" => array(
		"color-picker/jquery.colorPicker",
		"datetimepicker",
		"dashlets/calendar",
		"dashlets/contacts",
		"dashlets/messaging")));