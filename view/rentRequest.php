<div class="d-flex justify-content-center">
    <form class="col-9" method="POST" action="">
        <div class="row">
            <div class="col mx-3">
                <div class="form-group row d-flex justify-content-center">
                    <div class="photo"
                         style="height: 20em; background-size: contain; background-image: url(<?= $car->getPhotoLink() ?>);"></div>
                </div>

            </div>
            <div class="col mx-3">
                <div class="form-group row">
                    <h2><?= $car->getBrand() ?> <?= $car->getModel() ?></h2>
                </div>
                <hr class="row mr-n5">
                <div class="form-group row">
                    <h4><?= $car->getBodyType() ?></h4>
                </div>
                <div class="form-group row">
                    <h4><?= $car->getYear() ?> year</h4>
                </div>
                <div class="form-group row">
                    <h4>Transmission: <?= $car->getTransmission() ?></h4>
                </div>
                <div class="form-group row">
                    <h4><?= $car->getNumberOfDoors() ?> doors</h4>
                </div>
                <div class="form-group row">
                    <h4>$<?= $car->getPricePerDay() ?> per day </h4>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row mr-1">
                            <span class="form-label">From</span>
                            <input name="fromDate" class="form-control" type="date" required="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row ml-1">
                            <span class="form-label">To</span>
                            <input name="tillDate" class="form-control" type="date" required="">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <input type="submit" class="btn btn btn-success" name="requestBooking" value="Request booking">
                </div>
            </div>
        </div>
    </form>
</div>

