<?php
$users = getUsersData();

if (isUserAuthorized()) {
    $currentUser = $_SESSION['user'];
} else {
    header('location: /');
}

$isCarsActive = '';
$carsTabClasses = '';
if (strcasecmp($currentUser->getRole(), 'Administrator') != 0) {
    $isCarsActive = 'active';
    $carsTabClasses = 'show active';
}
