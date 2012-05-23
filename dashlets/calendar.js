$(document).ready(function()
{
    $("#calander-details-overlay").hide();
    $('body').click(function(event) 
    {
        if ($(event.target).is('.cal-item')) 
        {
            $("#calander-details-overlay").hide();
            $("#calander-details-overlay").load("ajax/calendar-details.php?job="+$(event.target).attr('id'),
function(){
    $("#calander-details-overlay").css('position', 'absolute');
    if(event.pageX >= (document.width -250))
        $("#calander-details-overlay").css('left', event.pageX-$("#calander-details-overlay").width());
    else
        $("#calander-details-overlay").css('left', event.pageX);
    $("#calander-details-overlay").css('top', event.pageY);
    $("#calander-details-overlay").addClass('cal-popup');
    $("#calander-details-overlay").show();
});
        }
    });
});

$(document).ready(function()
{
    $('body').click(function(event)
    {
        if($(event.target).is('#new-cal-btn'))
        {
            $('#new-calendar-item').load('ajax/new-appointment-item.php');
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
