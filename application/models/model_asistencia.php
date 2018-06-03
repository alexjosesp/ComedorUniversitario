<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_asistencia extends CI_Model {

	public function ListarAsistencia()
	{
		$this->db->select('*');
		$this->db->from('asistencia');
		$this->db->join('comensales','asistencia.codigo = comensales.codigo');
		return $this->db->get()->result();
	}

	 function BuscarNOMBRE($nombre){
	 	$this->db->select('*');
		$this->db->from('asistencia');
		$this->db->join('comensales','asistencia.codigo = comensales.codigo');
		$this->db->where('comensales.nombre',$nombre);
		return $this->db->get()->result();
		
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