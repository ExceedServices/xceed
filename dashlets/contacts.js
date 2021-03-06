$(document).ready(function()
{
    $('body').keyup(function(event) 
    {
        if ($(event.target).is('#contacts-search')) 
        {
            if ($("#contacts-search").val() == "")
            {
                $("#contacts-search-results").slideUp();
            }
            else{
            $("#contacts-search-results").load("ajax/contacts-search-results.php?q=" +encodeURIComponent( $("#contacts-search").val()));
            $("#contacts-search-results").slideDown();
            }
        }
    });
    
    $("body").click(function(event)
    {
         if($(event.target).is(".contact-search-result > *") || $(event.target).is(".contact-search-result"))
         {
             $("#contacts-search-results").slideUp();
             var id;
             var type;
             if ($(event.target).is(".contact-search-result"))
             {
                id = $(event.target).attr("data-contact-id");
                type = $(event.target).atter("data-type");
             }
             else
             {
                id = $(event.target).parent(".contact-search-result").attr("data-contact-id");
                type = $(event.target).parent(".contact-search-result").attr("data-type");
             }
             $("#contacts-search-detail").load("ajax/contact-card.php?id=" + id + "&type=" + type);
             $("#contacts-search-detail").slideDown();
         }
        if($(event.target).is("#contacts-search"))
        {
            $("#contacts-add-form").slideUp();
            $("#contacts-search-results").slideUp();
            $("#contacts-search-detail").slideUp();
            $("#contacts-search").val("");
        }
        if($(event.target).is("#contacts-add"))
        {
            $("#contacts-add-form").load("ajax/contacts-add-form.php");
            $("#contacts-add-form").slideDown();
            event.preventDefault();
        }
        if($(event.target).is(".contacts-post-to-dash"))
        {
            $("#new-message").load('ajax/new-message.php?r='+encodeURI($(event.target).attr("data-name")));
            $("#message-details").slideUp();
            $("#inbox").slideUp();
            $("#new-message").slideDown();
        }
        if($(event.target).is("#contacts-call-button"))
        {
            $("#contact-call-status").slideUp();
            
            $("#contact-call-status").load(($(event.target)).attr("data-command"), function()
            {   
                $("#contact-call-status").slideDown();
                $("#contact-call-status").slideUp(30000);
            });
        }
        if($(event.target).is("#contacts-sms-button"))
        {
            $("#contact-call-status").load(($(event.target)).attr("data-command"), function()
            {   
                $("#contact-call-status").slideDown();
            });        
        }
        if($(event.target).is("#sms-submit"))
        {
            $("#contact-call-status").slideUp();
            $("#contact-call-status").load("calls/makesms.php?msg="+encodeURIComponent($("#sms-body").val())+"&client="+encodeURIComponent($("#sms-to").val()),function()
            {
                $("#contact-call-status").slideDown();
                $("#contact-call-status").slideUp(10000);
            });
        }
        if($(event.target).is("#contacts-admin-delete"))
        {
			var payload = new Object();
			payload.value = $(event.target).attr("data-value");
            $.post("ajax/contacts-delete.php", payload,  function(data)
            {
                alert('Success!');
            });
        }
    });    
    
});

