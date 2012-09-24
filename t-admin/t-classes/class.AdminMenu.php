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

?>
