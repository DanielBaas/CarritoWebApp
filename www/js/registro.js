function checkifempty()
{
    if (!document.formaRegistro.terminosYCondiciones.checked)
  {
    document.formaRegistro.botonRegistrar.disabled=true;
  }
    else
  {     
    document.formaRegistro.botonRegistrar.disabled=false;
  }
 
}
function reporteRegistro(f){
	var ok = true;
	  if(f.elements["nombreDelUsuario"].value == ""){
		ok = false;
	  }
		if(f.elements["apellidosDelUsuario"].value == ""){
		ok = false;
	  }
	
	if(f.elements["correoDelUsuario"].value == ""){
		ok = false;
	  }
	if(f.elements["passwordDelUsuario"].value == ""){
		ok = false;
	  }
	
	if(f.elements["confirmarPassword"].value == ""){
		ok = false;
	  }
	if(ok == true){
		alert("Registro Completado con éxito");
	} else{
		alert("No se ha podido completar el registro, hay campos vacíos.");
	}
}

function reporteInicioSesion(f){
	var ok = true;
	  if(f.elements["emailUsuario"].value == ""){
		ok = false;
	  }
		if(f.elements["pwdUsuario"].value == ""){
		ok = false;
	  }
	if(ok == true){
		alert("¡Bienvenido!");
	} else{
		alert("No has podido acceder, hay campos vacíos.");
	}
}