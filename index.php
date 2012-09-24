<?php

session_start();

ob_start('ob_gzhandler');

require 't-admin/config.php';

$settings = new Settings;
$header = new PublicHeader;
$menu = new PublicMenu;
$public = new PublicList;
$footer = new PublicFooter;

include_once THEME.'/public/index.tpl';

?>