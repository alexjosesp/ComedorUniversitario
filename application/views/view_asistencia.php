
<script type="text/javascript">
            /*CLIENTES*/
            $(document).ready(function() {
                $('#asistencia').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
        
                } );
            } );
</script>

<div id="container">
	<h2 align="center">REGISTRO DE ASISTENCIA</h2>
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
<th>ID_ASISTENCIA</th>
<th>CODIGO</th>
<th>FECHA_ASISTENCIA</th>
</tr>
</thead>
<tbody>
 <?php 
 $contador = 0;
 if(!empty($usuarios)){
 	foreach($usuarios as $usuario){
 		echo '<tr>';
 		echo '<td>'.$usuario->ID_ASISTENCIA.'</td>';
 		echo '<td>'.$usuario->CODIGO.'</td>';
 		echo '<td>'.$usuario->FECHA_ASISTENCIA.'</td>';
 		echo '</tr>';
 	} 
 }

 ?>
</tbody>
</table>
</center>
</div>