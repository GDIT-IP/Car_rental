<div class="container-fluid my-container">
    <div class="d-flex justify-content-center">
        <form class="col-md-7 col-lg-4" action="" method="post">
            <input type="text" id="login" name="login" class="form-control mb-2" placeholder="Enter user name"
                   autofocus="">
            <input type="password" id="password" name="password" class="form-control mb-2" placeholder="Enter password">
            <a href = "" data-toggle="modal" data-target="#forgotPasswordModal">Forgot password?</a>
            <div class="captcha-box">
                <div class="g-recaptcha" data-sitekey="6LebCeYUAAAAAIh4PVfdcc0ZrmuIgQm-OYQFHT9L"></div>
            </div>
            <input class="btn btn-lg btn-primary btn-block my-3" type="submit" value="Sign In">
            <div class="container" id="sign-up-container">
                <a href="?page=signup" id="sign-up">Sign Up</a>
            </div>
        </form>
    </div>
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Forgot password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="forgotPasswordLogin" class="form-control mb-2" placeholder="Enter user name"
                    autofocus="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="forgotPassword()">Recover password</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Captcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="./js/login.js"></script>
</div>
