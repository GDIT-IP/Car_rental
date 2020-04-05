<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail = new PHPMailer(true);
$mailer = getMailer();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $lname = $email = $msg = '';
  if(isset($_POST['fname'])){
    $fname = $_POST['fname'];
  }
  if(isset($_POST['lname'])){
    $lname = $_POST['lname'];
  }
  if(isset($_POST['email'])){
    $email = $_POST['email'];
  }
  if(isset($_POST['msg'])){
    $msg = $_POST['msg'];
  }
  try {
    //Server settings
    // $mail->SMTPDebug = 1;                            // Enable verbose debug output
    $mail->isSMTP();                                    // Send using SMTP
    $mail->Host       = $mailer->smtpHost;              // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                           // Enable SMTP authentication
    $mail->Username   = $mailer->smtpUsername;          // SMTP username
    $mail->Password   = $mailer->smtpPassword;;         // SMTP password
    $mail->SMTPSecure = 'tls';                          // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                            // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($mailer->smtpUsername, 'Enquiry or feedbacks');
    $mail->addAddress($mailer->smtpUsername, 'Enquiry or feedbacks');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Enquiry or feedback';
    $mail->Body    = 'The user '. $fname . ' ' . $lname . ' with email address '. $email . ' has sent this message: ' . $msg;

    $mail->send();
    echo '<script>window.alert("Message has been sent")</script>';
  } catch (Exception $e) {
    echo 'window.alert("In this moment we have have server problems and the message could not be sent")</script>';
  }
}