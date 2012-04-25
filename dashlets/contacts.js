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
         if($(event.target).is(".contact-search-result > *") || $(event.target).is(".contact-search-result"))
         {
             $("#contacts-search-results").slideUp();
             var id;
             if ($(event.target).is(".contact-seach-result"))
                id = $(event.target).attr("data-contact-id");
             else
                id = $(event.target).parent(".contact-search-result").attr("data-contact-id");
             $("#contacts-search-detail").load("ajax/contact-card.php?id=" + id);
             $("#contacts-search-detail").slideDown();
         }
    });

    $('body').click(function(event)
    {
        if($(event.target).is("#contacts-search"))
        {
            $("#contacts-search-detail").slideUp();
            $("#contacts-search").val("");
        }
    });
    
    $('body').click(function(event)
    {
        if($(event.target).is("#contacts-add"))
        {
            $("#contacts-add-form").load("ajax/contacts-add-form.php");
            $("#contacts-add-form").sildeDown();
            event.preventDefault()
        }
    });
});
