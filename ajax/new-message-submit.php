<?php 
require_once("../connect.php");

    $title = mysql_real_escape_string($_REQUEST['title']);
    $body = mysql_real_escape_string($_REQUEST['body']);
    $sender = mysql_real_escape_string($_REQUEST['sender']);
    $recipient = mysql_real_escape_string($_REQUEST['recipient']);

    $sql1 = "select id from Users where name = '$sender'";
    $result1 = mysql_query($sql1);
    $senderId = mysql_fetch_assoc($result1);

    $sql2 = "select id from Users where name = '$recipient'";
    $result2 = mysql_query($sql2);
    $recipientId = mysql_fetch_assoc($result2);

    $q = "INSERT INTO `Messages` (id, to_user_id, from_user_id, title, body, unread, timestamp) VALUES (null, '$senderId', '$recipientId', '$title', '$body', 0,null)";
    $result = mysql_query($q);
    if ($result)
        header("location: ../dashboard.php");
    else
        die(mysql_error());
?> 
