<?php
        require_once("connect.php");
require_once('classes/Crypt.php');

if(!isset($_SESSION['id']))
{

    if (isset($_REQUEST['email']) and isset($_REQUEST['password']))
    {

        $login = $_REQUEST['email'];
        $q = "SELECT * FROM `Users` WHERE `email` = '$login'";
        $result = mysql_query($q);
        if ($result)
            $user = mysql_fetch_array($result);
	
	$passMatch = FALSE;
	if (strlen($user['password']) == 32) // old md5 password
	{
	    $passMatch = (md5($_REQUEST['password']) == $user['password']);
	    $newPass = Crypt::hash($_REQUEST['password']);
	    mysql_query("UPDATE `Users` SET `password`='$newPass' WHERE `id`=" . $user['id']);
	}
	else
	{
	    $passMatch = Crypt::test($_REQUEST['password'],$user['password']);
	}

        if ($login == $user['email'] and $passMatch)
        {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['roles'] = $user['Roles'];
            $_SESSION['phone'] = $user['phone'];
	    $_SESSION['canSMS'] = $user['canSMS'];
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
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/whiteboard.js" ></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
        
        <!-- Don't remove, it's for google apps domain ownership verification -->
        <meta name="google-site-verification" content="39FFXcwSILWlm-iOkbVAGF0n_wGstNWYkq_N6E8X2-U" />
    </head>
    <body>
        <div class="bodywrap">
            <div id="logo"><a href="http://exceedservices.com"><img src="exceed-logo.png" /></a></div>

            <div id="userbar">
                <form method="post">
                    <input name="email" type="email" required="required" placeholder="username" /> <input name="password" type="password" required="required" placeholder="password"/> <input type="submit" value="login" />
                </form>
	        </div>
            <br class="floatreset"/>
        </div>
    </body>
</html>
