<?php
require_once "connect.php";

if ((!isset($_SESSION['CSRF_TOKEN'])) || (!isset($_REQUEST['CSRF_TOKEN'])) || $_SESSION['CSRF_TOKEN'] != $_REQUEST['CSRF_TOKEN'])
    die("Invaid CSRF Token");

unset($_SESSION['CSRF_TOKEN']);

$data = array(
	"id" => $_SESSION['id'],
	"name" => $_REQUEST['name'],
	"phone" => $_REQUEST["phone"],
	"email" => $_REQUEST["email"],
	"canSMS" => $_REQUEST['canSMS'] === "on");

if ($_REQUEST['password'] != "" && $_REQUEST['password'] == $_REQUEST['password-confirm']) {
    $data["password"] = Crypt::hash($_REQUEST['password']);
}
database()->save("users", $data);

$_SESSION = array_merge($_SESSION, $data);
header("location: dashboard.php");