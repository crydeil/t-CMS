<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.1
 */

class AdminHeader 
{

    public function getAdmin()
    {
       
        echo '<!DOCTYPE html>

                <html>

                <head>

                    <meta content="text/html; charset=utf-8" />

                    <title>Панель управления :: t-CMS</title>

                    <link href="' . THEME . '/css/bootstrap.min.css" rel="stylesheet" />
                    <link href="' . THEME . '/css/font-awesome.css" rel="stylesheet" />
                    <link href="' . THEME . '/js/redactor/redactor.css" rel="stylesheet" />

                    <script src="http://code.jquery.com/jquery-latest.js"></script>        
                    <script src="' . THEME . '/js/bootstrap.min.js"></script>

                    <script src="' . THEME . '/js/redactor/redactor.min.js"></script>
                    <script src="' . THEME . '/js/redactor/lang/redactor.ru.js"></script>
                    <script src="' . THEME . '/js/jquery.synctranslit.min.js"></script>

                    <script src="' . THEME . '/js/jquery.sticky.js"></script>
                    <script src="' . THEME . '/js/jquery.tcms.admin.js"></script>

                </head>
                <body>';

    }
    
    public function getInstall()
    { 
            
        echo '<!DOCTYPE html>

        <html>

        <head>

                <meta content="text/html; charset=utf-8" />

                <title>Установка :: t-CMS</title>

                <link href="' . THEME . '/css/bootstrap.min.css" rel="stylesheet" />
                <link href="' . THEME . '/css/font-awesome.css" rel="stylesheet" />

                <script src="http://code.jquery.com/jquery-latest.js"></script>
                <script src="' . THEME . '/js/bootstrap.min.js"></script>

        </head>';

    }
    
    public function getLogin()
    { 
    
        echo '<!DOCTYPE html>

        <html>

        <head>

                <meta content="text/html; charset=utf-8" />

                <title>Вход для администратора :: t-CMS</title>

                <link href="' . THEME . '/css/bootstrap.min.css" rel="stylesheet" />
                <link href="' . THEME . '/css/font-awesome.css" rel="stylesheet" />

                <script src="http://code.jquery.com/jquery-latest.js"></script>
                <script src="' . THEME . '/js/bootstrap.min.js"></script>

        </head>';
        
    }
    
}

?>