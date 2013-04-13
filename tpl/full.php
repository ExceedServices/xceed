<!DOCTYPE html>
<html><head>
	<title><?php echo $title; ?></title>
	<link href="css/ui-lightness/jquery-ui.css" rel="stylesheet" />
	<link href="main.css" rel="stylesheet" />
	<!-- google fonts -->
	<link href='https://fonts.googleapis.com/css?family=Asap|Ubuntu:500' rel='stylesheet' type='text/css'>
<?php
foreach ($css as $css_file) { ?>
	<link href="css/<?php echo $css_file; ?>.css" rel="stylesheet" />
	<?php } foreach ($js as $js_file) { ?>
	<script type="text/javascript" src="<?php echo $js_file; ?>.js"></script>
<?php
} ?>
		<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/whiteboard.js" ></script>

</head>
<body>
	<div id="logo"><a href="http://exceedservices.com" target="_blank"><img src="logo.jpg" alt="Exceed"/></a></div>
	<div class="bodywrap">
		<div id="userbar">
<?php
echo $userbar; ?>
		</div>
		<br class="floatreset"/>
<?php
echo $content; ?>
	</div>

</body></html>
