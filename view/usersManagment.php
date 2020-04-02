<div class="row">
    <div class="col mb-4">
        <a class="btn btn-primary" href="?page=signup">Add user</a>
    </div>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Login</th>
        <th scope="col">Role</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody id="usersList">
    </tbody>
</table>


<?php if ($pagesAmount > 1) { ?>
    <nav>
        <ul class="pagination pagination-sm justify-content-center">
            <?php for ($i = 1; $i <= $pagesAmount; $i++) {
                echo '<li class="page-item" ><button class="page-link" onclick="getUsersTable(' . $i . ')">' . $i . '</button ></li>';
            } ?>
        </ul>
    </nav>
<?php } ?>

<script type="text/javascript">let usersPerPage = <?= $usersPerPage; ?></script>
<script type="text/javascript" src="./js/usersManagement.js"></script>
<script type="text/javascript">getUsersTable(1);</script>