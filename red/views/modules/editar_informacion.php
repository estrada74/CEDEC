<?php
//ver si hay una sesion existente
  error_reporting(0);
 # session_start();
  if(!$_SESSION["id"]){
    echo "
    <script type='text/javascript'>
      window.location='index.php';
    </script>";
  } 
?>

<?php
    if ($_SESSION["id"]!=$_GET["id"]){
        echo '<script type="text/javascript">window.location="index.php"</script>';
    }
    include("admin_header.php");
?>


<?php
    $res = new MvcController();
    $datos = $res -> editarInformacionController();
?>
<title>CEDEC - Editar informacón</title>
       
 
 <div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">

                    <h2 class="page-header-title">Editar administrador</h2>
                    
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
                        <strong>Editar administrador:</strong> <?php echo $datos["nombre"];  ?>
                    </div>
                    <div class="widget-body">
                        <form class="needs-validation" novalidate="" method="post" enctype="multipart/form-data">
                            <?php
                                $editarU = new MvcController();
                                $editarU -> actualizarInformacionController();
                            ?> 
                        
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
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Apellido paterno *</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" value="<?php echo $datos["a_paterno"] ?>" name="txtApellidoP" placeholder="Apellido paterno" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa el Apellido paterno
                                    </div>
                                </div>
                            </div>

                             <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Apellido materno *</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" value="<?php echo $datos["a_materno"] ?>" name="txtApellidoM" placeholder="Apellido materno" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa el Apellido materno
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
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Imagen de usuario</label>
                                <div class="col-lg-5">
                                    <input type="file"  name="img_usuario" placeholder="" >
                                </div>
                            </div>

                          
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Estado *</label>
                                <div class="col-lg-5">
                                    <select class= "custom-select form-control" name="selectEstado">

                                        <option value="<?php echo $datos["estado"]; ?>"><?php echo $datos["estado"];?></option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                    </select>
                                   
                                    <div class="invalid-feedback">
                                        Por seleccione un estado
                                    </div>
                                </div>
                            </div>
                           <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Contraseña *</label>
                                <div class="col-lg-5">
                                    <input type="password" class="form-control" value="<?php echo $datos["pass"] ?>" name="txtPass" placeholder="Contraseña" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa una contraseña
                                    </div>
                                </div>
                            </div>
                          
                         
                          
                            <div class="text-right">
                                
                                <button class="btn btn-shadow" type="reset">Restablecer datos</button>
                                <button class="btn btn-gradient-01" name="btnEnviar" type="submit">Guardar</button>
                            </div>
                        </form>
                         
                    </div>
                </div>
              
                <!-- End Form -->
            </div>
        </div>
        <!-- End Row -->
    </div>
   <php>
      </php>
   
   
    <!-- End Container -->
<?php include("admin_footer.php") ?>    

<!-- Begin Vendor Js -->
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        



<script src="views/assets/vendors/js/base/jquery.min.js"></script>
<script src="views/assets/vendors/js/base/core.min.js"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="views/assets/vendors/js/datatables/datatables.min.js"></script>
<script src="views/assets/vendors/js/datatables/dataTables.buttons.min.js"></script>
<script src="views/assets/vendors/js/datatables/jszip.min.js"></script>
<script src="views/assets/vendors/js/datatables/buttons.html5.min.js"></script>
<script src="views/assets/vendors/js/datatables/pdfmake.min.js"></script>
<script src="views/assets/vendors/js/datatables/vfs_fonts.js"></script>
<script src="views/assets/vendors/js/datatables/buttons.print.min.js"></script>
  
<script src="views/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
<script src="views/assets/vendors/js/datepicker/moment.min.js"></script>
<script src="views/assets/vendors/js/datepicker/daterangepicker.js"></script>  
<script src="views/assets/vendors/js/app/app.min.js"></script>
<!-- End Page Vendor Js -->
<!-- Begin Page Snippets -->
<script src="views/assets/js/components/datepicker/datepicker.js"></script>  
<script src="views/assets/js/components/tables/tables.js"></script>  
<script src="views/assets/js/components/validation/validation.min.js"></script>


<!-- Begin Vendor Js -->
<script src="views/assets/vendors/js/base/jquery.min.js"></script>
<script src="views/assets/vendors/js/base/core.min.js"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="views/assets/vendors/js/nicescroll/nicescroll.min.js"></script>

<script src="views/assets/vendors/js/app/app.min.js"></script>

</div>


