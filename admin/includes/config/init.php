<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', 'C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'projects' . DS . 'ibrahim' . DS . 'result');

define('INCLUDES_PATH', SITE_ROOT . DS . 'admin' . DS . 'includes');

set_include_path(INCLUDES_PATH);


include_once('function.php');
include_once('session.php');

include_once('new_config.php');
include_once('classes/database.php');
include_once('classes/objects_class.php');

include_once('classes/admin.php');
include_once('classes/student.php');
include_once('classes/subject.php');
include_once('classes/settings.php');
include_once('classes/teacher.php');
include_once('classes/class.php');
include_once('classes/ca_test.php');