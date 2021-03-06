$(document).ready(function()
{
        
    preButton = function() {   
        var selectedText = $('#editor').getSelected();
        var preButtonFn = '<pre>' + selectedText + '</pre><br />';        
        $('#editor').execCommand('inserthtml', preButtonFn);
    }
    
    codeButton = function() {   
        var selectedText = $('#editor').getSelected();
        var codeButtonFn = '<code>' + selectedText + '</code>';        
        $('#editor').execCommand('inserthtml', codeButtonFn);
    }
           
    $('#editor').redactor({ 
        lang: 'ru',
        minHeight: 200,
        imageUpload: '/upload.php', 
        buttonsAdd: ['|', 'pre', 'code'], 
        buttonsCustom: {
            pre: {
                title: 'Обернуть в тег <PRE>', 
                callback: preButton
            },
            code: {
                title: 'Обернуть в тег <CODE>', 
                callback: codeButton
            }
        }   
    });

    $("input#title").syncTranslit({
        destination: "url"
    });
    
    $('input#url').keypress(function(filterChar) {
        
        var keyChar = /[0-9a-zA-Z\-\x25\x27\x24\x23]/;
        var a = filterChar.which;
        var b = String.fromCharCode(a);
        return !!(a==0||a==8||a==9||a==13||b.match(keyChar));
            
    });

    $("#t-admin-menu").sticky({ 
        topSpacing: 10  
    });
    
    $("img#t-cms-logo").hover(
    function(){        
        $(this).attr('src','/theme/img/t-cms-logo-hover.png')
    }, 
    function(){
        $(this).attr('src','/theme/img/t-cms-logo.png')
    })
        
});