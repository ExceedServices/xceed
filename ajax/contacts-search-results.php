<?php
if(isset($_GET['q']))
    $searchstring = $_GET['q'];
else
    die();


if($_GET['q'] == "mufasa" || $_GET['q'] == "simba")
{?>
    <iframe width="640" height="360" src="http://www.youtube.com/embed/vX07j9SDFcc" frameborder="0" allowfullscreen></iframe>
    <?php
}

?>
<?php
require_once("../connect.php");
$sql="
select id, name, contact_phone, contact_person
from Clients
where (name like '$searchstring%'
    OR contact_person like '%$searchstring%'
    OR contact_phone like '%$searchstring%') limit 0,10";
$result = mysql_query($sql);
echo(mysql_error());
$count = 0;
$output = "";
$lastid= -1;
$type="";
while($item = mysql_fetch_assoc($result))
{
    $lastid = $item['id'];
    $type = "Clients";
    $count++; //For seeing if we only have one.
    $output .=
<<<DIV
<div class="form contact-search-result" data-contact-id="{$item['id']}" data-type="{$type}"><div class="bold">{$item['name']}</div> {$item['contact_person']} - <span class="contact-phone">{$item['contact_phone']}</span></div>
DIV;
}

$q = "Select id, name, email, phone from Users where (name like '%$searchstring%' or phone like '%$searchstring%' or email like '%$searchstring%') limit 0,10";
$result = mysql_query($q);
echo(mysql_error());
while($item = mysql_fetch_assoc($result))
{
    $lastid = $item['id'];
    $type = "Users";
    $count++;
    $output .=
<<<DIV
<div class="form contact-search-result" data-contact-id="{$item['id']}" data-type="{$type}"><div class="bold">{$item['name']}</div> <span class="contact-phone">{$item['phone']} </span></div>
DIV;
}


if ($count == 1)
    header("location: contact-card.php?id=$lastid&type=$type");
else if ($count == 0)
    echo("No dice.");
else
    echo($output);
?>
