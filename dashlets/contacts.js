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

