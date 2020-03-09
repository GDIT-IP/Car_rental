<div class="container mt-6">
    <h1>Create new account</h1>
    <form action="../check_reg.php" method="POST">
        <div class="row">
            <span class="mr-2">*</span>
            <input type="text" class="col form-control" name="login" id="login" placeholder="Enter user name"
                   onblur="checkLogin()">
            <label class="col" id="loginWarning" required=""></label>
        </div>
        <br>
        <div class="row">
            <span class="mr-2">*</span>
            <input type="password" class="col form-control" name="password" id="password" placeholder="Enter password"
                   oninput="checkPasswordLength()" required="">
            <label class="col" id="passWarning"></label>
        </div>
        <br>
        <div class="row">
            <span class="mr-2">*</span>
            <input type="password" class="col form-control" name="confirm-password" id="confirm-password"
                   placeholder="Confirm password" oninput = "checkConfirmPassword()">
            <label class="col" id="confirmPassWarning"></label>
        </div>
        <br>
        <div class="row">
               <span class="mr-2">*</span>
               <input type="email" class="col form-control" name="email" id="email" placeholder="Enter email"
                     oninput="validateValue(this)" onblur = "checkEmail(this)">
               <label class="col" id="emailWarning"></label>
        </div>
        <br>
        <input type="text" class="form-control" name="first-name" id="first-name" placeholder="Enter First name"
               oninput="validateValue(this)"><br>
        <input type="text" class="form-control" name="last-name" id="last-name" placeholder="Enter Last name"
               oninput="validateValue(this)"><br>
        <button type="submit" class="btn btn-success">Create account</button>
    </form>
    <script src="../js/validations/signup.js"></script>
</div>

