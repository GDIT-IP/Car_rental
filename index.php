<?php
session_start();
const DS = DIRECTORY_SEPARATOR;
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . "."));

require APPLICATION_PATH . DS . 'config' . DS . 'config.php';

$page = get('page');
$model = $config['MODEL_PATH'] . $page . '.php';
$view = $config['VIEW_PATH'] . $page . '.php';

console_log($model);
console_log($view);

if (file_exists($model)) {
    require $model;
}

if (file_exists($view)) {
    require $view;
}

?>