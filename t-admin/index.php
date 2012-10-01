<?php

session_start();

ob_start('ob_gzhandler');

require $_SERVER['DOCUMENT_ROOT'].'/t-admin/config.php';

$html = new Html;
$breadcrumbs = new Breadcrumbs;
$menu = new Menu;

if (isset($_SESSION['user_id']))
{
    if ($_SESSION['user_id'] === '1')
    {
        
        if (empty($_GET) || !isset($_GET))
        {
            $admin = new AdminPage;
            include_once $_SERVER['DOCUMENT_ROOT'].'/theme/admin/index.tpl';
        }
        elseif ($_GET['options'] === 'add' && $_GET['param'] === 'post')
        {
            $admin = new AdminAdd;
            include_once $_SERVER['DOCUMENT_ROOT'].'/theme/admin/add.tpl';
        }
        elseif ($_GET['options'] === 'add' && $_GET['param'] === 'page')
        {
            $admin = new AdminAdd;
            include_once $_SERVER['DOCUMENT_ROOT'].'/theme/admin/add.tpl';
        }
        elseif ($_GET['options'] === 'add' && $_GET['param'] === 'menu')
        {
            $admin = new AdminAdd;
            include_once $_SERVER['DOCUMENT_ROOT'].'/theme/admin/add.tpl';
        }
        elseif ($_GET['options'] === 'edit' && $_GET['param'] === 'post')
        {
            $admin = new AdminEdit;
            include_once $_SERVER['DOCUMENT_ROOT'].'/theme/admin/edit.tpl';
        }        
        elseif ($_GET['options'] === 'edit' && $_GET['param'] === 'page')
        {
            $admin = new AdminEdit;
            include_once $_SERVER['DOCUMENT_ROOT'].'/theme/admin/edit.tpl';
        }
        elseif ($_GET['options'] === 'edit' && $_GET['param'] === 'menu')
        {
            $admin = new AdminEdit;
            include_once $_SERVER['DOCUMENT_ROOT'].'/theme/admin/edit.tpl';
        }
        elseif ($_GET['options'] === 'edit' && $_GET['param'] === 'settings')
        {
            $admin = new AdminEdit;
            include_once $_SERVER['DOCUMENT_ROOT'].'/theme/admin/edit.tpl';
        }
        elseif ($_GET['options'] === 'edit' && $_GET['param'] === 'user')
        {
            $admin = new AdminEdit;
            include_once $_SERVER['DOCUMENT_ROOT'].'/theme/admin/edit.tpl';
        }
        elseif ($_GET['options'] === 'list' && $_GET['param'] === 'post')
        {
            $admin = new AdminList;
            include_once $_SERVER['DOCUMENT_ROOT'].'/theme/admin/list.tpl';
        }
        elseif ($_GET['options'] === 'list' && $_GET['param'] === 'page')
        {
            $admin = new AdminList;
            include_once $_SERVER['DOCUMENT_ROOT'].'/theme/admin/list.tpl';
        }
        elseif ($_GET['options'] === 'list' && $_GET['param'] === 'menu')
        {
            $admin = new AdminList;
            include_once $_SERVER['DOCUMENT_ROOT'].'/theme/admin/list.tpl';
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