<?php
require_once "../connect.php";
require_once "../roles.php";

if(isset($_GET['day'], $_GET['month'], $_GET['year'])) {
	$year = $_GET['year'];
    $now = mktime(0, 0, 0, $_GET['month'], $_GET['day'], $_GET['year']);	
} else {
    $now = time();
	$year = date('Y', $now);
}
$dayOfWeek = date('w', $now);
$dayOfYear = date('z', $now);
$startDay = $dayOfYear - $dayOfWeek; //Begining of week
$queryDay = $startDay;
while ($startDay + 7 > $queryDay) {
	$qDateTime = date_create_from_format("z Y", $queryDay . " " . $year);
	$day = date_format($qDateTime, "d");
	$where = "
	(day <= ?
		and (day + num_of_days) >= ?)
	and month = ?
	and year = ?
	and (privacy = 0
		or privacy = 1
		or creator_id = ?)";
	$data = database()->retrieve_where("appointments", $where, array($date, $date, date_format($qDateTime, "m"), date_format($qDateTime, "Y"), $_SESSION['id']))
	if (!empty($data)) {
		$dateLabel = date_format($qDateTime, "F jS");
		echo "<div class=calendar-agenda-day><h4>{$dateLabel}</h4>";
		foreach ($data as $item) { ?>
			<div class="calendar-agenda-item" data-appointment-id="<?php echo $item['id']; ?>" style="color: <?php echo $item['color']; ?>">
				<h3><?php echo $item['name']; ?></h3>
			</div>
<?php	} ?>
	</div>
<?php
		$queryDay++;
	}
}