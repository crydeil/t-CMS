<?php 

// System paths
define('BASE_URL', 'http://127.0.0.1:8080');
define('THEME', BASE_URL.'/theme');

// MySQL connect
define('DBserver', 'localhost');
define('DBuser', 'root');
define('DBpassword', '');

// MySQL prefix_ + table
define('DBprefix', '');
define('DBbase', DBprefix.'test');

// Autoload classes
function __autoload($class)
{
    include_once $_SERVER['DOCUMENT_ROOT'].'/t-admin/t-classes/class.' . $class . '.php';
}