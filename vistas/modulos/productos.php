
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">kardex</a></li>
                                <li class="breadcrumb-item active">Productos</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Administrar Productos</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
                
            <div class="row">
                <div class="col-12">
                    <div class="card-box">

                    <button type="button" class="btn btn-success width-xl waves-effect waves-light float-right" onClick="abrirModal();" id="btnAbrirModal"><i
                                        class="mdi mdi-plus-circle mr-1"></i>Agregar Producto</button> 
                        <h4 class="mb-4">PRODUCTOS PARA VENTAS</h4>

                        <table  class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-sm tablas" id="tablaProducto">   <!--id="tickets-table" data-toggle="modal" data-target="#con-close-modal"-->
                   <thead class="thead-dark">
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>NOMBRE</th>
                                <th>IMAGEN</th>
                                <th>PRESENTACION</th>
                                <th>PRECIO</th>
                                <th>CATEGORIA</th>
                                <th>SECCION</th> 
                                <th>STOCK</th>
                                <th>DESCRIPCION</th>
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
                                <th>NOMBRE</th>
                                <th>IMAGEN</th>
                                <th>PRESENTACION</th>
                                <th>PRECIO</th>
                                <th>CATEGORIA</th>
                                <th>SECCION</th> 
                                <th>STOCK</th>
                                <th>DESCRIPCION</th>
                                <th>ACCION</th>                        
                            </tr>
                            </tfoot> 
                        </table>
                    </div>
                </div><!-- end col -->
            </div>
            <!-- end row -->  

            <!-- MODAL AGREGAR USUARIO --> 

            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <form role="form" id="formulario" enctype="multipart/form-data" autocomplete="off">
                                    <div id="cabeceraM" class="modal-header bg-dark">
                                        <h4 class="modal-title text-light" id="tituloModal">Agregar Nuevo Producto</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <input type="hidden" id="txtOpcion" name="txtOpcion">
                                    <input type="hidden" id="txtId" name="txtId">
                                    <div class="modal-body p-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Nombre</label>
                                                    <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombres Completos">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                            <div class="form-group"> 
                                                <label for="field-3" class="control-label">Categoria</label>                                                       
                                                <select class="form-control" name="txtCategoria" id="txtCategoria"  data-toggle="select2">
                                                <option>Seleciona</option>  
                                                <?php
                                                $categoria= ControladorCategoria::crtMostrarCategoria();
                                                foreach ($categoria as $key => $value) {
                                                    echo'<option value="'.$value["categoria_id"].'">'.$value["categoria"].'</option>';
                                                         }
                                                ?>
                                                 
                                                </select>                                             
                                                </div>   
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">Precio Venta</label>
                                                    <input type="number" class="form-control" name="txtPrecio" id="txtPrecio" placeholder="Apellido Materno">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">Stock</label>
                                                    <input type="number" class="form-control" name="txtStock" id="txtStock" placeholder="Apellido Materno">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Presentación</label>
                                                    <input type="text" class="form-control" name="txtPresentacion" id="txtPresentacion" placeholder="Direccion">
                                                </div>
                                            </div>
                                        </div>                                  
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Descripción</label> 
                                                    <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" cols="30" rows="1"></textarea>
                                    
                                                </div>
                                            </div>
                                        </div>                                         
                
                                        <div class="row">
                                            <div class="col-md-12">  
                                                
                                                <div class="form-group">
                                                    <label for="field-1" class="control-label">Imagen de Producto</label>
                                                    <input type="hidden" name="fotoSinEditar" id="fotoSinEditar" >
                                                    <input type="file" name="nuevaFoto" class="nuevaFoto" id="nuevaFoto" >
                                                    <p class="text-muted font-13 m-b-30">
                                                        Peso Maximo de la foto 2MB
                                                    </p>
                                                    <img src="vistas/img/productos/productoDefault.png" alt="" id="previsualizar" class="img-thumbnail avatar-xl previsualizar">
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