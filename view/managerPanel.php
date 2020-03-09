<div class="row">
    <!-- Menu -->
    <div class="col-sm-2 col-lg-1">
        <div class="nav flex-column nav-pills" id="v-pills-tab">
            <?php if (strcasecmp($currentUser->getRole(), 'Administrator') == 0): ?>
                <a class="nav-link active" id="users-tab" data-toggle="pill" href="#users-content">Users</a>
            <?php endif; ?>
            <a class="nav-link <?= $isCarsActive ?> " id="cars-tab" data-toggle="pill" href="#cars-content">Cars</a>
            <a class="nav-link" id="requests-tab" data-toggle="pill" href="#requests-content">Requests</a>
            <a class="nav-link" id="reports-tab" data-toggle="pill" href="#reports-content">Reports</a>
        </div>
    </div>
    <!-- Content -->
    <div class="col-sm-9 col-lg-10">
        <div class="tab-content" id="v-pills-tabContent">
            <?php if (strcasecmp($currentUser->getRole(), 'Administrator') == 0): ?>
                <div class="tab-pane fade show active container" id="users-content">
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
                </div>
            <?php endif; ?>
            <div class="tab-pane fade <?= $carsTabClasses ?> container" id="cars-content">
                Cars
            </div>
            <div class="tab-pane fade container" id="requests-content">
                Requests
            </div>
            <div class="tab-pane fade container" id="reports-content">
                Reports
            </div>
        </div>
    </div>
</div>
