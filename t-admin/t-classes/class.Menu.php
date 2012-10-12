<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.2
 */

class Menu
{
    
    public function getAdminTech()
    {
        
        echo '<p></p>
                <ul class="nav nav-pills pull-right">
                    <li><a href="' . BASE_URL . '" target="_blank"><i class="icon-home"></i> Перейти на сайт</a></li>
                    <li><a href="' . BASE_URL . '/auth/login/logout"><i class="icon-signout"></i> Выйти</a></li>
                </ul>';
    }
    
    public function getAdmin()
    {   
        
        echo '<ul class="nav nav-pills nav-stacked" id="t-admin-menu">
                    <li><a href="' . BASE_URL . '/t-admin/index/add/post"><i class="icon-comment-alt"></i> Добавить запись в блог</a></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/add/page"><i class="icon-file"></i> Добавить страницу</a></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/add/menu"><i class="icon-link"></i> Добавить пункт меню</a></li>                    
                    <li><hr /></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/list/post"><i class="icon-comments-alt"></i> Записи в блоге</a></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/list/page"><i class="icon-copy"></i> Страницы сайта</a></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/list/menu"><i class="icon-link"></i> Пункты меню</a></li>                    
                    <li><hr /></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/edit/settings"><i class="icon-cogs"></i> Настройка главной страницы</a></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/edit/user/1"><i class="icon-user"></i> Учётная запись администратора</a></li>
                </ul>';

    }
    
    public function getPublicPageTech()
    {
        
        echo '<p></p>
                <ul class="nav nav-pills pull-right">
                    <li><a href="' . BASE_URL . '"><i class="icon-home"></i> На главную</a></li>';
                                
        if (isset($_SESSION['user_id']))
        {
            
            if ($_SESSION['user_id'] === '1')
            {
                
                echo '<li><a href="' . BASE_URL . '/auth/login"><i class="icon-signin"></i> Панель администратора</a></li>';
                
            }
            
        }
        
        echo '</ul>';

    }
    
    public function getPublicPage1()
    {
        
        $db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
        $db->set_charset('utf8');

        if ($db->connect_error) 
        {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }
        
            $query = $db->query("SELECT * FROM `t-menu` WHERE `menu_name`='Menu block #1' ORDER BY `item_order` ASC");
            
            echo '<ul class="nav nav-pills nav-stacked" id="t-public-menu-1">';
            
            for ($i = 0; $get = $query->fetch_array(); $i++)
            {

                echo '<li><a href="' . BASE_URL . '/' . $get['menu_url'] . '"><i class="icon-chevron-right"></i> ' . $get['menu_title'] . '</a></li>';

            }
            
            echo '</ul>';

    }
    
}