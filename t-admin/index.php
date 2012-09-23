<?php

session_start();

ob_start('ob_gzhandler');

require 'config.php';
include 'admin.classes.php';
require_once 'admin.visual.classes.php';

if (isset($_SESSION['user_id']))
{
    if($_SESSION['user_id'] === '1')
    {
        
        if(empty($_GET) || !isset($_GET))
        {
            include THEME.'/admin/index.tpl';
        }
        elseif($_GET['options'] === 'add' && $_GET['param'] === 'post')
        {
            include THEME.'/admin/add.tpl';
        }
        elseif($_GET['options'] === 'add' && $_GET['param'] === 'page')
        {
            include THEME.'/admin/add.tpl';
        }
        elseif($_GET['options'] === 'add' && $_GET['param'] === 'menu')
        {
            include THEME.'/admin/add.tpl';
        }
        elseif($_GET['options'] === 'edit' && $_GET['param'] === 'post')
        {
            include THEME.'/admin/edit.tpl';
        }
        elseif($_GET['options'] === 'edit' && $_GET['param'] === 'page')
        {
            include THEME.'/admin/edit.tpl';
        }
        elseif($_GET['options'] === 'edit' && $_GET['param'] === 'menu')
        {
            include THEME.'/admin/edit.tpl';
        }
        elseif($_GET['options'] === 'list' && $_GET['param'] === 'post')
        {
            include THEME.'/admin/list.tpl';
        }
        elseif($_GET['options'] === 'list' && $_GET['param'] === 'page')
        {
            include THEME.'/admin/list.tpl';
        }
        elseif($_GET['options'] === 'list' && $_GET['param'] === 'menu')
        {
            include THEME.'/admin/list.tpl';
        }
        
    }
    else
    {
        die ('Прости,' . $admin->getLogin() . ', но у тебя нет должных полномочий для входа в админку.<br />
            <a href="' . BASE_URL . '">Вернуться на главную</a> или 
            <a href="' . BASE_URL . '/auth/login/logout">войти</a> под другим логином.');
    }
}
else
{
	header('Location: ' . BASE_URL . '/auth/login');
}

?>