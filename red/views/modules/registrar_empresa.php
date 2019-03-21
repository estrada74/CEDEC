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


<title>CEDEC - Registrar empresa</title>
<?php
    include("admin_header.php");
?>
 
 <div class="content-inner">
    <div class="container-fluid">
        <!-- Begin Page Header-->
        <div class="row">
            <div class="page-header">
                <div class="d-flex align-items-center">
                    <h2 class="page-header-title">Agregar empresa</h2>
                    
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
                            <strong>Agregar empresa</strong> 
                        </div>

                        <form class="needs-validation" novalidate="" method="post">
                            <?php 
                              $agregar = new MvcController();
                              $agregar -> registrarEmpresaController();
                            ?>
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre de la empresa o razon social <span class="text-danger ml-2">*</span></label>
                                <div class="col-lg-5">
                                    <input type="text" class="form-control" name="txtNomEmpresa" placeholder="Ingrese el nombre de la empresa o razon social" required=""  onkeyup="javascript:this.value=this.value.toUpperCase();">
                                    <div class="invalid-feedback">
                                        Por favor ingresa un nombre
                                    </div>
                                </div>
                            </div>

                            <?php if($_SESSION["id_rol"]==1){ ?>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Representante<span class="text-danger ml-2">*</span></label>
                                    <div class="col-lg-5">
                                        <select class="selectpicker show-menu-arrow" data-live-search="true" required="" name="selectRepresentante" >
                                            <option value="">Seleccione</option>
                                            <?php 
                                              $select = new MvcController();
                                              $select -> getSelectRepresentanteController();
                                            ?>
                                                           
                                            <div class="invalid-feedback">
                                            Seleccione un género
                                        </div>
                                        </select>
                                        
                                    </div>
                                </div>

                            <?php } else { ?>

                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Nombre del representante<span class="text-danger ml-2">*</span></label>
                                    <div class="col-lg-5">
                                        <input readonly type="text" class="form-control" value="<?php echo $_SESSION["nombre_representante"]; ?>" placeholder="Ingrese el nombre de la empresa o razon social" required=""  onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        <input type="hidden" name="selectRepresentante" value="<?php  echo $_SESSION["id_representante_legal"];?> " >
                                        <div class="invalid-feedback">
                                            Por favor ingresa un nombre
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>

                            

                            

                            
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
        <script src="views/assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="views/assets/vendors/js/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="views/assets/vendors/js/app/app.min.js"></script>
        <script src="views/assets/js/components/validation/validation.min.js"></script>
        <!-- End Page Vendor Js -->
<!-- End Page Snippets -->
<?php include("admin_footer.php") ?>    
</div>


