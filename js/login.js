function forgotPassword(){
  let login = document.getElementById('forgotPasswordLogin').value
  let xhttp = new XMLHttpRequest();
  console.log(login)
  xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        if(xhttp.responseText){
          window.alert(xhttp.responseText)
        }
      }
    }
  xhttp.open("POST", "forgotPassword.php", true);
  xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  xhttp.send('login=' + login);
}