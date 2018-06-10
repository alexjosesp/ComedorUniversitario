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


<script type="text/javascript">
            /*CLIENTES*/
            $(document).ready(function() {
                $('#porcenta').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                
                "columnDefs": [{
								        "width": "8%", 
								        "targets": 0
								    }],
								    dom: 'Bfrtip',
								    'bSort': false,
								    bPaginate: false,
								    bFilter: false,
								    bInfo: false,
								    buttons: [
								        'copy', 'excel', 'pdf', 'print'
								    ]
                } );

            } );
</script>

<div id="container">
	<h2 align="center">PORCENTAJE DE COMENSALES POR SEXO</h2>
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
<table  id="porcenta" class="table table-bordered table-striped" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>DESCRIPCION</th>	
<th>TOTAL</th>
<th>%</th>
</tr>
</thead>
<tbody>

	<?php 

		$mujer=$mujeres[0]->mujeres;
		$varon=$varones[0]->varones;
		$total=$mujer + $varon;
		$porcentajeMu= ($mujer*100)/$total;
		$porcentajeva=($varon*100)/$total;
	?>

<tr> 
<td ><h4>Mujeres </h4> </td >
<td ><h4><?php echo $mujer; ?> </h4> </td >
<td ><h4><?php echo round($porcentajeMu, 1, PHP_ROUND_HALF_ODD);?>% </h4> </td >
</tr>

<tr> 
<td ><h4>Varones </h4> </td >
<td ><h4><?php echo $varon; ?></h4> </td >
<td ><h4><?php echo round($porcentajeva, 1, PHP_ROUND_HALF_ODD);?>%</h4> </td >
</tr>


<tr> 
<td ><h4>Total </h4> </td >
<td ><h4><?php echo $total;?> </h4> </td >
<td ><h4>100%</h4> </td >
</tr>
</tbody>
</table>
</center>

</div>
<script src="js/bootstrap.min.js"> </script>
<script src="js/jquery-ui.min.js"> </script>
<script src="js/tableexport.min.js"> </script>
<script> 
	$('table').tableExport();
</script>
