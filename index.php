<?php

session_start();

ob_start('ob_gzhandler');

require 't-admin/config.php';
include 't-admin/public.classes.php';
require_once 't-admin/public.visual.classes.php';

include THEME.'/public/index.tpl';

?>