let map = new Map();
map.set("email", /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
map.set("text", /^[^\W\d]+$/);

function checkLogin(){
    const loginInput = document.getElementById("login");
    const loginWarning = document.getElementById("loginWarning");
    let login = loginInput.value.trim();

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            loginWarning.innerText = xhttp.responseText;
            if(loginWarning.innerText){
                loginInput.classList.add("border-danger");
            } else {
                loginInput.classList.remove("border-danger");
            }
        }
    };
    xhttp.open("GET", 'checkLogin.php?l=' + login, true);
    xhttp.send();
}

function checkPasswordLength(){
    const minimalLength = 6;
    const passWarning = document.getElementById("passWarning");
    const passInput = document.getElementById("password");
    if (passInput.value.length < minimalLength) {
        passInput.classList.add("border-danger");
        passWarning.innerText = "Password must contain at least " + minimalLength + " symbols."
    } else {
        passInput.classList.remove("border-danger");
        passWarning.innerText = "";
    }
}

function validateValue(element){
    const meaningfulContent = element.value.trim();
    if(!meaningfulContent){
        element.classList.remove("border-danger");
        return false;
    }
    textRegex = map.get(element.type);
    if (!textRegex.test(meaningfulContent)) {
        element.classList.add("border-danger");
        return false;
    }
    element.classList.remove("border-danger");
    return meaningfulContent;
}
