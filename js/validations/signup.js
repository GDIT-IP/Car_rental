let submitButton = document.getElementById('submit');
let isLoginValid = false;
let isPasswordValid = false;
let isConfirmPasswordValid = false;
let isEmailValid = false;   
let isFormValid = false;
let map = new Map();
map.set("email", /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
map.set("text", /^[a-zA-Z ]+$/);
submitButton.disabled = true;

function checkLogin() {
    ajaxConn('GET','signupValidation.php', document.getElementById("login"), 
    null, null, null, null, null, null, document.getElementById("loginWarning"),
     ajaxResponseLogin);
}

function checkPassword() {
    const minimalLength = 6;
    const passWarning = document.getElementById("passWarning");
    const passInput = document.getElementById("password");
    if (passInput.value.length < minimalLength) {
        passInput.classList.add("border-danger");
        passWarning.innerText = "Password must contain at least " + minimalLength + " symbols.";
        isPasswordValid = false;
    } else {
        passInput.classList.remove("border-danger");
        passWarning.innerText = "";
        isPasswordValid = true;
    }
    checkConfirmPassword()
}

function checkConfirmPassword(){
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm-password'); 
    const confirmPassWarning = document.getElementById('confirmPassWarning');
    if (password.value != confirmPassword.value){
        confirmPassword.classList.add("border-danger");
        confirmPassWarning.innerText = "The confirm password must coincide with password.";
        isConfirmPasswordValid = false;
    } else{
        confirmPassword.classList.remove("border-danger");
        confirmPassWarning.innerText = "";
        isConfirmPasswordValid = true;
    }
}

function checkEmail() {
    ajaxConn('GET','signupValidation.php', null, null, null, null, 
    document.getElementById('email'), null, null, document.getElementById("emailWarning"),
     ajaxResponseEmail);
}

function validateValue(element) {
    const meaningfulContent = element.value.trim();
    if (!meaningfulContent) {
        element.classList.add("border-danger");
        if(element.id == "email"){
            isEmailValid = false;
        }
        return false;
    }
    textRegex = map.get(element.type);
    if (!textRegex.test(meaningfulContent)) {
        element.classList.add("border-danger");
        if(element.id == "email"){
            isEmailValid = false;
        }
        return false;
    }
    element.classList.remove("border-danger");
    if(element.id == "email"){
        isEmailValid = true;
    }
    return meaningfulContent;
}

function enableSubmit(){
    const inputs = document.getElementsByTagName('input');
    submitButton.disabled = true;
    for(let i = 0; i < inputs.length; i++){
        if(inputs[i].value == '' || !isLoginValid || !isPasswordValid
            || !isConfirmPasswordValid || !isEmailValid){
            isFormValid = false;
        }else{
            isFormValid = true;
        };
        if (isFormValid == false){
            return false;
        };
    };
    submitButton.disabled = false;
};

function serverSubmit() {
    ajaxConn('POST','signupValidation.php', document.getElementById("login"), 
    document.getElementById("password"), document.getElementById("confirm-password"), 
    document.getElementById('role'), document.getElementById("email" ), 
    document.getElementById("first-name"), document.getElementById("last-name"), 
    document.getElementById("serverWarning"), ajaxResponseServerValidation);
};