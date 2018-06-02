<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_asistencia extends CI_Model {
	public function ListarAsistencia(){
		$this->db->order_by('ID_ASISTENCIA ASC');
		return $this->db->get('asistencia')->result();
	}
	 function BuscarID_ASISTENCIA($id_asistencia){

		$query = $this->db->where('ID_ASISTENCIA',$id_asistencia);
		$query = $this->db->get('asistencia');
		return $query->result();
		
	}

	public function myjoin()
	{
		$this->db->select('*');
		$this->db->from('asistencia');
		$this->db->join('comensales','asistencia.codigo = comensales.codigo');
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