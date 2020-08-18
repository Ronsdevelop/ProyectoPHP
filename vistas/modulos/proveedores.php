
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Almacen</a></li>
                                <li class="breadcrumb-item active">Proveedores</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Administrar Proveedores</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
                
            <div class="row">
                <div class="col-12">
                    <div class="card-box">

                    <button type="button" class="btn btn-success width-xl waves-effect waves-light float-right" onClick="abrirModalProveedor();" id="btnAbrirModal"><i
                                        class="mdi mdi-plus-circle mr-1"></i>Agregar Proveedor</button> 
                        <h4 class="mb-4">PROVEEDORES DE LA PANADERIA</h4>

                        <table  class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-sm tablas" id="tablaProveedor">   <!--id="tickets-table" data-toggle="modal" data-target="#con-close-modal"-->
                   <thead class="thead-dark">
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>RAZON SOCIAL</th>
                                <th>RUC/DNI</th>
                                <th>DIRECCION</th>
                                <th>CONTACTO</th>
                                <th>EMAIL</th>                              
                                <th>CELULAR</th> 
                                <th>FIJO</th>
                                <th>REFERENCIA</th>
                                <th>ACCION</th>                        
                            </tr>
                            </thead>

                            <tbody> 
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>RAZON SOCIAL</th>
                                <th>RUC/DNI</th>
                                <th>DIRECCION</th>
                                <th>CONTACTO</th>
                                <th>EMAIL</th>                              
                                <th>CELULAR</th> 
                                <th>FIJO</th>
                                <th>REFERENCIA</th>
                                <th>ACCION</th>                        
                            </tr>
                            </tfoot> 
                        </table>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->  

            <!-- MODAL AGREGAR PROVEEDOR --> 

            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <form role="form" id="formulario" enctype="multipart/form-data" autocomplete="off">
                                    <div id="cabeceraM" class="modal-header bg-dark">
                                        <h4 class="modal-title text-light" id="tituloModal">Agregar Nuevo Proveedor</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <input type="hidden" id="txtOpcion" name="txtOpcion">
                                    <input type="hidden" name="txtId" id="txtId">
                                    <div class="modal-body p-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Razon Social</label>
                                                    <input type="text" class="form-control" name="txtRazon" id="txtRazon" placeholder="Razon Social Proveedor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
           
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">Direccion</label>
                                                    <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Direccion Proveedor">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Contacto</label>
                                                    <input type="text" class="form-control" name="txtContacto" id="txtContacto" placeholder="Contacto para Consultas">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-1" class="control-label">Ruc o Dni</label>
                                                    <input type="text" class="form-control" name="txtIndetificacion" id="txtIndetificacion" placeholder="Ruc o Dni Proveedor">
                                                </div>
                                            </div>
   
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-5" class="control-label">Celular</label>
                                                    <input type="text" class="form-control" name="txtCelular" id="txtCelular" placeholder="Celular">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-6" class="control-label">Fijo</label>
                                                    <input type="text" class="form-control" name="txtFijo" id="txtFijo" placeholder="Telefono fijo">
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Correo</label>
                                                    <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" placeholder="Direccion de email">
                                                </div>
                                            </div>
                                        </div>    
                                          
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Referencia</label> 
                                                    <textarea class="form-control" name="txtReferencia" id="txtReferencia" cols="30" rows="5"></textarea>
                                    
                                                </div>
                                            </div>
                                        </div>     
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-success waves-effect waves-light" id="btnEditar">Guardar</button>
                                    </div>
 
                                    </form>
                                    
                                </div>
                            </div>
            </div><!-- /.modal -->       
        
            
        </div> <!-- container -->

    </div> <!-- content -->


</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->