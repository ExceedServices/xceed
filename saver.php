<?php
require_once("connect.php");
require_once("roles.php");

if (!isset($_REQUEST['field']) || !isset($_REQUEST['table']) || !isset($_REQUEST['value']) || !isset($_REQUEST['key']))
    die("");

$table = mysql_real_escape_string($_REQUEST['table']);
$field = mysql_real_escape_string($_REQUEST['field']);
$value = mysql_real_escape_string($_REQUEST['value']);
$key   = mysql_real_escape_string($_REQUEST['key']);

$q = "update $table set $field = '$value' where id = '$key'";

$success = mysql_query($q);
if(!$success)
die(mysql_error());
?>
SUCCESS
