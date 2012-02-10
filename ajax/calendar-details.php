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
<ul>
    <li><?php echo($job['title']); ?></li>
    <li>INV#<?php echo($job['invoice_id']); ?></li>
    <li><?php echo($job['location']); ?></li>
    <li><?php echo(date("H:M:A",$job['start_time'])); ?></li>
</ul>
