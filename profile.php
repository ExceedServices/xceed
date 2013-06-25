<?php
    require_once("connect.php");
require_once('classes/Crypt.php');
$token = Crypt::makeToken();
$_SESSION['CSRF_TOKEN'] = $token;
?>

<!doctype html>
<html>
    <head>
        <!-- our original -->
        <link rel="stylesheet" href="main.css" type="text/css"></link>
        <!-- google fonts -->
        <link href='https://fonts.googleapis.com/css?family=Asap|Ubuntu:500' rel='stylesheet' type='text/css'> 
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="js/whiteboard.js" ></script>
		
		<title>Exceed Services Dashboard</title>
		
    </head>
    <body>
        <div class="bodywrap">
            <div id="logo"><a href="http://exceedservices.com"><img src="logo.jpg" /></a></div>
            <div id="userbar">
		        <?php echo($_SESSION['name']);?> <a href="killsession.php">X</a>
	        </div>
            <br class="floatreset"/>
            <div class="dashlet" >
                <h1>
		            <?php echo($_SESSION['name']);?>
                </h1>
                <form action="profile-submit.php" method="post">
                Display Name:<br>
                <input type="text" name="name" value="<?php echo($_SESSION['name']); ?>"/><br/>
                Primary Phone Number:<br>
    <input type="tel" name="phone" value="<?php echo($_SESSION['phone']); ?>"/><input type="checkbox" name="canSMS" <?php echo ($_SESSION['canSMS'] ? 'checked':'');?>/>SMS<br>
                Login Address:<br>
                <input type="email" name="email" value="<?php echo($_SESSION['email']); ?>"/><br>
                Password: (leave blank for no change)<br>
                <input type="password" name="password" /><br>
                Again:<br>
                <input type="password" name="password-confirm" /><br>
                <input type="hidden" name="CSRF_TOKEN" value="<?php echo $token;?>" />
                <input type="submit" value="Update Profile" />
                    </form>
            </div>
        </div>
    </body>
</html>
