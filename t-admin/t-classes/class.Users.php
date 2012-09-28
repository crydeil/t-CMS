<?php

class Users 
{

    public function getGravatar($email)
    {
        
        $db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
        $db->set_charset('utf8');

        if ($db->connect_error) 
        {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }
                        
            $gravatar = 'http://www.gravatar.com/avatar/' . md5(strtolower(trim($email))) . '?d=' . urlencode(BASE_URL . '/theme/img/t-cms-user-default.png') . '&s=30';
            return $gravatar;
            
    }
    
}