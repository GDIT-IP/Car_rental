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
    $user = $_SESSION['user'];
    $role = $user->getRole();
    return in_array($role, $authorized, true);
}

function isAdmin()
{
    if (!isset($_SESSION['user'])) {
        return false;
    }
    $user = $_SESSION['user'];
    $role = $user->getRole();
    return (strcasecmp($user->getRole(), 'Administrator') == 0);
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
