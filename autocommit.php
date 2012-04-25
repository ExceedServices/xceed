<?php 
    passthru("git status");
    passthru("git add *");
    passthru('git commit -m "'. urlencode($_REQUEST['message']) .'"');
    passthru("git pull");
    passthru("git push");
?>
