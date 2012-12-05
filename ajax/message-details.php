<?php 
if (!isset($_GET['mes']))
    die();
else
    $messageid = $_GET['mes'];
require_once("../connect.php"); //we're in /ajax
//echo($messageid);
$sql = "update Messages set unread = 1 where Messages.id =".$messageid;
$result1 = mysql_query($sql);
if (!$result1)
    die(mysql_error());
else
{
    $q = "select * from Messages where id = ".$messageid;
    $result2 = mysql_query($q);
    echo(mysql_error());
    $message = mysql_fetch_assoc($result2);
    ?>
    <div>
        <div>
            <div style="display:inline;" id='message-title'><?php echo($message['title']); ?></div>
            <input data-delete style="display:inline;" id='delete-message' data-id=' <?php echo($message["id"]); ?>' data-table='Messages' type='submit' value='X' data-callback='
    $("#message-details").slideUp();
    $("#new-message").slideUp();
    $("#inbox").slideDown();
    $("#messagedashlet").load("loader.php?dashlet=messaging");
'/><button>Reply</button>
        </div>
        <div id='message-body'><?php echo($message['body']); ?></div>
        
    </div>
<?php } ?>
