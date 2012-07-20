var x = true;
function refreshMessage()
{
    if(x)
    {
        $("#messagedashlet").load('loader.php?dashlet=messaging');
    }
}


$(document).ready(function()
{
   setInterval("refreshMessage()",15000);
   $('body').click(function(event)
    {
        if ($(event.target).is('.message-item')) 
        {
            $("#message-details").load("ajax/message-details.php?mes="+$(event.target).attr('data-detail-key'),function()
            {
                $("#inbox").slideUp();
                x = false;
                $("#message-details").slideDown();
            });
        }
    });
});

$(document).ready(function()
{
    $('body').click(function(event)
    {
        if($(event.target).is('#inboxBtn'))
        {
            x = true;
            $("#message-details").slideUp();
            $("#new-message").slideUp();
            $("#inbox").slideDown();
            $("#messagedashlet").load('loader.php?dashlet=messaging');
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
            x = false;
            $("#message-details").slideUp();
            $("#inbox").slideUp();
            $("#new-message").slideDown();});
        }
    });
});
