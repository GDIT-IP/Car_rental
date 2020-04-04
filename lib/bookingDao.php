<?php

require_once APPLICATION_PATH . DS . 'model' . DS . 'User.php';
require_once APPLICATION_PATH . DS . 'model' . DS . 'Car.php';

function addBooking($customerId, $carId, $from, $to)
{
    $sql = "INSERT INTO booking (customer_id, car_id, rent_start_time, rent_end_time)
            VALUES (?, ?, ?, ?)";
    $conn = getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iiss', $customerId, $carId, $from, $to);
    if (!$stmt->execute()) {
        echo "bookingDao addBooking(): couldn't execute sql: " . $sql . " error: " . $conn->error;
    }
    $conn->close();
}

function listBookings()
{
    $conn = getConnection();
    $query = "SELECT *
              FROM booking
              ORDER BY rent_start_time DESC";
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

function consider($customerId, $carId, $from, $is_approved)
{
    $sql = "UPDATE booking SET is_approved = ?
            WHERE customer_id = ? AND car_id = ? AND rent_start_time = ?";
    $conn = getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iiis', $is_approved, $customerId, $carId, $from);
    if (!$stmt->execute()) {
        echo "bookingDao addBooking(): couldn't execute sql: " . $sql . " error: " . $conn->error;
    }
    $conn->close();
}
