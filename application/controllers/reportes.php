<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class reportes extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo deel controlador
          $this->load->model('model_reportes');
          $this->load->model('model_seguridad');
          $this->load->model('model_login');
     }
          function Seguridad(){
               $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
               $this->model_seguridad->SessionActivo($url);
     }
     public function index(){
          /*Si el usuario esta logeado*/
          $this->Seguridad();
          $this->load->view('header');
          $this->load->view('view_reportes');
          $this->load->view('footer');
     }
     public function totaldia(){
          /*Si el usuario esta logeado*/
          $this->Seguridad();
          $fecha=$this->input->post('fecha');
          $this->load->view('header');
          $data['comensales'] = $this->model_reportes->ListarFecha($fecha);  
          $data['total'] = $this->model_reportes->TotalFecha($fecha); 
          $this->load->view('view_totaldia',$data);
          $this->load->view('footer');
     }

     public function porcentaje(){
          /*Si el usuario esta logeado*/
          $this->Seguridad();
          $fecha=$this->input->post('fecha');
          $this->load->view('header');
          $data['mujeres'] = $this->model_reportes->SelectMujeres();  
          $data['varones'] = $this->model_reportes->SelectVarones(); 
          $this->load->view('view_porcentaje',$data);
          $this->load->view('footer');
     }
}
/* Archivo clientes.php */
/* Location: ./application/controllers/clientes.php */