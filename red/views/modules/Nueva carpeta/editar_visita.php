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
    $datos = $res -> editarController("cw_visitas","id_visita");
?>
 
 <div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Editar visita</h2>
                    
                </div>
            </div>
        </div>
        <!-- End Page Header -->
        <div class="row flex-row">
            <div class="col-xl-12">
                <!-- Form -->
                <div class="widget has-shadow">
                    <div class="widget-header bordered no-actions d-flex align-items-center">
                        <h4>Usuario: </h4>
                       
                    </div>
                    <div class="widget-body">
                        <form class="needs-validation" novalidate="" method="post">
                         
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Fecha *</label>
                                <div class="col-lg-5">
                                    <input type="date" class="form-control" name="txtFecha" value="<?php echo $datos["fecha"] ?>" placeholder="Nombre" required="">
                                    <div class="invalid-feedback">
                                        Por favor ingresa una fecha
                                    </div>
                                </div>
                            </div>
                          <?php
                            $nombreServicio = new MvcController();
                            $nombre = $nombreServicio -> getNombreServicioPorIdController($datos["id_servicio"]);
                          ?>
                          <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Servicio *</label>
                                <div class="col-lg-5">
                                    <select class="form-control" name="select_servicios" required="">
                                      <option value="<?php echo $datos["id_servicio"] ?>"><?php echo $nombre["nombre"] ?></option>
                                      <?php
                                        $opciones = new MvcController();
                                        $opciones -> getServiciosParaSelectController();
                                      ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor selecciona un servicio
                                    </div>
                                </div>
                            </div>
                          
                            <input type="hidden" name="txtIdUsuario" value="<?php echo $datos["id_usuario"] ?>">
                          
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
     $actu = new MvcController();
     $actu -> actualizarVisitaController();
 ?> 
</div>


