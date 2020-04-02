<?php 

const DS = DIRECTORY_SEPARATOR;
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . "."));
require_once APPLICATION_PATH . DS . 'config' . DS . 'config.php';
require_once ".". DS . 'config' . DS . 'dbconfig.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = $email = $password = '';
  if(isset($_POST['login'])){
    $login = $_POST['login'];
    if (getEmail($login) != ''){
      $email = getEmail($login);
      // echo $email;
      $password = getPassword($login);
      // echo $password;
      try {
        //Server settings
        // $mail->SMTPDebug = 1;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'a2i.chinchilla.mailer@gmail.com';                     // SMTP username
        $mail->Password   = 'a2i_chinchilla';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('a2i.chinchilla.mailer@gmail.com', 'Mailer');
        $mail->addAddress($email, 'Dear User');     // Add a recipient
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Forgot Password';
        $mail->Body    = 'Dear user, your password is ' . $password;
    
        $mail->send();
        echo 'Message has been sent';
      } catch (Exception $e) {
        echo 'In this moment we have have server problems and the message could not be sent';
      }
    } else {
      echo 'This login does not exist';
    }
  }
}