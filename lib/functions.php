<?php
require_once APPLICATION_PATH . DS . 'config' . DS . 'dbconfig.php';
require_once APPLICATION_PATH . DS . 'model' . DS . 'User.php';

function get($url)
{
    return isset($_REQUEST[$url]) ? $_REQUEST[$url] : 'home';
}

function isUserAuthorized()
{
    $authorized = ['Administrator', 'Staff'];
    if (!isset($_SESSION['user'])) {
        return false;
    }
    $user = $_SESSION['user'];
    $role = $user->getRole();
    return in_array($role, $authorized, true);
}

function getUser($login, $password)
{
    $conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASS, DB_NAME);
    $query = "SELECT u.id, u.login, r.role 
                FROM users as u 
                JOIN roles as r
                WHERE login = ? and password = ? and u.role = r.id";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $login, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    $conn->close();
    return $result;
}

function getUsersData()
{
    $conn = new mysqli(DB_SERVER_NAME, DB_USER, DB_PASS, DB_NAME);
    $query = "SELECT u.id, u.login, r.role
                FROM users as u
                JOIN roles as r
                WHERE u.role = r.id
                ORDER BY u.id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $conn->close();
    $users = [];
    while ($row = $result->fetch_assoc()) {
        $user = new User();
        $user->setId($row['id']);
        $user->setLogin($row['login']);
        $user->setRole($row['role']);
        $users[] = $user;
    }
    return $users;
}

function createNavbarLink($text, $href = "/")
{
    $href = ($href == '/') ? $href : '/?page=' . $href;
    $link = "<a class='p-2 text-dark' href='" . $href . "'>" . $text . "</a>";
    return $link;
}

function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
