<table class="table mt-5">
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

<div class="row">
    <div class="col mb-4">
        <a class="btn btn-primary" href="?page=signup">Add user</a>
    </div>
</div>

<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteUserModalTitle">Delete User</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="./deleteUser.php">
                        <input type="hidden" id="userToDeleteId" name="userId" value=""/>
                        <p>Are you sure you want to delete user <b><span id="user-login"></span></b>
                            with role <b><span id="user-role"></span></b> ?</p>
                        <p>There is no undo for this</p>
                        <input type="submit" class="btn btn-danger" value="Delete"/>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">let usersPerPage = <?= $usersPerPage; ?></script>
<script type="text/javascript" src="./js/usersManagement.js"></script>
<script type="text/javascript">getUsersTable(1);</script>
