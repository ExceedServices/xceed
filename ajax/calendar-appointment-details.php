<?php

require_once("../connect.php");

$id = mysql_real_escape_string($_GET['id']);
$reader = mysql_query("Select * from Appointments where id = '$id'");
while ($item = mysql_fetch_assoc($reader))
{
    if(substr($item['startTime'],0,2)<13)
        $start = substr($item['startTime'],0,5).'a';
    else
        $start = (substr($item['startTime'],0,2)-12).substr($item['startTime'],2,3).'p';
    if(substr($item['endTime'],0,2)<13)
        $end = substr($item['endTime'],0,5).'a';
    else
        $end = (substr($item['endTime'],0,2)-12).substr($item['endTime'],2,3).'p';
    if ($item['location'] == "" || $item['location'] =="none")
    {
        $mapsHTML ="";
    }
    else
    {
        $mapsHTML = '<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='.$item['location'].'&output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?q='.$item['location'].'" style="color:#0000FF;text-align:left">View Larger Map</a></small>';
    }
    echo
<<<STUFF
<div class="form">
    <table width=100%>
        <tr>
            <td>    <h2 style="color:{$item['color']};" class="bold">{$item['name']}</h2>
    <p>Starts {$item['month']}/{$item['day']} at {$start} and goes until {$end}.</p><p>{$item['notes']}</p></td>
            <td><p>{$mapsHTML}</p></td>
        </tr>
    </table>

</div>
STUFF;
}
?>
