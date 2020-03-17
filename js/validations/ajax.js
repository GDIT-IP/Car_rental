function ajaxConn(requestMethod, url, loginInput, passwordInput, confirmPasswordInput, 
        roleSelect, emailInput, fNameInput, lNameInput, elementWarning, callback){
    let elementNames = [];
    let elementValues = [];
    // Choose the necessary input or/and select
    if(loginInput != null){
        let login = loginInput.value.trim();
        elementNames.push('login');
        elementValues.push(login);
    };
    if(passwordInput != null){
        let password = passwordInput.value.trim();
        elementNames.push('password');
        elementValues.push(password);
    };
    if(confirmPasswordInput != null){
        let confirmPassword = confirmPasswordInput.value.trim();
        elementNames.push('confirmPassword');
        elementValues.push(confirmPassword);
    };
    if(typeof(roleSelect) != 'undefined' && roleSelect != null){
        let role = roleSelect.value.trim();
        elementNames.push('role');
        elementValues.push(role);
    };
    if(emailInput != null){
        let email = emailInput.value.trim();
        elementNames.push('email');
        elementValues.push(email);
    };
    if(fNameInput != null){
        let fName = fNameInput.value.trim();
        elementNames.push('fName');
        elementValues.push(fName);
    };
    if(lNameInput != null){
        let lName = lNameInput.value.trim();
        elementNames.push('lName');
        elementValues.push(lName);
    };
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            elementWarning.innerText = xhttp.responseText;
            // Ajax response
            callback(elementWarning);
        }
    };
    // Give value to the params
    let params;
    for(let i = 0; i < elementValues.length; i++){
        if(i == 0){
        params = elementNames[i] + '=' + elementValues[i];
        } else{
            params = params + '&' + elementNames[i] + '=' + elementValues[i];
        }
    };
    switch(requestMethod){
        case 'GET':
            xhttp.open("GET", url + '?' + params, true);
            xhttp.send();
            break;
        case 'POST':
            xhttp.open("POST",url, true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send(params);
            break;
    };
};

function ajaxResponseLogin(elementWarning){
    if(elementWarning.innerText){
        document.getElementById('login').classList.add("border-danger");
        isLoginValid = false;
    } else{
        document.getElementById('login').classList.remove("border-danger");
        isLoginValid = true;
    }
};

function ajaxResponseEmail(elementWarning){
    if(elementWarning.innerText){
        document.getElementById('email').classList.add("border-danger");
        isEmailValid = false;
    } else{
        document.getElementById('email').classList.remove("border-danger");
        validateValue(document.getElementById('email'));
    }
};

function ajaxResponseServerValidation(elementWarning){
    if (elementWarning.innerText) {
        if (elementWarning.innerText == 'You have created your account succesfully'){
            elementWarning.classList.add("success");
            elementWarning.classList.remove('danger');
            inputs = document.getElementsByTagName('input')
            for(let i = 0; i < inputs.length; i++){
                inputs[i].value = '';
            }
        }else{
            elementWarning.classList.add("danger");
            elementWarning.classList.remove("success");
        }
    }  
};