<?php require_once("../connect.php");
$sql = "
select senders.name, m.title, m.id, m.unread, m.body
from Messages m, Users recipients, Users senders
where m.to_user_id = recipients.id
and recipients.name = '".$_SESSION['user']['name']."'
and senders.id = m.from_user_id
order by m.timestamp desc
limit 0,3";
$data = database()->retrieve_sql($sql);

if(empty($data))
{ 
    echo("<p>No News is Good News!</p>");
	exit;
}
foreach ($data as $item)
{
	echo
<<<CONTENT
<div class="messages-item"><h4 class="message-title">✉ {$item['name']} {$item['title']} </h4> <p>{$item['body']}</p><button class="message-delete" data-delete data-table="Messages" data-id={$item['id']}> Delete </button> <button id="messages-reply-button" data-name="{$item['name']}">Reply</button></div>
CONTENT;

}