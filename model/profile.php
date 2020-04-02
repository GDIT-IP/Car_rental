<?php

$user = null;
if (!isset($_SESSION['user'])) {
    header('location: /');
}
if (isset($_GET['id']) && trim($_GET['id'])){
    if (!isAdmin()){
        header('location: /');
    }
    $id = $_GET['id'];
    $user = readUser($id);
} else {
    $user = unserialize($_SESSION['user']);
}
