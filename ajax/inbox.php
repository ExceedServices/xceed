<div id='messaging_dashlet'>
    <table id='message-table'>
<?php require_once("connect.php");
$sql = "
select uf.name, m.title, m.id, m.unread
from Messages m, Users ut, Users uf
where m.to_user_id = ut.id
    and ut.name = '".$_SESSION['name']."'
    and uf.id = m.from_user_id
order by m.timestamp";
$result = mysql_query($sql);
echo(mysql_error());
while($item = mysql_fetch_array($result))
{?>
    <tr>
<?php if($item['unread'] == 0)
        echo('<td class="message-item" data-detail-key="'.$item['id'].'" style="font-weight:bold; font-size:large;">'.$item['title'].'</td>');
      else
        echo('<td class="message-item" data-detail-key="'.$item['id'].'" style="font-size:large;">'.$item['title'].'</td>'); ?>
        <td class='message-item' data-detail-key="<?php echo($item['id']); ?>"><?php echo("--".$item['name']); ?></td>
    </tr>
<?php }?>
    </table>
</div>
