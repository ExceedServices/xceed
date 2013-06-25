<?php

class Settings
{
    public static $dbHost = "db.exceedcrew.com";
    public static $dbUser = "xceeddev";
    public static $dbPass = "xceeddev";
    public static $dbBase = "xceed";

    public static $enforceSSL = false;
}
$level = error_reporting();
error_reporting(0);
include("config.php"); // Overwrite defaults with a local config... we don't care if it is missing.
 error_reporting($level);
//echo(Settings::$dbHost);
//echo(Settings::$dbUser);
//echo(Settings::$dbPass);

mysql_connect(Settings::$dbHost, Settings::$dbUser, Settings::$dbPass);
$sql="USE ".Settings::$dbBase;
mysql_query($sql);

if ($_SERVER['HTTPS'] != "on" && Settings::$enforceSSL) 
{
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: $url");
    exit;
}  

if (!isset($_SESSION))
    session_start();

?>