$(document).ready(function()
{
        
    preButton = function() {   
        var selectedText = $('#editor').getSelected();
        var preButtonFn = '<pre>' + selectedText + '</pre><br />';        
        $('#editor').execCommand('inserthtml', preButtonFn);
    }
           
    $('#editor').redactor({ 
        lang: 'ru',
        minHeight: 200,
        imageUpload: '/upload.php', 
        buttonsAdd: ['|', 'pre'], 
        buttonsCustom: {
            pre: {
                title: 'Вставить тег PRE', 
                callback: preButton
            }            
        }   
    });

    $("input#title").syncTranslit({
        destination: "url"
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
        
})