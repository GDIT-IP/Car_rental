<?php
require_once APPLICATION_PATH . DS . 'config' . DS . 'dbconfig.php';
require_once APPLICATION_PATH . DS . 'model' . DS . 'User.php';

function get($url)
{
    return isset($_REQUEST[$url]) ? $_REQUEST[$url] : 'home';
}

function isManagment()
{
    $authorized = ['Administrator', 'Staff'];
    if (!isset($_SESSION['user'])) {
        return false;
    }
    $user = unserialize($_SESSION['user']);
    $role = $user->getRole();
    return in_array($role, $authorized, true);
}

function isAdmin()
{
    if (!isset($_SESSION['user'])) {
        return false;
    }
    $user = unserialize($_SESSION['user']);
    $role = $user->getRole();
    return (strcasecmp($role, 'Administrator') == 0);
}

function createNavbarLink($text, $href = "/")
{
    $href = ($href == '/') ? $href : '/?page=' . $href;
    $link = "<a class='p-2 text-dark' href='" . $href . "'>" . $text . "</a>";
    return $link;
}

function getConnection()
{
    return new mysqli(DB_SERVER_NAME, DB_USER, DB_PASS, DB_NAME);
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

function isPostParamNotEmpty($paramName)
{
    if (!isset($_POST[$paramName]) || empty(trim($_POST[$paramName]))) {
        return false;
    }
    return true;
}
