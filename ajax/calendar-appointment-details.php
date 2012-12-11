<?php

require_once("../connect.php");
require_once("../roles.php");

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
        $mapsHTML ="";
    else
        $mapsHTML = '<iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='.$item['location'].'&output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?q='.$item['location'].'" style="color:#0000FF;text-align:left">View Larger Map</a></small>';

    /*if ($item['creator_id'] == $_SESSION['id'] || hasRole("admin"))
        $name="<input class='editable bold title' data-savable data-table='Appointments' data-field='name' value='".$item['name']."' data-key='".$item['id']."'>";
    else */
        $name = $item['name'];
    $month = $item['month'];
    $day = $item['day'];
    $notes = $item['notes'];
	$length = $item['num_of_days'];
	$endDay = $day+$length;
    echo
<<<STUFF
<div data-key='{$id}' id='calendar-details-div' class="form">
    <table width=100%>
        <tr>
            <td>    
                <h2 style="color:{$item['color']};" class="bold">{$name}</h2>
                <div id='startTimeText'>
                    <div style="display:inline;">Start time:</div>
                    <div style="display:inline;">{$month}/{$day} {$start}</div>
                </div>
                <div id='endTimeText'>
                    <div style="display:inline;">End time:</div>
                    <div style="display:inline;">{$month}/{$endDay} {$end}</div>
                </div>
                <p/>
                <div>
                    <div>Notes:</div>
                    <div style='width:350px;'>{$notes}</div>
            </td>
            <td>
                <p>{$mapsHTML}</p>
            </td>
        </tr>
    </table>
STUFF;
if(hasRole("admin"))
{
?>
    <button data-delete style="display:inline;" id='delete-message' data-id="{$_GET['id']}" data-table='Appointments' type='submit' value='X' data-callback='
        $("#calendardashlet").load("loader.php?dashlet=calendar");'/>
    <input style="display:inline;" id='edit-appointment' type='submit' value='edit' />
<?php } ?>
</div>
<?php
}
?>
