<div class="d-flex justify-content-center">
    <form class="col-9" method="POST" action="">
        <div class="form-group row d-flex justify-content-center">
            <div class="photo"
                 style="height: 20em; background-size: contain; background-image: url(<?= $car->getPhotoLink() ?>);"></div>
        </div>
        <div class="form-group row">
            <label class="col-4" for="id">Car ID:</label>
            <label id="id"><?= $car->getId() ?></label>
        </div>
        <div class="form-group row">
            <label class="col-4" for="brand">Brand:</label>
            <input type="text" class="col-8 form-control" id="brand" name="brand" placeholder="<?= $car->getBrand() ?>">
        </div>
        <div class="form-group row">
            <label class="col-4" for="model">Model:</label>
            <input type="text" class="col-8 form-control" id="model" name="model" placeholder="<?= $car->getModel() ?>">
        </div>
        <div class="form-group row">
            <label class="col-4" for="bodyType">Body type:</label>
            <select class="col-8 form-control" id="bodyType" name="bodyType">
                <?php foreach ($bodyTypes as $bodyType) : ?>
                    <option value='<?= $bodyType ?>' <?php echo ($car->getBodyType() == $bodyType) ? 'selected' : '' ?>><?= $bodyType ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group row">
            <label class="col-4" for="year">Year:</label>
            <input type="text" class="col-8 form-control" id="year" name="year" placeholder="<?= $car->getYear() ?>">
        </div>
        <div class="form-group row">
            <label class="col-4" for="numberOfDoors">Number of doors:</label>
            <input type="text" class="col-8 form-control" id="numberOfDoors" name="numberOfDoors"
                   placeholder="<?= $car->getNumberOfDoors() ?>">
        </div>
        <div class="form-group row">
            <label class="col-4" for="transmission">Transmission:</label>
            <select class="col-8 form-control" id="transmission" name="transmission">
                <?php foreach ($transmissions as $transmission) : ?>
                    <option value='<?= $transmission ?>' <?php echo ($car->getTransmission() == $transmission) ? 'selected' : '' ?>><?= $transmission ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group row">
            <label class="col-4" for="pricePerDay">Price per day:</label>
            <input type="text" class="col-8 form-control" id="pricePerDay" name="pricePerDay"
                   placeholder="<?= $car->getPricePerDay() ?>">
        </div>
        <div class="form-group row">
            <label class="col-4" for="photoLink">Photo link:</label>
            <input type="text" class="col-8 form-control" id="photoLink" name="photoLink"
                   placeholder="<?= $car->getPhotoLink() ?>">
        </div>
        <?php if (!empty($errors)) {
            echo '<div class="alert alert-danger">';
            foreach ($errors as $error)
                echo '<p>' . $error . '</p>';
            echo '</div>';
        } ?>
        <div>
            <input type="submit" class="btn btn-default btn-outline-primary inline float-right" value="Save">
        </div>
    </form>
</div>

<script type="text/javascript">let modelsJson = <?= $modelsJson; ?></script>
<script src="js/addCar.js"></script>
