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

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
