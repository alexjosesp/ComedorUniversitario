<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class model_chart extends CI_Model {

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

	public function comensales10(){
	    $sql = "selec ";
	}

	public function Select10M(){
		$query =$this->db->query("select CONCAT(DAY(asistencia.FECHA_ASISTENCIA), '-', MONTH(asistencia.FECHA_ASISTENCIA)) as fecha from 
			comensales inner join asistencia  on comensales.CODIGO=asistencia.CODIGO 
			where comensales.SEXO = 'Femenino' group by asistencia.FECHA_ASISTENCIA order by asistencia.FECHA_ASISTENCIA DESC limit 0,10");
		return $query->result();
	}

	public function Select10V(){
		$query =$this->db->query("select CONCAT(DAY(asistencia.FECHA_ASISTENCIA), '-', MONTH(asistencia.FECHA_ASISTENCIA)) as fecha from 
			comensales inner join asistencia  on comensales.CODIGO=asistencia.CODIGO 
			where comensales.SEXO = 'Masculino' group by asistencia.FECHA_ASISTENCIA order by asistencia.FECHA_ASISTENCIA DESC limit 0,10");
		return $query->result();
	}

	public function TotalF(){
		$query =$this->db->query("select CONCAT(DAY(asistencia.FECHA_ASISTENCIA), '-', MONTH(asistencia.FECHA_ASISTENCIA)) as fecha, count(comensales.CODIGO) as total from 
			comensales inner join asistencia  on comensales.CODIGO=asistencia.CODIGO 
			group by asistencia.FECHA_ASISTENCIA order by asistencia.FECHA_ASISTENCIA DESC limit 0,10");
		return $query->result();
	}
}
?>