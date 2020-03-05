<?php
require_once 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $login = $_POST['login'];
    $password = $_POST['password'];
    $result = getUser($login, $password);

    // The result must contain only one row
    if ($result->num_rows != 1) {
        $error = "Your Login Name or Password is invalid";
        console_log($error);
        return;
    }

    $user = new User();
    $row = $result->fetch_assoc();
    $user->setRole($row['role']);
    $user->setLogin($row['login']);
    $_SESSION['user'] = $user;

    if ($user->getRole() == 1) {
        header("location: /?page=adminPanel");
    } else {
        header("location: /");
    }
}
