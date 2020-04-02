<div class="d-flex justify-content-center">
    <form class="col-9" method="POST" action="">
        <div class="form-group row">
            <label class="col-4" for="login">Username:</label>
            <label id="login"><?= $user->getLogin() ?></label>
        </div>
        <div class="form-group row">
            <label class="col-4" for="first-name">First name:</label>
            <input type="text" class="col-8 form-control" id="first-name" name="first-name" placeholder="<?= $user->getFirstName() ?>">
        </div>
        <div class="form-group row">
            <label class="col-4" for="last-name">Last name:</label>
            <input type="text" class="col-8 form-control" id="last-name" name="last-name" placeholder="<?= $user->getLastName() ?>">
        </div>
        <div class="form-group row">
            <label class="col-4" for="email">Email:</label>
            <input type="text" class="col-8 form-control" id="email" name="email" placeholder="<?= $user->getEmail() ?>">
        </div>
        <?php if (isAdmin()): ?>
            <div class="form-group row">
                <label class="col-4" for="role">Authority:</label>
                <select class="col-8 form-control" id="role" name="role">
                    <?php foreach ($roles as $role) {?>
                        <option value='<?= $role ?>' <?php echo ($user->getRole() == $role) ? 'selected' : '' ?>><?= $role ?></option>
                    <?php } ?>
                </select>
            </div>
            <?php if (unserialize($_SESSION['user']) != $user): ?>
                <div class="form-group row">
                    <label class="col-4 form-check-label" for="is-active">Enabled</label>
                    <select class="col-8 form-control" id="is-active" name="is-active">
                        <option value='1' <?php echo $user->getEnabled() ? 'selected' : '' ?>>Active</option>
                        <option value='0' <?php echo $user->getEnabled() ? '' : 'selected' ?>>Disabled</option>
                    </select>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <p>
                <a class="btn btn-primary float-right" data-toggle="collapse"
                   href="#changePasswordDialog" onclick="this.blur();">Change Password</a>
            </p>
        </div>
        <div class="row">
            <div class="col collapse" id="changePasswordDialog">
                <div class="form-group row">
                    <label for="currentPassword" class="col-sm-3 col-form-label">Current
                        Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="currentPassword"
                               name="currentPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="newPassword" class="col-sm-3 col-form-label">New Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="newPassword" name="newPassword">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="newPasswordConfirmation"
                           class="col-sm-3 col-form-label">Confirmation</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="newPasswordConfirmation"
                               name="newPasswordConfirmation">
                    </div>
                </div>
            </div>
        </div>
        <?php if (!empty($errors)) {
            echo '<div class="alert alert-danger">';
            foreach ($errors as $error)
                echo '<p>' . $error . '</p>';
            echo '</div>';
        } ?>
        <div>
            <input type="submit" class="btn btn-default btn-outline-primary inline float-right" value="Save">
        </div>
    </form>
</div>
