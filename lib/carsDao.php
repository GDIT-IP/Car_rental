<?php

require_once APPLICATION_PATH . DS . 'model' . DS . 'Car.php';

function getCars()
{
    $conn = getConnection();
    $query = "SELECT
              c.id, b.brand, m.model, c.price_per_day, c.year, vd.transmission, vd.number_of_doors, c.photoLink
              FROM cars as c
              JOIN vehicle_details as vd ON c.vehicle_details = vd.id
              JOIN models as m ON vd.model = m.id
              JOIN brands as b ON vd.brand = b.id;";
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

function updateCar($car)
{
    $conn = getConnection();
    $query = "UPDATE ";
    $conn->close();
}

function createCar($car)
{
    $vehicleId = getVehicleId($car);
    $year = $car->getYear();
    $price = $car->getPricePerDay();
    $photoLink = $car->getPhotoLink();

    $conn = getConnection();
    $query = "INSERT INTO cars (year, price_per_day, vehicle_details, photoLink)
              VALUES(?, ?, ?, ?);";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('iiis', $year, $price, $vehicleId, $photoLink);
    $stmt->execute();
    $conn->close();
}

function getVehicleId($car)
{
    $id = searchVehicleId($car);
    if (!$id) {
        createVehicle($car);
        $id = searchVehicleId($car);
    }
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
    $query = "SELECT id FROM vehicle_details
              WHERE brand = (SELECT id FROM brands WHERE brand = ?)
              AND model = (SELECT id FROM models WHERE model = ?)
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
        return $queryResult->fetch_assoc()['id'];
    }
    $conn->close();
}

function createVehicle($car)
{
    $brand = $car->getBrand();
    $model = $car->getModel();
    $bodyType = $car->getBodyType();
    $transmission = $car->getTransmission();
    $numberOfDoors = $car->getNumberOfDoors();

    $conn = getConnection();
    //brand, model, body type, transmission, number of doors
    $query = "INSERT INTO vehicle_details (brand, model, body_type, transmission, number_of_doors)
              VALUES (
                      (SELECT id FROM brands WHERE brand = ?),
                      (SELECT id FROM models WHERE model = ?),
                      ?, ?, ?);";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssssi',
        $brand,
        $model,
        $bodyType,
        $transmission,
        $numberOfDoors);
    $stmt->execute();
    $conn->close();
}

function mapModels()
{
    $brands = getBrands();
    $map = [];
    $conn = getConnection();
    foreach ($brands as $brand) {
        $query = "SELECT model
                  FROM models
                  JOIN brands
                  ON models.brand_id = brands.id
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
