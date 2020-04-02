<?php

$car = null;
$currentLocation = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['user'])) {
    header('location: ./');
}
if (isset($_GET['id']) && trim($_GET['id'])) {
    if (!isAdmin()) {
        header('location: ./');
    }
    $id = $_GET['id'];
    $car = readUser($id);
} else {
    $car = unserialize($_SESSION['user']);
}

$roles = getRoles();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $car->getId();
    $login = $car->getLogin();
    //Password in db
    $password = $car->getPassword();
    //Entered current password for check
    $currentPassword = trim($_POST['currentPassword']);
    $newPassword = trim($_POST['newPassword']);
    $newPasswordConfirmation = trim($_POST['newPasswordConfirmation']);

    $firstName = empty(trim($_POST['first-name'])) ? $car->getFirstName() : trim($_POST['first-name']);
    $lastName = empty(trim($_POST['last-name'])) ? $car->getLastName() : trim($_POST['last-name']);
    $email = empty(trim($_POST['email'])) ? $car->getEmail() : trim($_POST['email']);
    $role = empty($_POST['role']) ? $car->getRole() : trim($_POST['role']);
    if (!empty($_POST['is-active'])) {
        $enabled = filter_var($_POST['is-active'], FILTER_VALIDATE_BOOLEAN);
    } else {
        $enabled = $car->getEnabled();
    }

    // Set new data
    $updatedUser = new User();
    $updatedUser->setId($id);
    $updatedUser->setLogin($login);
    $updatedUser->setEmail($email);
    $updatedUser->setFirstName($firstName);
    $updatedUser->setLastName($lastName);
    $updatedUser->setRole($role);
    $updatedUser->setEnabled($enabled);

    if (!empty($currentPassword) || !empty($newPassword)) {
        if ($currentPassword !== $password) {
            $errors[] = "Incorrect current password";
        }
        if (empty($newPassword)) {
            $errors[] = "Password cannot be empty";
        } elseif ($newPassword !== $newPasswordConfirmation) {
            $errors[] = "New password must be confirmed";
        } else {
            $updatedUser->setPassword($newPassword);
        }
    } else {
        $updatedUser->setPassword($password);
    }

    if (empty($errors)) {
        update($updatedUser);
        if (unserialize($_SESSION['user'])->getId() == $id) {
            $_SESSION['user'] = serialize(readUser($id));
        }
        header("location: " . $currentLocation);
        exit;
    }
}
