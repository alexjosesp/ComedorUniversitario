<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class chart extends CI_Controller
{
     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo deel controlador
          $this->load->model('model_chart');
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
          //$data['fechac'] = $this->model_reportes->SelectVarones();
          //$data['totalc'] = $this->model_reportes->SelectVarones(); 
          $data['chart'] = $this->model_chart->TotalF();
          //$this->load->view('view_porcentaje',$data);
          $this->load->view('view_chart',$data);
          $this->load->view('footer');
     }


}
/* Archivo clientes.php */
/* Location: ./application/controllers/clientes.php */