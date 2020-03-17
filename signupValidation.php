<?php 

const DS = DIRECTORY_SEPARATOR;
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . "."));
require_once APPLICATION_PATH . DS . 'config' . DS . 'config.php';
require_once ".". DS . 'config' . DS . 'dbconfig.php';


if(isset($_GET['login'])&& $_GET['login']!=''){
    validate('GET','users','login','this user name is being in used');
}

if(isset($_GET['email']) && $_GET['email']!=''){
    validate('GET','users','email','this email is being in used');
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = $password = $confirmPassword = $email = $fName = $lName = '';
    $loginErr = $passErr = $conPassErr = $emailErr = $fNameErr = $lNameErr = '';
    $role = 3;

    if(empty($_POST["login"])){
        echo $loginErr = "User name is required
        ";
    } else {
        $login =  $_POST["login"];
        validate('POST','users','login','This user name is being in used
        ');
    }
    if(empty($_POST["password"])){
        echo $passErr = "Password is required
        ";
    } else {
        $password = $_POST['password'];
        if(strlen($password)<6){
            echo $passErr = "6 character are required in your password
            ";
        }
    }
    if(empty($_POST["confirmPassword"])){
        echo $conPassErr = "Confirm password is incorrect
        ";
    } else {
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        if($password != $confirmPassword){
            echo $conPassErr = "The confirm password must coincide with password.
            ";
        }
    }
    if(!empty($_POST["role"])){
        $role = $_POST["role"];
    }
    if(empty($_POST["email"])){
        echo $emailErr = "Email is required
        ";
    } else {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo $emailErr = "Invalid email format
            ";
        }
        validate('POST','users','email','This email is being used
        ');
    }
    if(empty($_POST["fName"])){
        echo $fNameErr = "First name is required
        ";
    } else {
        $fName = $_POST['fName'];
        if(!preg_match("/^[a-zA-Z ]*$/",$fName)){
            echo $fNameErr = "Only letters and white space allowed
            ";
        }
    }
    if(empty($_POST["lName"])){
        echo $lNameErr = "Last name is required";
    } else {
        $lName = $_POST['lName'];
        if(!preg_match("/^[a-zA-Z ]*$/",$lName)){
            echo $lNameErr = "Only letters and white space allowed
            ";
        }
    }
    // DB INSER INTO
    if(empty($loginErr) && empty($passErr) && empty($conPassErr) && empty($emailErr) 
        && empty($lNameErr) && empty($fNameErr)){
        createUser($login, $password, $role , $email, $fName, $lName,'You have created your account succesfully');
    }
}
?>