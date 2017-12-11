
function validar(){


	if (localStorage.getItem('idUsuario')) {
		window.location.assign('index.html')
	}
}
function login(){
		usuario = document.getElementById('usuario').value;
		password = document.getElementById('password').value;
		if(usuario != "" && password != "") {
			//LOGEAR
			logAjax = new XMLHttpRequest();
			logAjax.open('GET','http://192.168.1.77:80/PROYECTO2/php/login.php?u='+usuario+'&p='+password);
			logAjax.send();
			logAjax.onreadystatechange = function(){
				if (logAjax.readyState==4 && logAjax.status == 200) {
					if (logAjax.responseText!="0") {
						localStorage.setItem('idUsuario', logAjax.responseText);
						window.location.assign('index.html');
					}else{
						document.querySelector('.error').style.opacity="1"
						document.querySelector('.error').innerHTML = "El usuario no existe";
						setTimeout(function(){
							document.querySelector('.error').style.opacity="0"
						},3000)
					}
				}
			}	
		}
	}

	function cargarContactos(){
	if(!localStorage.getItem('idUsuario')){
		window.location.assign('login.html')
	}
}


function cerrarSesion(){

	localStorage.removeItem('idUsuario')
	window.location.assign('login.html')
}