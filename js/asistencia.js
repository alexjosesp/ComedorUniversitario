//*** Vamos a crear las funciones JS que haran las peticiones ***//
//*** mediante ajax al archivo articulo.php ***//
var tabla;
var f = new Date();
var fecha = document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
//*** Funcion que se ejecuta al Inicio ***//
function init(){
	//$('#fecha').html("<label>"+fecha+"</label>");
}

var currentLocation = window.location;
$(function(){
  $("#query2").autocomplete({
            source: baseurl+"index.php/asistencia/BuscarComensal",
             select: function(event, ui) {
                $('#idcodigo').val(ui.item.CODIGO);
				$('#codigo').val(ui.item.CODIGO);
				$('#nombre').val(ui.item.NOMBRE);
				$('#apellidos').val(ui.item.APELLIDOS);
				$('#sexo').val(ui.item.SEXO);
				$('#fecha_registro').val(ui.item.FECHA_REGISTRO);
				$('#dni').val(ui.item.DNI);
				$('#facultad').val(ui.item.FACULTAD);
				$('#edad').val(ui.item.EDAD);
				$('#turno').val(ui.item.TURNO);
                $('#condicion').val(ui.item.CONDICION);
                var a = document.getElementById("condicion").value;
                var codigo = document.getElementById("idcodigo").value;
                if (a == "asistio")
                    {
                    	//<a href="<?php echo base_url();?>index.php/alumnos/eliminar/<?php echo $alumno->ID ?>" class="btn btn-danger">Eliminar</a>
                        $("#condicion2").html("<a href='"+baseurl+"index.php/asistencia/eliminar?query="+codigo+"' class='btn btn-danger'>ELIMINAR ASISTENCIA</a>");
                        $("#baner").html("<h1 class='alert alert-primary'>ASISTIO</h1>");
                    }else {
                    	//<a href="<?php echo base_url();?>index.php/comensal/asistencia/<?php echo $alumno->ID;?>/" class="btn btn-success">Marcar Asistencia</a>
                        $("#condicion2").html("<a href='"+baseurl+"index.php/asistencia/registro/"+codigo+"' class='btn btn-primary'>REGISTRAR ASISTENCIA</a>");
                        $("#baner").html("<h1 class='alert alert-danger'>NO ASISTIO</h1>");
                    }

				$('#codigo').prop("disabled", true);
				$('#nombre').prop("disabled", true);
				$('#apellidos').prop("disabled", true);
				$('#sexo').prop("disabled", true);
				$('#fecha_registro').prop("disabled", true);
				$('#dni').prop("disabled", true);
				$('#facultad').prop("disabled", true);
				$('#edad').prop("disabled", true);
				$('#turno').prop("disabled", true);
				$('#query2').prop("disabled", false);
           }  
    });
});

$("#query").keyup(function() {
	$('#tblcomensales tbody').html('');
	var text = $('#query').val();
	$.post(baseurl+"index.php/asistencia/getComensalByCodigo",
		{codigo :text},
		function(data){
			var obj = JSON.parse(data);
			var output = '';
			$.each(obj, function(i,item){
				output +=
				'<tr>' +
				'	<td>'+item.CODIGO+'</td>' +
				'	<td>'+item.NOMBRE+'</td>' +
				'	<td>'+item.APELLIDOS+'</td>' +
				'	<td>'+item.FECHA_REGISTRO+'</td>' +
				'	<td>'+item.SEXO+'</td>' +
				'</tr>';
			});
			$('#tblcomensales tbody').append(output);
		});
});
init();