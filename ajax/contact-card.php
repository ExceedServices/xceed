<?php
if(isset($_GET['id'])&& isset($_GET['type']))
{
    $id = $_GET['id'];
    $type = $_GET['type'];
}
else
{
    die();
}?>
<div class="form">
<?php
require_once('../connect.php');
if ($type== "Clients")
{
    $sql="select * from Clients where id = '$id'";
    $result = mysql_query($sql);

    while($item = mysql_fetch_assoc($result))
    {?>
        <div class="bold"><?php echo($item["name"])?></div>
        <div><?php echo($item["contact_person"])?></div>
        <div><a href="tel:<?php echo($item['contact_phone']);?>"><?php echo($item["contact_phone"])?></a></div>
        <div><a href="mailto:<?php echo($item['contact_email'])?>"><?php echo($item["contact_email"])?></a></div>
        <div><?php echo($item["contact_address"])?></div>
        <hr>
        <a href="mailto:<?php echo $item[contact_email]; ?>">Email</a> - <a href="calls/makecall.php?client=<?php echo $item['contact_phone']; ?>">Call</a> - SMS - <a href="http://maps.google.com/maps/?q=<?php echo urlencode($item['contact_address']) ?>" target="_blank">Map</a>
    <?php } 

}
else 
{
    $sql="Select id, name, phone, email from Users where id = '$id'";
    $result = mysql_query($sql);
    while ($item = mysql_fetch_assoc($result))
    {
    echo
<<<STUFF
        <div class ="bold">{$item['name']}</div>
        <div><a href="tel:{$item['phone']}">{$item['phone']}</a></div>
        <div><a href="mailto:{$item['email']}">{$item['email']}</a></div>
        <hr>
        <a href="mailto:{$item['email']}">Email</a> - <a href="calls/makecall.php?client={$item['phone']}">Call</a> - SMS - Post to Dashboard
STUFF;
    }
}
?>

</div>
<?php echo(mysql_error());?>
