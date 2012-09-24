<?php

class AdminMenu
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
                    <li><a href="' . BASE_URL . '/t-admin/index/edit/settings"><i class="icon-cogs"></i> Настройка главной страницы</a></li>
                    <li><hr /></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/list/post"><i class="icon-comments-alt"></i> Записи в блоге</a></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/list/page"><i class="icon-copy"></i> Страницы сайта</a></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/list/menu"><i class="icon-link"></i> Пункты меню</a></li>                    
                    <li><hr /></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/add/post"><i class="icon-comment-alt"></i> Добавить запись в блог</a></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/add/page"><i class="icon-file"></i> Добавить страницу</a></li>
                    <li><a href="' . BASE_URL . '/t-admin/index/add/menu"><i class="icon-link"></i> Добавить пункт меню</a></li>
                </ul>';

    }

}

?>
