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
 

<div class="content-inner">
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Listado de visitas</h2>

            </div>
        </div>
    </div>    
    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <h4>Visitas</h4>
        </div>
        <div class="widget-body">
            <div class="table-responsive">
                    <div class="col-sm-12">
                        <table id="sorting-table" class="table mb-0 dataTable no-footer" role="grid" aria-describedby="sorting-table_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="ID: activate to sort column ascending" style="width: 76px;">ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 143px;">Fecha
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Pais: activate to sort column ascending" style="width: 72px;">Servicio
                                    </th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Fecha: activate to sort column ascending" style="width: 86px;">Usuario
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 74px;">Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $visitas = new MvcController();
                                $visitas -> vistaVisitaController();
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
<!-- END content inner--> 
</div>


