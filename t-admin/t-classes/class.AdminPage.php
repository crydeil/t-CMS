<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.1
 */

class AdminPage
{
    
    public function getDashboard()
    {

        $db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
        $db->set_charset('utf8');

        if ($db->connect_error) 
        {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }

            $query = $db->query("SELECT * FROM `t-content` WHERE `is_page`='no' ORDER BY `id` DESC LIMIT 10");

            echo '<legend><i class="icon-comments-alt"></i> Последние записи в блоге</legend>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Дата</th><th>Заголовок</th><th>Описание</th><th></th>
                        </tr>
                    </thead>
                    <tbody>';

            for ($i = 0; $get = $query->fetch_array(); $i++)
            {

                echo '  <tr>
                            <td><small>' . date('d.m.Y, H:i', strtotime($get['date'])) . '</small></td>
                            <td><small><a href="' . BASE_URL . '/blog/' . $get['url'] . '" target="_blank">' . $get['title'] . '</a></small></td>
                            <td><small>';
                            
                            if (empty($get['body_preview'])) 
                            { 

                                echo substr(strip_tags($get['body']), 0, strpos($get['body'], ' ', 150)); 

                            } 
                            else 
                            { 

                                echo substr(strip_tags($get['body_preview']), 0, strpos($get['body_preview'], ' ', 150)); 

                            }
                            
                            echo '...</small></td>
                            <td><a href="' . BASE_URL . '/t-admin/index/edit/post/' . $get['id'] . '" role="button" class="btn btn-mini btn-warning" title="Редактировать"><i class="icon-pencil icon-white"></i></a></td>
                        </tr>';

            }

            echo '  </tbody>
                  </table>';
            
            $query = $db->query("SELECT * FROM `t-comments` WHERE 1 ORDER BY `comment_date` DESC LIMIT 10");

            echo '<legend><i class="icon-comment"></i> Последние комментарии к записям</legend>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Дата</th><th>Комментарий к записи</th><th>Автор</th><th>E-mail автора</th><th></th>
                        </tr>
                    </thead>
                    <tbody>';
            
            for ($i = 0; $get = $query->fetch_array(); $i++)
            {

                echo '  <tr>
                            <td><small>' . date('d.m.Y, H:i', strtotime($get['comment_date'])) . '</small></td>
                            <td><small><a href="' . BASE_URL . '/blog/' . $get['comment_content_url'] . '" target="_blank">' . BASE_URL . '/blog/' . $get['comment_content_url'] . '</a></small></td>  
                            <td><small>' . $get['comment_author'] . '</small></td>
                            <td><small>' . $get['comment_author_email'] . '</small></td>                          
                            <td>
                                <a href="#myModal-' . $get['id'] . '" role="button" class="btn btn-mini btn-danger" data-toggle="modal" title="Удалить"><i class="icon-remove icon-white"></i></a>
                                <div style="display: none;" class="modal" id="myModal-' . $get['id'] . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                        <h3 id="myModalLabel">Удаление комментария</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p>Вы уверены, что хотите удалить комментарий от ' . $get['comment_author'] . '?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="" method="post">
                                            <button class="btn" data-dismiss="modal" aria-hidden="true">Отмена</button>
                                            <input type="submit" name="delete_comment" class="btn btn-danger" value="Удалить" />
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>';
                
                if (!empty($_POST['delete_comment']) || isset($_POST['delete_comment']))
                {	

                    $query = $db->query("DELETE FROM `t-comments` WHERE `id`='{$get['id']}' LIMIT 1");

                    header('Location: ' . BASE_URL . '/t-admin/index');

                }

            }

            echo '  </tbody>
                  </table>';
            
    }
    
}