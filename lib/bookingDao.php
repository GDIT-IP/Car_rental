<?php

require_once APPLICATION_PATH . DS . 'model' . DS . 'User.php';
require_once APPLICATION_PATH . DS . 'model' . DS . 'Car.php';

function addBooking($customerId, $carId, $from, $to){
    $is_approved = false;


    $sql = "INSERT INTO booking (customer_id, car_id, rent_start_time, rent_end_time, is_approved)
            VALUES (?, ?, ?, ?, ?)";
    $conn = getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iissi', $customerId, $carId, $from, $to, $is_approved);
    if (!$stmt->execute()){
        echo "bookingDao addBooking(): couldn't execute sql: " . $sql . " error: " . $conn->error;
    }
    $conn->close();
}

function listBookings(){
    $conn = getConnection();
    $query = "SELECT *
              FROM booking";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $queryResult = $stmt->get_result();
    $bookRequests = [];
    while ($row = $queryResult->fetch_assoc()) {
        $booking = [];
        $booking['customer_id'] = $row['customer_id'];
        $booking['car_id'] = $row['car_id'];
        $booking['rent_start_time'] = $row['rent_start_time'];
        $booking['rent_end_time'] = $row['rent_end_time'];
        $booking['is_approved'] = $row['is_approved'];
        $bookRequests[] = $booking;
    }
    $conn->close();
    return $bookRequests;
}