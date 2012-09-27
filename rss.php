<?php

ob_start('ob_gzhandler');

require $_SERVER['DOCUMENT_ROOT'].'/t-admin/config.php';

$db = new mysqli(DBserver, DBuser, DBpassword, DBbase);
$db->set_charset('utf8');

if ($db->connect_error) 
{
    die('Connect Error (' . $db->connect_errno . ') ' . $db->connect_error);
}

$query_site = $db->query("SELECT * FROM `t-settings` WHERE `id`='1' LIMIT 1");
$query_post = $db->query("SELECT * FROM `t-content` WHERE `is_page`='0' ORDER BY `date` DESC LIMIT 10");
$query_user = $db->query("SELECT * FROM `t-users` WHERE `id`='1' LIMIT 1");

$get_site = $query_site->fetch_array();
$get_user = $query_user->fetch_array();

echo '<?xml version="1.0"?>
        <rss version="2.0">
            <channel>
                <title>' . $get_site['title'] . '</title>
                <link>' . BASE_URL . '</link>
                <description>' . $get_site['meta_description'] . '</description>';
            
            for ($i = 0; $get = $query_post->fetch_array(); $i++)
            {
            
               echo '<item>
                        <title>' . $get['title'] . '</title>
                        <link>' . BASE_URL . '/blog/' . $get['url'] . '</link>
                        <description>';

                         if (empty($get['body_preview'])) 
                         { 

                             echo substr(strip_tags($get['body']), 0, strpos($get['body'], ' ', 150)); 

                         } 
                         else 
                         { 

                             echo substr(strip_tags($get['body_preview']), 0, strpos($get['body_preview'], ' ', 150)); 

                         }

                    echo '</description>
                    <author>' . $get_user['login'] . '</author>
                    <pubDate>' . date('D, j M Y G:i:s', strtotime($get['date'])) . ' GMT' . '</pubDate>
                </item>
            </channel>';        
                 
            }
            
        echo '</rss>';