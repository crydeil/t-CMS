$(document).ready(function()
{
       
    $("#t-public-menu-1").sticky({ 
        topSpacing: 10  
    });
    
    $('#comment').redactor({ 
        lang: 'ru', 
        buttons: ['bold', 'italic', 'deleted'],
        allowedTags: ['b', 'i', 'strike','p']
    });
    
    $('input[name="comment_author"]').keypress(function(filterChar) {
        
        var keyChar = /[0-9a-zA-Zа-яёА-ЯЁ\.\-\x25\x27\x24\x23]/;
        var a = filterChar.which;
        var b = String.fromCharCode(a);
        return !!(a==0||a==8||a==9||a==13||b.match(keyChar));
            
    });
    
    $('input[name="comment_author_email"]').keypress(function(filterChar) {
        
        var keyChar = /[0-9a-zA-Z\@\.\_\-\x25\x27\x24\x23]/;
        var a = filterChar.which;
        var b = String.fromCharCode(a);
        return !!(a==0||a==8||a==9||a==13||b.match(keyChar));
            
    });
    
    $('input[name="comment_captha"]').keypress(function(filterChar) {
        
        var keyChar = /[a-z\x25\x27\x24\x23]/;
        var a = filterChar.which;
        var b = String.fromCharCode(a);
        return !!(a==0||a==8||a==9||a==13||b.match(keyChar));
            
    })

});