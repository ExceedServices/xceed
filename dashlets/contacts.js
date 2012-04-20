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
            $("#contacts-search-results").load("ajax/contacts-search-results.php?q=" + $("#contacts-search").val());
            $("#contacts-search-results").slideDown();
            }
        }
    });
    
    $("body").click(function(event)
    {
         if($(event.target).is(".contact-search-result"))
         {
             $("#contacts-search-results").slideUp();
             $("#contacts-search-detail").load("ajax/contact-card.php?id=" + $(event.target).attr("data-contact-id"));
             $("#contacts-search-detail").slideDown();
         }
    });

    $('body').click(function(event)
    {
        if($(event.target).is("#contacts-search"))
        {
            $("#contacts-search-detail").slideUp();
        }
    });
    
    $('body').click(function(event)
    {
        if($(event.target).is("#contacts-add"))
        {
            $("#contacts-search-results").slideUp();
            $("#contacts-add-form").load("ajax/contacts-add-form.php");
            $("#contacts-add-form").sildeDown();
            $("#contacts-search").slideUp();
            $("#contacts-add").slideUp();
            event.preventDefault()
        }
    });
});
