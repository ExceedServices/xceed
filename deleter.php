<?php
require_once("connect.php");
require_once("roles.php");

if (!isset($_REQUEST['table']) || !isset($_REQUEST['id']))
    die("");
$table = mysql_real_escape_string($_REQUEST['table']);
$id = mysql_real_escape_string($_REQUEST['id']);

$q = "delete from $table where id = '$id'";
$success = mysql_query($q);

if(!$success)
die(mysql_error());
?>
SUCCESS
