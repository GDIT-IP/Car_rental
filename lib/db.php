<?php
require_once APPLICATION_PATH . DS . 'config' . DS . 'dbconfig.php';
require_once APPLICATION_PATH . DS . 'model' . DS . 'Mailer.php';

function getRoles() {
    $conn = getConnection();
    $query = "SELECT * FROM roles ORDER BY id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $queryResult = $stmt->get_result();
    $roles = array();
    while ($row = $queryResult->fetch_assoc()) {
        $roles[$row['id']] = $row['role'];
    }
    $conn->close();
    return $roles;
};

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

function getEmail($login)
{
    $conn = getConnection();
    $query = "SELECT email FROM users WHERE login = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $email = '';
    while ($row = $result->fetch_assoc()) {
        $email = $row['email'];
    }
    $stmt->close();
    $conn->close();
    // Output
    if ($email != '') {
        return $email;
    }
}

function getPassword($login)
{
    $conn = getConnection();
    $query = "SELECT " . 'password' . " FROM " . 'users' . " WHERE " . 'login' . " = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $password = '';
    while ($row = $result->fetch_assoc()) {
        $password = $row['password'];
    }
    $stmt->close();
    $conn->close();
    // Output
    if ($result->num_rows > 0) {
        return $password;
    }
}

function getMailer(){
    $sql = "select * from mailer limit 1;";
    $con = getConnection();
    if($result = $con->query($sql)) {
        if($row = $result->fetch_array()) {
            $mailer = new Mailer();
            $mailer->smtpHost = $row['host'];
            $mailer->smtpUsername = $row['username'];
            $mailer->smtpPassword = $row['password'];
            $mailer->smtpPort = $row['port'];
            $mailer->smtpMask = $row['maskname'];
        }
    } else {
        echo "MailerDao getCredentials(): couldn't execute sql: " . $sql . " error: " . $con->error;
    }
    $con->close();
    return $mailer;
}