<?php 

require_once("connect.php");

$start = date_parse($_REQUEST['start_time']);
$end = date_parse($_REQUEST['end_time']);
if(isset($_REQUEST['client']))
      $client=$_REQUEST['client'].",";
else
	$client="NULL,";
if(isset($_REQUEST['invoice']))
      $invoice="'".$_REQUEST['invoice']."',";
else
	$invoice="NULL,";
if(isset($_REQUEST['location']))
      $location="'".$_REQUEST['location']."',";
else
	$location="NULL,";


	$insertSQL = "insert into Jobs (title,client_id,invoice_id,location,ticket_id,month,day,year,start_time,end_time,account_director_id,inventory_id,proposal_id)"
	."values('".$_REQUEST['title']."',"
	.$client.$invoice.$location
	."NULL,".$start['month'].","
	.$start['day'].","
	.$start['year'].","
	."'".$start['hour'].":".$start['minute']."',"
	."'".$end['hour'].":".$end['minute']."',"
	.$_REQUEST['accountDirectorId'].",'','')";

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
