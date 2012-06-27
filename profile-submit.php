<?php
require_once("connect.php");

$id = $_SESSION['id'];
$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$email = $_REQUEST['email'];
$canSMS = $_REQUEST['canSMS']== "on";
if ($_REQUEST['password']!= ""||$_REQUEST['password-confirm']!="" && $_REQUEST['password']==$_REQUEST['password-confirm'])
    $maybepassword = "password = '".md5($_REQUEST['password']) ."'";
else
    $maybepassword="";

$q = "Update Users set name = '$name', phone = '$phone', email='$email', canSMS = '$canSMS' $maybepassword where id='$id'";

if (mysql_query($q))
{
    header("location: dashboard.php");
}
else{die(my_sql_error());}
?>