<?php 

require_once("connect.php");

$name = mysql_real_escape_string($_REQUEST['name']);
$note = mysql_real_escape_string($_REQUEST['notes']);
$jobId = mysql_real_escape_string($_REQUEST['jobId']);

$start = date_parse($_REQUEST['start_time']);
$end = date_parse($_REQUEST['end_time']);
if(isset($_REQUEST['location']))
      $location=mysql_real_escape_string($_REQUEST['location']);
else
	$location="NULL";


	$insertSQL = "insert into Appointments (name,notes,job_id,month,day,year,startTime,endTime,roles,location)"
	."values('".$name."','".$note."',".$jobId.",".$start['month'].","
	.$start['day'].","
	.$start['year'].","
	."'".$start['hour'].":".$start['minute']."',"
	."'".$end['hour'].":".$end['minute']."',null,'"
	.$location."')";

	$insertResult = mysql_query($insertSQL);
	if(!$insertResult)
	{
		echo($insertSQL);
		die(mysql_error());
	}
	else
	{
		header("location: dashboard.php");
	}


?>
