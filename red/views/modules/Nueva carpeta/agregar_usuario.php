<?php
//ver si hay una sesion existente
  error_reporting(0);
  session_start();
  if(!$_SESSION['id']){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>


 <?php
    include("admin_header.php");
?>
 
 <div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Agregar usuario</h2>
                    
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row flex-row">
            <div class="col-xl-12">
                <!-- Form -->
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>Agregar usuario</h4>
                       
                    </div>
                    <div class="widget-body">
                      <?php 
                          $agregar = new MvcController();
                          $agregar -> agregarUsuariosController();
                        ?>
                        <form method="post"  class="needs-validation"  novalidate="">
                          
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre *</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="txtNombre" placeholder="Nombre" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa un nombre
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Apellido *</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="txtApellido" placeholder="Apellido" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa los Apellidos
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre de usuario *</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="txtUsername" placeholder="Nombre de usuario" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa un nombre de usuario
                                    </div>
                                </div>
                            </div>
                          
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Correo *</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="txtEmail" placeholder="Correo" required="">
                                        <span class="input-group-addon addon-orange">.com</span>
                                        <div class="invalid-feedback">
                                            Por favor ingresa un correo válido
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Contraseña *</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" name="txtPassword" placeholder="Contraseña" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa la contraseña
                                    </div>
                                </div>
                            </div>
                          
                            <div class="text-right">
                                <button class="btn btn-gradient-01" name="btnEnviar" type="submit">Guardar</button>
                                <button class="btn btn-shadow" type="reset">Borrar datos</button>
                            </div>
                        </form>
                         
                    </div>
                </div>
                <!-- End Form -->
            </div>
        </div>
        <!-- End Row -->
    </div>
    <!-- End Container -->
<?php include("admin_footer.php") ?>    
</div>


