<?php 
if(!isset($_SESSION)) session_start();
if(isset($_REQUEST['r'])) {$r = $_REQUEST['r'];} else {$r="";}
?>

<div class='form'>
    <form method='post' action='ajax/new-message-submit.php'>
        <input type='hidden' name='sender' value='<?php echo($_SESSION['name']); ?>'>
        <input id="messaging-new-message-recipient" type='text' name='recipient' placeholder='Recipient name' value="<?php echo($r); ?>"><br>
        <input type='text' name='title' required='required' placeholder='Title'><br>
        <textarea  name='body'></textarea><br>
        <input type='submit' value='Send'>
    </form>
    <button id='inboxBtn'>Inbox</button>
</div>
