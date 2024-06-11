export const myAjax = (parentElement, currentElement, pathFile)=>
{
        jQuery(document).ready(function ($) {
        $(parentElement).change(function(){
            var id = $(parentElement).val();
            $.post(pathFile,{id : id} , function(date)
            {
                $(currentElement).html(date);
                
                 });
            })
        })
}