<h3>Calendar</h3>
<button id="calendar-show-agenda">Week</button>
<button id="calendar-show-boxes">Month</button>
<button id="calendar-new">New</button>
<div id="new-calendar-item"></div>
<div id="calendar-month-view"></div>
<div id="calendar-agenda-view"></div>
<script type="text/javascript">
    $("#calendar-month-view").load('/ajax/calendar-month.php');
</script>
