<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.1
 */

class Settings 
{
    
    public function getMainTitle()
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

    }
    
    public function getMainBody()
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
                
}

?>