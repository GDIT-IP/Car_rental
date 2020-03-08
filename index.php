<?php

const DS = DIRECTORY_SEPARATOR;
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . "."));

require_once APPLICATION_PATH . DS . 'config' . DS . 'config.php';

require_once $config['MODEL_PATH'] . 'User.php';
session_start();

$page = get('page');
$model = $config['MODEL_PATH'] . $page . '.php';
$view = $config['VIEW_PATH'] . $page . '.php';
$_404 = $config['VIEW_PATH'] . '404.php';

if (file_exists($model)) {
    require $model;
}

$content = $_404;
if (file_exists($view)) {
    $content = $view;
}

include $config['VIEW_PATH'] . 'layout.php';

?>