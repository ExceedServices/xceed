<?php
require_once "connect.php";
$data = database()->retrieve_sql("SELECT count(*) as id FROM `Users`"); ?>
<h3>Employees</h3>
<p><?php echo(reset(reset($data)));?> Registered Employees <a href="employee_manager.php">Manage</a></p>