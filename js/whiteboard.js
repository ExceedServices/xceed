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
  })
});
