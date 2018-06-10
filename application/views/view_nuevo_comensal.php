<?php
    echo '<div class="content-wrapper"> ';
	  echo '<center>';
	  echo '<table border=0 class="ventanas" width="650" cellspacing="0" cellpadding="0">';
	  echo '<tr>';
	  echo "<td height='10' class='tabla_ventanas_login' height='10' colspan='3'><legend align='center'>NUEVO ESTUDIANTE</legend></td>";
	  echo '</tr>';
	  echo '<tr><td colspan=3>';
	  $attributes = array("class" => "form-horizontal", "id" => "form", "name" => "form");
	  //echo form_open("clientes/Save", $attributes);
	  echo form_open();
	  echo '<center>';
	  echo '<table border=0>';
	  
	#dibujamos campos texto
	$Codigo 	  = array(
	'name'        => 'CODIGO',
	'id'          => 'CODIGO',
	'size'        => 11,
	'value'		  => set_value('CODIGO',@$datos_comensales[0]->CODIGO),
	'placeholder' => 'Codigo',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Codigo:",'CODIGO').'</td>';
	echo '<td>';
	echo form_input($Codigo);
	echo '</td>';
	echo '<td><font color="red">'.form_error('CODIGO').'</font></td>';
	echo '</tr>';

	$Nombre 	  = array(
	'name'        => 'NOMBRE',
	'id'          => 'NOMBRE',
	'size'        => 50,
	'value'		  => set_value('NOMBRE',@$datos_comensales[0]->NOMBRE),
	'placeholder' => 'Nombre',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Nombre:",'NOMBRE').'</td>';
	echo '<td>';
	echo form_input($Nombre);
	echo '</td>';
	echo '<td><font color="red">'.form_error('NOMBRE').'</font></td>';
	echo '</tr>';
	
	$Apellidos = array(
	'name'        => 'APELLIDOS',
	'id'          => 'APELLIDOS',
	'size'        => 100,
	'value'		  => set_value('APELLIDOS',@$datos_comensales[0]->APELLIDOS),
	'placeholder' => 'Apellidos',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("Apellidos:",'APELLIDOS').'</td>';
	echo '<td>';
	echo form_input($Apellidos);
	echo '</td>';
	echo '<td><font color="red">'.form_error('APELLIDOS').'</font></td>';
	echo '</tr>';
	

	$Sexo = array(
	'0'               	=> 'SELECCIONE EL SEXO DEL ESTUDIANTE',
	'Masculino'		=> 'Masculino',
	'Femenino'	    	=> 'Femenino',
	);
	echo '<tr>';
    echo '<td>'.form_label("Sexo:",'SEXO').'</td>';
    echo '<td>';
    echo  form_dropdown('SEXO', $Sexo, set_value('SEXO',@$datos_comensales[0]->SEXO));
    echo '</td>';
    echo '<td><font color="red">'.form_error('SEXO').'</font></td>';
    echo '</tr>';

	$Dni 		  = array(
	'name'        => 'DNI',
	'id'          => 'DNI',
	'size'        => 50,
	'value'		  => set_value('DNI',@$datos_comensales[0]->DNI),
	'placeholder' => 'Dni',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("DNI:",'DNI').'</td>';
	echo '<td>';
	echo form_input($Dni);
	echo '</td>';
	echo '<td><font color="red">'.form_error('DNI').'</font></td>';
	echo '</tr>';


	$Edad 		  = array(
	'name'        => 'EDAD',
	'id'          => 'EDAD',
	'size'        => 50,
	'value'		  => set_value('EDAD',@$datos_comensales[0]->EDAD),
	'placeholder' => 'Edad',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("EDAD:",'EDAD').'</td>';
	echo '<td>';
	echo form_input($Edad);
	echo '</td>';
	echo '<td><font color="red">'.form_error('EDAD').'</font></td>';
	echo '</tr>';

    $Turno = array(
	'NONE'   => 'SELECCIONE EL TURNO',
	'0'	     => 'Mañana',
	'1'      => 'Tarde',
	);
	echo '<tr>';
	echo '<td>'.form_label("Turno:",'TURNO').'</td>';
	echo '<td>';
	echo  form_dropdown('TURNO', $Turno, set_value('TURNO',@$datos_comensales[0]->TURNO));
	echo '</td>';
	echo '<td><font color="red">'.form_error('TURNO').'</font></td>';
	echo '</tr>';   

    $Correo 		  = array(
	'name'        => 'CORREO',
	'id'          => 'CORREO',
	'size'        => 50,
	'value'		  => set_value('CORREO',@$datos_comensales[0]->CORREO),
	'placeholder' => 'Correo',
	'type'        => 'text',
	);
	echo '<tr>';
	echo '<td>'.form_label("CORREO:",'CORREO').'</td>';
	echo '<td>';
	echo form_input($Correo);
	echo '</td>';
	echo '<td><font color="red">'.form_error('CORREO').'</font></td>';
	echo '</tr>'; 

	echo '<tr>';
	echo '<td>';
	echo '<label for="FACULTAD">Facultad:</label>';
	echo '</td>';
	echo '<td>';
	echo '<select name="FACULTAD" id="facultad"></select>';
	echo '</td>';
	echo '</tr>'; 

		
	echo '<tr>';
	echo '<td colspan=3>'.$this->session->flashdata('msg').'</td>';
	echo '</tr>';
	echo '<tr><td colspan=3><hr/></td></tr>';
	echo '<tr>';
	echo '<td colspan=3><center>';
	echo '<input type="submit" class="btn btn-success" value="Guardar">';
    echo '</center></td></tr>';
    echo '</table></center>';
    echo form_close(); 
    echo '</td></tr>';
    echo '</table>';
    echo '</center>';
echo '</div>';
?>
  

<div>
	
</div>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/facultades.js"></script>