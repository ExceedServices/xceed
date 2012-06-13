<?php
require_once("../connect.php");
require_once("../roles.php");

if(!isset($_GET['day']) || !isset($_GET['month']) || !isset($_GET['year']))
{
    $now = time();
}
else
{
    $now = mktime(0,0,0,$_GET['month'], $_GET['day'],$_GET['year']);
}
    $dayOfWeek = date('w',$now);
    $dayOfYear = date('z',$now);
    $startDay = $dayOfYear - $dayOfWeek; //Begining of week
    $queryDay = $startDay;
    while($startDay + 7 > $queryDay)
    {
        $qDateTime = date_create_from_format("z",$queryDay);
        $q = "Select * from Appointments where day = '".date_format($qDateTime,"d")."' and month = '".date_format($qDateTime,"m")."' and year = '".date_format($qDateTime,"Y")."' and (privacy = 0 or privacy = 1 or creator_id = ".$_SESSION['id'].")";
        $result = mysql_query($q);
        if ($result)
        {
            $dateLabel = date_format($qDateTime, "F jS");
            echo("<div class=calendar-agenda-day><h4>{$dateLabel}</h4>");
//            echo($q);
        
            while($item = mysql_fetch_assoc($result))
            {?>
                <div class="calendar-agenda-item" data-appointment-id="<?php echo($item['id']); ?>" style="color: <?php echo($item['color']); ?>"><h3><?php echo($item['name']);?></h3></div>
            <?php }
        
            $queryDay++;
            ?></div><?php
        }
        
    }

 ?>
