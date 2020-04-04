<!-- Cars -->
<div class="container mt-5">
    <h3 class="mb-5">Our cars</h3>
    <div class="">

        <div class="d-flex flex-wrap">
            <?php
            foreach ($cars as $car):
                ?>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal"><?php echo $car->getBrand() . " " . $car->getModel(); ?></h4>
                    </div>
                    <div class="photo" style="background-image: url(<?= $car->getPhotoLink() ?>);"></div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$<?= $car->getPricePerDay() ?><small
                                    class="text-muted">/day</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Year: <?= $car->getYear() ?></li>
                            <li>Transmission: <?= $car->getTransmission() ?></li>
                        </ul>
                        <div class="row d-flex justify-content-center">
                            <div class="btn-group col-6">
                                <?php if ($car->getIsAvailable()): ?>
                                    <a type="button" class="btn btn-sm btn-success"
                                       href="?page=rentRequest&id=<?= $car->getId() ?>">Rent</a>
                                <?php else: ?>
                                    <a type="button" class="btn btn-sm btn-outline-secondary"
                                       href="?page=rentRequest&id=<?= $car->getId() ?>">View Info</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
