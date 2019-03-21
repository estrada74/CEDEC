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

 <title>CEDEC - Listado de Prediagnósticos</title>
<?php
    include("admin_header.php");
?>
 

<div class="content-inner">
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Listado de Prediagnóstico</h2>

            </div>
        </div>
    </div>    
    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <a title="Dar servicio" href="index.php?action=resgistrar_sectores"> 
              <button type="button" class="btn btn-success mr-1 mb-2"><i class="la la-plus-circle"></i>Agregar Prediagnóstico</button>
            </a>
        </div>
        <div class="widget-body">
            <div class="table-responsive">
                    <div class="col-sm-12">
                        <table id="sorting-table" class="table mb-0 dataTable no-footer" role="grid" aria-describedby="sorting-table_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 76px;">ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 143px;">Sector
                                    </th>
                                    
                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 74px;">Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                #$sectores = new MvcController();
                                #$sectores -> vistaSectoresController();
                              ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!-- END widget has-shadow-->  
        </div>
    <!-- END content fluid-->  
    </div>
<?php include("admin_footer.php") ?>  
<?php 

    #$cate = new MvcController();
    #$cate -> borrarController("sectores","id_sector","listado_sectores");
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
<script src="views/assets/vendors/js/datepicker/moment.min.js"></script>
<script src="views/assets/vendors/js/datepicker/daterangepicker.js"></script>  
<script src="views/assets/vendors/js/bootstrap-select/bootstrap-select.min.js"></script> 
<script src="views/assets/vendors/js/app/app.min.js"></script>
<!-- End Page Vendor Js -->
<!-- Begin Page Snippets -->
<script src="views/assets/js/components/datepicker/datepicker.js"></script>  
<script src="views/assets/js/components/tables/tables.js"></script>  
<script src="views/assets/js/components/validation/validation.min.js"></script>


