<?php 
    passthru("git status");
    passthru("git add *");
    passthru('git commit -m "'. $_REQUEST['message'] .'"');
    passthru("git pull");
    passthru("git push");
?>
