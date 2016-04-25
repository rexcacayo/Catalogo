//trabajando en local
//var dir= "http://127.0.0.1/mobile/celulares/php/";
//trabajando en servidor'
var dir = "http://celulares.ricardolugaresi.com.ve/PHP/"
function orden(){
	var nombre = $("#cliente").val();
	var correo = $("#correo").val();
	var y300 = $("#y_300").val();
	var s400 = $("#s_400").val();
	var i126 = $("#i_126").val();
	var s5012 = $("#s_5012").val();
	var s401 = $("#s_401").val();
	var correo_env = [];
	var filter=/^[A-Za-z][A-Za-z0-9_]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]$/;
	if (nombre==""){
		$("#cliente").focus();
		return 0;
	}
	if (correo==""){
		$("#correo").focus()
		return 0;
	}
	if (!filter.test(correo) ){
		$("#correo").val("");
		$("#correo").focus();
		return 0;
	}

	if (y300==""){
		y300 = 0;
	}
	if (s400==""){
		s400 = 0;
	}
	if (i126==""){
		i126 = 0;
	}
	if (s5012==""){
		s5012 = 0;
	}
	if (s401==""){
		s401 = 0;
	}
	correo_env[0]=nombre;
	correo_env[1]=correo;
	correo_env[2]=y300;
	correo_env[3]=s400;
	correo_env[4]=i126;
	correo_env[5]=s5012;
	correo_env[6]=s401;
		$.ajax({
		type:"POST",
		url: dir+"correo.php",
		data:({env_correo: correo_env}),
		dataType: 'json',
		success: Respuesta,
		error:error,
	});
	function Respuesta(data){
		$("#cliente").val("");
		$("#correo").val("");
		$("#y_300").val("");
		$("#s_400").val("");
		$("#i_126").val("");
		$("#s_5012").val("");
		$("#s_401").val("");
		$.mobile.changePage("#page", {transition: "flip"});
	}
	function error(data){
		alert("error"+data);
		$.mobile.changePage("#pedido", {transition: "flip"});
	}
}

function limpiar(){
	$("#cliente").val("");
	$("#correo").val("");
	$("#y_300").val("");
	$("#s_400").val("");
	$("#i_126").val("");
	$("#s_5012").val("");
	$("#s_401").val("");
	$.mobile.changePage("#page", {transition: "pop"});
}

