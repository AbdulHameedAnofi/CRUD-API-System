<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'xampp'.DS.'htdocs'.DS.'Practice'.DS.'Api login');
//xampp/htdocs/practice/api login/config
defined('CONFIG_PATH') ? null : define('CONFIG_PATH', SITE_ROOT.DS.'config');
//xampp/htdocs/practice/api login/class
defined('CLASS_PATH') ? null : define('CLASS_PATH', SITE_ROOT.DS.'class');

//load connecton file first
require_once(CONFIG_PATH.DS.'conn.php');

//then load class file next
require_once(CLASS_PATH.DS.'users.class.php');

