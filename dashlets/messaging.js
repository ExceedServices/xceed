function refreshMessage()
{
    $("#messages-inbox").load('/ajax/messages-inbox.php');
}


$(document).ready(function ()
{
    $("#messages-inbox").load('/ajax/messages-inbox.php');
    setInterval("refreshMessage()", 15000);

    $('body').click(function (event)
    {
        if ($(event.target).is(".message-delete"))
        {
            $("#messages-inbox").slideUp();
            $("#messages-inbox").load('/ajax/messages-inbox.php',function(event)
            {
                $("#messages-inbox").slideDown();
            });
        }

        if ($(event.target).is('#newMessageBtn'))
        {
            $("#new-message").load('ajax/new-message.php', function ()
            {
                $("#messages-inbox").slideUp();
                $("#new-message").slideDown();
            });
        }

        if ($(event.target).is('#messages-reply-button'))
        {
            $("#new-message").slideUp();
            $("#messages-inbox").slideUp();
            $("#new-message").load('ajax/new-message.php?r=' + encodeURI($(event.target).attr("data-name")));
            $("#new-message").slideDown();
        }
    });
});
