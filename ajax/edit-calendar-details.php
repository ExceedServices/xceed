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

    //I know i shouldn't ctrl-c, ctrl-v this, but i wil refactor this later.
     function enumerateCrews($appointmentId)
 {
     $q = "select id, name from Users";
     $result = mysql_query($q);
     while ($row = mysql_fetch_assoc($result))
     {

         $qExists = "select count(*) from CrewAssignments where userId=". $row['id']." and appointmentId = ".$appointmentId;
         $resultExists = mysql_query($qExists);
            if($resultExists){
             
                $exrow = mysql_fetch_array($resultExists);
                if ($exrow[0] != 0)
                    $selected = 'checked="checked"';
                else
                    $selected = "";
            }
            else
                    $selected = "";
         echo '<input type="checkbox" name="crews[]" value="'.$row['id'].'" id="crewcheck'.$row['id'].'" '.$selected.' /><label for="crewcheck'.$row['id'].'">'.$row['name'].'</label><br>';
     }
 }

    ?>
<div class="form">
    <form method="post" action="insertCalItem.php?del=<?php echo $id; ?>">
        <table>
            <tr>
                <td><table class="formTable">
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
                   <textarea id="Notes" name="notes"><?php print $note; ?></textarea>
               </td>
           </tr>
<tr>
               <td>
                   <label for="jobId">Quickbooks Job #</label>
               </td>
               <td>
   <!--                <select name='jobId'>
                       <option id='null' value='null'></option>
<?php
/*$sql = "select id from Jobs";
$result = mysql_query($sql);
while($item = mysql_fetch_array($result))
{
    echo("<option id='".$item['id']."' value ='".$item['id']."'>".$item['id']."</option>");
}*/
?>
                   </select>-->
                   <input type="number" name="jobId" value="<?php echo $item['job_id']; ?>"/>
               </td>
           </tr>
           <tr>
               <td>
                   <label for="location">Location</label>
               </td>
               <td>
                   <textarea id="Location" name="location"><?php echo $location; ?></textarea>
               </td>
           </tr>
            <tr>
               <td>
                   <label for="startTime">Start Time</label>
               </td>
               <td>
                   <input id="startTime" type="date" class="datetime" name="start_time" value="<?php echo $start; ?>" required="required"/>
               </td>
           </tr>
           <tr>
               <td>
                   <label for="endTime">End Time</label>
               </td>
               <td>
                   <input id="endTime" class = "datetime" type="date" name="end_time" value="<?php echo $end; ?>" required="required"/>
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
                   <select name="privacy">
                       <option value="0">Public</option>
                       <option value="1">Directors</option>
                       <option value="2">Private</option>
                   </select>
               </td>
          </tr>
        </table></td>
                <td><?php enumerateCrews($id); ?></td>
            </tr>
        </table>
        
        
        
        <input type="submit" value="Save"/>
        <button id="cancel-calendar-button" style="float: right">Cancel</button>
        <br class="floatreset"/>
     </form>
</div>
<script type="text/javascript">
	$('.datetime').datetimepicker();
    $('#color1').colorPicker();
</script>
<?php
}?>
