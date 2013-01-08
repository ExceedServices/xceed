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
require_once("roles.php");
$date = mktime(0,0,0,$moNum,1,$year);
$dom = 0;
$dow = date("w", $date);
$dim = date("t", $date);
$currMo = date("F", $date);

?>
<h3>Calendar</h3>
<button id="calendar-show-agenda">Week</button>
<button id="calendar-show-boxes">Month</button>
<button id="calendar-new">New</button>
<div id="new-calendar-item"></div>
<div id="calendar-35-boxes-view">
    <div style = "text-align:center; margin:5;">
        <button id = "backMonth" value = "<" style = "display:inline; margin-bottom:20px;"
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
            ?>')"><</button>
        <div class="currentMonthDiv"><?php echo($currMo." ".$year) ?></div>
        <button id = "forMonth" style = "display:inline; margin-bottom:20px;"
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
            ?>')">></button>
    </div>
    <?php
if(hasrole("ad"))
    $sql = "select name, day, id, color, num_of_days\n"
        . "from Appointments\n"
        . "where month = $moNum"
        . " and year = $year\n"
        . " and (privacy = 0 or privacy = 1 or creator_id = ".$_SESSION['id'].")"
        . "order by day";
else
    $sql = "select name, day, id, color, num_of_days\n"
        . "from Appointments\n"
        . "where month = $moNum"
        . " and year = $year\n"
        . " and (privacy = 0 or creator_id = ".$_SESSION['id'].")"
        . "order by day";
    $result = mysql_query($sql);
    echo(mysql_error());
    $calItems = array();
    $calIds = array();
    while($item = mysql_fetch_array($result))
    {
		for($i = 0;$i<=$item["num_of_days"];$i++){
        	$calItems[$item["day"]+$i] = '<div class="cal-item" style="background-color:'.$item["color"].';" data-detail-key="'.$item["id"].'" id="'.$item["id"].'">'.$item["name"] .'</div>'.$calItems[$item["day"]+$i];
		}
    }
    ?>

    <div class="header-row">
        <div class="day-header">Sun</div>
        <div class="day-header">Mon</div>
        <div class="day-header">Tue</div>
        <div class="day-header">Wed</div>
        <div class="day-header">Thu</div>
        <div class="day-header">Fri</div>
        <div class="day-header">Sat</div>
    </div>
    <div class="calTable">
    <?php
    for($i=0;$i<5;$i++)
    {?>
    <div>
            <table cellspacing="0" border="0" class="date-row"><tr>
        <?php for($j=0; $j<7;$j++)
        {
            if($j<6)
            {?>
                <td class="day-value"><?php if($dow == $j or($dom >0 and $dom<$dim))
                      {
                          $dom++;
                          echo('<div class = "dayNumbers">'.$dom."</div>");
                          echo('<div class = "appointments">'.$calItems[$dom].'</div>');
                      }?></td>
       <?php }
             else
             {?>
                      <td class="saturday-value"><?php if($dow == $j or($dom >0 and $dom<$dim))
                      {
                          $dom++;
                          echo('<div class = "dayNumbers">'.$dom."</div>");
                          echo('<div class = "appointments">'.$calItems[$dom].'</div>');
                      }?></td>
        <?php }
        } ?>
        </tr></table></div>
    <?php } ?>
    </div>
</div>
<div id="calendar-agenda-view"></div>

