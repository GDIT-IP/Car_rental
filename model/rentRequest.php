<?php
if (!isset($_SESSION['user'])){
    header('location: ./?page=youNeedToLogin');
}

$car = null;
$currentLocation = $_SERVER['REQUEST_URI'];
if (isset($_GET['id']) && trim($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location: ./?page=404');
}

$car = readCar($id);
