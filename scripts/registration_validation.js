$(document).ready($('#email').on('submit',checkmail)
	);

function checkmail(){

	var email = document.getElementById('email').value;
	if(email == ""){
	 document.getElementById('submit').setAttribute("disabled", ""); 
	 var errorDisplay = document.getElementById('displayError');
	 errorDisplay.innerHTML = "Email is empty";

	}
}