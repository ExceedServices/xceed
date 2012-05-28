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

    $('body').click(function(event)
    {
        if($(event.target).is('#new-cal-btn'))
        {
            $('#new-calendar-item').load('ajax/new-appointment-item.php');
            $('#new-calendar-item').slideDown();
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
            $('#calendar-35-boxes-view').slideUp();
            $('#calendar-agenda-view').load('ajax/calendar-agenda-view.php', function(){
            $('#calendar-agenda-view').slideDown();});
        }
    });
    
    $('body').click(function(event)
    {
        if($(event.target).is('#calendar-show-boxes'))
        {
            $('#calendar-agenda-view').slideUp();
            $('#calendar-35-boxes-view').slideUp();
            $('#calendar-agenda-view').load('ajax/calendar-month.php', function(){
            $('#calendar-35-boxes-view').slideDown();});
        }
    });
    
    $('body').click(function(event)
    {
        if($(event.target).is(".calendar-agenda-item > *") || $(event.target).is(".calendar-agenda-item"))
        {
            $("#calendar-agenda-view").slideUp();
            $("#calendar-35-boxes-view").slideUp();

            var id;
            if ($(event.target).is(".calendar-agenda-item"))
                id = $(event.target).attr("data-appointment-id");
            else
                id = $(event.target).parent(".calendar-agenda-item").attr("data-appointment-id");
                
            $("#calendar-agenda-view").load('ajax/calendar-appointment-details.php?id='+id, function(){
                $("#calendar-agenda-view").slideDown();
            });
        }
    });
});
