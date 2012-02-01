<?php

if (!isset($_SESSION))
    session_start();

if (isset($_SESSION['id']))
    header("location: dashboard.php");

function makeLoginDisplay()
{
    if(isset($_SESSION['name']))
    {
        echo($_SESSION['name']);
        ?>
        <form action="killsession.php">
            <input type="submit" value="logout"/>
        </form>


        <?php
    }
    else
    { ?>
                <form action="dashboard.php" method="post">
                    <input name="email" type="email" required="required" placeholder="username" /> <input name="password" type="password" required="required" placeholder="password"/> <input type="submit" value="login" />
                </form>

    <?php }
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
                <br class="floatreset"/>
                <div class="login-form-container">
                    <?php makeLoginDisplay(); ?>
		        </div>
            </div>
        </div>
    </body>
</html>
