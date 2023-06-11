let form = document.querySelector("form");

form.addEventListener('submit', function(evt){
    		evt.preventDefault();

    		if( validateName() && validateLastName1() && validateLastName2() && validateEmail() && validateLogin() && validatePasswd()){
    			form.submit();
    		}
 		});

function validateEmail(){

	var email = document.getElementById('emailInput');
	

	var emailValido =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

	if(!emailValido.test(email.value) ){
		alert("Formato de email invalido");
		return false;
	}else if (email.value.trim().length > 50) {
      alert("El limite de caracteres en el campo de email es 50");
      return false;
  }else{
		return true;
	}
} 

function validateName(){

	var name = document.getElementById('nameInput');
	
	if(name.value.trim().length > 50){
	 	alert("El limite de caracteres en el campo de nombre es 50");
		return false;
	} else if ( /\d/.test(name.value.trim())) {
      alert("No se permite numeros en el campo de nombre");
      return false;
  }else{
		return true;
	}
} 

function validateLastName1(){

	var lastName = document.getElementById('lastNameInput1');
	
	if(lastName.value.trim().length > 50){
		alert("El limite de caracteres en el campo de primer apellido es 50");
		return false;
	}else if ( /\d/.test(lastName.value.trim())) {
      alert("No se permite numeros en el campo de primer apellido");
      return false;
  }else{
		return true;
	}
} 

function validateLastName2(){

	var lastName = document.getElementById('lastNameInput2');
	
	if(lastName.value.trim().length > 50){
		alert("El limite de caracteres en el campo de segundo apellido es 50");
		return false;
	}else if ( /\d/.test(lastName.value.trim())) {
      alert("No se permite numeros en el campo de segundo apellido");
      return false;
  }else{
		return true;
	}
} 

function validateLogin(){

	var login = document.getElementById('loginInput');
	
	if(login.value.trim().length > 50){
	 	alert("El limite de caracteres en el campo de nombre de usuario es 50");
		return false;
	}else{
		return true;
	}
	
} 

function validatePasswd(){

	var passwd = document.getElementById('passwdInput');
	
	if(passwd.value.length < 4 || passwd.value.length > 8){
	 	alert("La contraseña debe tener entre 4 a 8 caracteres");
		return false;
	}else{
		return true;
	}
	
} 