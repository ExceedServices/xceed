<?php 
 
 require_once("../connect.php");
 
 function enumerateCrews()
 {
     $q = "select id, name from Users";
     $result = mysql_query($q);
     while ($row = mysql_fetch_assoc($result))
     {
         echo '<input type="checkbox" name="crews[]" value="'.$row['id'].'" id="crewcheck'.$row['id'].'" /><label for="crewcheck'.$row['id'].'">'.$row['name'].'</label><br>';
     }
 }
 
 ?>
<div class="form">
    <form method="post" action="insertCalItem.php">
        <table>
            <tr>
                <td><table class="formTable">
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
                   <textarea id="Notes"  name="notes"></textarea>
               </td>
           </tr>
           <tr>
               <td>
                   <label for="jobId">Quickbooks Job #</label>
               </td>
               <td>
                   <input type="number" name="jobId"/>
               </td>
           </tr>
           <tr>
               <td>
                   <label for="location">Location</label>
               </td>
               <td>
                   <textarea id="Location" name="location"></textarea>
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
           <tr>
               <td>
                   <label for="color1">Color</label>
               </td>
               <td>
                   <input id="color1" type="text" name="color1" value="#333399" />
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
                <td><?php enumerateCrews(); ?></td>
            </tr>
        </table>    
        
       <input type="submit" value="Submit"/>
       <div id=sqlString><?php echo($InsertSQL);?></div>
    </form>
    <input type="submit" value="Cancel" id="cancel-calendar-button"/>
</div>
<script type="text/javascript">
	$('.datetime').datetimepicker();
    $('#color1').colorPicker();
</script>
<?php ?>
