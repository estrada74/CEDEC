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


<title>CEDEC - Editar representante</title>
<?php
    include("admin_header.php");
?>
<?php
    $res = new MvcController();
    $datos = $res -> editarController("representante_legal","id_representante_legal");
?>
 <div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Editar representante legal</h2>
                    
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
                            <strong>
                                Hey!, Estas apunto de editar el representante legal:
                            </strong>   <?php echo $datos["nombre_representante"];  ?>
                      </div>
                        <form class="needs-validation" novalidate="" method="post">

                            <?php
                                $editarU = new MvcController();
                                $editarU -> actualizarRepresentanteLegalController();
                            ?> 
                           
                          

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Representante legal <span class="text-danger ml-2">*</span></label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="txtNomRepresentante" placeholder="Ingrese el nombre del representante legal" required=""  onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $datos["nombre_representante"] ?>">
                                    <div class="invalid-feedback">
                                        Por favor ingresa un nombre
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Género<span class="text-danger ml-2">*</span></label>
                                <div class="col-lg-5">
                                    <select name="selectGenero" class="custom-select form-control" required="" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        <option value="<?php echo $datos["genero"] ?>"><?php echo $datos["genero"] ?></option>
                                        <option value="">Seleccione</option>
                                        <option value="MASCULINO">MASCULINO</option>
                                        <option value="FEMENINO">FEMENINO</option>
                                    
                                    </select>
                                    <div class="invalid-feedback">
                                        Seleccione un género
                                    </div>
                                </div>
                            </div>

                            

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Numero teléfonico <span class="text-danger ml-2">*</span></label>
                                <div class="col-lg-5">
                                    <div class="input-group">
                                        <span class="input-group-addon addon-secondary">
                                            <i class="la la-phone"></i>
                                        </span>
                                        <input maxlength="15" type="number" class="form-control" placeholder="Ingrese el número teléfonico del representante" required=""  onkeyup="javascript:this.value=this.value.toUpperCase();" name="txtTel" value="<?php echo $datos["telefono_representante"] ?>">
                                    </div>
                                    <div class="invalid-feedback">
                                        Por favor ingrese un número teléfonico
                                    </div>
                                </div>
                            </div>

                             <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Grado de estudios<span class="text-danger ml-2">*</span></label>
                                <div class="col-lg-5">
                                    <select name="selectEstudios" class="custom-select form-control" required=""  onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        <option value="<?php echo $datos["grado_estudios"] ?>">
                                            <?php echo $datos["grado_estudios"] ?>
                                            
                                        </option>
                                       <option value="">Seleccione</option>
                                        <option value="PRIMARIA">PRIMARIA</option>
                                        <option value="SECUNDARIA">SECUNDARIA</option>
                                        <option value="PREPARATORIA">PREPARATORIA</option>
                                        <option value="BACHILLERATO TECNÓLOGICO">BACHILLERATO TECNÓLOGICO</option>
                                        <option value="PROFECIONAL TÉCNICA">PROFECIONAL TÉCNICA</option>
                                        <option value="LICIENCIATURA">LICIENCIATURA</option>
                                        <option value="INGENIERÍA">INGENIERÍA</option>
                                        <option value="MAESTRÍA">MAESTRÍA</option>
                                        <option value="DOCTORADO">DOCTORADO</option>
                                    
                                    </select>
                                    <div class="invalid-feedback">
                                        Seleccione un grado de estudio
                                    </div>
                                </div>
                            </div>


                            
                            <div class="text-right">

                                <button class="btn btn-shadow" type="reset">Borrar datos</button>
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
    <!-- End Container -->
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
<script src="views/assets/vendors/js/bootstrap-select/bootstrap-select.min.js"></script> 
<script src="views/assets/vendors/js/app/app.min.js"></script>
<!-- End Page Vendor Js -->
<!-- Begin Page Snippets -->
<script src="views/assets/js/components/datepicker/datepicker.js"></script>  
<script src="views/assets/js/components/tables/tables.js"></script>  
<script src="views/assets/js/components/validation/validation.min.js"></script>
<!-- End Page Snippets -->
<?php include("admin_footer.php") ?>    
</div>


