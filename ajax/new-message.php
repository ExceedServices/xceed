<?php 
if(!isset($_SESSION)) session_start();?>
<div class='form'>
    <form method='post' action='ajax/new-message-submit.php'>
        <input type='hidden' name='sender' value='<?php echo($_SESSION['name']); ?>'>
        <input type='text' name='recipient' placeholder='Recipient name'><br>
        <input type='text' name='title' required='required' placeholder='Title'><br>
        <textarea type='text' name='body'></textarea><br>
        <input type='submit' value='Send'>
    </form>
</div>
