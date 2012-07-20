$(document).ready(function()
{
    $('body').keyup(function(event) 
    {
        if ($(event.target).is('#fileboard-search')) 
        {
            if ($("#fileboard-search").val() == "")
            {
                $("#fileboard-search-results").slideUp();
            }
            else    
            {
                $("#fileboard-search-results").load("ajax/fileboard-search-results.php?q=" + encodeURIComponent($("#fileboard-search").val()));
                $("#fileboard-search-results").slideDown();
            }
        }
    });
    
    $("body").click(function(event)
    {
         if($(event.target).is(".fileboard-search-result > *") || $(event.target).is(".fileboard-search-result"))
         {
             $("#fileboard-search-results").slideUp();
             var id;
             var type;
             if ($(event.target).is(".fileboard-search-result"))
             {
                id = $(event.target).attr("data-file-id");
             }
             else
             {
                id = $(event.target).parent(".fileboard-search-result").attr("data-file-id");
             }
             $("#fileboard-search-detail").load("ajax/getfile.php?id=" + id);
             $("#fileboard-search-detail").slideDown();
         }
        if($(event.target).is("#fileboard-search"))
        {
            $("#fileboard-search-results").slideUp();
            $("#fileboard-search").val("");
        }
    });    
});
