<?php
require APPLICATION_PATH . DS . 'config' . DS . 'dbconfig.php';
include 'User.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE login = ? and password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $conn->close();

    // The result must contain only one row
    if ($result->num_rows != 1) {
        $error = "Your Login Name or Password is invalid";
        console_log($error);
        return;
    }

//    session_start();

    $user = new User();
    while ($row = $result->fetch_assoc()) {
        $user->setRole($row['role']);
    }
    if ($user->getRole() == 1) {
        header("location: /?page=adminPanel");
    } else {
        header("location: /");
    }
}
