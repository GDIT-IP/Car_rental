<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if (isManagment()) {
    $currentUser = unserialize($_SESSION['user']);
} else {
    header('location: /');
}

/**
 * usersManagement
 */

$usersAmount = countUsers();
$usersPerPage = 10;
$pagesAmount = intdiv($usersAmount, $usersPerPage) + (($usersAmount % $usersPerPage > 0) ? 1 : 0);

/**
 * carsManagement
 */

$cars = listCars();

$isCarsActive = '';
$carsTabClasses = '';
if (!isAdmin()) {
    $isCarsActive = 'active';
    $carsTabClasses = 'show active';
}

/**
 * requests
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerId = $_POST['customer_id'];
    $carId = $_POST['car_id'];

    if (isset($_POST['approve'])) {
        $is_approved = true;
    } else if (isset($_POST['reject'])) {
        $is_approved = false;
    }
    consider($customerId, $carId, $_POST['rent_start_time'], $is_approved);
    try {
        $customer = readUser($customerId);
        $car = readCar($carId);

        $mail = new PHPMailer(true);
        $mailer = getMailer();
        // Server settings
        // $mail->SMTPDebug = 1;                          // Enable verbose debug output
        $mail->isSMTP();                                  // Send using SMTP
        $mail->Host       = $mailer->smtpHost;            // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                         // Enable SMTP authentication
        $mail->Username   = $mailer->smtpUsername;        // SMTP username
        $mail->Password   = $mailer->smtpPassword;;       // SMTP password
        $mail->SMTPSecure = 'tls';                        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = $mailer->smtpPort;            // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        // Recipients
        $mail->setFrom($mailer->smtpUsername, 'Booking');
        $mail->addAddress($customer->getEmail(), 'Booking');     // Add a recipient

        // Content
        $mail->isHTML(true);                                    // Set email format to HTML
        $mail->Subject = 'Enquiry or feedback';
        $mail->Body    = createMessage($car, $is_approved);

        $mail->send();
        echo '<script>window.alert("Message has been sent")</script>';
    } catch (Exception $e) {
        echo 'window.alert("In this moment we have have server problems and the message could not be sent")</script>';
    }
}

function createMessage($car, $is_approved) {
    $msg = "Dear customer.<br>";
    if ($is_approved){
        $msg .= "We are happy to inform you, that your booking for<br>";
        $msg .= $car->getBrand() . " " . $car->getModel() . " " . $car->getYear() . " year.<br>";
        $msg .= "Has been approved.";
    } else {
        $msg .= "We regret to inform you, that your booking for<br>";
        $msg .= $car->getBrand() . " " . $car->getModel() . " " . $car->getYear() . " year.<br>";
        $msg .= "Has been rejected.";
    }
    return $msg;
}

$bookingRequests = listBookings();
