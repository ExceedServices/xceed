<?php 
require_once("connect.php");
require_once("roles.php");
?>

<?php 
    exec("git fetch origin");
    $gitOutput = exec("git diff --shortstat origin/master master");
    if (strlen(trim($gitOutput))!=0)
    {
    ?><h3>Dashboard Software Update</h3>
<div id="updates-content">
       <p>Updates are availible!</p>
       <p>Would you like to instantly install these updates? <input type="submit" value="Do Upgrade" onClick = "$('#updates-content').load('ajax/do-updates.php');" /></p>
    <?php }
?>
</div>
