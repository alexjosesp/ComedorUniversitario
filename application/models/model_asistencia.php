<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_asistencia extends CI_Model {

	/*MODELO PARA LISTAR LAS ASISTENCIAS*/
	public function ListarAsistencia()
	{
		$this->db->select('*');
		$this->db->from('asistencia');
		$this->db->join('comensales','asistencia.codigo = comensales.codigo');
		return $this->db->get()->result();
	}
 
	public function getComensalByCodigo($codigo){
		$this->db->from('comensales');
		$this->db->like('CODIGO',$codigo,'both');
		$r = $this->db->get();
		return $r->result();
	}
	/*****************************************************************/
    /*FUNCIONES PARA BUSCAR COMENSALES QUE ASISTIERON Y NO ASISTIERON*/
	public function BuscarComensalAsistio($filtro){
		$sql="SELECT concat(comensales.CODIGO,' - ', comensales.NOMBRE, ' ', comensales.APELLIDOS) AS label, comensales.CODIGO, comensales.NOMBRE, comensales.APELLIDOS,comensales.SEXO,comensales.DNI, comensales.FACULTAD, comensales.EDAD, comensales.TURNO, comensales.CORREO,comensales.FECHA_REGISTRO,if(day(asistencia.FECHA_ASISTENCIA) = day(CURDATE()),'asistio' ,'falta') as CONDICION from asistencia inner join comensales on asistencia.CODIGO = comensales.CODIGO WHERE (comensales.CODIGO LIKE  '%".$filtro."%' or comensales.NOMBRE LIKE '%".$filtro."%') and day(asistencia.FECHA_ASISTENCIA)=day(CURDATE())";
		$query=$this->db->query($sql);
		if ($query->num_rows()>0 )
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}	
	}

	function BuscarComensalNoAsistio($filtro){
	 	$query = $this->db->query("select concat(comensales.CODIGO,' - ', comensales.NOMBRE, ' ', comensales.APELLIDOS) AS label,comensales.CODIGO,comensales.NOMBRE,comensales.APELLIDOS,comensales.SEXO,comensales.DNI, comensales.FACULTAD, comensales.EDAD, comensales.TURNO, comensales.CORREO,comensales.FECHA_REGISTRO,'falta' as CONDICION from comensales WHERE (comensales.CODIGO LIKE  '%".$filtro."%' or comensales.NOMBRE LIKE '%".$filtro."%')");
	 	return $query->result();
		
	}
	/*****************************************************************/

	/*MODELO PARA ELIMINAR UNA ASISTENCIA ESPECIFICA*/
	public function Eliminar($codigo)
	{
		$sql="DELETE FROM asistencia
		where CODIGO='".$codigo."' AND day(asistencia.FECHA_ASISTENCIA)=day(CURDATE())";
		$query=$this->db->query($sql);
	}

	/*MODELO PARA ELIMINAR ASISTENCIA EN LISTA*/
	function Eliminar2($id_asistencia){
		$sql="DELETE FROM asistencia
		WHERE ID_ASISTENCIA='".$id_asistencia."'";
		$query=$this->db->query($sql); 
	}

	function BuscarID($id_asistencia){

		$query = $this->db->where('ID_ASISTENCIA',$id_asistencia);
		$query = $this->db->get('asistencia');
		return $query->result();
		
	}

	/*MODELO PARA REGISTRAR UNA ASISTENCIA*/
	public function RegistrarAsistencia($datos){
     	/*Nos aseguramos si realizamos todo o no*/
     	$this->db->trans_start();
     	$this->db->insert('asistencia', $datos);
     	$this->db->trans_complete();	
    }

    /*MODELO PARA VERIFICAR LA EXISTENCIA DEL CODIGO DEL COMENSAL*/
    function BuscarCODIGO($codigo){

		$query = $this->db->where('CODIGO',$codigo);
		$query = $this->db->get('comensales');
		return $query->result();
		
	}

	function MenuCompleto(){
		$this->db->order_by('ORDENAMIENTO ASC');
		return $this->db->get('menu_sistema')->result();
	}
	function MiMenu($id,$id_menu){
		$this->db->from('permisosmenu');
		$this->db->where('ID_USUARIO',$id);
		$this->db->where('ID_MENU',$id_menu);
		$this->db->where('ESTATUS',0);
		return $this->db->count_all_results();
	}
}
?>