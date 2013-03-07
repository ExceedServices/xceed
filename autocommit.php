<?php 
require "connect.php";

passthru("git status");
passthru("git add *");
passthru('git commit -m "'. $_REQUEST['message'] .'" --author "'. $_SESSION['name'] . ' <' . $_SESSION['email'].'>"' );
passthru("git pull");
passthru("git push");