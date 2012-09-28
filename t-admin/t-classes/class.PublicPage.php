<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.1
 */
    
class PublicPage
{
    
    public function getHomeTitle()
    {    
        
        $db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
        $db->set_charset('utf8');

        if ($db->connect_error) 
        {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }
            
            $query = $db->query("SELECT * FROM `t-settings` WHERE `id`='1' LIMIT 1");            
            $get = $query->fetch_array();

            return $get['title'];
            
            if (!empty($_GET) || isset($_GET))
            {
                
                $query = $db->query("SELECT * FROM `t-settings` WHERE `id`='1' LIMIT 1");            
                $get = $query->fetch_array();
                
                return $get;
                
            }

    }
    
    public function getHomeBody()
    {    
        
        $db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
        $db->set_charset('utf8');

        if ($db->connect_error) 
        {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }
            
            if (empty($_GET) || !isset($_GET))
            {
                
                $query = $db->query("SELECT * FROM `t-settings` WHERE `id`='1' LIMIT 1");            
                $get = $query->fetch_array();
                
                return $get['body'];
                
            }

    }
    
    public function getComment()
    {
        
        $db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
        $db->set_charset('utf8');

        if ($db->connect_error) 
        {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }
              
            echo '<h3><i class="icon-comment"></i> Комментарии:</h3>
                    <div style="display: none;" class="modal" id="myModal-' . $_GET['url'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">                            
                            <h3 id="myModalLabel">Добавить комментарий</h3>
                        </div>
                        <div class="modal-body" class="form-inline">
                            <form action="" method="post">

                                <input type="text" name="comment_author" class="input-xlarge" placeholder="Имя автора" /> 
                                <input type="email" name="comment_author_email" class="input-large" placeholder="E-mail" />                          
                                <p> 
                                    <lable>Комментарий:</lable><br />
                                    <textarea id="comment" name="comment_body" /></textarea>
                                </p>
                                <lable>Защита от спама:</lable><br />
                                <input type="text" name="comment_captha" class="input-xlarge" placeholder="Введите сюда слово: add" /> 
                        </div>
                        <div class="modal-footer">
                                <button class="btn" data-dismiss="modal" aria-hidden="true">Отмена</button>
                                <input type="submit" class="btn btn-success" name="add_comment" value="Добавить комментарий" />
                            </form>
                        </div>
                    </div>';
            
            if (!empty($_POST['add_comment']) || isset($_POST['add_comment']))
            {
                
                $comment_author = isset($_POST['comment_author']) ? $db->real_escape_string($_POST['comment_author']) : '';
                $comment_author_email = isset($_POST['comment_author_email']) ? $db->real_escape_string($_POST['comment_author_email']) : '';
                $comment_body = isset($_POST['comment_body']) ? $db->real_escape_string($_POST['comment_body']) : '';
                $comment_captha = isset($_POST['comment_captha']) ? $db->real_escape_string($_POST['comment_captha']) : '';

                $error = false;
                $errort = '';

                if (strlen($comment_body) > 900)
                {

                    $error = true;
                    $errort .= '- Длина комментария должна быть не более 900 символов. Пожалуйста уменьшите свой комментарий:<br /><pre>' . $_POST['comment_body'] . '</pre>';

                }
                
                if (strlen($comment_author) <= 1)
                {

                    $error = true;
                    $errort .= '- Длина имени автора не может быть меньше 2-х символов.<br />';

                }
                
                if ($comment_captha !== 'add')
                {

                    $error = true;
                    $errort .= '- Проверочное слово в поле с CAPTCHA введено неверно.<br />';

                }

                if (!$error)
                {

                    $query = $db->query("INSERT INTO `t-comments` SET                                                                   
                                                                    `comment_content_url`='{$_GET['url']}',
                                                                    `comment_author`='{$comment_author}',
                                                                    `comment_author_email`='{$comment_author_email}',
                                                                    `comment_body`='{$comment_body}'", MYSQLI_USE_RESULT); 

                    header('Location: ' . BASE_URL . '/blog/' . $_GET['url']);

                }
                else
                {

                    echo '<div class="alert alert-block alert-error">  
                            <h4>Комментарий не был добавлен!</h4>
                            <p></p>
                            <p>Произошли следующие ошибки:<br />
                            ' . $errort. '</p>                                                           
                        </div>';

                }
                
            }
            
            $query = $db->query("SELECT * FROM `t-comments` WHERE `comment_content_url`='{$_GET['url']}' ORDER BY `comment_date` ASC LIMIT 10");     
            
            for ($i = 0; $get = $query->fetch_array(); $i++)
            {

                echo '<blockquote>
                        ' . $get['comment_body'] . '
                        <small>' . $get['comment_author'] . ' (' . $get['comment_date'] . ')</small>
                    </blockquote>
                    <hr />';

            }
                                
    }

    public function getContent()
    {       
        
        $db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
        $db->set_charset('utf8');

        if ($db->connect_error) 
        {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }
        
            if (empty($_GET) || !isset($_GET))
            {
                
                $query = $db->query("SELECT * FROM `t-content` WHERE `is_page`='0' ORDER BY `id` DESC");

                for ($i = 0; $get = $query->fetch_array(); $i++)
                {
                        echo '<p class="lead"><a href="' . BASE_URL . '/blog/' . $get['url'] . '">' . $get['title'] . '</a></p>
                                <p>';
                                
                                if (empty($get['body_preview']) || !isset($get['body_preview'])) 
                                { 
                                    
                                    echo substr(strip_tags($get['body']), 0, strpos($get['body'], ' ', 350)).'...'; 
                                    
                                } 
                                else 
                                { 
                                    
                                    echo strip_tags(trim($get['body_preview'])).'...'; 
                                    
                                }
                        
                                echo '</p>
                                <p><i class="icon-time"></i> <span class="label label-info"><small>' . date('d.m.Y, H:i', strtotime($get['date'])) . '</small></span> <i class="icon-tags"></i> <span class="label">' . $get['tags'] . '</span></p>
                                <hr />';
                }
                
            }
        
            elseif ($_GET['options'] === 'blog')
            {

                $query = $db->query("SELECT * FROM `t-content` WHERE `url`='{$_GET['url']}' AND `is_page`='0' LIMIT 1");
                $get = $query->fetch_array();

                echo '<h1>' . $get['title'] . '</h1>
                        <p><i class="icon-time"></i> <span class="label label-info"><small>' . date('d.m.Y, H:i', strtotime($get['date'])) . '</small></span> <i class="icon-tags"></i> <span class="label">' . $get['tags'] . '</span></p>
                        <p>' . $get['body'] . '</p>
                        <hr />
                        
                        <p><a href="#myModal-' . $_GET['url'] . '" role="button" class="btn btn-success" data-toggle="modal">Добавить комментарий</a> 
                        <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
                        <span class="pull-right yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,gplus,lj"></span></p>
                        
                        <br />';
                
                echo $this->getComment();
                
            }   
            
            elseif ($_GET['options'] === 'page')             
            {
                
                $query = $db->query("SELECT * FROM `t-content` WHERE `url`='{$_GET['url']}' AND `is_page`='1' LIMIT 1");
                $get = $query->fetch_array();

                echo '<h1>' . $get['title'] . '</h1>
                        <p>' . $get['body'] . '</p>';   

            }
            
    }
		
}