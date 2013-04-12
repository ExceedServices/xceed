<?php
require_once "connect.php";
require_once "roles.php";

if (!isset($_REQUEST['field'], $_REQUEST['table'], $_REQUEST['value'], $_REQUEST['key']))
    die("");

$table = mysql_real_escape_string($_REQUEST['table']);
$field = mysql_real_escape_string($_REQUEST['field']);
database()->save($table, array(
	$field => $_REQUEST['value'],
	"id" => $_REQUEST['key']));
?>
Lack of warning indicates: SUCCESS