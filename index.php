<?php
        require_once("connect.php");

if(!isset($_SESSION['id']))
{

    if (isset($_REQUEST['email']) and isset($_REQUEST['password']))
    {

        $login = $_REQUEST['email'];
        $q = "SELECT * FROM `Users` WHERE `email` = '$login'";
        $result = mysql_query($q);
        if ($result)
            $user = mysql_fetch_array($result);

        if ($login == $user['email'] and md5($_REQUEST['password']) == $user['password'])
        {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['roles'] = $user['Roles'];
            $_SESSION['phone'] = $user['phone'];
        }
    }
}

if (isset($_SESSION['id']))
{
    include("dashboard.php");
    die();
}
echo mysql_error();
?><!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="main.css" type="text/css"></link>
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/whiteboard.js" ></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
    </head>
    <body>
        <div class="bodywrap">
            <div id="logo"><img src="logo.jpg" /></div>

            <div id="userbar">
                <form method="post">
                    <input name="email" type="email" required="required" placeholder="username" /> <input name="password" type="password" required="required" placeholder="password"/> <input type="submit" value="login" />
                </form>
	        </div>
            <br class="floatreset"/>
        </div>
    </body>
</html>
