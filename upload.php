<?php

require $_SERVER['DOCUMENT_ROOT'].'/t-admin/config.php';

$dir = 'uploads/';
 
$_FILES['file']['type'] = strtolower($_FILES['file']['type']);
 
if ($_FILES['file']['type'] == 'image/png' 
|| $_FILES['file']['type'] == 'image/jpg' 
|| $_FILES['file']['type'] == 'image/gif' 
|| $_FILES['file']['type'] == 'image/jpeg'
|| $_FILES['file']['type'] == 'image/pjpeg')
{	

    $file = $dir.md5(date('YmdHis')).'.jpg';
 
    copy($_FILES['file']['tmp_name'], $file);
 
    $array = array(
        'filelink' => BASE_URL.'/'.$file
    );
	
    echo stripslashes(json_encode($array));   
}