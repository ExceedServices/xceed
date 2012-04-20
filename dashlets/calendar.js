$(document).ready(function()
{
    $('body').click(function(event) 
    {
        if ($(event.target).is('.cal-item')) 
        {
            $("#calander-details-overlay").load("ajax/calendar-details.php?job="+$(event.target).attr('id'));
            $("#calander-details-overlay").css('position', 'absolute');
            $("#calander-details-overlay").css('left', event.pageX);
            $("#calander-details-overlay").css('top', event.pageY);
            $("#calander-details-overlay").addClass('cal-popup');
        }
    });
});

$(document).ready(function()
{
    $('body').click(function(event)
    {
        if($(event.target).is('#new-cal-btn'))
        {
            $('#new-calendar-item').load('ajax/new-calendar-item.php');
            $('#new-calendar-item').slideDown();
        }
    });
});

$(document).ready(function()
{
    $('body').click(function(event)
    {
        if($(event.target).is('#cancel-calendar-button'))
        {
            $('#new-calendar-item').slideUp();
        }
    });
});
