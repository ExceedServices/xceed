$(document).ready(function()
{
    $('body').click(function(event)
    {
        if($(event.target).is('#new-cal-btn'))
        {
            $('#new-calendar-item').load('ajax/new-appointment-item.php');
            $('#new-calendar-item').slideDown();
            $('#color1').colorPicker();
        }
    });

    $('body').click(function(event)
    {
        if($(event.target).is('#cancel-calendar-button'))
        {
            $('#new-calendar-item').slideUp();
        }
    });
    
    $('body').click(function(event)
    {
        if($(event.target).is('#calendar-show-agenda'))
        {
            $('#calendar-agenda-view').slideUp();
            
            $('#calendar-agenda-view').load('ajax/calendar-agenda-view.php', function(){
                $('#calendar-agenda-view').slideDown();
                $('#calendar-35-boxes-view').slideUp();
            });
        }
    });
    
    $('body').click(function(event)
    {
        if($(event.target).is('#calendar-show-boxes'))
        {
            $('#calendar-35-boxes-view').slideUp();
            $('#calendar-35-boxes-view').load('ajax/calendar-month.php', function(){
                $('#calendar-agenda-view').slideUp();
                $('#calendar-35-boxes-view').slideDown();
            });
        }
    });
    
    $('body').click(function(event)
    {
        if($(event.target).is(".calendar-agenda-item > *") || $(event.target).is(".calendar-agenda-item") || $(event.target).is(".cal-item"))
        {
            $("#calendar-agenda-view").slideUp();

            var id;
            if ($(event.target).is(".calendar-agenda-item"))
                id = $(event.target).attr("data-appointment-id");
            else if ($(event.target).is(".calendar-agenda-item > *"))
                id = $(event.target).parent(".calendar-agenda-item").attr("data-appointment-id");
            else if ($(event.target).is(".cal-item"))
                id = $(event.target).attr("data-detail-key");
                
            $("#calendar-agenda-view").load('ajax/calendar-appointment-details.php?id='+id, function(){
                $("#calendar-agenda-view").slideDown();
                $("#calendar-35-boxes-view").slideUp();
            });
        }
    });
});
