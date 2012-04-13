<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
else
{
    die();
}?>
<div>
<?php
require_once('../connect.php');
$sql="select * from Clients where id = '$id'";
$result = mysql_query($sql);
echo(mysql_error());
while($item = mysql_fetch_array($result))
{?>
    <div><?php echo($item["name"])?></div>
    <div><?php echo($item["contact_person"])?></div>
    <div><?php echo($item["contact_phone"])?></div>
    <div><?php echo($item["contact_email"])?></div>
    <div><?php echo($item["contact_address"])?></div>
<?php } ?>
</div>
