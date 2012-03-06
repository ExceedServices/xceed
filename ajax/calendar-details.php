<?php
if (!isset($_GET['job']))
    die();
else
    $jobid = $_GET['job'];
    
require_once("../connect.php"); //we're in /ajax

$q = "SELECT * FROM `Jobs` WHERE `id` = $jobid";
$result = mysql_query($q);
$job = mysql_fetch_assoc($result);

?>
<h3><?php echo($job['title']); ?></h3>
<p>INV#<?php echo($job['invoice_id']); ?></p>
<p><?php echo($job['location']); ?></p>
<p><?php echo(date("h:i A",$job['start_time'])); ?></p>
