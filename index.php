<?php

session_start();

ob_start('ob_gzhandler');

require 't-admin/config.php';

$header = new PublicHeader;
$menu = new PublicMenu;
$public = new PublicList;
$settings = new Settings;
$footer = new PublicFooter;

include_once THEME.'/public/index.tpl';

?>