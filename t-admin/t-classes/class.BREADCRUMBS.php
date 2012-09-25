<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.1
 */

class BREADCRUMBS
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
        elseif ($_GET['options'] === 'edit' && $_GET['param'] === 'settings')
        {
            
            echo '<li><a href="' . BASE_URL . '/t-admin/index">Рабочий стол</a> <span class="divider">/</span></li>                
                <li>Редактирование главной страницы сайта</li>';
            
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