<?php

require_once "connect.php";
require_once "roles.php";

try
{
    if (!isset($_REQUEST['data-role']) || hasRole($_REQUEST['data-role']))
        require("dashlets/".$_GET['dashlet'].".php");
}
catch (Exception $e)
{
    die("Dashlet not installed:" . $_GET['dashlet']);
}