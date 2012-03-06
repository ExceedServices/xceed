<?php 
require_once("connect.php");
require_once("roles.php");
?>

<?php $gitOutput = exec("git diff --shortstat orgin/master");
    if (strlen(trim($gitOutput))!=0)
    {
    ?><h3>Updates</h3>
<div id="updates-content">
       <p><?php echo($gitOutput); ?>
       <p>Would you like to instantly install these updates? <input type="submit" value="Do Upgrade" onClick = "$('#updates-content').load('ajax/do-updates.php');" /></p>
    <?php }
?>
</div>
