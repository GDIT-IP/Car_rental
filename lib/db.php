<?php
require_once APPLICATION_PATH . DS . 'config' . DS . 'dbconfig.php';
require_once APPLICATION_PATH . DS . 'model' . DS . 'User.php';


function getUser($login, $password)
{
    $conn = getConnection();
    $query = "SELECT u.id, u.login, r.role 
              FROM users as u 
              JOIN roles as r
              WHERE enabled = true and login = ? and password = ? and u.role = r.id";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $login, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function getUsers()
{
    $conn = getConnection();
    $query = "SELECT u.id, u.login, r.role
              FROM users as u
              JOIN roles as r
              WHERE u.role = r.id
              ORDER BY u.id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $queryResult = $stmt->get_result();
    $users = [];
    while ($row = $queryResult->fetch_assoc()) {
        $user = new User();
        $user->setId($row['id']);
        $user->setLogin($row['login']);
        $user->setRole($row['role']);
        $users[] = $user;
    }
    $conn->close();
    return $users;
}

function readUser($id)
{
    $conn = getConnection();
    $query = "SELECT
              u.id, u.login, u.email, u.phone_number, u.first_name, u.last_name, u.enabled, r.role
              FROM users as u 
              JOIN roles as r ON u.role = r.id 
              WHERE u.id = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('d', $id);
    $stmt->execute();
    $queryResult = $stmt->get_result();
    $user = new User();
    while ($row = $queryResult->fetch_assoc()) {
        $user->setId($row['id']);
        $user->setLogin($row['login']);
        $user->setRole($row['role']);
        $user->setEmail($row['email']);
        $user->setPhoneNumber($row['phone_number']);
        $user->setFirstName($row['first_name']);
        $user->setLastName($row['last_name']);
        $user->setEnabled($row['enabled']);
    }
    $conn->close();
    return $user;
}
