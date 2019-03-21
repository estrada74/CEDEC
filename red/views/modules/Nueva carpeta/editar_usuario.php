<?php
//ver si hay una sesion existente
  error_reporting(0);
  session_start();
  if(!$_SESSION['admin']){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>

<?php
    include("admin_header.php");
?>
<?php
    $res = new MvcController();
    $datos = $res -> editarController("usuarios","id_usuario");
?>
       
 
 <div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Editar usuario</h2>
                    
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row flex-row">
            <div class="col-xl-12">
                <!-- Form -->
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>Editar usuario</h4>
                       
                    </div>
                    <div class="widget-body">
                        <form class="needs-validation" novalidate="" method="post">
                        
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre *</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" value="<?php echo $datos["nombre"] ?>" name="txtNombre" placeholder="Nombre" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa un nombre
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Apellido *</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" value="<?php echo $datos["apellido"] ?>" name="txtApellido" placeholder="Apellido" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa los Apellidos
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre de usuario *</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control"  value="<?php echo $datos["username"] ?>"  name="txtUsername" placeholder="Nombre de usuario" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa un nombre de usuario
                                    </div>
                                </div>
                            </div>
                          
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Correo *</label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <input type="email" class="form-control" value="<?php echo $datos["email"] ?>" name="txtEmail" placeholder="Correo" required="">
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
                                    <input type="password" class="form-control" value="<?php echo $datos["password"] ?>" name="txtPassword" placeholder="Contraseña" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa la contraseña
                                    </div>
                                </div>
                            </div>
                           <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Fecha registro *</label>
                                <div class="col-lg-5">
                                    <input type="date" class="form-control" value="<?php echo $datos["fecha_registro"] ?>" name="txtFecha" placeholder="Contraseña" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa la fecha
                                    </div>
                                </div>
                            </div>
                          
                          <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Visitas *</label>
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" value="<?php echo $datos["num_visitas"] ?>" name="txtVisitas" placeholder="Contraseña" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa el numero de visitas
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
              <?php
                   $editarU = new MvcController();
                   $editarU -> actualizarUsuariosController();
               ?> 
                <!-- End Form -->
            </div>
        </div>
        <!-- End Row -->
    </div>
   <php>
      </php>
   
   
    <!-- End Container -->
<?php include("admin_footer.php") ?>    
</div>


