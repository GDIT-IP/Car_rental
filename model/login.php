<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $login = $_POST['login'];
    $password = $_POST['password'];
    $result = getUser($login, $password);

    // The result must contain only one row
    if ($result->num_rows != 1) {
        $error = "Your Login Name or Password is invalid";
        return;
    }

    $row = $result->fetch_assoc();
    $user = readUser($row['id']);
    $_SESSION['user'] = serialize($user);

    if (isAdmin()) {
        header("location: /?page=managerPanel");
    } else {
        header("location: /");
    }
}
