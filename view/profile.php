<div class="d-flex justify-content-center">
    <form>
        <div class="form-group row">
            <label class="col-4" for="login">Username:</label>
            <label id="login"><?= $user->getLogin() ?></label>
        </div>
        <div class="form-group row">
            <label class="col-4" for="first-name">First name:</label>
            <input type="text" class="col-8 form-control" id="first-name" placeholder="<?= $user->getFirstName() ?>">
        </div>
        <div class="form-group row">
            <label class="col-4" for="last-name">Last name:</label>
            <input type="text" class="col-8 form-control" id="last-name" placeholder="<?= $user->getLastName() ?>">
        </div>
        <div class="form-group row">
            <label class="col-4" for="email">Email:</label>
            <input type="text" class="col-8 form-control" id="email" placeholder="<?= $user->getEmail() ?>">
        </div>
        <?php if (isAdmin()): ?>
            <div class="form-group row">
                <label class="col-4" for="login">Authority:</label>
                <input type="text" class="col-8 form-control" id="login" placeholder="<?= $user->getRole() ?>">
            </div>
            <?php if ($_SESSION['user'] != $user): ?>
                <div class="form-group row">
                    <label class="col-4 form-check-label" for="exampleCheck1">Enabled</label>
                    <select class="col-8 form-control" id="exampleCheck1">
                        <option value='true' <?php echo $user->getEnabled() ? 'selected' : '' ?>>Active</option>
                        <option value='false' <?php echo $user->getEnabled() ? '' : 'selected' ?>>Disabled</option>
                    </select>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </form>
</div>
