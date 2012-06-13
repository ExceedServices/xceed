<?php
require_once("connect.php");
require_once("roles.php");

if (!isset($_REQUEST['field']) || !isset($_REQUEST['table']) || !isset($_REQUEST['value']) || !isset($_REQUEST['key']))
    die("");

$table = $_REQUEST['table'];
$field = $_REQUEST['field'];
$value = $_REQUEST['value'];
$key = $_REQUEST['key'];

$q = "update $table set $field = '$value' where id = $key";

$success = mysql_query($q);
if(!$success)
die(mysql_error());
?>
SUCCESS