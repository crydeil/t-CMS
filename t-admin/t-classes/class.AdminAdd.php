<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.1
 */

class AdminAdd
{
    
    public function getAdd()
    {

        $db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
        $db->set_charset('utf8');

        if ($db->connect_error) 
        {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }

            if ($_GET['options'] === 'add' && $_GET['param'] === 'post')
            {

                if (empty($_POST['add_post']) || !isset($_POST['add_post']))
                {

                    echo '
                    <form class="form-inline" action="" method="post">
                        
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#main" data-toggle="tab">Основное</a></li> 
                            <li><a href="#seo" data-toggle="tab">SEO</a></li>                                               
                        </ul>
                    
                        <div class="tab-content">
                            
                            <div class="tab-pane active" id="main">                    
                                <legend>Заголовок</legend>
                                <p class="well well-small"><input class="input-xxlarge" type="text" name="title" id="title" value="" /></p>
                                <legend>Превью записи</legend>
                                <p class="well well-small"><input class="input-xxlarge" type="text" name="body_preview" value="" /></p>
                                <legend>Текст записи</legend>                                
                                <textarea id="editor" class="well well-small" name="body"></textarea>
                                <legend>Теги</legend>
                                <p class="well well-small"><input class="input-xxlarge" type="text" name="tags" value="" /></p>
                            </div>  
                            
                            <div class="tab-pane" id="seo">
                                <legend><abbr title="ЧПУ - Человеко-Понятный адрес ссылки">ЧПУ</abbr> URL</legend>
                                <p class="well well-small"><input class="input-xxlarge" name="url" id="url" type="text" value="" /></p>                       
                                <legend>META Keywords</legend>
                                <p class="well well-small"><input class="input-xxlarge" name="meta_keywords" type="text" value="" /></p>
                                <legend>META Description</legend>
                                <p class="well well-small"><input class="input-xxlarge" name="meta_description" type="text" value="" /></p>
                            </div>
                            
                        </div>
                    <hr />

                            <input type="submit" class="btn btn-primary" name="add_post" value="Добавить запись" />	

                    </form>
                    ';

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

                        $query = $db->query("INSERT INTO `t-content` SET 
                                                                    `title`='{$title}', 												
                                                                    `url`='{$url}',
                                                                    `body_preview`='{$body_preview}',
                                                                    `body`='{$body}', 
                                                                    `meta_keywords`='{$meta_keywords}', 
                                                                    `meta_description`='{$meta_description}',
                                                                    `tags`='{$tags}'", MYSQLI_USE_RESULT);
                        
                        echo '<div class="alert alert-block alert-success">  
                                <h4>Запись успешно создана!</h4>
                                <p>Вы можете перейти к <a href="' . BASE_URL . '/t-admin/index/list/post">списку записей</a> блога или <a href="' . BASE_URL . '/t-admin/index/add/post">добавить ещё одну</a>.
                            </div>';
                        
                        }
                        else
                        {
                            
                            echo '<div class="alert alert-block alert-error">  
                                    <h4>Запись не была создана!</h4>
                                    <p></p>
                                    <p>Произошли следующие ошибки:<br />
                                    ' . $errort. '</p>
                                    <p><a href="javascript:history.go(-1)">Вернуться назад</a></p>                                
                                </div>';
                            
                        }

                }
            }
            
            elseif ($_GET['options'] === 'add' && $_GET['param'] === 'page')
            {

                if (empty($_POST['add_page']) || !isset($_POST['add_page']))
                {

                    echo '
                    <form class="form-inline" action="" method="post">
                        
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#main" data-toggle="tab">Основное</a></li> 
                            <li><a href="#seo" data-toggle="tab">SEO</a></li>                                               
                        </ul>
                    
                        <div class="tab-content">
                            
                            <div class="tab-pane active" id="main">                    
                                <legend>Заголовок</legend>
                                <p class="well well-small"><input class="input-xxlarge" type="text" name="title" id="title" value="" /></p>                                
                                <legend>Текст страницы</legend>                                
                                <textarea id="editor" class="well well-small" name="body"></textarea>                                
                            </div>  
                            
                            <div class="tab-pane" id="seo">
                                <legend><abbr title="ЧПУ - Человеко-Понятный адрес ссылки">ЧПУ</abbr> URL</legend>
                                <p class="well well-small"><input class="input-xxlarge" name="url" id="url" type="text" value="" /></p>                       
                                <legend>META Keywords</legend>
                                <p class="well well-small"><input class="input-xxlarge" name="meta_keywords" type="text" value="" /></p>
                                <legend>META Description</legend>
                                <p class="well well-small"><input class="input-xxlarge" name="meta_description" type="text" value="" /></p>
                            </div>
                            
                        </div>
                    <hr />

                            <input type="submit" class="btn btn-primary" name="add_page" value="Добавить страницу" />	

                    </form>
                    ';

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

                        $query = $db->query("INSERT INTO `t-content` SET 
                                                                    `title`='{$title}', 												
                                                                    `url`='{$url}',                                                                    
                                                                    `body`='{$body}', 
                                                                    `meta_keywords`='{$meta_keywords}', 
                                                                    `meta_description`='{$meta_description}',
                                                                    `is_page`='yes'", MYSQLI_USE_RESULT);
                        
                        echo '<div class="alert alert-block alert-success">  
                                <h4>Страница успешно создана!</h4>
                                <p>Вы можете перейти к <a href="' . BASE_URL . '/t-admin/index/list/page">списку страниц</a> или <a href="' . BASE_URL . '/t-admin/index/add/page">добавить ещё одну</a>.
                            </div>';
                        
                        }
                        else
                        {
                            
                            echo '<div class="alert alert-block alert-error">  
                                    <h4>Страница не была создана!</h4>
                                    <p></p>
                                    <p>Произошли следующие ошибки:<br />
                                    ' . $errort. '</p>
                                    <p><a href="javascript:history.go(-1)">Вернуться назад</a></p>                                
                                </div>';
                            
                        }

                }
            }

            elseif ($_GET['options'] === 'add' && $_GET['param'] === 'menu')
            {
                
                if (empty($_POST['add_menu_item']) || !isset($_POST['add_menu_item']))
                {

                    echo '<form class="form-inline" action="" method="post">

                            <legend>Название</legend>
                            <p class="well well-small">
                            <input class="input-xxlarge" type="text" name="menu_title" value="" />                            
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
                            
                            <hr />

                                <input type="submit" class="btn btn-primary" name="add_menu_item" value="Добавить пункт меню" />	

                            </form>';
                    
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
                        
                        $query = $db->query("INSERT INTO `t-menu` SET 
                                                                    `menu_title`='{$menu_title}', 
                                                                    `menu_url`='{$menu_url}', 
                                                                    `menu_name`='{$menu_name}'", MYSQLI_USE_RESULT);
                                                                    
                        echo '<div class="alert alert-block alert-success">  
                            <h4>Пункт меню успешно создан!</h4>
                            <p>Вы можете перейти к <a href="' . BASE_URL . '/t-admin/index/list/menu">списку пунктов меню</a> или <a href="' . BASE_URL . '/t-admin/index/add/menu/' . $get['id'] . '">добавить ещё один</a>.
                        </div>';

                    }
                    else
                    {

                        echo '<div class="alert alert-block alert-error">  
                                <h4>Пункт меню не был создан!</h4>
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