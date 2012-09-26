<?php

session_start();

ob_start('ob_gzhandler');

require $_SERVER['DOCUMENT_ROOT'].'/t-admin/config.php';

$html = new Html;
$menu = new Menu;
$public_page = new PublicPage;

include_once $_SERVER['DOCUMENT_ROOT'].'/theme/public/index.tpl';