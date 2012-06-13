$(document).ready(function(){
  $('div[data-loader]').each(function(){
    var args = "";
    for(var i = 0; i < this.attributes.length; i++) 
    {
        if (this.attributes[i].name != "data-loader")
        {
            args+="&";
            args+= this.attributes[i].name;
            args+="=";
            args+= $(this).attr(this.attributes[i].name);
        }
    }
    $(this).load("loader.php?dashlet="+$(this).attr("data-loader")+ args);
  });

      $('body').click(function(event) 
    {
         if($(event.target).is('input[data-savable]'))
         {
            $(event.target).removeClass("editable");
            $(event.target).blur(function(event)
            {
                var payload = new Object();
                payload.table = $(event.target).attr("data-table");
                payload.field = $(event.target).attr("data-field");
                payload.key = $(event.target).attr("data-key");
                payload.value = $(event.target).val();
                $.post('saver.php',payload, function(data){$(event.target).addClass("editable")});
            });
        }
    });
});


