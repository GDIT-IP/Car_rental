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