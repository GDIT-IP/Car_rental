<!-- Cars -->
<div class="container mt-5">
    <h3 class="mb-5">Our cars</h3>
    <div class="row">

        <div class="d-flex flex-wrap">
            <?php
            for ($i = 0; $i < 8; $i++):
                ?>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">$year $brand $model</h4>
                    </div>
                    <img class="img-fluid" src="img/car_<?php echo($i + 1) ?>.jpg" alt="">
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$price <small class="text-muted">/ day</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>10 users included</li>
                            <li>2 GB of storage</li>
                            <li>Email support</li>
                            <li>Help center access</li>
                        </ul>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
