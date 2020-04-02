<?php

if (isManagment()) {
    $currentUser = unserialize($_SESSION['user']);
} else {
    header('location: /');
}

/**
 * usersManagement
 */

$usersAmount = countUsers();
$usersPerPage = 10;
$pagesAmount = intdiv($usersAmount, $usersPerPage) + (($usersAmount % $usersPerPage > 0) ? 1 : 0);

/**
 * carsManagement
 */

$cars = getCars();

$isCarsActive = '';
$carsTabClasses = '';
if (!isAdmin()) {
    $isCarsActive = 'active';
    $carsTabClasses = 'show active';
}

/**
 * requests
 */

if(isset($_POST['Approve'])){
    approve($_POST['customer_id'], $_POST['car_id'], $_POST['rent_start_time']);
}

$bookingRequests = listPendingBookings();