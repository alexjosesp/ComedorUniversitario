<div class="content-wrapper"> 
<script type="text/javascript">
            /*CLIENTES*/
            $(document).ready(function() {
                $('#comensales').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<div id="container">
	<h2 align="center">CATALOGO DE ESTUDIANTES</h2>
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
<table id="comensales" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
<th>ACCION</th>
<th>CODIGO</th>
<th>NOMBRE</th>
<th>APELLIDOS</th>
<th>SEXO</th>
<th>DNI</th>
<th>FACULTAD</th>
<th>EDAD</th>
<th>TURNO</th>
<th>CORREO</th>
</tr>
</thead>
<tbody>
 <?php 
 $contador = 0;
 if(!empty($comensales)){
 	foreach($comensales as $comensal){
 		echo '<tr>';
		echo '<td>'
?>
		<a href="<?php echo base_url();?>index.php/comensales/editar/<?php echo $comensal->CODIGO;?>/" class="btn btn-success">Editar</a>
		<a href="<?php echo base_url();?>index.php/comensales/eliminar/<?php echo $comensal->CODIGO ?>" class="btn btn-danger">Eliminar</a>
<?php		
		echo '</td>';
		echo '<td>'.$comensal->CODIGO.'</td>';
		echo '<td>'.$comensal->NOMBRE.'</td>';
 		echo '<td>'.$comensal->APELLIDOS.'</td>';
		echo '<td>'.$comensal->SEXO.'</td>';
		echo '<td>'.$comensal->DNI.'</td>';
		echo '<td>'.$comensal->FACULTAD.'</td>';
		echo '<td>'.$comensal->EDAD.'</td>';
		/*Si es TURNO mostramos en texto*/
			if($comensal->TURNO==0){
			echo '<td>Mañana</td>';
			}
			if($comensal->TURNO==1){
			echo '<td>Tarde</td>';
			}
		echo '<td>'.$comensal->CORREO.'</td>';
 		echo '</tr>';
 	} 
 }

 ?>
</tbody>
</table>
</center>
</div>
</div>