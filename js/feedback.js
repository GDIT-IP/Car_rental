function actual(classIndex){

  var i;
  var input;
  for(i=0; i <= classIndex; i++){
      input = document.getElementsByClassName("form-control")[i];
      input.classList.remove('is-valid');
      if(input.value == ''){
          input.classList.remove('is-valid');
          input.classList.add('is-invalid');
      }
  }
}

function pattern(classIndex, regex, input){

  if(classIndex==0 || classIndex==1|| classIndex==3){
      if (regex.test(input.value)){
          input.classList.remove('is-valid');
          input.classList.add('is-invalid');
      } else{
          input.classList.remove('is-invalid');
          input.classList.add('is-valid');
      }
  }else{
      if (!regex.test(input.value)){
          input.classList.remove('is-valid');
          input.classList.add('is-invalid');
      } else{
          input.classList.remove('is-invalid');
          input.classList.add('is-valid'); 
      }
  }
}

function validInput(classIndex){
                    
  var input;
  input = document.getElementsByClassName("form-control")[classIndex];
  if (classIndex==0 || classIndex==1){
      // [\d!@#$%^&*(),.?":{}|<>]+
      var name = /[^a-zA-Z ]+/g;
      pattern(classIndex, name, input);
  }else if(classIndex ==2){
      var email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/g;
      pattern(classIndex, email, input);
  }else if(classIndex==3){
      // \D
      var number = /[^0-9]+/g;
      pattern(classIndex, number, input);
  }else{
      var text = /^(?!\s*$).+/g;
      pattern(classIndex, text, input);
  } 
}