<script type="text/javascript">
  var baseurl = "<?php echo base_url(); ?>";
</script>
<div class="content-wrapper">
<script type="text/javascript">
            /*CLIENTES*/
            $(document).ready(function() {
                $('#lista').dataTable( {
                    // sDom: hace un espacio entre la tabla y los controles 
                
                "columnDefs": [{
                        "width": "1%", 
                        "targets": 0
                    }],
                    'bSort': true,
                    bPaginate: true,
                    bFilter: true,
                    bInfo: false,
                    "order": [[0, "desc"]]
                } );

            } );
</script>
<div id="container" > 
<h2 align="center">REGISTRARR ASISTENCIA</h2>
<br>
<table>
  <tr>
      <td><label>SELECCIONAR ESTUDIANTE:</label></td>
      <input type="hidden" name="idcodigo" id="idcodigo">
      <td><input type="text" name="query2" id="query2" autocomplete="off" maxlength="100" placeholder="CODIGO" required></td>
  </tr>
</table>

<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">DATOS DEL COMENSAL</h3>
    <div class="box-tools pull-right">
      <span class="label label-primary"><?php
              setlocale(LC_ALL,"es_ES");
              echo strftime("%A %d de %B del %Y"); 
              ?></span>
    </div>
    <!-- /.box-tools -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table class="table">
  <tr>
      <td><label>CODIGO:</label></td>
      <td><input type="text" name="codigo" id="codigo" maxlength="100" placeholder="CODIGO"></td>

      <td><label>NOMBRE:</label></td>
      <td><input type="text" name="nombre" id="nombre" maxlength="100" placeholder="NOMBRE"></td>

      <td><label>APELLIDOS:</label></td>
      <td><input type="text" name="apellidos" id="apellidos" maxlength="100" placeholder="APELLIDOS"></td>
      <td rowspan="3" style="border: 1px solid black;
    width: 200px;
    word-wrap: break-word"><div id="baner"></div></td>
  </tr>
      
  <tr>
      <td><label>SEXO:</label></td>
      <td><input type="text" name="sexo" id="sexo" maxlength="100" placeholder="SEXO"></td>

      <td><label>FECHA REGISTRO:</label></td>
      <td><input type="text" name="fecha_registro" id="fecha_registro" maxlength="100" placeholder="FECHA REGISTRO"></td>

      <td><label>DNI:</label></td>
      <td><input type="text" name="dni" id="dni" maxlength="100" placeholder="DNI"></td>
  </tr>

  <tr>
      <td><label>FACULTAD:</label></td>
      <td><input type="text" name="facultad" id="facultad" maxlength="100" placeholder="FACULTAD"></td>

      <td><label>EDAD:</label></td>
      <td><input type="text" name="edad" id="edad" maxlength="100" placeholder="EDAD"></td>

      <td><label>TURNO:</label></td>
      <td><input type="text" name="turno" id="turno" maxlength="100" placeholder="TURNO"></td>
  </tr>

  <tr>
      <td><label>CONDICION:</label></td>
      <td><input type="text" name="condicion" id="condicion" maxlength="100" placeholder="CONDICION"></td>
      <td><div id="condicion2"></div></td>
  </tr>
</table>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
    The footer of the box
  </div>
  <!-- box-footer -->
</div>

<!--<input type="text" name="query" id="query">
<table id="tblcomensales" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>

<th>CODIGO  </th>
<th>NOMBRE</th>
<th>APELLIDOS</th>
<th>FECHA REGISTRO</th>
<th>SEXO</th>
</tr>
</thead>
<tbody>
</tbody>
</table>-->

<table id="lista" border="0" cellpadding="0" cellspacing="0" class="pretty">
<thead>
<tr>
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
 if(!empty($listas)){
  foreach($listas as $lista){
    echo '<tr>';
    echo '<td>'.$lista->ID_ASISTENCIA.'</td>';
    echo '<td>'.$lista->CODIGO.'</td>';
    echo '<td>'.$lista->NOMBRE.' '.$lista->APELLIDOS.'</td>';
    echo '<td>'.$lista->SEXO.'</td>';
    echo '<td>'.$lista->DNI.'</td>';
    echo '<td>'.$lista->FACULTAD.'</td>';
    echo '<td>'.$lista->EDAD.'</td>';
    /*Si es TURNO mostramos en texto*/
      if($lista->TURNO==0){
      echo '<td>Mañana</td>';
      }
      if($lista->TURNO==1){
      echo '<td>Tarde</td>';
      }
    echo '<td>'.$lista->FECHA_ASISTENCIA.'</td>';
    echo '</tr>';
  } 
 }

 ?>
</tbody>
</table>

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
 ?>
</div>
</div>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/asistencia.js"></script>