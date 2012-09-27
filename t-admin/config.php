<?php 

// System paths
define('BASE_URL', 'http://localhost');
define('THEME', BASE_URL.'/theme');

// MySQL connect
define('DBserver', 'localhost');
define('DBuser', 'root');
define('DBpassword', '');

// MySQL prefix_ + table
define('DBprefix', 't_');
define('DBbase', DBprefix.'cms_base');

// Autoload classes
function __autoload($class)
{
    include_once $_SERVER['DOCUMENT_ROOT'].'/t-admin/t-classes/class.' . $class . '.php';
}