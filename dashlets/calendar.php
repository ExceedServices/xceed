<?php $isVisible = true;
require_once("connect.php");
if($isVisible) {
$moNum = 2;
$year = 2012;
$date = mktime(0,0,0,$moNum,1,$year);
$dom = 0;
$dow = date("w", $date);
$dim = date("t", $date);
$currMo = date("F", $date);?>
<div style = "text-align:center;">
    <input type = "submit" value = "<" style="display:inline;"/>
    <div style="display:inline;"><?php echo($currMo) ?></div>
    <input type = "submit" value = ">" style="display:inline;"/>
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
    $calItems[$item["day"]] = '<div id="'.$item["id"].'">'.$item["title"] .'</div>'.$calItems[$item["day"]];
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
   <input type = "submit" value = "New Calendar Item"/>
</div>
<?php } else {?>
<div class="calForm">
    <form>
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
                    <select>
                        <!--Valid clients-->
                    </select>
               </td>
           </tr>
           <tr>
               <td>
                   <label>Invoice</label>
               </td>
               <td>
                   <select>
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
           <tr>
               <td>
                   <label for="startTime">Start Time</label>
               </td>
               <td>
                   <input id="startTime" type="datetime" name="start_time"/>
               </td>
           </tr>
           <tr>
               <td>
                   <label for="endTime">End Time</label>
               </td>
               <td>
                   <input id="endTime" type="datetime" name="end_time"/>
               <td>
           </tr>
       </table>
       <input type="hidden" value="" name="account_director_id"/>
       <input type="submit" value="Submit"/>
    </form>
</div>
<?php } ?>