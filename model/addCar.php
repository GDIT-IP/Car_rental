<?php

$modelsMap = mapModels();
$modelsJson = json_encode($modelsMap);
$bodyTypes = getBodyTypes();
$transmissions = getTransmissions();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $requiredParameters = ['brand', 'model', 'year', 'body', 'transmission', 'doors', 'price', 'photo'];
    $isCarCorrect = true;
    foreach ($requiredParameters as $param) {
        $isCarCorrect = isPostParamNotEmpty($param);
        if (!$isCarCorrect) {
            break;
        }
    }
    
    if ($isCarCorrect) {
        $car = new Car();
        $car->setBrand($_POST['brand']);
        $car->setModel($_POST['model']);
        $car->setYear($_POST['year']);
        $car->setBodyType($_POST['body']);
        $car->setTransmission($_POST['transmission']);
        $car->setNumberOfDoors($_POST['doors']);
        $car->setPricePerDay($_POST['price']);
        $car->setPhotoLink($_POST['photo']);

        createCar($car);
    }
}
