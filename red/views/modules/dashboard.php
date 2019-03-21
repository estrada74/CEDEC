<?php
//iniciar la sesion y redireccionar al los productos
//error_reporting(0);
  #session_start();
  if(!$_SESSION['id']){
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
        <title>CEDEC - Dashboard</title>
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
        <link rel="stylesheet" href="views/assets/css/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="views/assets/css/owl-carousel/owl.theme.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body id="page-top">
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
            <?php
                include("admin_header.php")
            ?>
            <!-- End Header -->
            <!-- Begin Page Content -->
            <div class="page-content d-flex align-items-stretch">
              
            
                <div class="content-inner">

                    <div class="container-fluid">
                        <!-- Begin Page Header-->
                        <div class="row">
                            <div class="page-header">
	                            <div class="d-flex align-items-center">
	                                <h2 class="page-header-title">Dashboard</h2>
	                                <div>
	                                <div class="page-header-tools">
	                                    <a class="btn btn-gradient-01" href="#">Add Widget</a>
	                                </div>
	                                </div>
	                            </div>
                            </div>
                        </div>
                        <!-- End Page Header -->
                        <!-- Begin Row -->
                        <?php  if ($_SESSION["id_rol"]==1) { ?>
                        <div class="row flex-row">
                            <!-- Begin Facebook -->
                            
                                <div class="col-xl-4 col-md-6 col-sm-6">
                                    <div class="widget widget-12 has-shadow">
                                        <div class="widget-body">
                                            <div class="media">
                                                <div class="align-self-center ml-5 mr-5">
                                                    <i class="la la-users text-facebook"></i>
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <div class="title text-facebook">Usuarios registrados</div>
                                                    <div class="number"><?php 
                                                            $cantidad = new MvcController(); 
                                                            $cantidad -> getCantidadRegistrosController("usuarios");
                                                            ?>, Usuarios</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-sm-6">
                                    <div class="widget widget-12 has-shadow">
                                        <div class="widget-body">
                                            <div class="media">
                                                <div class="align-self-center ml-5 mr-5">
                                                    <i class="la la-user text-facebook"></i>
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <a href="index.php?action=listado_administradores">
                                                        <div class="title text-facebook">Administradores registrados</div>
                                                    </a>


                                                    <div class="number"><?php 
                                                            $cantidad = new MvcController(); 
                                                            $cantidad -> getCantidadUsuariosPorRolController("usuarios",1,"id_rol");
                                                            ?>, Administrdores</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-xl-4 col-md-6 col-sm-6">
                                    <div class="widget widget-12 has-shadow">
                                        <div class="widget-body">
                                            <div class="media">
                                                <div class="align-self-center ml-5 mr-5">
                                                    <i class="la la-user text-facebook"></i>
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <a href="index.php?action=listado_administradores">
                                                        <div class="title text-facebook">Beneficiarios registrados</div>
                                                    </a>


                                                    <div class="number"><?php 
                                                            $cantidad = new MvcController(); 
                                                            $cantidad -> getCantidadUsuariosPorRolController("usuarios",2,"id_rol");
                                                            ?>, Beneficiarios</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                           
                                 
                                <!-- End Linkedin -->
                            </div>
                            <!-- End Row -->



                            <div class="row flex-row">
                                


                                <div class="col-xl-4 col-md-6 col-sm-6">
                                    <div class="widget widget-12 has-shadow">
                                        <div class="widget-body">
                                            <div class="media">
                                                <div class="align-self-center ml-5 mr-5">
                                                    <i class="la la-user text-facebook"></i>
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <a href="index.php?action=listado_administradores">
                                                        <div class="title text-facebook">Solucionadores registrados</div>
                                                    </a>


                                                    <div class="number"><?php 
                                                            $cantidad = new MvcController(); 
                                                            $cantidad -> getCantidadUsuariosPorRolController("usuarios",3,"id_rol");
                                                            ?>, Solucionadores</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 

                                <div class="col-xl-4 col-md-6 col-sm-6">
                                    <div class="widget widget-12 has-shadow">
                                        <div class="widget-body">
                                            <div class="media">
                                                <div class="align-self-center ml-5 mr-5">
                                                    <i class="la la-legal text-linkedin"></i>
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <a href="index.php?action=listado_representantes_legales">
                                                        <div class="title text-linkedin">Representantes legales</div>
                                                    </a>

                                                    <div class="number">
                                                        <?php 
                                                            $cantidad = new MvcController(); 
                                                            $cantidad ->getCantidadRegistrosController("representante_legal");
                                                        ?>, Representantes
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-sm-6">
                                    <div class="widget widget-12 has-shadow">
                                        <div class="widget-body">
                                            <div class="media">
                                                <div class="align-self-center ml-5 mr-5">
                                                    <i class="la la-building text-twitter"></i>
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <a href="index.php?action=listado_empresas">
                                                        <div class="title text-twitter">Empresas</div>
                                                    </a>

                                                    <div class="number"><?php 
                                                            $cantidad = new MvcController(); 
                                                            $cantidad -> getCantidadRegistrosController("empresas");
                                                            ?>, Pre diagnóstico
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>




                            <div class="row flex-row">
                                




                                <div class="col-xl-4 col-md-6 col-sm-6">
                                    <div class="widget widget-12 has-shadow">
                                        <div class="widget-body">
                                            <div class="media">
                                                <div class="align-self-center ml-5 mr-5">
                                                    <i class="la la-map-marker text-linkedin"></i>
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <a href="index.php?action=listado_municipios">
                                                        <div class="title text-linkedin">Municipios</div>
                                                    </a>

                                                    <div class="number">
                                                        <?php 
                                                            $cantidad = new MvcController(); 
                                                            $cantidad ->getCantidadRegistrosController("municipios");
                                                        ?>, municipios
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6 col-sm-6">
                                    <div class="widget widget-12 has-shadow">
                                        <div class="widget-body">
                                            <div class="media">
                                                <div class="align-self-center ml-5 mr-5">
                                                    <i class="la la-files-o text-twitter"></i>
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <a href="index.php?action=listado_sectores">
                                                        <div class="title text-twitter">Sectores</div>
                                                    </a>

                                                    <div class="number"><?php 
                                                            $cantidad = new MvcController(); 
                                                            $cantidad -> getCantidadRegistrosController("sectores");
                                                            ?>, sectores
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>



                            
                        <?php } ?>

                        <?php if($_SESSION["id_rol"]==2) {?>


                            <div class="row flex-row">
                            
                                <div class="col-xl-4 col-md-6 col-sm-6">
                                    <div class="widget widget-12 has-shadow">
                                        <div class="widget-body">
                                            <div class="media">
                                                <div class="align-self-center ml-5 mr-5">
                                                    <i class="la la-building text-twitter"></i>
                                                </div>
                                                <div class="media-body align-self-center">
                                                    <div class="title text-twitter">Empresas</div>
                                                    <div class="number"><?php 
                                                            $cantidad = new MvcController(); 
                                                            $cantidad -> getCantidadMisEmpresasController("empresas");
                                                            ?>, Pre diagnóstico
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                        <?php } ?>
                            
                                                            
                                    
                            
                    
                </div>
                <?php  include("admin_footer.php")?>
            </div>
                
        
        <script src="views/assets/vendors/js/base/jquery.min.js"></script>
        <script src="views/assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="views/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="views/assets/vendors/js/chart/chart.min.js"></script>
        <script src="views/assets/vendors/js/progress/circle-progress.min.js"></script>
        <script src="views/assets/vendors/js/calendar/moment.min.js"></script>
        <script src="views/assets/vendors/js/calendar/fullcalendar.min.js"></script>
        <script src="views/assets/vendors/js/owl-carousel/owl.carousel.min.js"></script>
        <script src="views/assets/vendors/js/app/app.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="views/assets/js/dashboard/db-default.js"></script>
        <!-- End Page Snippets -->
    </body>
</html>