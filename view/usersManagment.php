<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Login</th>
        <th scope="col">Role</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <th scope="row"><?= $user->getId() ?></th>
            <td><?= $user->getLogin() ?></td>
            <td><?= $user->getRole() ?></td>
            <td>
                <a class="btn btn-outline-success" href="/?page=profile&id=<?= $user->getId() ?>">Edit</a>
                <a class="btn btn-outline-danger" href="#">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
