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
<h3>
<div style="display:inline;"><?php echo($job['title']); ?></div>
<input style="display:inline; margin-left:10px;" type="submit" value="X" onClick="
$('#calander-details-overlay').slideUp();"/>
</h3>
<p>INV#<?php echo($job['invoice_id']); ?></p>
<p><?php echo($job['location']); ?></p>
<p><?php echo(date("h:i A",$job['start_time'])); ?></p>
