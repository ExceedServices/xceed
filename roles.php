<?php

require_once "connect.php";

function hasRole($role) {
    return strpos($_SESSION['user']['Roles'], "|$role|") !== false;
}

function addRole($userID, $role) {
    $roles = get_roles($userID);

    array_push($roles, $role);

	save_roles($roles, $userID);
}

function removeRole($userID, $role) {
    $roles = get_roles($userID);

    $index = array_search($role, $roles);
    unset($roles[$index]);

	save_roles($roles, $userID);
}

function get_roles($user_id) {
	$user = database()->retrieve("users", $userID);
    $roles = split($user['roles'], '|');
	unset($roles[count($roles)]);
	unset($roles[0]);
	return $roles;
}

function save_roles($roles, $user_id) {
    $new_roles = "|" . join($roles, '|') . "|";
    $user["roles"] = $new_roles;
	database()->save("users", $user);
    $_SESSION['user']['roles'] = $new_roles;
}

$setRoles = array("dev", "admin", "cal", "emp", "ad");