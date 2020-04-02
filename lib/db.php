<?php
require_once APPLICATION_PATH . DS . 'config' . DS . 'dbconfig.php';


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
