$(document).ready(function()
{
    $('body').click(function(event) 
    {
        if ($(event.target).is('.cal-item')) 
        {
            alert("ding!");
            $("#calander-details-overlay").load("ajax/calendar-details.php?job="+1);
            $("#calander-details-overlay").position().left = event.PageX;
            $("#calander-details-overlay").position().top = event.PageY;

        }
    });
});
