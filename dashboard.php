<?php
if(!isset($_SESSION))
    session_start();
if(!isset($_SESSION['id']))
    header('location: index.php');
?>
<!doctype html>
<html>
    <head>
        <!-- our original -->
        <link rel="stylesheet" href="main.css" type="text/css"></link>
        <!-- google fonts -->
        <link href='https://fonts.googleapis.com/css?family=Asap|Ubuntu:500' rel='stylesheet' type='text/css'> 
        <!-- for datepicker -->
        <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.8.17.custom.css" type="text/css"></link>
        <!-- for colorpicker -->
        <link rel="stylesheet" href="js/color-picker/colorPicker.css" type="text/css"></link>
        
        <!-- 3rd Party -->
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/color-picker/jquery.colorPicker.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
		<script type="text/javascript" src="js/datetimepicker.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.js"></script>
                
        <!-- Ours -->
        <script type="text/javascript" src="js/whiteboard.js" ></script>
        <script type="text/javascript" src="dashlets/calendar.js"></script>
        <script type="text/javascript" src="dashlets/contacts.js"></script>
        <script type="text/javascript" src="dashlets/fileboard.js"></script>
        <script type="text/javascript" src="dashlets/messaging.js"></script>

		
		<title>Exceed Services Dashboard</title>
		
    </head>
    <body>
        <div class="bodywrap">
            <div id="logo"><a href="http://exceedservices.com" target="_blank"><img src="exceed-logo.png" alt="Exceed"/></a></div>
            <div id="userbar">
	        <?php echo($_SESSION['name']);?> 
	        <a href="http://mail.exceedcrew.com" target="_blank">Mail</a> 
	        <a href="profile.php">Settings</a>  
	        <a href="killsession.php">Logout</a>
		     
	    </div>
            <br class="floatreset"/>
            <section data-loader="contacts" class="widget"><img src="/img/103.png" alt="Loading..."/></section>
            <section data-loader="messages2" class="widget"><img src="/img/103.png" alt="Loading..."/></section>
            <section data-loader="calendar" id="calendardashlet" class="widget"><img src="/img/103.png" alt="Loading..."/></section>
            <section data-loader="users" data-role="admin" class="widget"><img src="/img/103.png" alt="Loading..."/></section>
            <!--<section data-loader="fileboard" class="widget"><img src="/img/103.png" alt="Loading..."/></section>-->
            <!--<section data-loader="jobs" data-role="admin" class="widget"><img src="/img/103.png" alt="Loading..."/></section>-->
            <section data-loader="updates" data-role="dev" class="widget"><img src="/img/103.png" alt="Loading..."/></section>
        </div>
    </body>
</html>
