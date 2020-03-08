<?php
$users = getUsersData();

if (isManagment()) {
    $currentUser = $_SESSION['user'];
} else {
    header('location: /');
}

$isCarsActive = '';
$carsTabClasses = '';
if (!isAdmin()) {
    $isCarsActive = 'active';
    $carsTabClasses = 'show active';
}
