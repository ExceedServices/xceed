<?php

require_once("../connect.php");

$id = mysql_real_escape_string($_GET['id']);
$reader = mysql_query("Select * from Appointments where id = '$id'");
while ($item = mysql_fetch_assoc($reader))
    echo
<<<STUFF
<div>
    <h2 class="bold">{$item['name']}</h2>
    <p>Starts {$item['month']}/{$item['day']} at {$item['startTime']} and goes until {$item['endTime']}.</p>
    <table>
        <tr>
            <td><p>{$item['notes']}</p></td>
            <td><p><iframe width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q={$item['location']}&output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?q={$item['location']}" style="color:#0000FF;text-align:left">View Larger Map</a></small></p></td>
        </tr>
    </table>

</div>
STUFF;
?>
<p><?php echo $_GET['id']; ?></p>
