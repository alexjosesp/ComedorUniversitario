
<div class="content-wrapper"> 
<script type="text/javascript">
            /*CLIENTES*/
            $(document).ready(function() {
                $('#asistencia').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                
                "columnDefs": [{
								        "width": "1%", 
								        "targets": 0
								    }],
								    dom: 'Bfrtip',
								    'bSort': true,
								    bPaginate: true,
								    bFilter: true,
								    bInfo: false,
								    buttons: [
								        'copy', 'excel','csvHtml5', 'pdf','print'
								    ],
								    "order": [[1, "desc"]]
                } );

            } );
</script>

<div id="container">
	<h2 align="center">ASISTENCIA</h2>
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
<th>ACCION</th>
<th>ID</th>
<th>CODIGO</th>
<th>NOMBRE</th>
<th>SEXO</th>
<th>DNI</th>
<th>FACULTAD</th>
<th>EDAD</th>
<th>TURNO</th>
<th>FECHA_ASISTENCIA</th>
</tr>
</thead>
<tbody>
 <?php 
 $contador = 0;
 if(!empty($asistentes)){
 	foreach($asistentes as $asistente){
 		echo '<tr>';
		echo '<td>'
?>
		<a href="<?php echo base_url();?>index.php/asistencia/eliminar2?query=<?php echo $asistente->ID_ASISTENCIA ?>" class='btn btn-danger'><i class="fa fa-close"></i></a>
<?php		
		echo '</td>';
		echo '<td>'.$asistente->ID_ASISTENCIA.'</td>';
		echo '<td>'.$asistente->CODIGO.'</td>';
		echo '<td>'.$asistente->NOMBRE.' '.$asistente->APELLIDOS.'</td>';
		echo '<td>'.$asistente->SEXO.'</td>';
		echo '<td>'.$asistente->DNI.'</td>';
		echo '<td>'.$asistente->FACULTAD.'</td>';
		echo '<td>'.$asistente->EDAD.'</td>';
		/*Si es TURNO mostramos en texto*/
			if($asistente->TURNO==0){
			echo '<td>Mañana</td>';
			}
			if($asistente->TURNO==1){
			echo '<td>Tarde</td>';
			}
		echo '<td>'.$asistente->FECHA_ASISTENCIA.'</td>';
 		echo '</tr>';
 	} 
 }

 ?>
</tbody>
</table>

</center>
</div>
</div>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/asistencia.js"></script>