<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.1
 */

class Header {

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

class Menu
{
    
    public function getAdmin_0()
    {
        
        echo '<p></p>
                <ul class="nav nav-pills pull-right">
                    <li><a href="' . BASE_URL . '" target="_blank"><i class="icon-home"></i> Перейти на сайт</a></li>
                    <li><a href="' . BASE_URL . '/auth/login/logout"><i class="icon-signout"></i> Выйти</a></li>
                </ul>';
    }
    
    public function getAdmin_1()
    {   
        
        echo '<ul class="nav nav-pills nav-stacked" id="t-admin-menu">
                    <li><a href="' . BASE_URL . '/t-admin/index/list/post"><i class="icon-th-list"></i> Записи в блоге</a></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/list/page"><i class="icon-th-list"></i> Страницы сайта</a></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/list/menu"><i class="icon-th-list"></i> Пункты меню</a></li>                    
                    <li><hr /></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/add/post"><i class="icon-plus-sign"></i> Добавить запись в блог</a></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/add/page"><i class="icon-plus-sign"></i> Добавить страницу</a></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/add/menu"><i class="icon-plus-sign"></i> Добавить пункт меню</a></li>
                </ul>';

    }

}

class Breadcrumb
{
    
    public function getAdmin()
    {       
        
        echo '<ul class="breadcrumb">';
        
        if (empty($_GET['options']) && !isset($_GET['options']))
        {
            
            echo '<li>Рабочий стол</li>';
            
        }
        elseif ($_GET['options'] === 'add' && $_GET['param'] === 'post')
        {
            
            echo '<li><a href="' . BASE_URL . '/t-admin/index">Рабочий стол</a> <span class="divider">/</span></li>
                <li><a href="' . BASE_URL . '/t-admin/index/list/post">Записи в блоге</a> <span class="divider">/</span></li>
                <li>Добавление новой записи</li>';
            
        }
        elseif ($_GET['options'] === 'add' && $_GET['param'] === 'page')
        {
            
            echo '<li><a href="' . BASE_URL . '/t-admin/index">Рабочий стол</a> <span class="divider">/</span></li>
                <li><a href="' . BASE_URL . '/t-admin/index/list/page">Страницы сайта</a> <span class="divider">/</span></li>
                <li>Добавление новой страницы</li>';
            
        }
        elseif ($_GET['options'] === 'add' && $_GET['param'] === 'menu')
        {
            
            echo '<li><a href="' . BASE_URL . '/t-admin/index">Рабочий стол</a> <span class="divider">/</span></li>
                <li><a href="' . BASE_URL . '/t-admin/index/list/menu">Блоки меню</a> <span class="divider">/</span></li>
                <li>Добавление нового пункта меню</li>';
            
        }
        elseif ($_GET['options'] === 'edit' && $_GET['param'] === 'post')
        {
            
            echo '<li><a href="' . BASE_URL . '/t-admin/index">Рабочий стол</a> <span class="divider">/</span></li>
                <li><a href="' . BASE_URL . '/t-admin/index/list/post">Записи в блоге</a> <span class="divider">/</span></li>
                <li>Редактирование записи</li>';
            
        }
        elseif ($_GET['options'] === 'edit' && $_GET['param'] === 'page')
        {
            
            echo '<li><a href="' . BASE_URL . '/t-admin/index">Рабочий стол</a> <span class="divider">/</span></li>
                <li><a href="' . BASE_URL . '/t-admin/index/list/page">Страницы сайта</a> <span class="divider">/</span></li>
                <li>Редактирование страницы</li>';
            
        }
        elseif ($_GET['options'] === 'edit' && $_GET['param'] === 'menu')
        {
            
            echo '<li><a href="' . BASE_URL . '/t-admin/index">Рабочий стол</a> <span class="divider">/</span></li>
                <li><a href="' . BASE_URL . '/t-admin/index/list/menu">Блоки меню</a> <span class="divider">/</span></li>
                <li>Редактирование пункта меню</li>';
            
        }
        elseif ($_GET['options'] === 'list' && $_GET['param'] === 'post')
        {
            
            echo '<li><a href="' . BASE_URL . '/t-admin/index">Рабочий стол</a> <span class="divider">/</span></li>
                <li>Записи в блоге</li>';
            
        }
        elseif ($_GET['options'] === 'list' && $_GET['param'] === 'page')
        {
            
            echo '<li><a href="' . BASE_URL . '/t-admin/index">Рабочий стол</a> <span class="divider">/</span></li>
                <li>Страницы сайта</li>';
            
        }
        elseif ($_GET['options'] === 'list' && $_GET['param'] === 'menu')
        {
            
            echo '<li><a href="' . BASE_URL . '/t-admin/index">Рабочий стол</a> <span class="divider">/</span></li>
                <li>Блоки меню</li>';
            
        }
                        
        echo '</ul>';

    }

}

class Footer
{
    
    public function getAdmin()
    {
        
        echo '</body>
                </html>';
        
    }
    
}

$header = new Header;
$menu = new Menu;
$breadcrumb = new Breadcrumb;
$footer = new Footer;

?>