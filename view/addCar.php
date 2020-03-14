<div class="container">
    <form action="" method="POST" class="col-10" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col">
                <label for="brand">Brand</label>
                <select id="brand" name="brand" class="form-control">
                </select>
            </div>
            <div class="form-group col">
                <label for="model">Model</label>
                <select id="model" name="model" class="form-control">
                </select>
            </div>
            <div class="form-group col-3">
                <label for="year">Year</label>
                <input type="text" class="form-control" id="year" name="year" placeholder="Year">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="body">Body</label>
                <select id="body" name="body" class="form-control">
                    <?php foreach ($bodyTypes as $bodyType): ?>
                        <option><?= $bodyType ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col">
                <label for="transmission">Transmission</label>
                <select id="transmission" name="transmission" class="form-control">
                    <?php foreach ($transmissions as $transmission): ?>
                        <option><?= $transmission ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-3">
                <label for="doors">Number of doors</label>
                <input type="text" class="form-control" id="doors" name="doors" placeholder="Number of doors">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="photo">Photo</label>
                <input type="text" class="form-control" id="photo" name="photo" placeholder="Insert picture link">
            </div>
            <div class="form-group col-sm-4">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="$/day">
            </div>
        </div>
        <button class="btn btn-primary float-right" type="submit">Create</button>
    </form>
</div>

<script type="text/javascript">let modelsJson = <?= $modelsJson; ?></script>
<script src="js/addCar.js"></script>
