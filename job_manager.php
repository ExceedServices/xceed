<?php
$table = "jobs";
$page = "job_manager";
if (!empty($_GET["a"])) {
	$parameters = array(
		'client_id' => "",
		'invoice_id' => "",
		'ticket_id' => "",
		'tasking_id' => "",
		'account_director_id' => "",
		'inventory_id' => "",
		'proposal_id' => "");
}
require "generic_manager.php";