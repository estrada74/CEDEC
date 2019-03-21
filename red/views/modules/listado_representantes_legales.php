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

 <title>CEDEC - Representantes</title>
<?php
    include("admin_header.php");
?>
 

<div class="content-inner">
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Listado de representantes</h2>

            </div>
        </div>
    </div>    
    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <a title="Dar servicio" href="index.php?action=registrar_representante_legal"> 
              <button type="button" class="btn btn-success mr-1 mb-2"><i class="la la-plus-circle"></i>Agregar representante legal</button>
            </a>
        </div>


       
             <!-- Export -->
            
            <div class="widget-body">
                <div class="table-responsive">
                    <table id="export-table" class="table mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre del representante</th>
                                <th>Género</th>
                                <th>Télefono</th>
                                <th>Grado de estudios</th>
                                <th>Correo Electónico</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                                $representante = new MvcController();
                                $representante -> listadoRepresentantesLegalesController();
                             ?>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
                                <!-- End Export -->
    <!-- END content fluid-->  
    </div>
<?php include("admin_footer.php") ?>  
<?php 

    $cate = new MvcController();
    $cate -> borrarController("sectores","id_sector","listado_sectores");
?>
<!-- END content inner--> 
</div>
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
        <script src="views/assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
        <!-- Begin Page Snippets -->
        <script src="views/assets/js/components/tables/tables.js"></script>


