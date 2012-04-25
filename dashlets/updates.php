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
    <h3>Development Log</h3>
    <form method="POST" action="autocommit.php">
        <input type="text" name="message" placeholder="Commit Message">
        <input type="submit" value="Commit all changes." >
    </form>
</div>
