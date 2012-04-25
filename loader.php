<?php

if (!isset($_SESSION))
    session_start();

require_once("roles.php");

try
{
    if (!isset($_REQUEST['data-role']) || hasRole($_REQUEST['data-role']))
        require("dashlets/".$_GET['dashlet'].".php");
    else
        echo "You don't have the ". $_REQUEST['data-role'] . " role. Roles: " . $_SESSION['roles'];
        
}
catch (Exception $e)
{
    die("Dashlet not installed:" . $_GET['dashlet']);
}
 
 
 ?>
