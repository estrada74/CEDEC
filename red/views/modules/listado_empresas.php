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

<title>CEDEC - Empresas</title>
<?php
    include("admin_header.php");
?>
 

<div class="content-inner">
<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">
                    <?php if($_SESSION["id_rol"]==1)
                    {   

                        echo "Listado de Empresas";
                    }else{
                        echo "Listado de mis Empresas";
                    }


                    ?>
                    
                    
                </h2>

            </div>
        </div>
    </div>    
    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <a title="Dar servicio" href="index.php?action=registrar_empresa"> 
              <button type="button" class="btn btn-success mr-1 mb-2"><i class="la la-plus-circle"></i>Agregar empresa</button>
            </a>
        </div>

        <div class="widget has-shaw">
            
            <div class="widget-body">
                <div class="table-responsive">
                    <table id="export-table" class="table mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre de la empresa</th>
                                <th>Representante legal</th>
                                <th><span style="width:100px;">Prediagnóstico</span></th>
                                <th><span style="width:100px;">Análisis empresarial</span></th>
                                <th><span style="width:100px;">Problemas</span></th>
                                <th><span style="width:100px;">Acciones</span></th>



                                
                            </tr>
                        </thead>
                        <tbody>


                            <?php
                                $usuarios = new MvcController();
                                $usuarios -> listadoEmpresasController();
                             ?>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
                                <!-- End Export -->
    <!-- END content fluid-->  
    </div>

<?php 

    $cate = new MvcController();
    $cate -> borrarController("sectores","id_sector","listado_sectores");
?>
<!-- END content inner--> 
</div>
</div>
<?php include("admin_footer.php") ?>  
</div>


<div id="modal-large" class="modal fade">



            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Problemas empresariales</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">close</span>
                        </button>
                    </div>
                    <div class="modal-body">

                          <div class="widget has-shaw">
            
            <div class="widget-body">
                <div class="table-responsive">
                    <table id="export-table" class="table mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Empresa</th>
                                <th>Problema</th>
                                <th>Descripción</th>


                            </tr>
                        </thead>
                        <tbody>


                            <?php
                                $usuarios = new MvcController();
                                $usuarios -> listadoProblemasEmpresarialesController();
                             ?>
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            
                                <!-- End Export -->
    <!-- END content fluid-->  
    </div>
                        


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-shadow" data-dismiss="modal">Cerrar</button>
                        <a href="index.php?action=registrar_problema_empresarial&empresa=<?php echo "DELICIAS DEL MAR"; ?>&id=<?php echo 1 ?>">
                        <button type="button" class="btn btn-primary" >Nuevo</button>
                        </a>
                    </div>
                </div>
            </div>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


        

        
        
        


