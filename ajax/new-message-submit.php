<?php 
require_once("../connect.php");

    $title = mysql_real_escape_string($_REQUEST['title']);
    $body = mysql_real_escape_string($_REQUEST['body']);
    $sender = mysql_real_escape_string($_REQUEST['sender']);
    $recipient = mysql_real_escape_string($_REQUEST['recipient']);

    $sql1 = "select id from Users where name = '$sender'";
    //echo($sql1);
    $result1 = mysql_query($sql1);
    $row1 = mysql_fetch_assoc($result1);
    $senderId = $row1['id'];

    $sql2 = "select id from Users where name = '$recipient'";
    //echo($sql2);
    $result2 = mysql_query($sql2);
    $row2 = mysql_fetch_assoc($result2);
    $recipientId = $row2['id'];

    $q = "INSERT INTO `Messages` (id, to_user_id, from_user_id, title, body, unread, timestamp) VALUES (null, '$recipientId', '$senderId', '$title', '$body', 0,null)";
    //echo($q);
    $result = mysql_query($q);
    if ($result)
        header("location: ../dashboard.php");
    else
        die(mysql_error());
?>