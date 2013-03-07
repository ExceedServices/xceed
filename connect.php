<?php
require_once 'classes/Crypt.php';
session_start();
authenticate();
function authenticate() {
	$_SESSION["user"] = array(
		'id' => 1,
		'name' => "test",
		'email' => "em@a.il",
		'Roles' => "|admin|",
		'phone' => "1111111111",
		'canSMS' => true);
	return;
	if (isset($_SESSION["user"])) {
		return;
	}

	$error = "";
	if (isset($_REQUEST["email"], $_REQUEST["password"])) {
		if (attempt_login($_REQUEST["email"], $_REQUEST["password"])) {
			return;
		}
		$error = "Login Failed.";
	}
	echo full("login", array(
		"error" => $error));
	exit;
}

function attempt_login($email, $password) {
	$user = reset(database()->retrieve_by_field("Users", "email", $email));
	$password_match = false;
	if (!empty($user)) {
		if (strlen($user['password']) == 32) // old md5 password
		{
			$password_match = (md5($password) == $user['password']);
			$user['password'] = Crypt::hash($password);
			database()->save("Users", $user);
		}
		else
		{
			$password_match = Crypt::test($password,$user['password']);
		}
		$_SESSION["user"] = $user;
	}
	return $password_match;
}

function __autoload($class_name) {
    require $class_name . '.php';
}

function database() {
	static $database;
	if (!isset($database)) {
		try {
			$database = new database(Settings::$dbBase, Settings::$dbHost, Settings::$dbUser, Settings::$dbPass);
		} catch (PDOException $e) {
			die("Error!: " . $e->getMessage() . "<br/>");
		}
	}
	return $database;
}

function full($file, $parameters = array()) {
	$basename = basename($file);
	$parameters = array_merge(array(
		"title" => "Exceed Services " . ucwords(str_replace("_", " ", $basename)),
		"userbar" => tpl($basename . "_userbar"),
		"content" => tpl($file, $parameters),
		"js" => array(),
		"css" => array()), $parameters);
	normalize_array($parameters["css"]);
	normalize_array($parameters["js"]);
	return new tpl("full", $parameters);
}

function tpl($file, $parameters = array()) {
	return new tpl($file, $parameters);
}

function normalize_array(&$potential_array) {
	return $potential_array = is_array($potential_array) ? $potential_array : array($potential_array);
}

class Settings
{
    public static $dbHost = "db.exceedcrew.com";
    public static $dbUser = "xceeddev";
    public static $dbPass = "xceeddev";
    public static $dbBase = "xceed";

    public static $enforceSSL = false;
}

@include("config.php"); // Overwrite defaults with a local config... we don't care if it is missing.

if ((empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") && Settings::$enforceSSL)
{
    $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    header("Location: " . $url);
    exit;
}