<?php require_once("../connect.php");
$sql = "
select uf.name, m.title, m.id, m.unread, m.body
from Messages m, Users ut, Users uf
where m.to_user_id = ut.id
and ut.name = '".$_SESSION['name']."'
and uf.id = m.from_user_id
order by m.timestamp desc";
$result = mysql_query($sql);
echo(mysql_error());
if(mysql_num_rows($result)==0)
{ 
    echo("<p>No Messages</p>");
}
else
{
    while($item = mysql_fetch_array($result))
    { echo
<<<CONTENT
<div class="messages-item form"><h4 class="message-title">📍 {$item['name']} {$item['title']} <button data-delete data-table="Messages" data-id={$item['id']}> Delete </button> <button id="messages-reply-button" data-name="{$item['name']}">Reply</button></h4> <p>{$item['body']}</p></div>
CONTENT;

    }
}?>