<?php
require_once "connect.php";
require_once "roles.php";

if (!isset($_REQUEST['table'], $_REQUEST['id']))
    die;
$table = mysql_real_escape_string($_REQUEST['table']);
database()->delete($table, $_REQUEST["id"]);
?>
Lack of warning indicates: SUCCESS