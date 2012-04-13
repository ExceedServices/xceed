<?php

require_once("connect.php");

if(!isset($_SESSION))
    session_start();

//If not authenticated after all that, bail! Sanity Check
if (!isset($_SESSION['id']))
    header('location: /');
?><!doctype html>
<html>
    <head>
        <!-- our original -->
        <link rel="stylesheet" href="main.css" type="text/css"></link>
        <!-- google fonts -->
        <link href='http://fonts.googleapis.com/css?family=Asap|Ubuntu:500' rel='stylesheet' type='text/css'> 
        <!-- for datepicker -->
        <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.8.17.custom.css" type="text/css"></link>
        
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/whiteboard.js" ></script>
        <script type="text/javascript" src="dashlets/calendar.js"></script>
        <script type="text/javascript" src="dashlets/contacts.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
		<script type="text/javascript" src="js/datetimepicker.js"></script>
		
		<title>Exceed Services Dashboard</title>
		
    </head>
    <body>
        <div class="bodywrap">
            <div id="logo"><img src="logo.jpg" /></div>
            <div id="userbar">
		        <?php echo($_SESSION['name']);?> <a href="killsession.php">X</a>
	        </div>
            <br class="floatreset"/>
            <div data-loader="nav" class = "navbar">Navigating to navigation...</div>
            <div data-loader="contacts" class = "widget">Getting Contacts...</div>
            <div data-loader="users" data-role = "dev" class="widget">Retrieving users...</div>
            <div id="calendardashlet" class="widget"><?php include("dashlets/calendar.php");?></div>
            <div data-loader="updates" data-role="admin" class="widget">Checking for updates...</div>
        </div>
    </body>
</html>
