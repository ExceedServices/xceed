<?php

class Settings
{
    public static $dbHost = "db.xceedcrew.com";
    public static $dbUser = "xceeddev";
    public static $dbPass = "xceeddev";
    public static $dbBase = "xceed";

    public static $enforceSSL = false;
}

include("config.php"); // Overwrite defaults with a local config... we don't care if it is missing.
 
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
