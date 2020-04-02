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
                <button type="button" class="btn btn-outline-danger mx-3" data-id="<?= $car->getId() ?>"
                        data-toggle="modal" data-target="#deleteCarModal" onclick="">Delete</button>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="modal fade" id="deleteCarModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCarModalTitle">Delete Car</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="./deleteCar.php">
                        <input type="hidden" id="carToDeleteId" name="carId" value=""/>
                        <p>Are you sure you want to delete car <b><span id="car-id"></span></b>
                        <p>There is no undo for this</p>
                        <input type="submit" class="btn btn-danger" value="Delete"/>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="./js/carsManagement.js"></script>
