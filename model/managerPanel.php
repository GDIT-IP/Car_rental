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

$cars = listCars();

$isCarsActive = '';
$carsTabClasses = '';
if (!isAdmin()) {
    $isCarsActive = 'active';
    $carsTabClasses = 'show active';
}

/**
 * requests
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['approve'])) {
        $is_approved = true;
    } else if (isset($_POST['reject'])) {
        $is_approved = false;
    }
    consider($_POST['customer_id'], $_POST['car_id'], $_POST['rent_start_time'], $is_approved);
    header('location: ');
}

$bookingRequests = listBookings();
