<?php 
    exec("git stash");
    passthru("git pull");
    exec("git stash pop");
?>
