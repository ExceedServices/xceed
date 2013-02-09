<?php 

require_once("connect.php");

if(isset($_GET['del']))
{
    $delResult = mysql_query("Delete from Appointments where id = ".$_GET['del']);
    if(!$delResult)
	{
		echo($insertSQL);
		die(mysql_error());
	}
}

$name = mysql_real_escape_string($_REQUEST['name']);
$note = mysql_real_escape_string($_REQUEST['notes']);
$jobId = mysql_real_escape_string($_REQUEST['jobId']);
$privacy = mysql_real_escape_string($_REQUEST['privacy']);
$userId = mysql_real_escape_string($_SESSION['id']);

$start = date_parse($_REQUEST['start_time']);
$end = date_parse($_REQUEST['end_time']);

$dif = abs(strtotime($_REQUEST['end_time']) - strtotime($_REQUEST['start_time']));
$numDays = floor($dif/(60*60*24));

$color = mysql_real_escape_string($_REQUEST['color1']);

if ($jobId =="")
    $jobId = "NULL";

if(isset($_REQUEST['location']))
      $location=mysql_real_escape_string($_REQUEST['location']);
else
	$location="NULL";


	$insertSQL = "insert into Appointments (name,notes,job_id,month,day,year,startTime,endTime,roles,color,location,privacy,creator_id,num_of_days)"
	."values('".$name."','".$note."',".$jobId.",".$start['month'].","
	.$start['day'].","
	.$start['year'].","
	."'".$start['hour'].":".$start['minute']."',"
	."'".$end['hour'].":".$end['minute']."',null,'"
	.$color."','".$location."',".$privacy.",".$userId.",".$numDays.")";

	$insertResult = mysql_query($insertSQL);
    $insertedAppointment = mysql_insert_id();
        foreach($_POST['crews'] as $crew)
        {
            $q = "insert into CrewAssignments (userId, appointmentId) values (".$crew." ,". $insertedAppointment.")";
            mysql_query($q);
        }
		header("location: dashboard.php");
	


?>