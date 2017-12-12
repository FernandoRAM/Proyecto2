
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
	crearContactos()
}


function cerrarSesion(){

	localStorage.removeItem('idUsuario')
	window.location.assign('login.html')
}


function crearContactos(){
	
	contactosAjax = new XMLHttpRequest();
	contactosAjax.open('GET','http://192.168.1.77:80/PROYECTO2/php/contactos.php');
	contactosAjax.send();
	contactosAjax.onreadystatechange = function(){
		if (contactosAjax.readyState == 4 && contactosAjax.status == 200){
			contacto = JSON.parse(contactosAjax.responseText);
			console.log(contacto)
		for(i=0; i<contacto.length; i++){
			if (contacto[i].id != localStorage.getItem('idUsuario')) {
				div = "<div class='contacto oculto' "+
				"onclick='verContacto(this.id)' id='"+contacto[i].id+"'>"+
				"<div class='contacto-nombre'>"+contacto[i].nombre+"</div>"+
				"<div class='contacto-estado'>"+contacto[i].rate+"</div>"+
				"</div>";
				document.querySelector('section').innerHTML += div;
			}
		}
			contactos = document.querySelectorAll('.contacto');
			i=0;
			animacionContactos();
		}
	}
}

function animacionContactos(){
	if (i<contactos.length) {
		contactos[i].classList.remove('oculto')
		i++
		setTimeout(function(){
			animacionContactos();
		},100)
	}
}

function verContacto(id){

	localStorage.setItem('idRate', id)
	window.location.assign('usuario.html')
}

function regresar(){
	window.location.assign('index.html')
}
function cargarUsuario(){
	idUser = localStorage.getItem('idRate');

	usuarioAjax = new XMLHttpRequest();
	usuarioAjax.open('GET','http://192.168.1.77:80/PROYECTO2/php/usuario.php?&id='+idUser);
	usuarioAjax.send();
	usuarioAjax.onreadystatechange = function(){
		if (usuarioAjax.readyState == 4 && usuarioAjax.status == 200){
			usuario = JSON.parse(usuarioAjax.responseText);
			console.log(usuario)
		for(i=0; i<usuario.length; i++){
			if (usuario[i].id != localStorage.getItem('idUsuario')) {
				div = "<div class='usuario' "+
				"onclick='verContacto(this.id)' id='"+usuario[i].id+"'>"+
				"<div class='contacto-nombre'>"+usuario[i].nombre+"</div>"+
				"<div class='contacto-estado'>"+usuario[i].rate+"</div>"+
				"</div>";
				document.querySelector('article').innerHTML += div;
				}
			}
		}
	}
}
function registro(){
	window.location.assign('registro.html')
}
function login2(){
	window.location.assign('login.html')
}

function registrar(){
	correo = document.getElementById('correo').value;
	user = document.getElementById('usuario').value;
	pass = document.getElementById('password').value;

	if(usuario != "" && password != "" && correo != "") {
			//REGISTRAR
			logAjax = new XMLHttpRequest();
			logAjax.open('GET','http://192.168.1.77:80/PROYECTO2/php/registro.php?u='+user+'&p='+pass+'&c='+correo);
			logAjax.send();
			logAjax.onreadystatechange = function(){
				if (logAjax.readyState==4 && logAjax.status == 200) {
					if (logAjax.responseText!="0") {
						window.location.assign('login.html')
					}else{

					}
				}
			}	
		}
}

function set(){
	id = localStorage.getItem('idUsuario');
	document.getElementById('up').setAttribute("action","php/upload.php/?&id="+id)
}

function foto(){
window.location.assign('foto.html')
}

function validarF(){
id = localStorage.getItem('idUsuario');
item = document.getElementById('foto');
	
			//REGISTRAR
			logAjax = new XMLHttpRequest();
			logAjax.open('GET','http://192.168.1.77:80/PROYECTO2/php/validarFoto.php?id='+id);
			logAjax.send();
			logAjax.onreadystatechange = function(){
				if (logAjax.readyState==4 && logAjax.status == 200) {
					if (logAjax.responseText == "no") {
						item.style.visibility = 'hidden';
					}else{

					}
				}
			}	
		
}

function cargarFoto(){
	idUser = localStorage.getItem('idRate');

	fotoAjax = new XMLHttpRequest();
	fotoAjax.open('GET','http://192.168.1.77:80/PROYECTO2/php/foto.php?&id='+idUser);
	fotoAjax.send();
	fotoAjax.onreadystatechange = function(){
		if (fotoAjax.readyState == 4 && fotoAjax.status == 200){
			foto = JSON.parse(fotoAjax.responseText);
			console.log(foto);
		for(i=0; i<foto.length; i++){

				div = "<img src="+foto[i].direccion+">";
				document.querySelector('article').innerHTML += div;
				
			}
		}
	}
}