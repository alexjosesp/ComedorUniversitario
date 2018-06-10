
<div class="content-wrapper">  
<div id="container">
	<h2 align="center">REPORTES</h2>
	<?php
if(isset($_GET['save'])){
	echo '<div class="alert alert-success text-center">La Información  se Almaceno Correctamente</div>';
}
if(isset($_GET['delete'])){
	echo '<div class="alert alert-warning text-center">La Información  se ha Eliminado Correctamente</div>';
}
if(isset($_GET['update'])){
	echo '<div class="alert alert-success text-center">La Información  se Actualizo Correctamente</div>';
}
if(isset($_GET['permisos'])){
		echo '<div class="alert alert-success text-center">Los Permisos fueron Asignados Correctamente</div>';
	}
	if(isset($_GET['password'])){
		echo '<div class="alert alert-success text-center">La Contraseña fue actualizado Correctamente</div>';
	}
?>

<center>
	<table id="asistencia" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
	<th align="center">TIPO DE REPORTE</th>
	<th align="center">OPCION </th>
</tr>
</thead>

<tbody>
	<script src="<?php echo base_url();?>js/jquery-ui.min.js"></script>
<tr>
	<td><h4>PORCENTAJE DE COMENSALES POR SEXO </h4</td>
	<td > <a href="<?php echo base_url();?>index.php/reportes/porcentaje/" class="btn btn-primary btn-flat">VER</a> </td>
</tr>

<tr>
	<td><h4>ASISTENCIA DE ALUMNOS POR DIA</h4></td>	
<td > 
	<form action="reportes/totaldia" method="post">
	<input type="text" id="datepicker" name="fecha"/>
	<button type="submit" value="Submit" class="btn btn-primary btn-flat">VER</button>
</form>
<script>
	function mostrar() {
		var x = document.getElementById("datepicker").value;
}

    $( function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'}).datepicker("setDate", new Date());
}    );   
</script>
</td>
</tr>
</tbody>
</table>
</center>
</div>