<?php
session_start();
const DS = DIRECTORY_SEPARATOR;
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . "."));
require_once APPLICATION_PATH . DS . 'config' . DS . 'config.php';
require_once APPLICATION_PATH . DS . "config" . DS . "dbconfig.php";
require_once APPLICATION_PATH . DS . "lib" . DS . "db.php";
require_once APPLICATION_PATH . DS . 'model' . DS . 'User.php';

$currentUser = unserialize($_SESSION['user']);
$page = intval($_GET['userspage']);
$limit = $_GET['amount'];
$offset = ($page - 1) * $limit;
$users = getUsers($limit, $offset);

$tableContent = "";

foreach ($users as $user) {
    $tableContent .= '<tr>';
    $tableContent .= '<th scope="row">' . $user->getId() . '</th>';
    $tableContent .= '<td>' . $user->getLogin() . '</td>';
    $tableContent .= '<td>' . $user->getRole() . '</td>';
    $tableContent .= '<td> <a class="btn btn-outline-success" href="/?page=profile&id=' . $user->getId().'">Edit</a>';
    if ($currentUser->getLogin() != $user->getLogin()) {
        $tableContent .= '<a class="btn btn-outline-danger mx-3" href="#">Delete</a>';
    }
    $tableContent .= '</td></tr>';
}

echo $tableContent;
