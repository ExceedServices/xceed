<?php

require_once("connect.php");

function hasRole($role)
{
    if(!strpos($_SESSION['roles'], "|dev|")===true) return true;
    else
        return (!(strpos($_SESSION['roles'], "|$role|") === false));
}
    
function addRole($userID, $role)
{
    $q = "SELECT `id`,`roles` FROM `Users` WHERE `id` = $userID";
    $result = mysql_query($q);
    $user= mysql_fetch_assoc($result);
    $roles = split($user['roles'], '|');
    
    array_push($roles, $role);
    
    $newroles = join($roles, '|');
    
    mysql_query("UPDATE `xceeddev`.`Users` SET `Roles` = '$newroles' WHERE `Users`.`id` = $userID;");
    $_SESSTION['roles'] = $newroles;
}

function removeRole($userID, $role)
{
    $q = "SELECT `id`,`roles` FROM `Users` WHERE `id` = $userID";
    $result = mysql_query($q);
    $user= mysql_fetch_assoc($result);
    $roles = split($user['roles']);
    
    $index = array_search($role, $roles);
    unset($roles[$index]);
    
    $newroles = join($roles, '|');
    
    mysql_query("UPDATE `xceeddev`.`Users` SET `Roles` = '$newroles' WHERE `Users`.`id` = $userID;");
    $_SESSTION['roles'] = $newroles;
}

?>
