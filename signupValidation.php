<?php 

const DS = DIRECTORY_SEPARATOR;
require_once ".". DS . 'config' . DS . 'dbconfig.php';

if(isset($_GET['login'])&& $_GET['login']!=''){
    // Getting the login that is in the input
    $login = $_GET['login'];
    // Connecting to DB
    $conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASS, DB_NAME);
    // Error msg
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Stmt
    $stmt = $conn->prepare("SELECT login FROM users WHERE login = ?");
    $stmt->bind_param("s", $login);
    // Set parameters and execute
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    // Output
    if ($result->num_rows > 0) {
        echo "This user name is being used";
    } 
}

if(isset($_GET['email']) && $_GET['email']!=''){
    // Getting the email that is in the input
    $email = $_GET['email'];
    // Connecting to DB
    $conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASS, DB_NAME);
    // Error msg
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Stmt
    $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    // Set parameters and execute
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    // Output
    if ($result->num_rows > 0) {
        echo "This email is being used";
    } 
}
?>