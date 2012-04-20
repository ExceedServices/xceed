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
});


$(document).ready(function()
{
    $("div").click(function(event)
    {
         if($(event.target).is(".contact-search-result"))
         {
             $("#contacts-search-results").slideUp();
             $("#contacts-search-detail").load("ajax/contact-card.php?id=" + $(event.target).attr("data-contact-id"));
             $("#contacts-search-detail").slideDown();
         }
    });
});

$(document).ready(function()
{
    $('body').click(function(event)
    {
        if($(event.target).is("#contacts-search"))
        {
            $("#contacts-search-detail").slideUp();
        }
    });
});
