<?php

/**
 * @author Vikky Shostak <vikkyshostak@gmail.com>
 * @version 0.1
 */

class HTML 
{
    
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
    
    public function getAdminHeader()
    {
       
        echo '<!DOCTYPE html>

                <html>

                <head>

                    <meta content="text/html; charset=utf-8" />

                    <title>Панель управления :: t-CMS</title>

                    <link href="' . THEME . '/css/bootstrap.min.css" rel="stylesheet" />
                    <link href="' . THEME . '/css/font-awesome.css" rel="stylesheet" />
                    <link href="' . THEME . '/js/redactor/redactor.css" rel="stylesheet" />

                    <script src="http://code.jquery.com/jquery-latest.min.js"></script>        
                    <script src="' . THEME . '/js/bootstrap.min.js"></script>

                    <script src="' . THEME . '/js/redactor/redactor.min.js"></script>
                    <script src="' . THEME . '/js/redactor/lang/redactor.ru.js"></script>
                    <script src="' . THEME . '/js/jquery.synctranslit.min.js"></script>

                    <script src="' . THEME . '/js/jquery.sticky.min.js"></script>
                    <script src="' . THEME . '/js/jquery.tcms.admin.min.js"></script>
                    
                    <link rel="icon" type="image/x-icon" href="' . THEME . '/img/t-cms-favicon.png" />

                </head>
                <body>';

    }
        
    public function getPublicHeader()
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
                                                                        
                        <script src="' . THEME . '/js/jquery.sticky.min.js"></script>
                        <script src="' . THEME . '/js/jquery.tcms.public.js"></script>
                        
                </head>
                <body>';

    }
    
    public function getAdminFooter()
    {
        
        echo '<hr />
            
                <div class="row">
                
                    <div class="span4">
                    <small>&copy; 2012 <a href="http://totstar.ru" target="_blank">totstar</a> projects group</small>
                    </div>
                    
                    <div class="span8">
                    <small class="pull-right"><a href="https://github.com/VikkyShostak/t-CMS" target="_blank"><i class="icon-github"></i> t-CMS GitHub page</a></small>
                    
                    </div>
                </div>
                
            <br />

            </div>

            </body>
            </html>';
        
    }
    
    public function getPublicFooter()
    {
        
        echo '</body>
            </html>';
        
    }
    
}