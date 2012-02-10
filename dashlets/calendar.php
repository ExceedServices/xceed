<?php
if(isset($_GET['f']))
{
    $isVisible = $_GET['f'];
}
else
{
    $isVisible = true;
}
if(isset($_GET['m']))
{
    $moNum = $_GET['m'];
}
else
{
    $moNum = date('m',time());
}
if(isset($_GET['y']))
{
    $year = $_GET['y'];
}
else
{
    $year = date('Y',time());
}
require_once("connect.php");
if($isVisible) {
$date = mktime(0,0,0,$moNum,1,$year);
$dom = 0;
$dow = date("w", $date);
$dim = date("t", $date);
$currMo = date("F", $date);

?>
<div style = "text-align:center;">
    <input id = "backMonth" type = "submit" value = "<" style = "display:inline;"
        onClick = "$('#calendardashlet').load('loader.php?dashlet=calendar&<?php
                    if($moNum-1 == 0)
                    {
                        $monB = 12;
                        $yearB = $year-1;
                    }
                    else
                    {
                        $monB = $moNum-1;
                        $yearB = $year;
                    }
                    echo("m=$monB&y=$yearB&f=$isVisible");
        ?>')"/>
    <div style = "display:inline;"><?php echo($currMo." ".$year) ?></div>
    <input id = "forMonth" type = "submit" value = ">" style = "display:inline;"
        onClick = "$('#calendardashlet').load('loader.php?dashlet=calendar&<?php
            if($moNum+1 == 13)
            {
                $monF = 1;
                $yearF = $year+1;
            }
            else
            {
                $monF = $moNum +1;
                $yearF = $year;
            }
            echo("m=$monF&y=$yearF&f=$isVisible");
        ?>')"/>
</div>
<?php

$sql = "select title, day, id\n"
    . "from Jobs\n"
    . "where month = $moNum"
    . " and year = $year\n"
    . "order by day";
$result = mysql_query($sql);
echo(mysql_error());
$calItems = array();
$calIds = array();
while($item = mysql_fetch_array($result))
{
    $calItems[$item["day"]] = '<div class="cal-item" id="'.$item["id"].'">'.$item["title"] .'</div>'.$calItems[$item["day"]];
}
?>
<table class="calTable" border =1>
    <tr>
        <th>Sun</td>
        <th>Mon</td>
        <th>Tue</td>
        <th>Wed</td>
        <th>Thu</td>
        <th>Fri</td>
        <th>Sat</td>
    </tr>
<?php
for($i=0;$i<5;$i++)
{?>
    <tr>
    <?php for($j=0; $j<7;$j++)
    {?>
        <td><?php if($dow == $j or($dom >0 and $dom<$dim))
                  {
                      $dom++;
                      echo('<div class = "dayNumbers">'.$dom."</div>");
                      echo($calItems[$dom]);
                  }?></td>
    <?php } ?>
    </tr>
<?php } ?>
</table>
<div class = "newCalcBtn">
   <input type = "submit" value = "New Calendar Item"
       onClick = "$('#calendardashlet').load('loader.php?dashlet=calendar&<?php
               $isVisible = false;
               echo("m=$moNum&y=$year&f=$isVisible");
        ?>')"/>
</div>
<?php }
else {
$InsertSQL = "insert into Jobs (title,client_id,invoice_id,location,ticket_id,month,day,year,start_time,end_time,account_director_id,inventory_id,proposal_id)\n"
      ."values(".$_REQUEST['title'].","
      .$_REQUEST['client'].","
      .$_REQUEST['invoice'].","
      .$_REQUEST['location'].","
      ."NULL,".date('m',$_REQUEST['start_time']).",".date('j',$_REQUEST['start_time']).",".date('Y',$_REQUEST['start_time']).","
      .date("H:i:s", $REQUEST['start_time']).",".date("H:i:s", $REQUEST['end_time']).","
      .$_REQUEST['account_director_id'].",NULL,NULL)";
?>
<div class="calForm">
    <form method="post">
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
                   <input id="endTime" class="datetime" type="datetime" name="end_time"/>
               <td>
           </tr>
           <tr>
               <td>
                   <label>Account Director</label>
               </td>
               <td>
                   <select name='acountDirectorId'>
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
       <input type="submit" value="Submit"
           onClick = $('#sqlString').InnerHTML=$InserSQL/>
       <input type="submit" value="Cancel"
           onClick = "$('#calendardashlet').load('loader.php?dashlet=calendar&<?php
               $isVisible = true;
               echo("m=$moNum&y=$year&f=$isVisible");
        ?>')"/>
       <div id=sqlString><?php echo($InsertSQL);?></div>
    </form>
</div>
<script>
$('.datetime').datepicker();
</script>
<div id="calander-details-overlay"></div>
<?php } ?>
