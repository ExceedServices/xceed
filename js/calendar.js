$('.cal-item').click(function(e){
    $("#calander-details-overlay").load("ajax/calendar-details.php?job="+1);
    $("#calander-details-overlay").position().left = e.PageX;
    $("#calander-details-overlay").position().top = e.PageY;
    alert("ding!");
});
