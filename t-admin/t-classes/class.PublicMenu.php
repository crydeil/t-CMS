<?php

class PublicMenu
{
    
    public function getPublic_0()
    {
        
        echo '<p></p>
                <ul class="nav nav-pills pull-right">
                    <li><a href="' . BASE_URL . '"><i class="icon-home"></i> На главную</a></li>';
                                
        if (isset($_SESSION['user_id']))
        {
            
            if($_SESSION['user_id'] === '1')
            {
                
                echo '<li><a href="' . BASE_URL . '/auth/login"><i class="icon-signin"></i> Панель администратора</a></li>';
                
            }
            
        }
        
        echo '</ul>';

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

?>
