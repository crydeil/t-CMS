$(document).ready(function()
{
       
    $("#t-public-menu-1").sticky({ 
        topSpacing: 10  
    });
    
    $('#comment').redactor({ 
        lang: 'ru', 
        buttons: ['bold', 'italic', 'deleted'],
        allowedTags: ['b', 'i', 'strike','p']
    })

})