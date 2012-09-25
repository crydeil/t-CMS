<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.1
 */
    
class CONTENT
{
    
    public function getHomePage()
    {    
        
        $db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
        $db->set_charset('utf8');

        if ($db->connect_error) 
        {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }
            
            $query = $db->query("SELECT * FROM `t-settings` WHERE `id`='1' LIMIT 1");            
            $get = $query->fetch_array();

            return $get;

    }
        
    public function getPublic()
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
                        echo '
                                <p class="lead"><a href="' . BASE_URL . '/blog/' . $get['url'] . '">' . $get['title'] . '</a></p>
                                <p>';
                                
                                if (empty($get['body_preview'])) { echo substr(strip_tags($get['body']), 0, 350).'...'; } else { echo strip_tags($get['body_preview']); }
                        
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
                        <p>' . $get['body'] . '</p>
                        <hr />
                        <p><i class="icon-time"></i> <span class="label label-info"><small>' . date('d.m.Y, H:i', strtotime($get['date'])) . '</small></span> <i class="icon-tags"></i> <span class="label">' . $get['tags'] . '</span></p>
                        <hr />';  
                
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