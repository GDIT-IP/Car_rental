<?php
if (!isset($_SESSION['user'])){
    header('location: ./?page=youNeedToLogin');
}

$user = unserialize($_SESSION['user']);
$car = null;
$currentLocation = $_SERVER['REQUEST_URI'];
if (isset($_GET['id']) && trim($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location: ./?page=404');
}

$car = readCar($id);

if(isset($_POST['requestBooking'])) {

    $userId = $user->getId();
    $carId = $car->getId();
    $formDate = stringToDate($_POST['fromDate']);
    $tillDate = stringToDate($_POST['tillDate']);

    addBooking($userId, $carId, $formDate, $tillDate);
}

function stringToDate($string) {
    $original_date = $string;
    $timestamp = strtotime($original_date);
    return date("Y-m-d h:i:s", $timestamp);
}