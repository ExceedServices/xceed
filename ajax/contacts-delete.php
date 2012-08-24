<?php 
require_once("../connect.php");

    $id = mysql_real_escape_string($_REQUEST['id']);
    $q = "DELETE FROM `Clients` WHERE id = '$id' LIMIT 1";
    $result = mysql_query($q);
    if ($result)
        header("location: ../dashboard.php");
    else
        die(mysql_error());
?>     
