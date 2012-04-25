 <?php
if(isset($_GET['q']))
{
    $searchstring = $_GET['q'];
}
else
{
    die();
}?>
<div>
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
while($item = mysql_fetch_array($result))
{
    $id = $item['id'];
    $name = $item['name'];
    $phone = $item['contact_phone'];
    $person = $item['contact_person'];
    echo(
<<<DIV

   <div class="form contact-search-result" data-contact-id='{$id}'><div class="contact-name">{$name}</div> <span class="contact-person">{$person}</span> - <span class"contact-phone">{$phone}</span></div>

DIV
);}
?>
</div>
