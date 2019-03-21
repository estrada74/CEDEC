<?php
//iniciar la sesion y redireccionar al los productos
//error_reporting(0);
  #session_start();
  if(!$_SESSION["id"]){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>

 <div class="default-sidebar">
                    <!-- Begin Side Navbar -->
                    <nav class="side-navbar box-scroll sidebar-scroll">
                        <!-- Begin Main Navigation -->
                        <ul class="list-unstyled">
                            <li class="active"><a href="#dropdown-db" aria-expanded="true" data-toggle="collapse"><i class="la la-columns"></i><span>Dashboard</span></a>
                                <ul id="dropdown-db" class="collapse list-unstyled show pt-0">
                                    <li><a class="active" href="index.php?action=dashboard">Dashboard</a></li>
                                    <?php if($_SESSION["id_rol"]==1){ ?>
                                        <li><a href="index.php?action=registrar_sector">Registrar Sector</a></li>
                                        <li><a href="index.php?action=listado_sectores">Listado sectores</a></li>
                                        <li><a href="index.php?action=registrar_municipio">Registrar Municipio</a></li>
                                        <li><a href="index.php?action=listado_municipios">Listado municipios</a></li>
                                    <?php } ?>
                                    
                                </ul>
                            </li>
                            <?php if($_SESSION["id_rol"]==1)  {?>
                            <li><a href="#dropdown-app" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Usuarios</span></a>
                                <ul id="dropdown-app" class="collapse list-unstyled pt-0">
                                    <li><a href="index.php?action=registrar_administrador">Registrar Administrador</a></li>
                                    <li><a href="index.php?action=listado_administradores">Listado Administrador</a></li>

                                    <li><a href="index.php?action=registrar_usurio_beneficiario">Registrar beneficiario</a></li>
                                    <li><a href="index.php?action=registrar_usurio_beneficiario">Registrar solucionador</a></li>
                                    <!--
                                        <li><a href="app-chat.html">Chat</a></li>
                                        <li><a href="app-mail.html">Mail</a></li>
                                        <li><a href="app-contact.html">Contact</a></li>
                                    -->
                                </ul>
                            </li>
                            <?php  }?>
                            <li><a href="components-widgets.html"><i class="la la-spinner"></i><span>Widgets</span></a></li>
                        </ul>
                        <span class="heading">Empresas</span>
                        <ul class="list-unstyled">
                            <?php if ($_SESSION["id_rol"]==1) {?>
                                <li><a href="#dropdown-icons" aria-expanded="false" data-toggle="collapse"><i class="la la-legal"></i><span>Representantes legales</span></a>
                                    <ul id="dropdown-icons" class="collapse list-unstyled pt-0">
                                        <li><a href="index.php?action=registrar_representante_legal">Registrar representante legal</a></li>
                                        <li><a href="index.php?action=listado_representantes_legales">Listado de representes legales</a>
                                        
                                    </ul>
                                </li>
                            <?php }?>

                            <li><a href="#dropdown-ui" aria-expanded="false" data-toggle="collapse"><i class="la la-building"></i><span>Empresas</span></a>
                                <ul id="dropdown-ui" class="collapse list-unstyled pt-0">
                                    <li><a href="index.php?action=registrar_empresa">Registrar empresa</a></li>
                                    <li><a href="index.php?action=listado_empresas">
                                        <?php if ($_SESSION["id_rol"]==1) 
                                            {
                                                echo "Listado empresas";
                                            } else
                                            {
                                                echo "Mis empresas";

                                            }

                                        ?>
                                        

                                    </a></li>
                                    <!--
                                    <?php if($_SESSION["id_rol"]==1) {?>
                                    
                                        <li><a href="index.php?action=asignar_empresa">Asignar empresa a usuario</a></li>
                                    <?php } ?>-->
                                    
                                </ul>
                            </li>

                            
                            <li><a href="#dropdown-forms" aria-expanded="false" data-toggle="collapse"><i class="la la-edit"></i><span>Problemas</span></a>
                                <ul id="dropdown-forms" class="collapse list-unstyled pt-0">
                                    <li><a href="index.php?action=registrar_problema_empresarial">Registrar problema</a></li>
                                    
                                </ul>
                            </li>
                            <!--
                            <li><a href="#dropdown-tables" aria-expanded="false" data-toggle="collapse"><i class="la la-th-large"></i><span>Tables</span></a>
                                <ul id="dropdown-tables" class="collapse list-unstyled pt-0">
                                    <li><a href="tables-basic.html">Basic</a></li>
                                    <li><a href="tables-datatables.html">Datatables</a></li>
                                    <li><a href="tables-tabledit.html">Tabledit</a></li>
                                </ul>
                            </li>
                            <li><a href="maps-leaflet.html"><i class="la la-map"></i><span>Maps</span></a></li>
                        </ul>
                        <span class="heading">Pages</span>
                        <ul class="list-unstyled">
                            <li><a href="#dropdown-authentication" aria-expanded="false" data-toggle="collapse"><i class="la la-user"></i><span>Authentication</span></a>
                                <ul id="dropdown-authentication" class="collapse list-unstyled pt-0">
                                    <li><a href="pages-login.html">Login</a></li>
                                    <li><a href="pages-login-02.html">Login 02</a></li>
                                    <li><a href="pages-register.html">Register</a></li>
                                    <li><a href="pages-forgot-password.html">Forgot Password</a></li>
                                    <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                    <li><a href="pages-mail-confirm.html">Mail Confirmation</a></li>
                                </ul>
                            </li>
                            <li><a href="#dropdown-generic" aria-expanded="false" data-toggle="collapse"><i class="la la-file-text"></i><span>Generic</span></a>
                                <ul id="dropdown-generic" class="collapse list-unstyled pt-0">
                                    <li><a href="pages-coming-soon.html">Coming Soon</a></li>
                                    <li><a href="pages-profile.html">Profile</a></li>
                                    <li><a href="pages-invoice.html">Invoice</a></li>
                                    <li><a href="pages-search.html">Search</a></li>
                                    <li><a href="pages-faq.html">FAQ</a></li>
                                    <li><a href="pages-blank.html">Blank</a></li>
                                </ul>
                            </li>
                            <li><a href="#dropdown-social" aria-expanded="false" data-toggle="collapse"><i class="la la-comments"></i><span>Social</span></a>
                                <ul id="dropdown-social" class="collapse list-unstyled pt-0">
                                    <li><a href="pages-newsfeed.html">Newsfeed</a></li>
                                    <li><a href="pages-about.html">About</a></li>
                                    <li><a href="pages-events.html">Events</a></li>
                                    <li><a href="pages-friends.html">Friends</a></li>
                                    <li><a href="pages-groups.html">Groups</a></li>
                                </ul>
                            </li>
                            <li><a href="#dropdown-email" aria-expanded="false" data-toggle="collapse"><i class="la la-at"></i><span>Email</span></a>
                                <ul id="dropdown-email" class="collapse list-unstyled pt-0">
                                    <li><a href="email-welcome.html">Welcome</a></li>
                                    <li><a href="email-password.html">Reset Password</a></li>
                                    <li><a href="email-order.html">Order Confirmation</a></li>
                                </ul>
                            </li>
                            <li><a href="#dropdown-pricing" aria-expanded="false" data-toggle="collapse"><i class="la la-usd"></i><span>Pricing</span></a>
                                <ul id="dropdown-pricing" class="collapse list-unstyled pt-0">
                                    <li><a href="pages-pricing-tables-01.html">Style 01</a></li>
                                    <li><a href="pages-pricing-tables-02.html">Style 02</a></li>
                                </ul>
                            </li>
                            <li><a href="#dropdown-error" aria-expanded="false" data-toggle="collapse"><i class="la la-exclamation-triangle"></i><span>Errors</span></a>
                                <ul id="dropdown-error" class="collapse list-unstyled pt-0">
                                    <li><a href="pages-404-01.html">Style 01</a></li>
                                    <li><a href="pages-404-02.html">Style 02</a></li>
                                </ul>
                            </li>
                        </ul>
                        -->
                        <!-- End Main Navigation -->
                    </nav>
                    <!-- End Side Navbar -->
                </div>



                