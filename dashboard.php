<?php

require_once("connect.php");

if(!isset($_SESSION))
    session_start();
    
if(!isset($_SESSION['id']))
    {

if (isset($_REQUEST['email']) and isset($_REQUEST['password']))
{
    $email = $_REQUEST['email'];
    $q = "SELECT * FROM `profile` WHERE `email` = '$email'";
    $result = mysql_query($q);
    if ($result)
    {
        $profile = mysql_fetch_array($result);
        //echo($profile);
    }
    else
    {
        header("location: user-login.php");
    }
    if ($email == $profile['email'] and md5($_REQUEST['password']) == $profile['password'])
    {
        $_SESSION['id'] = $profile['id'];
    }
    else
    {
        header("location: /");
    }

}
}
//If not authenticated, bail!
if (!isset($_SESSION['id']))
{
    header('location: /');
}
    

function makeLoginDisplay()
{
    if(isset($_SESSION['name']))
    {
        echo($_SESSION['name']);
        ?>
        <form action="killsession.php">
            <input type="submit" value="logout">
        </form>
        <?php
    }
}
?><!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="main.css" type="text/css"></link>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="whiteboard.js" ></script>
    </head>
    <body>
        <div class="bgcontainer">
            <div class="bodywrap">
                <div id="logo"><img src="logo.jpg" /></div>
                <div id="userbar">
    		        <?php makeLoginDisplay(); ?>
		        </div>
                <br class="floatreset">
                <div id="navbar">NAVIGATION GOES HERE</div>
                <div data-loader="calendar" class="widget">Loading Calendar</div>
            </div>
        </div>
    </body>
</html>
