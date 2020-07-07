<?php
require 'header.php ';

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Categoria</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Categoria</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
        <div class="container-fluid">


          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listado de Categorias</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tbllistado" class="table table-bordered table-striped">
                <thead class="bg-dark">
                  <tr>
                    <th>Opciones</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                   
                  </tr>
                </thead>
                <tbody>
               
                
                </tbody>
                <tfoot>
                  <tr>
                    <th>Opciones</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                  
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="row">
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-secondary">
                  Agregar Categoria
                </button>
          </div>
        </div><!-- /.container-fluid -->

        <div class="modal fade" id="modal-secondary">
        <div class="modal-dialog">
          <div class="modal-content bg-secondary">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Categoria</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <p>One fine body&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-outline-light">Grabar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      </div>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
<?php
require 'footer.php';

?>
<script type="text/javascript" src="scripts/categoria.js" ></script>
