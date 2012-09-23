<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.1
 */

class Header {
    
    public function getPublic()
    { 
        
        $public = new PublicPages;        

        echo '<!DOCTYPE html>

                <html>

                <head>

                        <meta content="text/html; charset=utf-8" />

                        <title>' . $public->getHead()['title'] . '</title>

                        <meta name="keywords" content="' . $public->getHead()['meta_keywords'] . '" />
                        <meta name="description" content="' . $public->getHead()['meta_description'] . '" />

                        <link href="' . THEME . '/css/bootstrap.min.css" rel="stylesheet" />
                        <link href="' . THEME . '/css/font-awesome.css" rel="stylesheet" />
                        <link href="' . THEME . '/js/redactor/redactor.css" rel="stylesheet" />
                        
                        <script src="http://code.jquery.com/jquery-latest.js"></script>
                        <script src="' . THEME . '/js/bootstrap.min.js"></script>
                            
                        <script src="' . THEME . '/js/redactor/redactor.min.js"></script>
                        <script src="' . THEME . '/js/redactor/lang/redactor.ru.js"></script>
                                                
                        <script src="' . THEME . '/js/jquery.sticky.js"></script>
                        <script src="' . THEME . '/js/jquery.tcms.public.js"></script>

                </head>
                <body>';

    }
    
}

class Menu
{
    
    public function getPublic_0()
    {
        
        if (isset($_SESSION['user_id']))
        {
            
            if($_SESSION['user_id'] === '1')
            {
                
                echo '<p></p>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="' . BASE_URL . '/auth/login"><i class="icon-signin"></i> Панель администратора</a></li>
                        </ul>';
                
            }
            
        }

    }
    
    public function getPublic_1()
    {
        
        $db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
        $db->set_charset('utf8');

        if ($db->connect_error) 
        {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }
        
            $query = $db->query("SELECT * FROM `t-menu` WHERE `menu_name`='Public menu block #1' ORDER BY `item_order` ASC");
            
            echo '<ul class="nav nav-pills nav-stacked" id="t-public-menu-1">';
            
            for ($i = 0; $get = $query->fetch_array(); $i++)
            {

                echo '<li><a href="' . BASE_URL . '/' . $get['menu_url'] . '">' . $get['menu_title'] . '</a></li>';

            }
            
            echo '</ul>';

    }

}

class Footer
{
    
    public function getPublic()
    {
        
        echo '</body>
                </html>';
        
    }
    
}

$header = new Header;
$menu = new Menu;
$footer = new Footer;

?>
