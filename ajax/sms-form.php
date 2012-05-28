<div class="form">
    <label for="sms-body">Enter a message:</label>
    <textarea id="sms-body"></textarea>
    <input type="hidden" id="sms-to" value="<?php echo $_REQUEST['client']; ?>">
    <button id="sms-submit">Send SMS</button>
</div>
