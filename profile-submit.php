<?php
require_once("connect.php");
require_once('classes/Crypt.php');

if ((!isset($_SESSION['CSRF_TOKEN'])) || (!isset($_REQUEST['CSRF_TOKEN'])) || $_SESSION['CSRF_TOKEN'] != $_REQUEST['CSRF_TOKEN']) 
    die("Invaid CSRF Token");

unset($_SESSION['CSRF_TOKEN']);

$id = $_SESSION['id'];
$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$canSMS = $_REQUEST['canSMS']== "on";
if ($_REQUEST['password']!= ""||$_REQUEST['password-confirm']!="" && $_REQUEST['password']==$_REQUEST['password-confirm'])
    $maybepassword = "password = '".Crypt::hash($_REQUEST['password']) ."'";
else
    $maybepassword="";

$q = "Update Users set name = '$name', phone = '$phone', email='$email', canSMS = '$canSMS' $maybepassword where id='$id'";

if (mysql_query($q))
{
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['canSMS'] = $canSMS;
    header("location: dashboard.php");
}
else{die(my_sql_error());}
?>