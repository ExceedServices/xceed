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
{?>
   <div class="search-result" data-contact-id='<?php echo($item["id"])?>'><?php echo($item["name"]." ".$item["contact_phone"]." ".$item["contact_person"])?></div><?php
}?>
</div>
