<?php

require_once("connect.php");

$q = "SELECT count(*) FROM `Jobs`";
$result = mysql_query($q);
$count = mysql_fetch_array($result);?>
<h3>Jobs</h3>
<p><?php echo($count[0]);?> Jobs <a href="jobmanager.php">Manage</a></p>
