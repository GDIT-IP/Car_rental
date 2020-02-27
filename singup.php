<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Car rental</title>
    <!-- Custom styles -->
    <link href="css/registration.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container mt-6">
    <h1>Create new account</h1>
    <form action="check_reg.php" method="POST">
        <div class="row">
            <span class="mr-2">*</span>
            <input type="text" class="col form-control" name="login" id="login" placeholder="Enter login"
                   onfocusout="checkLogin()">
            <label class="col" id="loginWarning" required=""></label>
        </div>
        <br>
        <div class="row">
            <span class="mr-2">*</span>
            <input type="password" class="col form-control" name="password" id="password" placeholder="Enter password"
                   onfocusout="checkPasswordLength()" required="">
            <label class="col" id="passWarning"></label>
        </div>
        <br>
        <div class="row">
            <span class="mr-2">*</span>
            <input type="password" class="col form-control" name="confirm-password" id="confirm-password"
                   placeholder="Confirm password">
            <label class="col" id="confirmPassWarning"></label>
        </div>
        <br>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"
               oninput="validateValue(this)"><br>
        <input type="text" class="form-control" name="first-name" id="first-name" placeholder="Enter First name"
               oninput="validateValue(this)"><br>
        <input type="text" class="form-control" name="last-name" id="last-name" placeholder="Enter Last name"
               oninput="validateValue(this)"><br>
        <button type="submit" class="btn btn-success">Create account</button>
    </form>
</div>
</body>
<script src="js/validations/singup.js"></script>
</html>
