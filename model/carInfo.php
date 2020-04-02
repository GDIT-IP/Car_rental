<?php

if (!isManagment()) {
    header("location: ./");
}

$car = null;
$currentLocation = $_SERVER['REQUEST_URI'];
if (isset($_GET['id']) && trim($_GET['id'])) {
    $id = $_GET['id'];
}

$bodyTypes = getBodyTypes();
$transmissions = getTransmissions();
$modelsMap = mapModels();
$modelsJson = json_encode($modelsMap);
$car = readCar($id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $car->getId();
    $brand = empty(trim($_POST['brand'])) ? $car->getBrand() : trim($_POST['brand']);
    $model = empty(trim($_POST['model'])) ?  $car->getModel() : trim($_POST['model']);
    $year = empty(trim($_POST['year'])) ?  $car->getYear() : intval(trim($_POST['year']));
    $bodyType = empty(trim($_POST['bodyType'])) ?  $car->getBodyType() : trim($_POST['bodyType']);
    $numberOfDoors = empty(trim($_POST['numberOfDoors'])) ?  $car->getNumberOfDoors() : intval(trim($_POST['numberOfDoors']));
    $transmission = empty(trim($_POST['transmission'])) ?  $car->getTransmission() : trim($_POST['transmission']);
    $pricePerDay = empty(trim($_POST['pricePerDay'])) ?  $car->getPricePerDay() : trim($_POST['pricePerDay']);
    $photoLink = empty(trim($_POST['photoLink'])) ?  $car->getPhotoLink() : trim($_POST['photoLink']);

    // Set new data
    $updatedCar = new Car();
    $updatedCar->setId($id);
    $updatedCar->setBrand($brand);
    $updatedCar->setModel($model);
    $updatedCar->setYear($year);
    $updatedCar->setBodyType($bodyType);
    $updatedCar->setNumberOfDoors($numberOfDoors);
    $updatedCar->setTransmission($transmission);
    $updatedCar->setPricePerDay($pricePerDay);
    $updatedCar->setPhotoLink($photoLink);

    echo updateCar($updatedCar);

    header("location: " . $currentLocation);
    exit;
}
