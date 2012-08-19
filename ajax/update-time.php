<?php
require_once("connect.php");
require_once("roles.php");

if (!isset($_REQUEST['id']) || !isset($_REQUEST['value']))
    die("");

$id = mysql_real_escape_string($_REQUEST['id']);
$start = date_parse($_REQUEST['start_time']);
$month = mysql_real_escape_string($start['month']);
$day = mysql_real_escape_string($start['day']);
$year = mysql_real_escape_string($start['year']);
$startTime = mysql_real_escape_string($start['hour'].":".$start['minute']);

$insertSQL = "update Appointments set month = '".$month."',day = '".$day."',year = '".$year."',startTime = '".$startTime."')
where id = '".$id."'";

$success = mysql_query($q);
if(!$success)
die(mysql_error());
?>
