$(document).ready(function(){

	var facultad = $("#facultad");
	facultad.append("<option value='0'>---Elige facultad---</option>");
	$.getJSON("http://localhost/ComedorUniversitario/index.php/comensales/facultades",function(objetosretorna1){
		$.each(objetosretorna1, function(i,ObjetoReturn1){
			
			var nuevaFila = "<option value='"+ObjetoReturn1.NOMBRE+"'>" + ObjetoReturn1.NOMBRE+"</option>";
			facultad.append(nuevaFila);
		});
	});
});