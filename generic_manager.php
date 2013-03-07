<?php
require_once "connect.php";
require_once "roles.php";
if (!hasRole("admin")) {
    header("Location: dashboard.php");
    exit;
}
if (!empty($_POST)) {
    if (isset($_POST['save'])) {
        if ($_GET['a'] == 1 && isset($_POST["password"])) {
			$_POST['password'] = Crypt::hash($_POST['password']);
		}
		unset($_POST["save"]);
		database()->save($table, $_POST);
    }
    else if (isset($_POST['delete'], $_POST["id"])) {
		database()->delete($table, $_POST['id']);
    }
	header("Location: " . $page . ".php");
	exit;
}
$data = database()->retrieve($table);
if (isset($_GET["id"]) && isset($data[$_GET["id"]])) {
	$parameters = $data[$_GET["id"]];
	unset($data[$_GET["id"]]);
}
$parameters[$table] = $data;
echo full($page, $parameters);