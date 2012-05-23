$(document).ready(function()
{
    
    $('body').click(function(event) 
    {
        if ($(event.target).is('.message-item')) 
        {
            $("#message-details").load("ajax/message-details.php?mes="+$(event.target).attr('data-detail-key'),function(){
            $("#inbox").slideUp();
            $("#message-details").slideDown();});
        }
    });
});

$(document).ready(function()
{
    $('body').click(function(event)
    {
        if($(event.target).is('#inboxBtn'))
        {
            $("#message-details").slideUp();
            $("#new-message").slideUp();
            $("#inbox").slideDown();
        }
    });
});

$(document).ready(function()
{
    $('body').click(function(event)
    {
        if($(event.target).is('#newMessageBtn'))
        {
            $("#new-message").load('ajax/new-message.php', function(){
            $("#message-details").slideUp();
            $("#inbox").slideUp();
            $("#new-message").slideDown();});
        }
    });
});
