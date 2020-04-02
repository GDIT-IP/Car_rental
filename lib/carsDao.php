<?php

require_once APPLICATION_PATH . DS . 'model' . DS . 'Car.php';

function getCars()
{
    $conn = getConnection();
    $query = "SELECT
              c.id, b.brand, m.model, c.price_per_day, c.year, bd.transmission, bd.number_of_doors, c.photoLink
              FROM cars as c
              JOIN body_details as bd ON c.body_details = bd.id
              JOIN models as m ON bd.model_id = m.id
              JOIN brands as b ON m.brand_id = b.id;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $queryResult = $stmt->get_result();
    $cars = [];
    while ($row = $queryResult->fetch_assoc()) {
        $car = new Car();
        $car->setId($row['id']);
        $car->setBrand($row['brand']);
        $car->setModel($row['model']);
        $car->setYear($row['year']);
        $car->setNumberOfDoors($row['number_of_doors']);
        $car->setTransmission($row['transmission']);
        $car->setPricePerDay($row['price_per_day']);
        $car->setPhotoLink($row['photoLink']);
        $cars[] = $car;
    }
    $conn->close();
    return $cars;
}

function readCar($id) {
    $conn = getConnection();
    $query = "SELECT
              c.id, b.brand, m.model, c.price_per_day, bd.body_type, c.year, bd.transmission, bd.number_of_doors, c.photoLink
              FROM cars as c
              JOIN body_details as bd ON c.body_details = bd.id
              JOIN models as m ON bd.model_id = m.id
              JOIN brands as b ON m.brand_id = b.id
              WHERE c.id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $queryResult = $stmt->get_result();
    $car = new Car();
    while ($row = $queryResult->fetch_assoc()) {
        $car->setId($row['id']);
        $car->setBrand($row['brand']);
        $car->setModel($row['model']);
        $car->setBodyType($row['body_type']);
        $car->setPricePerDay($row['price_per_day']);
        $car->setYear($row['year']);
        $car->setTransmission($row['transmission']);
        $car->setNumberOfDoors($row['number_of_doors']);
        $car->setPhotoLink($row['photoLink']);
    }
    $conn->close();
    return $car;
}

function updateCar($car)
{
    $flag = false;

    $id = $car->getId();
    $year = $car->getYear();
    $price = $car->getPricePerDay();
    $bodyDetailId = getBodyDetailsId($car);
    $photoLink = $car->getPhotoLink();

    $conn = getConnection();
    $sql = "UPDATE cars
              SET year = ?, price_per_day = ?, body_details = ?, photoLink = ?
              WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iiisi', $year, $price, $bodyDetailId, $photoLink, $id);
    if ($stmt->execute()) {
        $flag = true;
    } else {
        echo $sql;
        $flag = "carDao updateCar($car): couldn't execute sql: " . $sql . " error: " . $conn->error;
    }
    $stmt->close();
    $conn->close();

    return $flag;
}

function createCar($car)
{
    $flag = false;

    $vehicleId = getBodyDetailsId($car);
    $year = $car->getYear();
    $price = $car->getPricePerDay();
    $photoLink = $car->getPhotoLink();

    $conn = getConnection();
    $query = "INSERT INTO cars (year, price_per_day, body_details, photoLink)
              VALUES(?, ?, ?, ?);";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iiis', $year, $price, $vehicleId, $photoLink);
    $stmt->execute();
    $conn->close();
}

function getBodyDetailsId($car)
{
    createVehicle($car);
    $id = searchVehicleId($car);
    return $id;
}

function searchVehicleId($car)
{
    $brand = $car->getBrand();
    $model = $car->getModel();
    $bodyType = $car->getBodyType();
    $transmission = $car->getTransmission();
    $numberOfDoors = $car->getNumberOfDoors();

    $conn = getConnection();
    $query = "SELECT id FROM body_details
              WHERE model_id = (SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = ?) AND model = ?)
              AND body_type = ?
              AND transmission = ?
              AND number_of_doors = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssi',
        $brand,
        $model,
        $bodyType,
        $transmission,
        $numberOfDoors);
    $stmt->execute();
    $queryResult = $stmt->get_result();
    if ($queryResult->num_rows != 0) {
        $id = $queryResult->fetch_assoc()['id'];
    }
    $conn->close();
    return $id;
}

function createVehicle($car)
{
    $flag = false;

    $brand = $car->getBrand();
    $model = $car->getModel();
    $bodyType = $car->getBodyType();
    $transmission = $car->getTransmission();
    $numberOfDoors = $car->getNumberOfDoors();

    $conn = getConnection();
    //brand, model, body type, transmission, number of doors
    $sql = "INSERT IGNORE INTO body_details (model_id, body_type, transmission, number_of_doors )
              VALUES ((SELECT id FROM models WHERE brand_id = (SELECT id FROM brands WHERE brand = ?) AND model = ?), ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi',
        $brand,
        $model,
        $bodyType,
        $transmission,
        $numberOfDoors);

    if ($stmt->execute()) {
        $flag = true;
    } else {
        echo $sql;
        $flag = "carDao createVehicle($car): couldn't execute sql: " . $sql . " error: " . $conn->error;
    }
    $stmt->close();
    $conn->close();

    return $flag;
}

function mapModels()
{
    $brands = getBrands();
    $map = [];
    $conn = getConnection();
    foreach ($brands as $brand) {
        $query = "SELECT model
                  FROM models
                  JOIN brands as b
                  ON models.brand_id = b.id
                  WHERE brand = ?;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s', $brand);
        $stmt->execute();
        $queryResult = $stmt->get_result();
        $models = [];
        while ($row = $queryResult->fetch_assoc()) {
            $models[] = $row['model'];
        }
        $map[$brand] = $models;
    }
    $conn->close();
    return $map;
}

function getBrands()
{
    $conn = getConnection();
    $query = "SELECT brand FROM brands ORDER BY brand;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $queryResult = $stmt->get_result();
    $brands = [];
    while ($row = $queryResult->fetch_assoc()) {
        $brands[] = $row['brand'];
    }
    $conn->close();
    return $brands;
}

function getBodyTypes()
{
    $conn = getConnection();
    $query = "SELECT body_type FROM body_types ORDER BY body_type;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $queryResult = $stmt->get_result();
    $bodyTypes = [];
    while ($row = $queryResult->fetch_assoc()) {
        $bodyTypes[] = $row['body_type'];
    }
    $conn->close();
    return $bodyTypes;
}

function getTransmissions()
{
    $conn = getConnection();
    $query = "SELECT transmission FROM transmissions ORDER BY transmission;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $queryResult = $stmt->get_result();
    $transmissions = [];
    while ($row = $queryResult->fetch_assoc()) {
        $transmissions[] = $row['transmission'];
    }
    $conn->close();
    return $transmissions;
}
