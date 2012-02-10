<?php

require_once("connect.php");

if(!isset($_SESSION))
    session_start();

if(!isset($_SESSION['id']))
{

    if (isset($_REQUEST['email']) and isset($_REQUEST['password']))
    {
        $login = $_REQUEST['email'];
        $q = "SELECT * FROM `Users` WHERE `email` = '$login'";
        $result = mysql_query($q);
        if ($result)
            $user = mysql_fetch_array($result);
        else
            header("location: index.php");

        if ($login == $user['email'] and md5($_REQUEST['password']) == $user['password'])
        {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['roles'] = $user['roles'];
        }
        else
            header("location: index.php");

    }
}

//If not authenticated after all that, bail! Sanity Check
if (!isset($_SESSION['id']))
    header('location: /');


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
?><!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="main.css" type="text/css"></link>
        <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.8.17.custom.css" type="text/css"></link>
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/whiteboard.js" ></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
    </head>
    <body>
        <div class="bgcontainer">
            <div class="bodywrap">
                <div id="logo"><img src="logo.jpg" /></div>
                <div id="userbar">
    		        <?php makeLoginDisplay(); ?>
		        </div>
                <br class="floatreset"/>
                <div data-loader="nav" class = "navbar">Navigating to navigation...</div>
                <div id="navbar">NAVIGATION GOES HERE</div>
                <div id="calendardashlet" data-loader="calendar" class="widget">Loading Calendar</div>
            </div>
        </div>
        <div id="fortune"><?php passthru("fortune"); ?></div>
    </body>
</html>
