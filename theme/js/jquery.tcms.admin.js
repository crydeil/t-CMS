$(document).ready(function()
{
    
    prePHPButton = function() {    
        var prePHPButtonFn = "<pre>// PHP\n\n</pre><br />";
        $('#editor').execCommand('inserthtml', prePHPButtonFn);
    }
    
    preJSButton = function() {    
        var preJSButtonFn = "<pre>// jQuery script\n\n</pre><br />";
        $('#editor').execCommand('inserthtml', preJSButtonFn);
    }
   
    $('#editor').redactor({ 
        lang: 'ru',
        minHeight: 200,
        imageUpload: '/upload.php', 
        buttonsAdd: ['|', 'php', 'js'], 
        buttonsCustom: {
            php: {
                title: 'Код PHP', 
                callback: prePHPButton
            },
            js: {
                title: 'Код jQuery', 
                callback: preJSButton
            }
        }   
    });

    $("input#title").syncTranslit({
        destination: "url"
    });
    
    $("#t-admin-menu").sticky({ 
        topSpacing: 10  
    })

})