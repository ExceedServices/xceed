<?php require_once("../connect.php");?>
<div class="form">
    <form method="post" action="insertCalItem.php">
        <table class="formTable">
            <tr>
                <td>
                    <label for="name">Name</label>
                </td>
                <td>
                   <input id="Name" type="text" name="name" required="required"/>
                </td>
           </tr>
           <tr>
               <td>
                   <label for="notes">Notes</label>
               </td>
               <td>
                   <input id="Notes" type="text" name="notes"/>
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
                   <input id="Location" type="text" name="location" required="required"/>
               </td>
           </tr>
           <tr>
               <td>
                   <label for="startTime">Start Time</label>
               </td>
               <td>
                   <input id="startTime" type="datetime" class="datetime" name="start_time"/>
               </td>
           </tr>
           <tr>
               <td>
                   <label for="endTime">End Time</label>
               </td>
               <td>
                   <input id="endTime" class = "datetime" type="datetime" name="end_time"/>
               </td>
           </tr>
       </table>
       <input type="submit" value="Submit"/>
       <div id=sqlString><?php echo($InsertSQL);?></div>
    </form>
    <input type="submit" value="Cancel" id="cancel-calendar-button"/>
</div>
<script type="text/javascript">
	$('.datetime').datetimepicker();
</script>
<?php ?>
