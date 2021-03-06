<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class comensales extends CI_Controller
{

     public function __construct()
     {
          parent::__construct();
          //Cargamos el modelo deel controlador
          $this->load->model('model_usuarios');
          $this->load->model('model_seguridad');
          $this->load->model('model_login');
          $this->load->model('model_comensales');
     }
     function Seguridad(){
     	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
         $this->model_seguridad->SessionActivo($url);
     }
     public function index(){
          /*Si el usuario esta logeado*/
          $this->Seguridad();
          $this->load->view('header');
          $data['comensales'] = $this->model_comensales->ListarComensales();         
          $this->load->view('view_comensales', $data);
          $this->load->view('footer');
	}
	public function nuevo(){
	      
        /*Si el usuario esta logeado*/
        $this->Seguridad();
		$hoy    = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
				
		$this->ValidaCampos();
		if($this->form_validation->run() == TRUE){
				//Verificamos si existe el CODIGO
			   $VerifyExist = $this->model_comensales->ExisteCodigo($this->input->post("CODIGO"));
               if($VerifyExist==0){
               	    $ComensalInsertar = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
               	    $ComensalInsertar["FECHA_REGISTRO"] = $hoy;//le agregamos la fecha de registro
               	    //guardamos los registros
               	    $this->model_comensales->SaveComensales($ComensalInsertar);
               	    redirect("comensales?save=true");
               }
			   if($VerifyExist>0){
                    $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">Codigo Duplicado</div>');
                    $this->load->view('header');
					$this->load->view('view_nuevo_comensal');
					$this->load->view('footer');
               }
			
		}else{
			  $this->load->view('header');
			  $this->load->view('view_nuevo_comensal');
			  $this->load->view('footer');
		} 
    }
    function ValidaCampos(){
		/*Campos para validar que no esten vacio los campos*/
		 $this->form_validation->set_rules("CODIGO", "Codigo", "trim|required");
		 $this->form_validation->set_rules("NOMBRE", "Nombre", "trim|required");
		 $this->form_validation->set_rules("APELLIDOS", "Apellidos", "trim|required");
		 $this->form_validation->set_rules("SEXO", "Sexo", "callback_select_tipo");
		 $this->form_validation->set_rules("DNI", "Dni", "trim|required");
		 $this->form_validation->set_rules("FACULTAD", "Facultad", "trim|required");
		 $this->form_validation->set_rules("EDAD", "Edad", "trim|required");
		 $this->form_validation->set_rules("TURNO", "Turno", "callback_select_tipo");
		 $this->form_validation->set_rules("CORREO", "Correo", "trim|required");
	 }

   /*CONTROLADOR QUE INSTANCIA LA FUNCIÓN edit DEL MODELO model_comensales ENCARGADO DE EDITAR UN REGISTRO DE LA TABLA comensales*/
   public function editar($codigo = NULL){
    
    if ($codigo == NULL OR !is_numeric($codigo)){
      $data['Modulo']  = "Comensales";
      $data['Error']   = "Error: El CODIGO <strong>".$codigo."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
      $this->load->view('header');
      $this->load->view('view_errors',$data);
      $this->load->view('footer');
      return;
    }
    if ($this->input->post()) {
      
      $this->ValidaCampos();
        
      if ($this->form_validation->run() == TRUE){
        $datos_update = $this->input->post();
        $codigo_insertado = $this->model_comensales->edit($datos_update,$codigo);
        redirect('comensales?update=true');
        
      }else{
        $this->Nuevo();
      }
      
    }else{
      $data['datos_comensales'] = $this->model_comensales->BuscarCODIGO($codigo);
      if (empty($data['datos_comensales'])){
        $data['Modulo']  = "Comensales";
        $data['Error']   = "Error: El ID <CODIGO>".$codigo."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
        $this->load->view('header');
        $this->load->view('view_errors',$data);
        $this->load->view('footer');
      }else{
        $this->load->view('header');
        $this->load->view('view_nuevo_comensal',$data);
        $this->load->view('footer');
      }
    }
    
  }

  /**CONTROLADOR PARA SELECIONAR UNA FACULTAD**/
  public function facultades(){
    $facultades = $this->model_comensales->Facultades();
    echo json_encode($facultades);
  }

  /*CONTROLADOR QUE INSTANCIA EL MODELO model_comensales ENCARGADO DE ELIMINAR UN REGISTRO DE LA TABLA comensales*/
  public function eliminar($codigo = NULL){
    if ($codigo == NULL OR !is_numeric($codigo)){
      $data['Modulo']  = "Comensales";
      $data['Error']   = "Error: El CODIGO <strong>".$codigo."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
      $this->load->view('header');
      $this->load->view('view_errors',$data);
      $this->load->view('footer');
      return;
    }
    if ($this->input->post()) {
      $codigo_eliminar = $this->input->post('CODIGO');
      $boton       = strtoupper($this->input->post('btn_guardar'));
      if($boton=="NO"){
        redirect("comensales");
      }else{
                                $this->model_comensales->Eliminar($codigo_eliminar);
        redirect("comensales?delete=true");
      }
    }else{
      $data['datos_comensales'] = $this->model_comensales->BuscarCODIGO($codigo);
      if (empty($data['datos_comensales'])){
        $data['Modulo']  = "Comensales";
        $data['Error']   = "Error: El CODIGO <strong>".$codigo."</strong> No es Valido, Verifica tu Busqueda !!!!!!!";
        $this->load->view('header');
        $this->load->view('view_errors',$data);
        $this->load->view('footer');
      }else{
        $this->load->view('header');
        $this->load->view('view_delete_comensal',$data);
        $this->load->view('footer');
      }
    }
  }
}
