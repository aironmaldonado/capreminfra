function ingresar(){
	if (document.form1.usuario.value.length==0){
	alert("Defina Usuario");
	document.form1.usaurio.focus();
	}else if(document.form1.clave.value.length==0){
	alert("Defina clave");
	document.form1.clave.focus();
	}else{
	document.form1.boton1.value="logueo";
	document.form1.submit(); 
	}
}