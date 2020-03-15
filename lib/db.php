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

function validate($method,$table,$variable,$message){
    if($method == 'GET'){
        $catcher = $_GET[$variable];
    }
    if($method == 'POST'){
        $catcher = $_POST[$variable];
    }
    $conn = getConnection();
    $query = "SELECT " . $variable ." FROM ". $table ." WHERE ".$variable." = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s",$catcher);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    // Output
    if ($result->num_rows > 0) {
        echo $message;
    } 
}

function setUser($login, $password, $role , $email, $fName, $lName,$message){
    $conn = getConnection();
    $query = "INSERT INTO users (login, password, role, email, first_name, last_name) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssisss', $login, $password, $role , $email, $fName, $lName);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo $message;
}

function getConnection()
{
    return new mysqli(DB_SERVER_NAME, DB_USER, DB_PASS, DB_NAME);
}
