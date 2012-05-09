<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
}
else
{
    die();
}?>
<div class="form">
<?php
require_once('../connect.php');
$sql="select * from Clients where id = '$id'";
$result = mysql_query($sql);

while($item = mysql_fetch_array($result))
{?>
    <div class="bold"><?php echo($item["name"])?></div>
    <div><?php echo($item["contact_person"])?></div>
    <div><a href="tel:<?php echo($item['contact_phone']);?>"><?php echo($item["contact_phone"])?></a></div>
    <div><a href="mailto:<?php echo($item['contact_email'])?>"><?php echo($item["contact_email"])?></a></div>
    <div><?php echo($item["contact_address"])?></div>
    <hr>
    <a href="mailto:<?php echo $item[contact_email]; ?>">Email</a> - <a href="calls/makecall.php?client=<?php echo $item['contact_phone']; ?>">Call</a> - SMS - <a href="http://maps.google.com/maps/?q=<?php echo urlencode($item['contact_address']) ?>" target="_blank">Map</a>
<?php } ?>

</div>
<?php echo(mysql_error());?>
