<?php
require_once("../connect.php");
$id = mysql_real_escape_string($_GET['id']);
$sql = "Select * from Appointments where id = '$id'";
$reader = mysql_query($sql);
while ($item = mysql_fetch_assoc($reader))
{
    $name = $item['name'];
    $note = $item['notes'];
    $location = $item['location'];
    $month = $item['month'];
    $day = $item['day'];
    $year = $item['year'];
    $jobId = $item['job_id'];
    $startTime = $item['startTime'];
    $endTime = $item['endTime'];
    $color = $item['color'];
    $privacy = $item['privacy'];

    $start = $month.'/'.$day.'/'.$year.' '.$startTime;
    $end = $month.'/'.$day.'/'.$year.' '.$endTime;
    ?>
<div class="form">
    <form method="post" action="insertCalItem.php?del=<?php echo $id; ?>">
        <table class="formTable">
            <tr>
                <td>
                    <label for="name">Name</label>
                </td>
                <td>
                   <input id="Name" type="text" name="name" <?php echo "value='".$name."'" ?> required="required"/>
                </td>
           </tr>
           <tr>
               <td>
                   <label for="notes">Notes</label>
               </td>
               <td>
                   <input id="Notes" type="text" name="notes" value="<?php print $note; ?>"/>
               </td>
           </tr>
<tr>
               <td>
                   <label for="jobId">Job ID</label>
               </td>
               <td>
                   <select name='jobId'>
                       <option id='null' value='null'></option>
<?php
$sql = "select id from Jobs";
$result = mysql_query($sql);
while($item = mysql_fetch_array($result))
{
    echo("<option id='".$item['id']."' value ='".$item['id']."'>".$item['id']."</option>");
}
?>
                   </select>
               </td>
           </tr>
           <tr>
               <td>
                   <label for="location">Location</label>
               </td>
               <td>
                   <input id="Location" type="text" name="location" required="required" value="<?php echo $location; ?>"/>
               </td>
           </tr>
            <tr>
               <td>
                   <label for="startTime">Start Time</label>
               </td>
               <td>
                   <input id="startTime" type="datetime" class="datetime" name="start_time" value="<?php echo $start; ?>"/>
               </td>
           </tr>
           <tr>
               <td>
                   <label for="endTime">End Time</label>
               </td>
               <td>
                   <input id="endTime" class = "datetime" type="datetime" name="end_time" value="<?php echo $end; ?>"/>
               </td>
           </tr>
           <tr>
               <td>
                   <label for="color1">Color</label>
               </td>
               <td>
                   <input id="color1" type="text" name="color1" value="<?php echo $color; ?>" />
               </td>
           </tr>
            <tr>
               <td>
                   <label for="privacy">Privacy</label>
               </td>
               <td>
                   <select name="privacy" value="<?php echo $privacy; ?>">
                       <option value="0">Public</option>
                       <option value="1">Directors</option>
                       <option value="2">Private</option>
                   </select>
               </td>
          </tr>
        </table>
        <input type="submit" value="Save"/>
     </form>
</div>
<script type="text/javascript">
	$('.datetime').datetimepicker();
    $('#color1').colorPicker();
</script>
<?php
}?>
