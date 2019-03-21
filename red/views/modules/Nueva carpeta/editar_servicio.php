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
    $datos = $res -> editarController("cw_servicios","id_servicio");
?>
 
 <div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Agregar servicio</h2>
                    
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row flex-row">
            <div class="col-xl-12">
                <!-- Form -->
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>Agregar servicio</h4>
                       
                    </div>
                    <div class="widget-body">
                        <form class="needs-validation" novalidate="" method="post">
                          
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre *</label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="txtNombre" value="<?php echo $datos["nombre"] ?>" placeholder="Nombre" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa un nombre
                                    </div>
                                </div>
                            </div>
                            

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Descripcion *</label>
                                <div class="col-lg-5">
                                    <textarea class="form-control" rows="4" cols="50" name="txtDescripcion" > <?php echo $datos["descripcion"] ?>
                                        
                                    </textarea>
                                    <div class="invalid-feedback">
                                        Por favor ingresa una descripcion
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Precio *</label>
                                <div class="col-lg-5">
                                    <input type="number" class="form-control" name="txtPrecio" value="<?php echo $datos["precio"]?>" placeholder="Precio" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresar precio
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



<?php
###agregar al servidor
    $editarC = new MvcController();
    $editarC -> actualizarServicioController();
?>
</div>


