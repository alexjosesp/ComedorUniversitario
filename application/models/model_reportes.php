<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_reportes extends CI_Model {

	public function ListarComensal(){
		$this->db->order_by('CODIGO ASC');
		return $this->db->get('comensales')->result();
	}

	public function ExisteCODIGO($codigos){
	 	$this->db->from('comensales');
        $this->db->where('CODIGO',$codigos);
        return $this->db->count_all_results();	
	}

	public function SaveComensal($arrayCliente){
	    $this->db->trans_start();
	    $this->db->insert('comensales', $arrayCliente);
	    $this->db->trans_complete();	
	}

           function BuscarCODIGO($codigo){
		$query = $this->db->where('CODIGO',$codigo);
		$query = $this->db->get('comensales');
		return $query->result();
	}

	public function ListarFecha($Fecha){
		$query =$this->db->query("select comensales.CODIGO,comensales.NOMBRE,comensales.APELLIDOS,asistencia.FECHA_ASISTENCIA,comensales.SEXO from 
			comensales inner join asistencia  on comensales.CODIGO=asistencia.CODIGO 
			where asistencia.FECHA_ASISTENCIA='".$Fecha."'");
		return $query->result();
	} 

	public function TotalFecha($Fecha){
		$query =$this->db->query("select count(comensales.CODIGO) as total,asistencia.FECHA_ASISTENCIA from 
			comensales inner join asistencia  on comensales.CODIGO=asistencia.CODIGO 
			where asistencia.FECHA_ASISTENCIA='".$Fecha."'");
		return $query->result();
	}

	public function SelectMujeres(){
		$query =$this->db->query("select count(sexo) as mujeres from comensales
			where sexo='Femenino'");
		return $query->result();
	}

	public function SelectVarones(){
		$query =$this->db->query("select count(sexo) as varones from comensales
			where sexo='Masculino'");
		return $query->result();
	}
}
?>