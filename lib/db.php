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

function getUsers($amount = 0, $offset = 0)
{
    $conn = getConnection();
    $query = "SELECT u.id, u.login, r.role
              FROM users as u
              JOIN roles as r
              WHERE u.role = r.id
              ORDER BY u.id";
    if ($amount > 0) {
        $query .= " LIMIT " . $amount;
        if ($offset > 0) {
            $query .= " OFFSET " . $offset;
        }
    }
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

function countUsers()
{
    $conn = getConnection();
    $query = "SELECT COUNT(*) amount FROM users";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $queryResult = $stmt->get_result();
    $amount = 0;
    while ($row = $queryResult->fetch_assoc()) {
        $amount = intval($row['amount']);
    }
    $conn->close();
    return $amount;
}

function readUser($id)
{
    $conn = getConnection();
    $query = "SELECT
              u.id, u.login, u.email, u.first_name, u.last_name, u.enabled, r.role
              FROM users as u 
              JOIN roles as r ON u.role = r.id 
              WHERE u.id = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $queryResult = $stmt->get_result();
    $user = new User();
    while ($row = $queryResult->fetch_assoc()) {
        $user->setId($row['id']);
        $user->setLogin($row['login']);
        $user->setRole($row['role']);
        $user->setEmail($row['email']);
        $user->setFirstName($row['first_name']);
        $user->setLastName($row['last_name']);
        $user->setEnabled($row['enabled']);
    }
    $conn->close();
    return $user;
}

function validate($method, $table, $variable, $message)
{
    if ($method == 'GET') {
        $catcher = $_GET[$variable];
    }
    if ($method == 'POST') {
        $catcher = $_POST[$variable];
    }
    $conn = getConnection();
    $query = "SELECT " . $variable . " FROM " . $table . " WHERE " . $variable . " = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $catcher);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    // Output
    if ($result->num_rows > 0) {
        echo $message;
    }
}

function createUser($login, $password, $role, $email, $fName, $lName, $message)
{
    $conn = getConnection();
    $query = "INSERT INTO users (login, password, role, email, first_name, last_name) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssisss', $login, $password, $role, $email, $fName, $lName);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo $message;
}


