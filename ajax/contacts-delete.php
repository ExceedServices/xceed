<?php 
require_once("../connect.php");

database()->delete("clients", $_REQUEST['value']);
header("location: ../dashboard.php");