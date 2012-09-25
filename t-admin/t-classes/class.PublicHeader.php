<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.1
 */

class PublicHeader {
    
    public function getMetaTitle()
    {    
        
        $db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
        $db->set_charset('utf8');

        if ($db->connect_error) 
        {
            die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
        }
        
            if (empty($_GET['options']) || !isset($_GET['options']))
            {  

                $query = $db->query("SELECT * FROM `t-settings` WHERE 1 LIMIT 1");            
                $get = $query->fetch_array();

                return $get;

            }
            
            elseif ($_GET['options'] === 'blog') 
            {

                $query = $db->query("SELECT * FROM `t-content` WHERE `url`='{$_GET['url']}' AND `is_page`='no' LIMIT 1");
                $get = $query->fetch_array();

                return $get;

            }
            
            elseif ($_GET['options'] === 'page')            
            {  

                $query = $db->query("SELECT * FROM `t-content` WHERE `url`='{$_GET['url']}' AND `is_page`='yes' LIMIT 1");
                $get = $query->fetch_array();

                return $get;

            }

    }
    
    public function getPublic()
    { 
        
        echo '<!DOCTYPE html>

                <html>

                <head>

                        <meta content="text/html; charset=utf-8" />

                        <title>' . $this->getMetaTitle()['title'] . '</title>

                        <meta name="keywords" content="' . $this->getMetaTitle()['meta_keywords'] . '" />
                        <meta name="description" content="' . $this->getMetaTitle()['meta_description'] . '" />

                        <link href="' . THEME . '/css/bootstrap.min.css" rel="stylesheet" />
                        <link href="' . THEME . '/css/font-awesome.css" rel="stylesheet" />
                                                
                        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
                        <script src="' . THEME . '/js/bootstrap.min.js"></script>
                                                                        
                        <script src="' . THEME . '/js/jquery.sticky.js"></script>
                        <script src="' . THEME . '/js/jquery.tcms.public.js"></script>
                        
                </head>
                <body>';

    }
    
}