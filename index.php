<?php

if (!isset($_SESSION))
    session_start();

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
                    login: <input name="email" type="email" required="required" placeholder="username" /> <input name="password" type="password" required="required" placeholder="password"/> <input type="submit" value="login" />
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
                <div id="userbar">
		            <div class="username"><?php makeLoginDisplay(); ?></div>
                    <div class="logout">Logoff</div>
		        </div>
                <br class="floatreset">
                <div id="navbar">NAVIGATION GOES HERE</div>
                <div data-loader="calendar" class="widget">SOME KIND OF WIDGIT </div>
            </div>
        </div>
    </body>
</html>
