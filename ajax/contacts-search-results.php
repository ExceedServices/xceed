<?php
if(isset($_GET['q']))
{
    $searchstring = $_GET['q'];
}
else
{
    die();
}?>
<?php
require_once("../connect.php");
$sql="
select id, name, contact_phone, contact_person
from Clients
where (name like '$searchstring%'
    OR contact_person like '%$searchstring%'
    OR contact_phone like '%$searchstring%')";
$result = mysql_query($sql);
echo(mysql_error());
$count = 0;
$output = "";
$lastid= -1;
while($item = mysql_fetch_array($result))
{
    $id = $item['id'];
    $lastid = $id;
    $name = $item['name'];
    $phone = $item['contact_phone'];
    $person = $item['contact_person'];
    $count++;
    $output = $output.
<<<DIV

   <div class="form contact-search-result" data-contact-id='{$id}'><div class="bold">{$name}</div> {$person} - <span class"contact-phone">{$phone}</span></div>

DIV;
}

if ($count == 1)
    header("location: contact-card.php?id=$lastid");
else
    echo($output);
?>
