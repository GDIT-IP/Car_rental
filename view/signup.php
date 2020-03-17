<div class="container mt-6">
    <h1>Create new account</h1>
    <form action= '' method="POST" onkeyup = "enableSubmit()">
        <div class="row">
            <span class="mr-2">*</span>
            <input type="text" class="col form-control" name="login" id="login" placeholder="Enter user name"
                   oninput="checkLogin()">
            <label class="col" id="loginWarning" required=""></label>
        </div>
        <br>
        <div class="row">
            <span class="mr-2">*</span>
            <input type="password" class="col form-control" name="password" id="password" placeholder="Enter password"
                   oninput="checkPassword()" required="">
            <label class="col" id="passWarning"></label>
        </div>
        <br>
        <div class="row">
            <span class="mr-2">*</span>
            <input type="password" class="col form-control" name="confirm-password" id="confirm-password"
                   placeholder="Confirm password" oninput = "checkConfirmPassword()">
            <label class="col" id="confirmPassWarning"></label>
        </div>
        <?php if(isAdmin()):?>
              <br>
              <div class = "row">
               <span class="mr-2">*</span>
               <select class="col form-control" id="role">
                     <option value = "1">Administrator</option>
                     <option value = "2" >Staff</option>
                     <option value = "3" selected>Customer</option>
              </select>
        </div>
        <?php endif; ?>
        <br>
        <div class="row">
               <span class="mr-2">*</span>
               <input type="email" class="col form-control" name="email" id="email" placeholder="Enter email"
                     oninput="checkEmail();">
               <label class="col" id="emailWarning"></label>
        </div>
        <br>
        <div class = "row">
               <span class="mr-2">*</span>
               <input type="text" class="col form-control" name="first-name" id="first-name" placeholder="Enter First name"
                      oninput="validateValue(this)" onclick="validateValue(this)">
        </div>
        <br>
        <div class = "row">
               <span class="mr-2">*</span>
               <input type="text" class="col form-control" name="last-name" id="last-name" placeholder="Enter Last name"
                      oninput="validateValue(this)" onclick="validateValue(this)">
        </div>
        <br>
               <label class = "col" id = "serverWarning"></label>
        <br>
        <button type="button" class="btn btn-success" id = "submit" onclick = "serverSubmit()">Create account</button>
    </form>
    <script src="../js/validations/signup.js"></script>
    <script src="../js/validations/ajax.js"></script>
</div>

