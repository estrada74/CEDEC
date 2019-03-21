<?php
//ver si hay una sesion existente
  error_reporting(0);
  #session_start();
  if($_SESSION["id"]){
    
    echo "
    <script type='text/javascript'>
      window.location='index.php?action=dashboard';
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
        <title>CEDEC - Login</title>
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
    <body class="bg-white">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="views/assets/img/logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <!-- Begin Container -->
        <div class="container-fluid no-padding h-100">
            <div class="row flex-row h-100 bg-white">
                <!-- Begin Left Content -->
                <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
                    <div class="elisyam-bg background-01">
                        <div class="elisyam-overlay overlay-01"></div>
                        <div class="authentication-col-content mx-auto">
                            <h1 class="gradient-text-01">
                                Bienvenido al portal del CEDEC TAM
                            </h1>
                            <span class="description">
                                Etiam consequat urna at magna bibendum, in tempor arcu fermentum vitae mi massa egestas. 
                            </span>
                        </div>
                    </div>
                </div>
                <!-- End Left Content -->
                <!-- Begin Right Content -->

                <div class="col-xl-4 col-lg-6 col-md-7 my-auto no-padding">
                    <!-- Begin Form -->
                    <form method="post">

                        <div class="authentication-form mx-auto">
                            <div class="logo-centered">
                                <a href="db-default.html">
                                    <img src="views/assets/img/logo.png" alt="logo">
                                </a>
                            </div>
                            <h3>Iniciar sesón</h3>
                            <form>
                                <div class="group material-input">
                                    <input type="text" required name="txtUsername">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Correo</label>
                                </div>
                                <div class="group material-input">
                                    <input type="password" required name="txtPassword">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label>Contraseña</label>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col text-left">
                                    <div class="styled-checkbox">
                                        <input type="checkbox" name="checkbox" id="remeber">
                                        <label for="remeber">Recordar usuario</label>
                                    </div>
                                  
                                </div>
                              
                                <div class="col text-right">
                                    <a href="pages-forgot-password.html">¿Se te olvido la contrseña?</a>
                                </div>
                              
                            </div>
                                                 <?php
                            $ingresar = new MvcController();
                            $ingresar -> ingresoUsuarioController();
                        ?>

                            <div class="sign-btn text-center">
                                <div class="sign-btn text-center">
                                    <input type="submit" name="btnIngresar" value="Iniciar sesión" class="btn btn-lg btn-gradient-01">
                                </div>
                            </div>
                            <div class="register">
                                ¿No tienes cuenta? 
                                <br>
                                <a href="pages-register.html">Registrate como beneficiario</a>
                                <a href="pages-register.html">Registrate como colaborador</a>
                            </div>
                        </div>
                       
                    </form>
                    <!-- End Form -->                        
                </div>
                <!-- End Right Content -->
            </div>
            <!-- End Row -->
        </div>
        <!-- End Container -->    
        <!-- Begin Vendor Js -->
        <script src="views/assets/vendors/js/base/jquery.min.js"></script>
        <script src="views/assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="views/assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
    </body>
</html>