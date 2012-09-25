<?php

session_start();

ob_start('ob_gzhandler');

require $_SERVER['DOCUMENT_ROOT'].'/t-admin/config.php';

$HTML = new HTML;
$MENU = new MENU;
$CONTENT = new CONTENT;

include_once $_SERVER['DOCUMENT_ROOT'].'/theme/public/index.tpl';