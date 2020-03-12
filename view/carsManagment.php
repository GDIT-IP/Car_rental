<div class="row">
    <div class="col mb-4">
        <a class="btn btn-primary" href="?page=addCar">Add car</a>
    </div>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Brand</th>
        <th scope="col">Model</th>
        <th scope="col">Price</th>
        <th scope="col">Year</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($cars as $car): ?>
        <tr>
            <th scope="row"><?= $car->getId() ?></th>
            <td><?= $car->getBrand() ?></td>
            <td><?= $car->getModel() ?></td>
            <td><?= $car->getPricePerDay() ?></td>
            <td><?= $car->getYear() ?></td>
            <td>
                <a class="btn btn-outline-success" href="/?page=carInfo&id=<?= $car->getId() ?>">Edit</a>
                <a class="btn btn-outline-danger" href="#">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>