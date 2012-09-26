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

            echo '<legend><i class="icon-comments-alt"></i> Последние 10 записей в блоге</legend>
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

    }
    
}