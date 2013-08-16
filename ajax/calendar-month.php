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
require_once("../connect.php");
require_once("../roles.php");
$date = mktime(0,0,0,$moNum,1,$year);
$dom = 0;
$dow = date("w", $date);
$dim = date("t", $date);
$currMo = date("F", $date);?>
<?php/*   old navigation buttons
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
*/?>

<div style="height:15px;"></div>
    <?php
if(hasrole("admin"))
    $sql = "select name, day, id, job_id, color, num_of_days\n"
        . "from Appointments\n"
        . "where month = $moNum"
        . " and year = $year\n"
        . " and (privacy = 0 or privacy = 1 or creator_id = ".$_SESSION['id'].")"
        . "order by day";
else
    $sql = "select name, day, id,job_id, color, num_of_days\n"
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
            if ($item['job_id'] == "")
                $job = "";
            else $job = " #". $item['job_id'];
        	$calItems[$item["day"]+$i] = '<div class="cal-item" style="background-color:'.$item["color"].';" data-detail-key="'.$item["id"].'" id="'.$item["id"].'">'.$item["name"] . $job.'</div>'.$calItems[$item["day"]+$i];
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
        <div class="header-row" style="text-align:center; margin:5;">
        <div class="cal-nav-item" nav-key="m=<?php echo($moNum.'&y='.($year-1).'">'.($year-1)); ?></div>
        <div class="<?php if($moNum==1){ echo('current-cal-nav-item');}else {echo('cal-nav-item');}?>" nav-key="m=<?php echo('1&y='.$year); ?>">Jan</div>
        <div class="<?php if($moNum==2){ echo('current-cal-nav-item');}else {echo('cal-nav-item');}?>" nav-key="m=<?php echo('2&y='.$year); ?>">Feb</div>
        <div class="<?php if($moNum==3){ echo('current-cal-nav-item');}else {echo('cal-nav-item');}?>" nav-key="m=<?php echo('3&y='.$year); ?>">Mar</div>
        <div class="<?php if($moNum==4){ echo('current-cal-nav-item');}else {echo('cal-nav-item');}?>" nav-key="m=<?php echo('4&y='.$year); ?>">Apr</div>
        <div class="<?php if($moNum==5){ echo('current-cal-nav-item');}else {echo('cal-nav-item');}?>" nav-key="m=<?php echo('5&y='.$year); ?>">May</div>
        <div class="<?php if($moNum==6){ echo('current-cal-nav-item');}else {echo('cal-nav-item');}?>" nav-key="m=<?php echo('6&y='.$year); ?>">Jun</div>
        <div class="<?php if($moNum==7){ echo('current-cal-nav-item');}else {echo('cal-nav-item');}?>" nav-key="m=<?php echo('7&y='.$year); ?>">Jul</div>
        <div class="<?php if($moNum==8){ echo('current-cal-nav-item');}else {echo('cal-nav-item');}?>" nav-key="m=<?php echo('8&y='.$year); ?>">Aug</div>
        <div class="<?php if($moNum==9){ echo('current-cal-nav-item');}else {echo('cal-nav-item');}?>" nav-key="m=<?php echo('9&y='.$year); ?>">Sep</div>
        <div class="<?php if($moNum==10){ echo('current-cal-nav-item');}else {echo('cal-nav-item');}?>" nav-key="m=<?php echo('10&y='.$year); ?>">Oct</div>
        <div class="<?php if($moNum==11){ echo('current-cal-nav-item');}else {echo('cal-nav-item');}?>" nav-key="m=<?php echo('11&y='.$year); ?>">Nov</div>
        <div class="<?php if($moNum==12){ echo('current-cal-nav-item');}else {echo('cal-nav-item');}?>" nav-key="m=<?php echo('12&y='.$year); ?>">Dec</div>
        <div class="cal-nav-item" nav-key="m=<?php echo($moNum.'&y='.($year+1).'">'.($year+1)); ?></div>
    </div>
    </div>
