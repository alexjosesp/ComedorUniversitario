<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('America/Mexico_City'); 
class asistencia extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('model_usuarios');
    $this->load->model('model_seguridad');
    $this->load->model('model_login');
    $this->load->model('model_comensales');
    $this->load->model('model_asistencia');
  }

  function Seguridad()
  {
    $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $this->model_seguridad->SessionActivo($url);
  }

  /*FUNCION PARA LISTAR LA ASISTENCIA*/
  public function index()
  {
    /*Si el usuario esta logeado*/
    $this->Seguridad();
    $this->load->view('header');
    $data['listas'] = $this->model_asistencia->ListarAsistencia();
    $this->load->view('view_asistencia',$data);
    $this->load->view('footer');
  }

  public function listar()
  {
    $this->Seguridad();
    $this->load->view('header');
    $data['asistentes'] = $this->model_asistencia->ListarAsistencia();
    $this->load->view('view_asistencia_lista',$data);
    $this->load->view('footer');
  }

  public function getComensalByCodigo()
  {
    $codigo = $this->input->post('codigo');
    $resultado = $this->model_asistencia->getComensalByCodigo($codigo);
    echo json_encode($resultado);
  }

  /* CONTROLADOR PARA BUSCAR UN COMENSAL Y VERIFICAR SU ESTADO DE ASISTENCIA EN EL DÍA ACTUAL */
  public function BuscarComensal(){
    $filtro    = $this->input->get("term");
    $comensales = $this->model_asistencia->BuscarComensalAsistio($filtro);
    if ($comensales != FALSE) {
      echo json_encode($comensales);
    }
    else{
      $comensales = $this->model_asistencia->BuscarComensalNoAsistio($filtro);
      echo json_encode($comensales);
    }
  }

  /* CONTROLADOR ELIMINAR UNA ASISTENCIA */
  public function eliminar()
  {
    $query= $this->input->get('query',true); 
    $this->model_asistencia->Eliminar($query);
    redirect("asistencia?delete=true");
  }

  public function eliminar2(){
      $codigo_eliminar = $this->input->get('query', true);
      $this->model_asistencia->Eliminar2($codigo_eliminar);
        redirect("asistencia/listar?delete=true");
    }



  /* CONTROLADOR DEL REGISTRO DE ASISTENCIA */
  public function registro($codigo)
  {
    $this->Seguridad();
    /*capturamos el dia actual*/
    $hoy = date("Y")."-".date("m")."-".date("d")." ".date("H:i:s");
    if ($codigo == NULL OR !is_numeric($codigo))
    {
      $data['Modulo']  = "Asistencia";
      $data['Error']   = "Error: El CODIGO <strong>".$codigo."</strong> No es Valido, Verifica tu Busqueda !!";
      $this->load->view('header');
      $this->load->view('view_errors',$data);
      $this->load->view('footer');
      return;
    }
    /*verificamos la existencia del codigo*/
    $VerifyExist = $this->model_asistencia->BuscarCODIGO($codigo);
    if($VerifyExist>0)
    {
      $RegistrarAsistencia = $this->input->post();//Recibimos todo los campos por array nos lo envia codeigther
      echo  $RegistrarAsistencia;
      $RegistrarAsistencia["CODIGO"] = $codigo ;
      $RegistrarAsistencia["FECHA_ASISTENCIA"] = $hoy;//capturamos la fehca actual
      /*Haciendo uso del modelo RegistrarAsistencia*/
      $this->model_asistencia->RegistrarAsistencia($RegistrarAsistencia);
      redirect("asistencia?save=true");
    }
    if($VerifyExist<1)
    {
      $this->session->set_flashdata('msg', '<div class="alert alert-error text-center">El comensal no existe</div>');
      $this->load->view('header');
      $this->load->view('view_asistencia');
      $this->load->view('footer');
    }
  } 
}