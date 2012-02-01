<?php

try
{
    include("dashlets/".$_GET['dashlet'].".php");
}
catch (Exception $e)
{
    die("Dashlet not installed:" . $_GET['dashlet']);
}
 
 
 ?>
