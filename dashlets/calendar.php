<?php
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
$date = mktime(0,0,0,$moNum,1,$year);
$dom = 0;
$dow = date("w", $date);
$dim = date("t", $date);
$currMo = date("F", $date);

?>
<h3>Calendar</h3>
<div id="calander-details-overlay"></div>
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
    $calItems[$item["day"]] = '<div class="cal-item" data-detail-key="'.$item["id"].'" id="'.$item["id"].'">'.$item["title"] .'</div>'.$calItems[$item["day"]];
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
   <input id="new-cal-btn" type = "submit" value = "New Calendar Item"/>
</div>
<div id="new-calendar-item"></div>

