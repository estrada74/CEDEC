<?php
//ver si hay una sesion existente
  error_reporting(0);
  session_start();
  if(!$_SESSION["id"]){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>
select  empresas_prediagnostico.id_empresa_prediagnostico, empresas_prediagnostico.encuestador, empresas_prediagnostico.fecha_captacion,
empresas_prediagnostico.consultor_asignado, empresas_prediagnostico.carta_de_terminos,
empresas_prediagnostico.id_empresa, empresas_prediagnostico.rfc, empresas_prediagnostico.camara_perteneciente, empresas_prediagnostico.giro,
empresas_prediagnostico.actividades_realizadas, empresas_prediagnostico.id_sector, empresas_prediagnostico.num_empleados, empresas_prediagnostico.num_sucursales,
empresas_prediagnostico.anios_exportacion, empresas_prediagnostico.certificado_calidad, empresas_prediagnostico.empresa_en_operacion, empresas_prediagnostico.estados_financieros,
empresas_prediagnostico.scian,empresas_prediagnostico.inicio_operacion,empresas_prediagnostico.informacion_que_entrega, empresas_prediagnostico.colonia,
empresas_prediagnostico.id_municipio, empresas_prediagnostico.calle, empresas_prediagnostico.num_domicilio, empresas_prediagnostico.cp,
empresas_prediagnostico.telefono_empresarial, empresas_prediagnostico.correo_empresa,
empresas_prediagnostico.fax, empresas.nombre as nombre_empresa, empresas.estado as prediagnostico, empresas.cuestionario, empresas.id_representante_legal, representante_legal.nombre_representante,
representante_legal.genero, representante_legal.telefono_representante, representante_legal.grado_estudios, representante_legal.id_usuario,
usuarios.email, usuarios.estado as estado_usuario, sectores.nombre as nombre_sector, municipios.nombre as nombre_municipio
from empresas_prediagnostico
inner join empresas on empresas.id_empresa=empresas_prediagnostico.id_empresa
inner join representante_legal on representante_legal.id_representante_legal=empresas.id_representante_legal
inner join usuarios on usuarios.id_usuario=representante_legal.id_usuario
inner join sectores on sectores.id_sector=empresas_prediagnostico.id_sector
inner join municipios on municipios.id_municipio=empresas_prediagnostico.id_municipio
where empresas.id_empresa=8;


<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CEDEC - Análisis empresarial</title>
        <meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="views/assets/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="views/assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="views/assets/img/favicon-16x16.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="views/assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="views/assets/vendors/css/base/elisyam-1.5.min.css">


        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <script src="views/jquery/jquery-3.3.1.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>


    </head>

    <body id="page-top">
<?php
    $res = new MvcController();
   $datos = $res -> getEmpresaDetallesPorIdController();


    #$datos = $res -> editarController("empresas","id_empresa");

?>
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="views/assets/img/logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <div class="page">
            <!-- Begin Header -->

            <?php include("admin_header.php"); ?>
            <!-- End Header -->
            <!-- Begin Page Content -->
            <div class="page-content d-flex align-items-stretch">
               
                <!-- End Left Sidebar -->
                <div class="content-inner">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Registrar análisis empresarial</h2>
	                                <div>
			                            <ul class="breadcrumb">
			                                <li class="breadcrumb-item"><a href="index.php?action=dashboard"><i class="ti ti-home"></i></a></li>
			                                <li class="breadcrumb-item"><a href="#">Components</a></li>
			                                <li class="breadcrumb-item active">Forms Wizard</li>
			                            </ul>
	                                </div>
	                            </div>
                            </div>
                        </div>
                        <!-- End Page Header -->


<form class="needs-validation" novalidate="" method="post">
    <?php 
      $agregar = new MvcController();
      $agregar -> registrarPrediagnosticoController();
    ?>
                            <div class="row flex-row">
                                <div class="col-xl-12">
                                    <!-- Form -->
                                    <div class="widget has-shadow">
                                        <div class="widget-body">
                                            <div class="alert  alert-primary" role="alert">
                                                <strong>Folio: </strong>  
                                                <?php 
                                                $respuesta=100000;
                                                    if($respuesta<10 ){
                                                        echo "CP00000".$respuesta;

                                                    }elseif ($respuesta>9 && $respuesta<100) {
                                                        echo "CP0000".$respuesta;

                                                        
                                                    }elseif ($respuesta>99 && $respuesta<1000) {
                                                        echo "CP000".$respuesta;

                                                    }elseif ($respuesta>999 && $respuesta<10000) {
                                                        echo "CP00".$respuesta;

                                                    }elseif ($respuesta>9999 && $respuesta<100000) {
                                                        echo "CP0".$respuesta;
                                                    }
                                                    else{echo "CP".$respuesta;}

                                                ?>
                                            </div>


                                        <div class="widget-body">
                                            <div class="row flex-row justify-content-center">
                                                <div class="col-xl-10">
                                                    <div id="rootwizard">
                                                        <div class="step-container">
                                                            <div class="step-wizard">
                                                                <div class="progress">
                                                                    <div class="progressbar"></div>
                                                                </div>
                                                                <ul>
                                                                    <li>
                                                                        <a href="#tab1" data-toggle="tab">
                                                                            <span class="step">1</span>
                                                                            <span class="title">Sección 1</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#tab2" data-toggle="tab">
                                                                            <span class="step">2</span>
                                                                            <span class="title">Sección 2</span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#tab3" data-toggle="tab">
                                                                            <span class="step">3</span>
                                                                            <span class="title">Sección 3</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                       

                                                        <div class="tab-content">
                                                            <div class="tab-pane" id="tab1">
                                                                <div class="section-title mt-5 mb-5">
                                                                    <h4>Datos generales</h4>
                                                                </div>
                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-control-label">Nombre de la empresa<span class="text-danger ml-2">*</span></label>
                                                                        <input name="nombre_empresa" value="<?php echo $datos["nombre_empresa"]; ?>" readonly type="text"  class="form-control">
                                                                    </div>
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-control-label">Giro<span class="text-danger ml-2">*</span></label>
                                                                        <input name="giro" value="<?php echo $datos["giro"]; ?>" readonly type="text"  class="form-control">
                                                                    </div>

                                                               
                                                                    
                                                                </div>
                                                                <div class="form-group row mb-5">

                                                                    
                                                                    <div class="col-xl-6">
                                                                        <label class="form-control-label">Otros negocios del empresario <span class="text-danger ml-2">*</span></label>
                                                                        <input type="text" name="otros_nehocios"  class="form-control">
                                                                    </div>

                                                                    <div class="col-xl-6">
                                                                        <label class="form-control-label">Fecha de visita<span class="text-danger ml-2">*</span></label>

                                                                       <input name="inicio_operacion" type="date" class="form-control" required="" max=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                                                                       <div class="invalid-feedback">
                                                                            Por favor ingrese una fecha valida
                                                                        </div>
                                                                       
                                                                    </div>
                                                                    

                                                                </div>
                                                                <div class="section-title mt-5 mb-5 ">
                                                                    <h4>Administración</h4>
                                                                </div>
                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-control-label">Persona<span class="text-danger ml-2">*</span></label>
                                                                        <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="persona" >
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Fisica">Fisica</option>
                                                                            <option value="Moral">Moral</option>
                                                                            <div class="invalid-feedback">
                                                                            Seleccione una opción
                                                                        </div>
                                                                    </select>
                                                                    </div>

                                                                    <div class="col-xl-6">
                                                                        
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-4">
                                                                        <label class="form-control-label">¿La empresa ha definido su misión? <span class="text-danger ml-2">*</span></label>
                                                                        <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="esta_por_escrito" >
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Si">Si</option>
                                                                            <option value="No">No</option>
                                                                            <div class="invalid-feedback">
                                                                            Seleccione una opción
                                                                        </div>
                                                                    </select>
                                                                    </div>

                                                                    <div class="mision_escrita col-xl-4 mb-3">
                                                                        <label class="form-control-label">¿La misión se encuentra elaborada por escrito?<span class="text-danger ml-2">*</span></label>
                                                                        <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="esta_por_escrito" >
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Si">Si</option>
                                                                            <option value="No">No</option>
                                                                            <div class="invalid-feedback">
                                                                            Seleccione una opción
                                                                        </div>
                                                                    </select>
                                                                    </div>

                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">¿El personal conoce la misión de la empresa?<span class="text-danger ml-2">*</span></label>
                                                                        <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="definido_mision" >
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Si">Si</option>
                                                                            <option value="No">No</option>
                                                                            <div class="invalid-feedback">
                                                                            Seleccione una opción
                                                                        </div>
                                                                    </select>
                                                                    </div>
                                                                    
                                                                </div>


                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-4">
                                                                        <label class="form-control-label">¿Se tienen metas establecidas? <span class="text-danger ml-2">*</span></label>
                                                                        <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="metas_objetivos" >
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Si">Si</option>
                                                                            <option value="No">No</option>
                                                                            <div class="invalid-feedback">
                                                                            Seleccione una opción
                                                                        </div>
                                                                    </select>
                                                                    </div>

                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">Genrales por área<span class="text-danger ml-2">*</span></label>
                                                                        <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="esta_por_escrito" >
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Si">Si</option>
                                                                            <option value="No">No</option>
                                                                            <div class="invalid-feedback">
                                                                            Seleccione una opción
                                                                        </div>
                                                                    </select>
                                                                    </div>

                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">Participa el personal<span class="text-danger ml-2">*</span></label>
                                                                        <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="definido_mision" >
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Si">Si</option>
                                                                            <option value="No">No</option>
                                                                            <div class="invalid-feedback">
                                                                            Seleccione una opción
                                                                        </div>
                                                                    </select>
                                                                    </div>
                                                                    
                                                                </div>

                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-control-label">¿Cuenta con un organigrama?<span class="text-danger ml-2">*</span></label>
                                                                        <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="definido_mision" >
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Si">Si</option>
                                                                            <option value="No">No</option>
                                                                            <div class="invalid-feedback">
                                                                            Seleccione una opción
                                                                        </div>
                                                                    </select>
                                                                    </div>
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-control-label">Cargar archivo<span class="text-danger ml-2">*</span></label>
                                                                        <input name="file_organigrama" = type="file">
                                                                    </div>
                                                                    
                                                                </div>

                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-control-label">¿El organigrama de la empresa es conocido por todo el personal?<span class="text-danger ml-2">*</span></label>
                                                                        <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="definido_mision" >
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Si">Si</option>
                                                                            <option value="No">No</option>
                                                                            <div class="invalid-feedback">
                                                                            Seleccione una opción
                                                                        </div>
                                                                    </select>
                                                                    </div>
                                                                    <div class="col-xl-6 mb-3">
                                                                        
                                                                    </div>
                                                                    
                                                                </div>

                                                                <div class="section-title mt-5 mb-5">
                                                                    <h4>Puestos principales</h4>
                                                                </div>
                                                                <!--
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="remove-icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
<div class="field_wrapper">
    <div>
        <input type="text" name="field_name[]" value=""/>
        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="views/assets/img/apple-touch-icon.png"/></a>
    </div>
</div>-->


                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-control-label">Nombre<span class="text-danger ml-2">*</span></label>
                                                                        <input type="text" name="otros_negocios"  class="form-control" required="">

                                                                        <div class="invalid-feedback">
                                                                          Ingrese el nombre del trabajador
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-6">
                                                                        <label class="form-control-label">Pusto<span class="text-danger ml-2">*</span></label>
                                                                        <input type="text" name="otros_negocios"  class="form-control" required="">

                                                                        <div class="invalid-feedback">
                                                                          Ingrese el puesto del trabajador
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>



                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-4">
                                                                        <label class="form-control-label">Edad <span class="text-danger ml-2">*</span></label>
                                                                        <input type="number" name="otros_negocios"  class="form-control" required="">

                                                                        <div class="invalid-feedback">
                                                                          Ingrese el puesto del trabajador
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">Años de experencia laboral<span class="text-danger ml-2">*</span></label>
                                                                        <input type="number" name="otros_negocios"  class="form-control" required="">

                                                                        <div class="invalid-feedback">
                                                                          Ingrese la edad del trabajador
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">Años en la empresa<span class="text-danger ml-2">*</span></label>
                                                                        <input type="number" name="otros_negocios"  class="form-control" required="">

                                                                        <div class="invalid-feedback">
                                                                          Ingrese el puesto del trabajador
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>



                                                                <div class="section-title mt-5 mb-5">
                                                                    <h4>Información de Puestos</h4>
                                                                </div>

                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-4">
                                                                        <label class="form-control-label">Trabaja algun familiar dentro de la empresa<span class="text-danger ml-2">*</span></label>
                                                                        <input type="radio" name="gender" value="Si"> Si<br>
                                                                        <input type="radio" name="gender" value="No"> No<br>
                                                                    </div>

                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">¿Que parentesco tine cone el familiar?<span class="text-danger ml-2">*</span></label>
                                                                        <input type="number" name="otros_negocios"  class="form-control" required="">

                                                                        <div class="invalid-feedback">
                                                                          Ingrese la edad del trabajador
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">¿Que puesto ocupa dentro de la empresa?<span class="text-danger ml-2">*</span></label>
                                                                        <input type="number" name="otros_negocios"  class="form-control" required="">

                                                                        <div class="invalid-feedback">
                                                                          Ingrese el puesto del trabajador
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>


                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-4">
                                                                        <label class="form-control-label">
                                                                            ¿Son supervisadas las funciones delegadas a su personal?<span class="text-danger ml-2">*</span>
                                                                        </label>
                                                                        
                                                                        <div class="custom-control custom-radio styled-radio mb-3">
                                                                            <input class="custom-control-input" type="radio" name="options" id="opt-01" required value="Si">
                                                                        <label class="custom-control-descfeedback" for="opt-01">Si</label>
                                                                        <div class="invalid-feedback">
                                                                            Seleccione si
                                                                        </div>
                                                                        </div>

                                                                        <div class="custom-control custom-radio styled-radio mb-3">
                                                                            <input class="custom-control-input" type="radio" name="options" id="opt-02" required value="No">
                                                                            <label class="custom-control-descfeedback" for="opt-02">No</label>
                                                                            <div class="invalid-feedback">
                                                                                O seleccione no
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">¿Por qué?<span class="text-danger ml-2">*</span></label>
                                                                        <input type="number" name="otros_negocios"  class="form-control" required="">

                                                                        <div class="invalid-feedback">
                                                                            d.g,dbgj
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">¿Cómo<span class="text-danger ml-2">*</span></label>
                                                                        <input type="number" name="otros_negocios"  class="form-control" required="">

                                                                        <div class="invalid-feedback">
                                                                          Ingrese el puesto del trabajador
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>


                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-control-label">¿Quién toma las decisiones finales en la emrpesa?<span class="text-danger ml-2">*</span></label>
                                                                        <input type="text" name="otros_negocios"  class="form-control" required="">

                                                                        <div class="invalid-feedback">
                                                                          Ingrese el nombre del trabajador
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-xl-6">
                                                                        <label class="form-control-label">Y en su ausencia, ¿Quién?<span class="text-danger ml-2">*</span></label>
                                                                        <input type="text" name="otros_negocios"  class="form-control" required="">

                                                                        <div class="invalid-feedback">
                                                                          Ingrese el puesto del trabajador
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>













                                                                <ul class="pager wizard text-right">
                                                                    <li class="previous d-inline-block">
                                                                        <a href="javascript:;" class="btn btn-secondary ripple">Anterior</a>
                                                                    </li>
                                                                    <li class="next d-inline-block">
                                                                        <a href="javascript:;" class="btn btn-gradient-01">Sigueinte</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="tab-pane" id="tab2">
                                                                <div class="section-title mt-5 mb-5">
                                                                    <h4>Información general de la empresa</h4>
                                                                </div>
                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">RFC<span class="text-danger ml-2">*</span></label>
                                                                        <input maxlength="18" name="rfc" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" placeholder="Ingrese el RFC" class="form-control" required="">
                                                                        <div class="invalid-feedback">
                                                                            Por favor ingresa el RFC
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">Camara a la que pertece <span class="text-danger ml-2"></span></label>
                                                                        <input type="text" placeholder="Ingrese la camara a la que pertece" class="form-control" name="camara_perteneciente">
                                                                    </div>

                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">Giro<span class="text-danger ml-2">*</span></label>
                                                                        <input name="giro" type="text" placeholder="Ingrese el RFC" class="form-control" required="">
                                                                        <div class="invalid-feedback">
                                                                            Por favor ingresa el giro de la empresa
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-6">
                                                                        <label class="form-control-label">Activdades</label>
                                                                        <textarea class="form-control" placeholder="Describa las actividades que realiza la empresa" name="actividades_realizadas" required></textarea>
                                                                        <div class="invalid-feedback">
                                                                            Por favor ingresa las actividades que realiza
                                                                        </div>
                                                                    </div>



                                                                    <div class="col-xl-4 mb-5">
                                                                        <label class="form-control-label">Sector<span class="text-danger ml-2">*</span></label>
                                                                       <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="id_sector" >
                                                                        <div class="invalid-feedback">
                                                                            Seleccione un sector
                                                                        </div>
                                                                            <option value="">Seleccione</option>
                                                                            <?php 
                                                                              $select = new MvcController();
                                                                              $select -> getSelectMunicipiosController("sectores","id_sector","nombre");
                                                                            ?>
                                                                                           
                                                                            
                                                                    </select>

                                                                    </div>


                                                                </div>

                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">Número de empleados<span class="text-danger ml-2">*</span></label>
                                                                        <input name="num_empleados" type="number"  placeholder="Ingrese en número de empleados" class="form-control" required="">
                                                                        <div class="invalid-feedback">
                                                                            Por favor ingresa el número de empleados
                                                                        </div>
                                                                    </div>
                                                                  
                                                                    <div class="col-xl-4 mb-5">
                                                                        <label class="form-control-label">Número de sucursales<span class="text-danger ml-2"></span></label>

                                                                        <input type="number" name="num_sucursales" value="" placeholder="Ingrese en número de sucursales" class="form-control">
                                                                       
                                                                    </div>
                                                                    <div class="col-xl-4">
                                                                        <label class="form-control-label">Años de exportación<span class="text-danger ml-2"></span></label>
                                                                        <input name="anios_exportacion" type="Number" placeholder="Ingrese los años de exportación" class="form-control">
                                                                    </div>
                                                                </div>


                                                                <div class=" calidad form-group row mb-3">
                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">Certificado de calidad<span class="text-danger ml-2">*</span></label>
                                                                        <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="certificado_calidad" >
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Si">Si</option>
                                                                            <option value="No">No</option>
                                                                            <div class="invalid-feedback">
                                                                            Seleccione un sector
                                                                        </div>
                                                                    </select>
                                                                    </div>
                                                                    <div class="col-xl-4 mb-5">
                                                                        <label class="form-control-label">Empresa en operación<span class="text-danger ml-2">*</span></label>
                                                                       <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="empresa_en_operacion" >
                                                                            <option value="">Seleccione</option>
                                                                            </option>
                                                                            <option value="Si">Si</option>
                                                                            <option value="No">No</option>           
                                                                            <div class="invalid-feedback">
                                                                            Seleccione un sector
                                                                        </div>
                                                                    </select>
                                                                    </div>
                                                                    <div class="col-xl-4">
                                                                        <label class="form-control-label">Cuenta con estados financieros<span class="text-danger ml-2">*</span></label>
                                                                        <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="estados_financieros" >
                                                                            <option value="">Seleccione</option>
                                                                            </option>
                                                                            <option value="Si">Si</option>
                                                                            <option value="No">No</option>           
                                                                            <div class="invalid-feedback">
                                                                            Seleccione una opción
                                                                        </div>
                                                                    </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">SCIAN<span class="text-danger ml-2"></span></label>
                                                                        <input maxlength="7" onkeyup="javascript:this.value=this.value.toUpperCase();" type="text" value="" placeholder="Ingrese SCIAN" class="form-control" name="scian">
                                                                    </div>
                                                                    <div class="col-xl-4 mb-5">
                                                                        <label class="form-control-label">Inicio de operaciones<span class="text-danger ml-2">*</span></label>

                                                                       <input name="inicio_operacion" type="date" class="form-control" required="" max=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                                                                       <div class="invalid-feedback">
                                                                            Por favor ingrese una fecha valida
                                                                        </div>
                                                                       
                                                                    </div>
                                                                    <div class="col-xl-4">
                                                                        <label class="form-control-label">Información que se entrega<span class="text-danger ml-2">*</span></label>

                                                                        <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="informacion_que_entrega" >
                                                                            <option value="">Seleccione</option>
                                                                            <option value="Hoja de asignación y copia">Hoja de asignación y copia</option>
                                                                            <option value="Carta de términos y condiciones">Carta de términos y condiciones</option>
                                                                        </div>
                                                                    </select>


                                                                    </div>
                                                                </div>


                                                                


                                                                

                                                                


                                                                
                                                                


                                                                <ul class="pager wizard text-right">
                                                                    <li class="previous d-inline-block">
                                                                        <a href="javascript:;" class="btn btn-secondary ripple">Anterior</a>
                                                                    </li>
                                                                    <li class="next d-inline-block">
                                                                        <a href="javascript:;" class="btn btn-gradient-01">Siguiente</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="tab-pane" id="tab3">
                                                                

                                                                <div class="section-title mt-5 mb-5">
                                                                    <h4>Direccion de la empresa</h4>
                                                                </div>
                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-6 mb-3">
                                                                        <label class="form-control-label">Colonia<span class="text-danger ml-2">*</span></label>
                                                                        <input required="" type="text" placeholder ="Ingrese la colona" class="form-control" name="colonia">
                                                                        <div class="invalid-feedback">
                                                                            Ingrese el nombre de la colonía 
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <label class="form-control-label">Municipio<span class="text-danger ml-2">*</span></label>
                                                                        

                                                                            <select class="selectpicker show-menu-arrow custom-select form-control" data-live-search="true" required="" name="id_municipio" >
                                                                                <option value="">Seleccione</option>
                                                                                <?php 
                                                                                  $select2 = new MvcController();
                                                                                  $select2 -> getSelectMunicipiosController("municipios","id_municipio","nombre");
                                                                                ?>
                                                                                               
                                                                                
                                                                            </select>

                                                                    </div>


                                                                </div>

                                                                <div class="form-group row mb-3">
                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">Calle<span class="text-danger ml-2">*</span></label>
                                                                        <input type="text" value="" placeholder="Ingrese la calle" class="form-control" required="" name="calle">
                                                                        <div class="invalid-feedback">
                                                                            Por favor ingrese el nombre de la calle
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 mb-5">
                                                                        <label class="form-control-label">Número<span class="text-danger ml-2"></span></label>
                                                                        <input type="text" placeholder="Ingrese el número" class="form-control" name="num_domicilio">
                                                                    </div>
                                                                    <div class="col-xl-4">
                                                                        <label class="form-control-label">Código postal<span class="text-danger ml-2"></span></label>
                                                                        <input type="text" placeholder="Ingrese el código postal" class="form-control" name="cp">
                                                                    </div>
                                                                </div>



                                                                <div class="section-title mt-5 mb-5">
                                                                    <h4>Contacto</h4>
                                                                </div>
                                                                <div class="form-group row mb-3">



                                                                    <div class="col-xl-4 mb-5">
                                                                        <label class="form-control-label">Telefono empresarial<span class="text-danger ml-2"></span></label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon addon-primary">
                                                                            <i class="la la-phone"></i>
                                                                            </span>
                                                                                <input type="text" maxlength="15" class="form-control" placeholder="Ingrese el  telefóno empresarial" name="telefono_empresarial">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xl-4 mb-3">
                                                                        <label class="form-control-label">Correo empresarial<span class="text-danger ml-2"></span></label>
                                                    
                                                                    <div class="input-group">
                                                                        <input type="email" class="form-control" placeholder="Ingrese el correo empresarial" name="correo_empresa">
                                                                        <span class="input-group-addon addon-orange">.com</span>
                                                                        <div class="invalid-feedback">
                                                                            Por favor ingresa una cuenta valida
                                                                        </div>
                                                                    </div>
                                                                
                                                                    </div>
                                                                    <div class="col-xl-4">
                                                                        <label class="form-control-label">FAX<span class="text-danger ml-2"></span></label>
                                                                        <input type="text" id="fax"placeholder="Ingrese el FAX" class="form-control" name="fax">
                                                                    </div>
                                                                </div>








                                                                

                                                                <ul class="pager wizard text-right">
                                                                    <li class="previous d-inline-block">
                                                                        <a href="javascript:void(0)" class="btn btn-secondary ripple">Anterior</a>
                                                                    </li>
                                                                    <li class="next d-inline-block">
                                                                        <!-- <a href="javascript:void(0)" class="finish btn btn-gradient-01" data-toggle="modal">Finish</a> -->

                                                                        <button class="btn btn-gradient-01" name="btnEnviar" type="submit">Terminar</button>

                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- End Form -->
                                </div>
                            </div>

                                
</form>
          <script type="text/javascript">
            //$(".mision_escrita").hide();

          </script>
                        <!-- End Row -->
                    </div>
                    <!-- End Container -->
                    <!-- Begin Page Footer-->
                   <?php include("admin_footer.php"); ?>
                    <!-- End Page Footer -->
                    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
                    <!-- Offcanvas Sidebar -->
                    <div class="off-sidebar from-right">
                        <div class="off-sidebar-container">
                            <header class="off-sidebar-header">
                                <ul class="button-nav nav nav-tabs mt-3 mb-3 ml-3" role="tablist" id="weather-tab">
                                    <li><a class="active" data-toggle="tab" href="#messenger" role="tab" id="messenger-tab">Messages</a></li>
                                    <li><a data-toggle="tab" href="#today" role="tab" id="today-tab">Today</a></li>
                                </ul>
                                <a href="#off-canvas" class="off-sidebar-close"></a>
                            </header>
                                    <!-- Begin Today -->
                                    <div role="tabpanel" class="tab-pane fade" id="today" aria-labelledby="today-tab">
                                        <!-- Begin Today Stats -->
                                        <div class="sidebar-heading pt-0">Today</div>
                                        <div class="today-stats mt-3 mb-3">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <i class="la la-users"></i>
                                                    <div class="counter">264</div>
                                                    <div class="heading">Clients</div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="la la-cart-arrow-down"></i>
                                                    <div class="counter">360</div>
                                                    <div class="heading">Sales</div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="la la-money"></i>
                                                    <div class="counter">$ 4,565</div>
                                                    <div class="heading">Earnings</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Today Stats -->
                                        <!-- Begin Friends -->
                                        <div class="sidebar-heading">Friends</div>
                                        <div class="quick-friends mt-3 mb-3">
                                            <ul class="list-group w-100">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="views/assets/img/avatar/avatar-02.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Brandon Smith</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="views/assets/img/avatar/avatar-03.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Louis Henry</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="views/assets/img/avatar/avatar-04.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Nathan Hunter</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="views/assets/img/avatar/avatar-05.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Megan Duncan</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="views/assets/img/avatar/avatar-06.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Beverly Oliver</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Friends -->
                                        <!-- Begin Settings -->
                                        <div class="sidebar-heading">Settings</div>
                                        <div class="quick-settings mt-3 mb-3">
                                            <ul class="list-group w-100">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Notifications Email</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Notifications Sound</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox">
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Chat Message Sound</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Settings -->
                                    </div>
                                    <!-- End Today -->
                                </div>
                            </div>
                            <!-- End Offcanvas Container -->
                        </div>
                        <!-- End Offsidebar Container -->
                    </div>
                    <!-- End Offcanvas Sidebar -->
                </div>
            </div>
            <!-- End Page Content -->
        </div>
        <!-- Begin Modal -->
        <div id="success-modal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="sa-icon sa-success animate" style="display: block;">
                            <span class="sa-line sa-tip animateSuccessTip"></span>
                            <span class="sa-line sa-long animateSuccessLong"></span>
                            <div class="sa-placeholder"></div>
                            <div class="sa-fix"></div>
                        </div>
                        <div class="section-title mt-5 mb-2">
                            <h2 class="text-gradient-02">Thank you!</h2>
                        </div>
                        <p class="mb-5">The form was submitted successfully</p>
                        <button type="button" class="btn btn-shadow mb-3" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        <!-- Begin Vendor Js -->
        <script src="views/assets/vendors/js/base/jquery.min.js"></script>
        <script src="views/assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="views/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="views/assets/vendors/js/bootstrap-wizard/bootstrap.wizard.min.js"></script>
        <script src="views/assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="views/assets/js/components/wizard/form-wizard.min.js"></script>

        <!-- End Page Snippets -->
        
        <script src="views/assets/vendors/js/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="views/assets/js/components/validation/validation.min.js"></script>




    </body>


</html>