<?php
$table = "users";
$page = "employee_manager";
if (!empty($_GET["a"])) {
	$parameters = array(
		"id" => "",
		"name" => "",
		"email" => "",
		"Roles" => "",
		"phone" => "");
}
require "generic_manager.php";