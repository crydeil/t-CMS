<?php

session_start();

require 't-admin/config.php';
require_once 't-admin/admin.visual.classes.php';

$db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
$db->set_charset('utf8');

if ($db->connect_error) 
{
    die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
}

echo $header->getInstall();

echo '<div class="container">
        <div class="row">
            <div class="span12">
                <h1>Привет, будущий Админ! :D</h1><hr />
            </div>            
            
            <div class="span5">
                <h2>Введите свои данные</h2>';

function GenerateSalt($n=3)
{
        $key = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz.,*_-=+';
        $counter = strlen($pattern)-1;
        for($i=0; $i<$n; $i++)
        {
                $key .= $pattern{rand(0,$counter)};
        }
        return $key;
}

if (empty($_POST))
{
    echo '<form action="" method="post">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" class="input-xlarge" placeholder="Логин администратора" name="login" />
                </div>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-key"></i></span>
                    <input type="password" class="input-xlarge" placeholder="Пароль администратора" name="password" />
                </div>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-key"></i></span>
                    <input type="password" class="input-xlarge" placeholder="Пароль ещё раз" name="password_confirm" /></p>
                </div>
                Будьте внимательны!<br /> Пароль админа восстановить невозможно.</p>
                <p><input type="submit" class="btn btn-primary" value="Установить t-CMS" /></p>
            </form>';

}
else
{

    $login = (isset($_POST['login'])) ? $db->real_escape_string($_POST['login']) : '';
    $password = (isset($_POST['password'])) ? $db->real_escape_string($_POST['password']) : '';
    $password_confirm = (isset($_POST['password_confirm'])) ? $db->real_escape_string($_POST['password_confirm']) : '';

    $error = false;
    $errort = '';

    if (strlen($login) < 3)
    {
            $error = true;
            $errort .= '- Длина логина должна быть не менее 3-х символов.<br />';
    }
    if (strlen($password) < 6)
    {
            $error = true;
            $errort .= '- Длина пароля должна быть не менее 6-ти символов.<br />';
    }
    if ($password !== $password_confirm)
    {
            $error = true;
            $errort .= '- Пароли не совпадают.<br />';
    }

    $query = $db->query("SELECT `id` FROM `t-users` WHERE `login`='{$login}' LIMIT 1");

    if ($query->num_rows === 1)
    {
        $error = true;
        $errort .= '- Пользователь с таким логином уже существует в базе данных, введите другой.<br />';
    }

    if (!$error)
    {

        $salt = GenerateSalt();
        $hashed_password = md5(md5($password) . $salt);

        $query = $db->query("INSERT INTO `t-users` SET
                                                    `login`='{$login}',
                                                    `password`='{$hashed_password}',
                                                    `salt`='{$salt}'");

        echo '<h4>Поздравляем, Вы успешно зарегистрированы!</h4><a href="' . BASE_URL . '/auth/login">Авторизоваться</a>';

    }
    else
    {

        echo '<h4>Возникли следующие ошибки</h4>' . $errort . '<p></p><p>Вернуться назад и <a href="' . BASE_URL . '/first-install.php">попробовать ещё раз</a>.</p>';

    }
}

echo '</div>

        <div class="span7">
            <h3>Инструкции</h3>
            <p>Для успешной инсталляции <strong>t-CMS</strong> - заполни файл <em>./ t-admin/config.php</em> (в корне) в соответствии с твоим хостингом.</p>
            <p>Если ты уже установил <strong>t-CMS</strong>, то:</p> 
            <p>
            <ol>
                <li>удали файл <em>./ first-install.php</em>;</li>
                <li>поставь права CHMOD 777 на папку <em>./ uploads</em> (в корне);</li>
                <li>войди в <a href="' . BASE_URL . '/auth/login">панель управления</a> и управляй своим сайтом.</li>
            </ol>
            </p>
            <p>Успехов!</p>
        </div>



    </div>

</div>';

echo $footer->getAdmin();

?>