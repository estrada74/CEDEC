<?php
//ver si hay una sesion existente
  error_reporting(0);
  #session_start();
  if(!$_SESSION["id"]){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>




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
        <title>CEDEC - Registrar prediagnóstico</title>
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
	                                <h2 class="page-header-title">Información</h2>
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

                            <div class="row flex-row">
                                <div class="col-xl-12">
                                    <!-- Form -->
                                    <div class="widget has-shadow">
                                        <div class="widget-body">
                                            <div class="alert  alert-primary" role="alert">
                                                <strong>Informacion general de la razón social: </strong>  <?php echo $datos["nombre_empresa"]; ?>
                                            </div>


                                        <div class="widget-body">
                                            <div class="row flex-row justify-content-center">
                                                <div class="col-xl-10">
                                                    <div id="rootwizard">

                                                        <div class="tab-pane" id="tab3">
                                                          
                                                            <div id="accordion-icon-right" class="accordion">
                                                                <div class="widget has-shadow">
                                                                    <a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseOne" aria-expanded="true">
                                                                        <div class="card-title w-100">1. Información de la razón social.</div>
                                                                    </a>
                                                                    <div id="IconRightCollapseOne" class="card-body collapse show" data-parent="#accordion-icon-right">
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Nombre: </div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["nombre_empresa"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">RFC</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["rfc"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">SCIAN</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["scian"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Camara a la que pertenece</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["camara_perteneciente"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Giro</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["giro"]; ?></div>
                                                                        </div>
                                                                    </div>
                                                                    <a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseTwo">
                                                                        <div class="card-title w-100">2. Información representante legal</div>
                                                                    </a>
                                                                    <div id="IconRightCollapseTwo" class="card-body collapse" data-parent="#accordion-icon-right">
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Nombre: </div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["nombre_representante"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Genero</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["genero"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Grado de estudios</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["grado_estudios"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Telefono</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["telefono_representante"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Usuario <?php echo $datos["estado_usuario"]; ?> </div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["email"]; ?></div>
                                                                        </div>
                                                                    </div>
                                                                    <a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseThree">
                                                                        <div class="card-title w-100">3. Informacion general de la razón social</div>
                                                                    </a>
                                                                    <div id="IconRightCollapseThree" class="card-body collapse" data-parent="#accordion-icon-right">
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Actividades que realiza</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["actividades_realizadas"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Sector</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><span class="la-2x"><?php echo $datos["nombre_sector"]; ?></span></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Número de empleados</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["num_empleados"]; ?> empleados</div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Número de suscursales</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["num_sucursales"]; ?> sucursales</div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Años de exportacion</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["anios_exportacion"]; ?> años </div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">¿Cuenta con certificado de calidad?</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["certificado_calidad"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">¿Actualmete se encuentra en operación?</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["empresa_en_operacion"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">¿Cuenta con estados financieros?</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["estados_financieros"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Inicio de operación</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["inicio_operacion"]; ?></div>
                                                                        </div>
                                                                    </div>
                                                                    <a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseFour">
                                                                        <div class="card-title w-100">4. Dirección</div>
                                                                    </a>
                                                                    <div id="IconRightCollapseFour" class="card-body collapse" data-parent="#accordion-icon-right">
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Colonia</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["colonia"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Municipio</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["nombre_municipio"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Calle</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["calle"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">No.</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["num_domicilio"]; ?></div>
                                                                        </div>
                                                                         <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Código postal</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["cp"]; ?></div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseFive">
                                                                        <div class="card-title w-100">5. Información  prediagnóstico</div>
                                                                    </a>
                                                                    <div id="IconRightCollapseTwo" class="card-body collapse" data-parent="#accordion-icon-right">
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Encuestador</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["encuestador"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Fecha de camptación</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["fecha_captacion"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Consultor asignado</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["consultor_asignado"]; ?></div>
                                                                        </div>
                                                                        <div class="form-group row mb-5">
                                                                            <div class="col-sm-3 form-control-label d-flex align-items-center">Carta de terminos</div>
                                                                            <div class="col-sm-8 form-control-plaintext"><?php echo $datos["carta_de_terminos"]; ?></div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                        <!-- End Row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>




             
             
                        </div>
                        <!-- End Offsidebar Container -->
                <?php include("admin_footer.php"); ?>

                    </div>
                    <!-- End Offcanvas Sidebar -->
                

                </div>

            </div>
            <!-- End Page Content -->
      
     

        

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