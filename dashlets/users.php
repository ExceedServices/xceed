<?php

require_once("connect.php");

$q = "SELECT count(*) FROM `Users`";
$result = mysql_query($q);
$count = mysql_fetch_array($result);?>
<h3>Employees</h3>
<p><?php echo($count[0]);?> Registered Employees <a href="employeemanager.php">Manage</a></p>
