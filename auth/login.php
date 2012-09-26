<?php

session_start();

require $_SERVER['DOCUMENT_ROOT'].'/t-admin/config.php';

$html = new Html;

$db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
$db->set_charset('utf8');

if ($db->connect_error) 
{
    die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
}

echo $html->getAdminHeader();

echo '<div class="container">
        <div class="row">
		
            <div class="span12">
                <h1>Привет, Гость!</h1><hr />
            </div>
            
            <div class="span5">		
                <h2>Вход для админа</h2>';

    if (isset($_GET['logout']))
    {

            if (isset($_SESSION['user_id']))
            {

                unset($_SESSION['user_id']);

            }

            setcookie('login', '', 0, "/");
            setcookie('password', '', 0, "/");

            header('Location: ' . BASE_URL);
            exit;

    }

    if (isset($_SESSION['user_id']))
    {

            header('Location: ' . BASE_URL . '/t-admin/index');
            exit;

    }

    if (!empty($_POST))
    {
        $login = (isset($_POST['login'])) ? $db->real_escape_string($_POST['login']) : '';

        $query = $db->query("SELECT `salt` FROM `t-users` WHERE `login`='{$login}' LIMIT 1");

        if ($query->num_rows == 1)
        {
            $row = $query->fetch_assoc();

            $salt = $row['salt'];					
            $password = md5(md5($_POST['password']) . $salt);

            $query = $db->query("SELECT `id` FROM `t-users` 
                                                        WHERE `login`='{$login}' 
                                                        AND `password`='{$password}' 
                                                        LIMIT 1");

            if ($query->num_rows === 1)
            {                               
                $row = $query->fetch_assoc();
                $_SESSION['user_id'] = $row['id'];

                $time = 86400;

                if (isset($_POST['remember']))
                {
                    setcookie('login', $login, time()+$time, "/");
                    setcookie('password', $password, time()+$time, "/");
                }

                header('Location: ' . BASE_URL . '/t-admin/index');
                exit;

            }
            else
            {
                
                die('Такой логин с паролем не найдены в базе данных. 
                    <a href="' . BASE_URL . '/auth/login">Попробовать ещё раз</a>.');
                
            }

        }
        else
        {
            
            die('Пользователь с таким логином не найден. 
                <a href="' . BASE_URL . '/auth/login">Попробовать ещё раз</a>.');
            
        }

    }

    echo '<form action="" method="post">

            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="text" class="input-xlarge" name="login" placeholder="Логин администратора" />
            </div>
            <p></p>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-key"></i></span>
                <input type="password" class="input-xlarge" name="password" placeholder="Пароль администратора" />
            </div>
            <p></p>
            <p><label class="checkbox inline">
                    <input type="checkbox" id="inlineCheckbox1" name="remember"> запомнить меня на 24 часа!
            </label></p>

            <p><input type="submit" value="Войти в панель администратора" class="btn btn-primary" /></p>

        </form>

    </div>

    <div class="span7">

            <h3>Информация</h3>
            <p>В этом разделе ты сможешь войти в панель администратора. Доступен следующий функционал:
            <ul>
                <li>добавление новых, редактирование существующих и удаление лишних записей/страниц;</li>
                <li>создание и редактирование меню/пунктов меню;</li>
                <li>редактирование информации на главной странице;</li>
                <li>и многое другое...</li>
            </ul>
            </p>
            <p>Если ты попал на эту страницу случайно - переходи на <a href="' . BASE_URL . '">главную</a>.</p>
    </div>

</div>';

echo $html->getAdminFooter();