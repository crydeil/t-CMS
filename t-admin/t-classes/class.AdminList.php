<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.2
 */

class AdminList
{

    public function getList()
    {

        $db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
        $db->set_charset('utf8');

        if ($db->connect_error) 
        {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }    

            if ($_GET['options'] === 'list' && $_GET['param'] === 'post')
            {

                echo '<legend><i class="icon-comments-alt"></i> Записи в блоге</legend>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Дата</th><th>Заголовок</th><th>Описание</th><th></th>
                        </tr>
                    </thead>
                    <tbody>';

                $query = $db->query("SELECT * FROM `t-content` WHERE `is_page`='0' ORDER BY `id` DESC");

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

            elseif ($_GET['options'] === 'list' && $_GET['param'] === 'page')
            {

                echo '<legend><i class="icon-copy"></i> Страницы сайта</legend>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Заголовок</th><th>Описание</th><th></th>
                        </tr>
                    </thead>
                    <tbody>';

                $query = $db->query("SELECT * FROM `t-content` WHERE `is_page`='1' ORDER BY `id` DESC");

                for ($i = 0; $get = $query->fetch_array(); $i++)
                {

                    echo '  <tr>                                
                                <td><small><a href="' . BASE_URL . '/' . $get['url'] . '" target="_blank">' . $get['title'] . '</a></small></td>
                                <td><small>' . substr(strip_tags($get['body']), 0, strpos($get['body'], ' ', 150)) . '...</small></td>
                                <td><a href="' . BASE_URL . '/t-admin/index/edit/page/' . $get['id'] . '" role="button" class="btn btn-mini btn-warning" title="Редактировать"><i class="icon-pencil icon-white"></i></a></td>
                            </tr>';

                }

                    echo '  </tbody>
                          </table>';

            }

            elseif ($_GET['options'] === 'list' && $_GET['param'] === 'menu')
            {

                echo '<legend><i class="icon-link"></i> Menu block #1</legend>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Заголовок</th><th>Ссылка</th><th>Расположение</th><th></th>
                            </tr>
                        </thead>
                        <tbody>';

                $query = $db->query("SELECT * FROM `t-menu` WHERE `menu_name`='Menu block #1' ORDER BY `item_order` ASC");

                for ($i = 0; $get = $query->fetch_array(); $i++)
                {

                    echo '  <tr>
                                <td><small><a href="' . BASE_URL . '/' . $get['menu_url'] . '" target="_blank">' . $get['menu_title'] . '</a></small></td>
                                <td><small>' . $get['menu_url'] . '</small></td>                                
                                <td><small>' . $get['item_order'] . '</small></td>
                                <td><a href="' . BASE_URL . '/t-admin/index/edit/menu/' . $get['id'] . '" role="button" class="btn btn-mini btn-warning" title="Редактировать"><i class="icon-pencil icon-white"></i></a></td>
                            </tr>';

                }

                echo '  </tbody>
                      </table>

                    <legend><i class="icon-link"></i> Menu block #2</legend>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Заголовок</th><th>Ссылка</th><th>Расположение</th><th></th>
                            </tr>
                        </thead>
                        <tbody>';

                $query = $db->query("SELECT * FROM `t-menu` WHERE `menu_name`='Menu block #2' ORDER BY `item_order` ASC");

                for ($i = 0; $get = $query->fetch_array(); $i++)
                {

                    echo '  <tr>
                                <td><small><a href="' . BASE_URL . '/' . $get['menu_url'] . '" target="_blank">' . $get['menu_title'] . '</a></small></td>
                                <td><small>' . $get['menu_url'] . '</small></td>                                 
                                <td><small>' . $get['item_order'] . '</small></td>
                                <td><a href="' . BASE_URL . '/t-admin/index/edit/menu/' . $get['id'] . '" role="button" class="btn btn-mini btn-warning" title="Редактировать"><i class="icon-pencil icon-white"></i></a></td>
                            </tr>';

                }

                echo '  </tbody>
                      </table>

                    <legend><i class="icon-link"></i> Menu block #3</legend>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Заголовок</th><th>Ссылка</th><th>Расположение</th><th></th>
                            </tr>
                        </thead>
                        <tbody>';

                $query = $db->query("SELECT * FROM `t-menu` WHERE `menu_name`='Menu block #3' ORDER BY `item_order` ASC");

                for ($i = 0; $get = $query->fetch_array(); $i++)
                {

                    echo '  <tr>
                                <td><small><a href="' . BASE_URL . '/' . $get['menu_url'] . '" target="_blank">' . $get['menu_title'] . '</a></small></td>
                                <td><small>' . $get['menu_url'] . '</small></td>                                 
                                <td><small>' . $get['item_order'] . '</small></td>
                                <td><a href="' . BASE_URL . '/t-admin/index/edit/menu/' . $get['id'] . '" role="button" class="btn btn-mini btn-warning" title="Редактировать"><i class="icon-pencil icon-white"></i></a></td>
                            </tr>';

                }

                echo '  </tbody>
                      </table>

                    <legend><i class="icon-link"></i> Menu block #4</legend>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Заголовок</th><th>Ссылка</th><th>Расположение</th><th></th>
                            </tr>
                        </thead>
                        <tbody>';

                $query = $db->query("SELECT * FROM `t-menu` WHERE `menu_name`='Menu block #4' ORDER BY `item_order` ASC");

                for ($i = 0; $get = $query->fetch_array(); $i++)
                {

                    echo '  <tr>
                                <td><small><a href="' . BASE_URL . '/' . $get['menu_url'] . '" target="_blank">' . $get['menu_title'] . '</a></small></td>
                                <td><small>' . $get['menu_url'] . '</small></td>                                 
                                <td><small>' . $get['item_order'] . '</small></td>
                                <td><a href="' . BASE_URL . '/t-admin/index/edit/menu/' . $get['id'] . '" role="button" class="btn btn-mini btn-warning" title="Редактировать"><i class="icon-pencil icon-white"></i></a></td>
                            </tr>';

                }

                echo '  </tbody>
                      </table>';

            }

    }
    
}