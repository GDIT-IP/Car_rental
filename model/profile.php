<?php

$user = null;
$currentLocation = $_SERVER['REQUEST_URI'];
if (!isset($_SESSION['user'])) {
    header('location: ./');
}
if (isset($_GET['id']) && trim($_GET['id'])) {
    if (!isAdmin()) {
        header('location: ./');
    }
    $id = $_GET['id'];
    $user = readUser($id);
} else {
    $user = unserialize($_SESSION['user']);
}

$roles = getRoles();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $user->getLogin();
    //Password in db
    $password = $user->getPassword();
    //Entered current password for check
    $currentPassword = trim($_POST['currentPassword']);
    $newPassword = trim($_POST['newPassword']);
    $newPasswordConfirmation = trim($_POST['newPasswordConfirmation']);

    $firstName = empty(trim($_POST['first-name'])) ? $user->getFirstName() : trim($_POST['first-name']);
    $lastName = empty(trim($_POST['last-name'])) ? $user->getLastName() : trim($_POST['last-name']);
    $email = empty(trim($_POST['email'])) ? $user->getEmail() : trim($_POST['email']);
    $role = empty(trim($_POST['role'])) ? $user->getRole() : trim($_POST['role']);
    $enabled = empty(trim($_POST['is-active'])) ? $user->getEnabled() : trim($_POST['is-active']);

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
