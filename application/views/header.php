<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
<link href="<?php echo base_url();?>css/Estilo.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/Tablas.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery-ui.css">
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/jquery-ui.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/css/_all-skins.min.css">
    <link rel="apple-touch-icon"href="<?php echo base_url();?>public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url();?>public/img/favicon.ico">

    <!-- NUEVOS ESTILOS PARA EL DATATABLE -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/datatables/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/datatables/responsive.dataTables.min.css">

    <!-- CSS  BOOTSTRAP-SELECT PARA EL SELECT QUE CARGARA REGISTROS DE LA BD -->
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <!-- SWEETALERT -->
    <link rel="stylesheet" type="text/css" href="../public/css/sweetalert2.min.css">


<title>COMEDOR UTEA</title>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url();?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><img src="<?php echo base_url();?>imagenes/utea.png" height="40" width="40"/></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><img src="<?php echo base_url();?>imagenes/utea.png" height="40" width="40"/> UTEA-COMEDOR</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<?php
		if ($this->session->userdata('is_logged_in')){
			echo '<span class="hidden-xs">BIENVENIDO: '.$this->session->userdata('NOMBRE').' '.$this->session->userdata('APELLIDOS').'</span>';
			echo '</a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                      <strong>ERES: '.$this->session->userdata('TIPOUSUARIO').'</strong>
                    </p>
                  </li>
                    
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="index.php/login/CerrarSesion/" class="btn btn-primary btn-block"> CERRRAR SESION </a>
                    </div>
                  </li>
                </ul>';
		
		}else{
			echo '<hr/>';
		}
		
?>          
              </li> 
            </ul>
          </div>
        </nav>
      </header><!--.</header> -->

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>

<?php
		if ($this->session->userdata('is_logged_in')){
			echo '<table align="right">';
			echo '<tr>';
			foreach($this->session->userdata('Permisos') as $CrearMenu1){
                            
                            if($CrearMenu1["ID"]=="Error"){
                                echo '<td><font color="red">Sin Permisos para el Ver Menu. Solicita los Permisos con un Administrador</font></td>';
                             }else{   
                                  echo '<li><a href="'.base_url().'index.php'.$CrearMenu1["URL"].'"><i class="fa fa-tasks"></i><span>'.$CrearMenu1["DESCRIPCION"]."</span></a></li>";
                                  echo '<td>&nbsp;|&nbsp;</td>';
                            }
			}
            echo '</tr>';
			echo '</table>';   	
		
		}else{
			echo '<hr/>';
		}
		
?>

            <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-blue">AXS</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>