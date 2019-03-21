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
                <h2 class="page-header-title">Listado de usuarios</h2>

            </div>
        </div>
    </div>    
    <div class="widget has-shadow">
        <div class="widget-header bordered no-actions d-flex align-items-center">
            <a title="Dar servicio" href="index.php?action=agregar_usuario"> 
              <button type="button" class="btn btn-success mr-1 mb-2"><i class="la la-plus-circle"></i>Agregar usuario</button>
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
                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 143px;">Nombre
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Pais: activate to sort column ascending" style="width: 72px;">Apellido
                                    </th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Fecha: activate to sort column ascending" style="width: 86px;">Username
                                    </th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Fecha: activate to sort column ascending" style="width: 86px;">Email
                                    </th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Fecha: activate to sort column ascending" style="width: 86px;">Fecha_Registro
                                    </th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Fecha: activate to sort column ascending" style="width: 86px;">Visitas
                                    </th>
                                    <th class="sorting_desc" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Fecha: activate to sort column ascending" style="width: 86px;">Dar servicio
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="sorting-table" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 74px;">Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $usuarios = new MvcController();
                                $usuarios -> vistaUsuariosController();
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

    $cate = new MvcController();
    $cate -> borrarController("usuarios","id_usuario","listado_usuarios");
?>
<!-- END content inner--> 
</div>


