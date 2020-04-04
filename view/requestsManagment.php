<table class="table mt-5">
    <thead>
    <tr>
        <th scope="col">Customer Id</th>
        <th scope="col">Car id</th>
        <th scope="col">From</th>
        <th scope="col">To</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($bookingRequests as $request): ?>
        <tr>
            <td><?= $request['customer_id'] ?></td>
            <td><?= $request['car_id'] ?></td>
            <td><?= $request['rent_start_time'] ?></td>
            <td><?= $request['rent_end_time'] ?></td>
            <td>
                <?php if (!isset($request['is_approved'])): ?>
                    <form method="POST" action="">
                        <input type="hidden" id="carToDeleteId" name="customer_id"
                               value="<?= $request['customer_id'] ?>"/>
                        <input type="hidden" id="carToDeleteId" name="car_id" value="<?= $request['car_id'] ?>"/>
                        <input type="hidden" id="carToDeleteId" name="rent_start_time"
                               value="<?= $request['rent_start_time'] ?>"/>
                        <input type="submit" name="approve" class="btn btn-outline-success" value="Approve"/>
                        <input type="submit" name="reject" class="btn btn-outline-danger" value="Reject"/>
                    </form>
                <?php else: ?>
                    <?= $request['is_approved'] ? "Approved" : "Rejected" ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
