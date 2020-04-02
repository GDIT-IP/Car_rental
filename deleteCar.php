<?php
session_start();
const DS = DIRECTORY_SEPARATOR;
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . "."));
require_once APPLICATION_PATH . DS . 'config' . DS . 'config.php';
require_once APPLICATION_PATH . DS . "config" . DS . "dbconfig.php";
require_once APPLICATION_PATH . DS . "lib" . DS . "db.php";
require_once APPLICATION_PATH . DS . 'model' . DS . 'User.php';

if (!isManagment()) {
    http_response_code(403);
    header('location: ./');
    exit;
}

$result = deleteCar($_POST['carId']);
if (!$result) {
    echo $result;
} else {
    header('location: ./?page=managerPanel');
}
