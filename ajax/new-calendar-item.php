<?php require_once("../connect.php");?>
<div class="calForm">
    <form method="post" action="insertCalItem.php">
        <table class="formTable">
            <tr>
                <td>
                    <label for="title">Title</label>
                </td>
                <td>
                   <input id="Title" type="text" name="title" required="required"/>
                </td>
           </tr>
           <tr>
               <td>
                    <label>Client</label>
               </td>
               <td>
                    <select name='client'>
                        <!--Valid clients  VALUE=Database value!!!-->
<?php

$sql1 = "SELECT id,name FROM Clients";
$result1 = mysql_query($sql1);
while($item1 = mysql_fetch_array($result1))
{
    echo("<option id='".$item1['id']."' value='".$item1['id']."' >".$item1['name']."</option>");
}
?>
                    </select>
               </td>
           </tr>
           <tr>
               <td>
                   <label>Invoice</label>
               </td>
               <td>
                   <select name='invoice'>
                        <!--Valid invoices-->
                   </select>
               </td>
           </tr>
           <tr>
               <td>
                   <label for="location">Location</label>
               </td>
               <td>
                   <input id="location" type="text" name="location"/>
               </td>
           </tr>
               <td>
                   <label>Job Ticket</label>
               </td>
               <td>
                   <select name='jobTicket'>
                       <!--Valid JobTickets-->
                   </select>
               </td>
           <tr>
           </tr>
           <tr>
               <td>
                   <label>Tasking Order</label>
               </td>
               <td>
                   <select name='taskingOrder'>
                       <!--Valid TaskingOrders-->
                   </select>
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
               <td>
           </tr>
           <tr>
               <td>
                   <label>Account Director</label>
               </td>
               <td>
                   <select name='accountDirectorId'>
                       <!--List account directors-->
<?php

$sql2 = "SELECT id,name FROM Users WHERE Roles like '%|ad|%'";
$result2 = mysql_query($sql2);
while($item2 = mysql_fetch_array($result2))
{
    echo("<option id='".$item2['id']."' value='".$item2['id']."' >".$item2['name']."</option>");
}
?>
                   </select>
               </td>
           </tr>
           <tr>
               <td>
                   <label>Inventory</label>
               </td>
               <td>
                   <select name='nventoryId'>
                       <!-- valid inventory-->
                   </select>
               </td>
           </tr>
           <tr>
               <td>
                   <label>Proposal</label>
               </td>
               <td>
                   <select name='propsalId'>
                       <!--Valid proposals-->
                   </select>
               </td>
           </tr>
           <!--proposal id-->
       </table>
       <input type="submit" value="Submit">
       <div id=sqlString><?php echo($InsertSQL);?></div>
    </form>
    <input type="submit" value="Cancel" id="cancel-calendar-button"/>
</div>
<script type="text/javascript">
	$('.datetime').datetimepicker();
</script>
