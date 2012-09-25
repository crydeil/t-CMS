<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.1
 */

class AdminEdit
{

    public function getEdit()
    {

        $db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
        $db->set_charset('utf8');

        if ($db->connect_error) 
        {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }

            if ($_GET['options'] === 'edit' && $_GET['param'] === 'post')
            {

                $query = $db->query("SELECT * FROM `t-content` WHERE `id`='{$_GET['id']}' LIMIT 1");
                $get = $query->fetch_array();

                    if(empty($_POST['update_post']) || !isset($_POST['update_post']))
                    {
                        echo '<form class="form-inline" action="" method="post">
                        
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#main" data-toggle="tab">Основное</a></li> 
                                <li><a href="#seo" data-toggle="tab">SEO</a></li>                                               
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="main">                    
                                    <legend>Заголовок</legend>
                                    <p class="well well-small"><input class="input-xxlarge" type="text" name="title" id="title" value="' . $get['title'] . '" /></p>
                                    <legend>Превью записи</legend>
                                    <p class="well well-small"><input class="input-xxlarge" type="text" name="body_preview" value="' . $get['body_preview'] . '" /></p>
                                    <legend>Текст записи</legend>                                    
                                    <textarea id="editor" class="well well-small" name="body">' . $get['body'] . '</textarea>
                                    <legend>Теги</legend>
                                    <p class="well well-small"><input class="input-xxlarge" type="text" name="tags" value="' . $get['tags'] . '" /></p>
                                </div>  

                                <div class="tab-pane" id="seo">
                                    <legend><abbr title="ЧПУ - Человеко-Понятный адрес ссылки">ЧПУ</abbr> URL</legend>
                                    <p class="well well-small"><input class="input-xxlarge" name="url" id="url" type="text" value="' . $get['url'] . '" /></p>                       
                                    <legend>META Keywords</legend>
                                    <p class="well well-small"><input class="input-xxlarge" name="meta_keywords" type="text" value="' . $get['meta_keywords'] . '" /></p>
                                    <legend>META Description</legend>
                                    <p class="well well-small"><input class="input-xxlarge" name="meta_description" type="text" value="' . $get['meta_description'] . '" /></p>
                                </div>

                            </div>
                           
                        <hr />

                            <input type="submit" class="btn btn-success" name="update_post" value="Обновить запись" />                            
                            <a href="#myModal-' . $get['id'] . '" role="button" class="btn btn-danger" data-toggle="modal">Удалить</a>
                                                  
                        <div style="display: none;" class="modal" id="myModal-' . $get['id'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <h3 id="myModalLabel">Удаление записи</h3>
                            </div>
                            <div class="modal-body">
                                <p>Вы уверены, что хотите удалить запись "' . $get['title'] . '"?</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Отмена</button>
                                <input type="submit" name="delete_post" class="btn btn-danger" value="Удалить" />
                            </div>
                        </div>
                        
                        </form>';
                    
                        if(!empty($_POST['delete_post']) || isset($_POST['delete_post']))
                        {	

                            $query = $db->query("DELETE FROM `t-content` WHERE `id`='{$_GET['id']}' LIMIT 1");

                            header('Location: ' . BASE_URL . '/t-admin/index/list/post');

                        }
                        
                    }
                    else
                    {  	

                        $title = isset($_POST['title']) ? $db->real_escape_string($_POST['title']) : '';
                        $body_preview = isset($_POST['body_preview']) ? $db->real_escape_string($_POST['body_preview']) : '';
                        $body = isset($_POST['body']) ? $db->real_escape_string($_POST['body']) : '';
                        $url = isset($_POST['url']) ? $db->real_escape_string($_POST['url']) : '';
                        $meta_keywords = isset($_POST['meta_keywords']) ? $db->real_escape_string($_POST['meta_keywords']) : '';
                        $meta_description = isset($_POST['meta_description']) ? $db->real_escape_string($_POST['meta_description']) : '';
                        $tags = isset($_POST['tags']) ? $db->real_escape_string($_POST['tags']) : '';
                        
                        $error = false;
                        $errort = '';

                        if (strlen($title) < 5)
                        {
                                
                            $error = true;
                            $errort .= '- Длина заголовка должна быть не менее 5-ти символов.<br />';
                            
                        }
                        
                        if (strlen($url) < 3)
                        {
                                
                            $error = true;
                            $errort .= '- Длина ЧПУ URL должна быть не менее 3-х символов.<br />';
                            
                        }
                        
                        if(!$error)
                        {

                        $query = $db->query("UPDATE `t-content` SET 
                                                                    `title`='{$title}', 												
                                                                    `url`='{$url}', 
                                                                    `body_preview`='{$body_preview}', 
                                                                    `body`='{$body}', 
                                                                    `meta_keywords`='{$meta_keywords}', 
                                                                    `meta_description`='{$meta_description}',
                                                                    `tags`='{$tags}'

                                                                    WHERE `id`='{$_GET['id']}'", MYSQLI_USE_RESULT);
                        
                        echo '<div class="alert alert-block alert-success">  
                                <h4>Запись "' . $get['title'] . '" успешно обновлена!</h4>
                                <p>Вы можете перейти к <a href="' . BASE_URL . '/t-admin/index/list/post">списку записей</a> блога или продолжить <a href="' . BASE_URL . '/t-admin/index/edit/post/' . $get['id'] . '">редактирование</a>.
                            </div>';
                        
                        }
                        else
                        {
                            
                            echo '<div class="alert alert-block alert-error">  
                                    <h4>Запись "' . $get['title'] . '" не была обновлена!</h4>
                                    <p></p>
                                    <p>Произошли следующие ошибки:<br />
                                    ' . $errort. '</p>
                                    <p><a href="javascript:history.go(-1)">Вернуться назад</a></p>                                
                                </div>';
                            
                        }
                                                                    
                    }

            }
            
            elseif ($_GET['options'] === 'edit' && $_GET['param'] === 'page')
            {

                $query = $db->query("SELECT * FROM `t-content` WHERE `id`='{$_GET['id']}' LIMIT 1");
                $get = $query->fetch_array();

                    if(empty($_POST['update_page']) || !isset($_POST['update_page']))
                    {
                        echo '<form class="form-inline" action="" method="post">

                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#main" data-toggle="tab">Основное</a></li> 
                                <li><a href="#seo" data-toggle="tab">SEO</a></li>                                               
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="main">                    
                                    <legend>Заголовок</legend>
                                    <p class="well well-small"><input class="input-xxlarge" type="text" name="title" id="title" value="' . $get['title'] . '" /></p>
                                    <legend>Текст записи</legend>                                    
                                    <textarea id="editor" class="well well-small" name="body">' . $get['body'] . '</textarea>
                                </div>  

                                <div class="tab-pane" id="seo">
                                    <legend><abbr title="ЧПУ - Человеко-Понятный адрес ссылки">ЧПУ</abbr> URL</legend>
                                    <p class="well well-small"><input class="input-xxlarge" name="url" id="url" type="text" value="' . $get['url'] . '" /></p>                       
                                    <legend>META Keywords</legend>
                                    <p class="well well-small"><input class="input-xxlarge" name="meta_keywords" type="text" value="' . $get['meta_keywords'] . '" /></p>
                                    <legend>META Description</legend>
                                    <p class="well well-small"><input class="input-xxlarge" name="meta_description" type="text" value="' . $get['meta_description'] . '" /></p>
                                </div>

                            </div>

                        <hr />

                            <input type="submit" class="btn btn-success" name="update_page" value="Обновить страницу" />                            
                            <a href="#myModal-' . $get['id'] . '" role="button" class="btn btn-danger" data-toggle="modal">Удалить</a>

                        <div style="display: none;" class="modal" id="myModal-' . $get['id'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <h3 id="myModalLabel">Удаление страницы</h3>
                            </div>
                            <div class="modal-body">
                                <p>Вы уверены, что хотите удалить страницу "' . $get['title'] . '"?</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Отмена</button>
                                <input type="submit" name="delete_page" class="btn btn-danger" value="Удалить" />
                            </div>
                        </div>

                        </form>';

                        if(!empty($_POST['delete_page']) || isset($_POST['delete_page']))
                        {	

                            $query = $db->query("DELETE FROM `t-content` WHERE `id`='{$_GET['id']}' LIMIT 1");

                            header('Location: ' . BASE_URL . '/t-admin/index/list/page');

                        }

                    }
                    else
                    {  	

                        $title = isset($_POST['title']) ? $db->real_escape_string($_POST['title']) : '';                        
                        $body = isset($_POST['body']) ? $db->real_escape_string($_POST['body']) : '';
                        $url = isset($_POST['url']) ? $db->real_escape_string($_POST['url']) : '';
                        $meta_keywords = isset($_POST['meta_keywords']) ? $db->real_escape_string($_POST['meta_keywords']) : '';
                        $meta_description = isset($_POST['meta_description']) ? $db->real_escape_string($_POST['meta_description']) : '';

                        $error = false;
                        $errort = '';

                        if (strlen($title) < 5)
                        {

                            $error = true;
                            $errort .= '- Длина заголовка должна быть не менее 5-ти символов.<br />';

                        }

                        if (strlen($url) < 3)
                        {

                            $error = true;
                            $errort .= '- Длина ЧПУ URL должна быть не менее 3-х символов.<br />';

                        }

                        if(!$error)
                        {

                            $query = $db->query("UPDATE `t-content` SET 
                                                                        `title`='{$title}', 												
                                                                        `url`='{$url}',
                                                                        `body`='{$body}', 
                                                                        `meta_keywords`='{$meta_keywords}', 
                                                                        `meta_description`='{$meta_description}'

                                                                        WHERE `id`='{$_GET['id']}'", MYSQLI_USE_RESULT);

                            echo '<div class="alert alert-block alert-success">  
                                    <h4>Страница "' . $get['title'] . '" успешно обновлена!</h4>
                                    <p>Вы можете перейти к <a href="' . BASE_URL . '/t-admin/index/list/page">списку страниц</a> сайта или продолжить <a href="' . BASE_URL . '/t-admin/index/edit/page/' . $get['id'] . '">редактирование</a>.
                                </div>';

                        }
                        else
                        {

                            echo '<div class="alert alert-block alert-error">  
                                    <h4>Страница "' . $get['title'] . '" не была обновлена!</h4>
                                    <p></p>
                                    <p>Произошли следующие ошибки:<br />
                                    ' . $errort. '</p>
                                    <p><a href="javascript:history.go(-1)">Вернуться назад</a></p>                                
                                </div>';

                        }

                    }
            }
            
            elseif ($_GET['options'] === 'edit' && $_GET['param'] === 'menu')
            {

                $query = $db->query("SELECT * FROM `t-menu` WHERE `id`='{$_GET['id']}' LIMIT 1");
                $get = $query->fetch_array();
            
                    if (empty($_POST['edit_menu_item']) || !isset($_POST['edit_menu_item']))
                    {

                        echo '<form class="form-inline" action="" method="post">

                                <legend>Название</legend>
                                <p class="well well-small">
                                <input class="input-xxlarge" type="text" name="menu_title" value="' . $get['menu_title'] . '" />                            
                                </p>                          
                                <legend>Адрес ссылки</legend>
                                <p class="well well-small">
                                ' . BASE_URL . '/ <select class="input-xlarge" name="menu_url" id="menu_url">';

                                $query = $db->query("SELECT * FROM `t-content` WHERE `is_page`='yes' ORDER BY `id` DESC");

                                for ($i = 0; $get = $query->fetch_array(); $i++)
                                {

                                    echo '<option>' . $get['url'] . '</option>';

                                }

                        echo '</select>
                                </p>
                                <legend>Расположить в блоке меню</legend>
                                <p class="well well-small">
                                <select class="input-xxlarge" name="menu_name" id="menu_name">                                  
                                  <option>Public menu block #1</option>
                                  <option>Public menu block #2</option>
                                  <option>Public menu block #3</option>
                                  <option>Public menu block #4</option>
                                </select> 
                                <select class="input-small" name="item_order" id="item_order">                              
                                  <option>0</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                  <option>6</option>
                                  <option>7</option>
                                  <option>8</option>
                                  <option>9</option>
                                  <option>10</option>
                                </select>
                                </p>

                                <hr />';
                        
                        $query = $db->query("SELECT * FROM `t-menu` WHERE `id`='{$_GET['id']}' ORDER BY `id` DESC");
                        $get = $query->fetch_array();
                        
                        echo '<input type="submit" class="btn btn-success" name="edit_menu_item" value="Обновить пункт меню" />                                
                                <a href="#myModal-' . $get['id'] . '" role="button" class="btn btn-danger" data-toggle="modal">Удалить</a>

                                <div style="display: none;" class="modal" id="myModal-' . $get['id'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <h3 id="myModalLabel">Удаление пункта меню</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p>Вы уверены, что хотите удалить пункт меню "' . $get['menu_title'] . '"?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true">Отмена</button>
                                        <input type="submit" name="delete_menu_item" class="btn btn-danger" value="Удалить" />
                                    </div>
                                </div>

                                </form>';

                            if(!empty($_POST['delete_menu_item']) || isset($_POST['delete_menu_item']))
                            {	

                                $query = $db->query("DELETE FROM `t-menu` WHERE `id`='{$_GET['id']}' LIMIT 1");

                                header('Location: ' . BASE_URL . '/t-admin/index/list/menu');

                            }

                        }
                        else
                        {
                            
                            $menu_title = isset($_POST['menu_title']) ? $db->real_escape_string($_POST['menu_title']) : '';
                            $menu_url = isset($_POST['menu_url']) ? $db->real_escape_string($_POST['menu_url']) : '';
                            $menu_name = isset($_POST['menu_name']) ? $db->real_escape_string($_POST['menu_name']) : '';
                            
                            $error = false;
                            $errort = '';

                            if (strlen($menu_title) < 3)
                            {
                                
                                $error = true;
                                $errort .= '- Длина заголовка должна быть не менее 3-x символов<br />';
                                
                            }                            

                            if(!$error)
                            {

                            $query = $db->query("UPDATE `t-menu` SET 
                                                                    `menu_title`='{$menu_title}', 
                                                                    `menu_url`='{$menu_url}', 
                                                                    `menu_name`='{$menu_name}'
                                                                    
                                                                    WHERE `id`='{$_GET['id']}'", MYSQLI_USE_RESULT);

                            echo '<div class="alert alert-block alert-success">  
                                <h4>Пункт в меню "' . $get['menu_name'] . '" успешно обновлен!</h4>
                                <p>Вы можете перейти к <a href="' . BASE_URL . '/t-admin/index/list/menu">списку пунктов меню</a> или продолжить <a href="' . BASE_URL . '/t-admin/index/edit/menu/' . $get['id'] . '">редактирование</a>.
                            </div>';
                            
                            }
                            else
                            {

                                echo '<div class="alert alert-block alert-error">  
                                        <h4>Пункт меню не был обновлен!</h4>
                                        <p></p>
                                        <p>Произошли следующие ошибки:<br />
                                        ' . $errort. '</p>
                                        <p><a href="javascript:history.go(-1)">Вернуться назад</a></p>                                
                                    </div>';

                            }

                        }
                        
            }
            
            elseif ($_GET['options'] === 'edit' && $_GET['param'] === 'settings')
            {

                $query = $db->query("SELECT * FROM `t-settings` WHERE `id`='1' LIMIT 1");
                $get = $query->fetch_array();

                    if(empty($_POST['update_settings']) || !isset($_POST['update_settings']))
                    {
                        echo '<form class="form-inline" action="" method="post">

                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#main" data-toggle="tab">Основное</a></li> 
                                <li><a href="#seo" data-toggle="tab">SEO</a></li>                                               
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="main">                    
                                    <legend>Название сайта</legend>
                                    <p class="well well-small"><input class="input-xxlarge" type="text" name="title" value="' . $get['title'] . '" /></p>
                                    <legend>Текст главной страницы</legend>                                    
                                    <textarea id="editor" class="well well-small" name="body">' . $get['body'] . '</textarea>
                                </div>  

                                <div class="tab-pane" id="seo">                                                       
                                    <legend>META Keywords</legend>
                                    <p class="well well-small"><input class="input-xxlarge" name="meta_keywords" type="text" value="' . $get['meta_keywords'] . '" /></p>
                                    <legend>META Description</legend>
                                    <p class="well well-small"><input class="input-xxlarge" name="meta_description" type="text" value="' . $get['meta_description'] . '" /></p>
                                </div>

                            </div>

                        <hr />

                            <input type="submit" class="btn btn-success" name="update_settings" value="Обновить главную страницу" />                            
                            
                        </form>';

                    }
                    else
                    {  	

                        $title = isset($_POST['title']) ? $db->real_escape_string($_POST['title']) : '';                        
                        $body = isset($_POST['body']) ? $db->real_escape_string($_POST['body']) : '';                        
                        $meta_keywords = isset($_POST['meta_keywords']) ? $db->real_escape_string($_POST['meta_keywords']) : '';
                        $meta_description = isset($_POST['meta_description']) ? $db->real_escape_string($_POST['meta_description']) : '';

                        $error = false;
                        $errort = '';

                        if (strlen($title) < 5)
                        {

                            $error = true;
                            $errort .= '- Длина названия сайта должна быть не менее 5-ти символов.<br />';

                        }                        

                        if(!$error)
                        {

                            $query = $db->query("UPDATE `t-settings` SET 
                                                                        `title`='{$title}', 
                                                                        `body`='{$body}', 
                                                                        `meta_keywords`='{$meta_keywords}', 
                                                                        `meta_description`='{$meta_description}'

                                                                        WHERE `id`='1'", MYSQLI_USE_RESULT);

                            echo '<div class="alert alert-block alert-success">  
                                    <h4>Главная страница сайта успешно обновлена!</h4>
                                    <p>Вы можете перейти <a href="' . BASE_URL . '" target="_blank">на главную страницу</a> сайта или продолжить <a href="' . BASE_URL . '/t-admin/index/edit/settings">редактирование</a>.
                                </div>';

                        }
                        else
                        {

                            echo '<div class="alert alert-block alert-error">  
                                    <h4>Главная страница сайта не была обновлена!</h4>
                                    <p></p>
                                    <p>Произошли следующие ошибки:<br />
                                    ' . $errort. '</p>
                                    <p><a href="javascript:history.go(-1)">Вернуться назад</a></p>                                
                                </div>';

                        }

                    }
            }

    }
    
   
    
}