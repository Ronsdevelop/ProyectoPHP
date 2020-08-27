
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Administracción</a></li>
                                <li class="breadcrumb-item active">Usuarios</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Administrar Usuarios</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
                
            <div class="row">
                <div class="col-12">
                    <div class="card-box">

                    <button type="button" class="btn btn-success width-xl waves-effect waves-light float-right" onClick="abrirModal();" id="btnAbrirModal"><i
                                        class="mdi mdi-plus-circle mr-1"></i>Agregar Usuario</button> 
                        <h4 class="mb-4">USUARIOS DEL SISTEMA</h4>

                        <table  class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-sm tablas" id="tablas">   <!--id="tickets-table" data-toggle="modal" data-target="#con-close-modal"-->
                   <thead class="thead-dark">
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>Nombre</th>
                                <th>Foto</th>
                                <th>Dni</th>
                                <th>Direccion</th>
                                <th>Usuario</th>
                                <th>Ultimo Logueo</th> 
                                <th>Estado</th>
                                <th>Telefono</th>
                                <th>Accion</th>                        
                            </tr>
                            </thead>

                            <tbody> 
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>Nombre</th>
                                <th>Foto</th>
                                <th>Dni</th>
                                <th>Direccion</th>
                                <th>Usuario</th>
                                <th>Ultimo Logueo</th> 
                                <th>Estado</th>
                                <th>Telefono</th>
                                <th>Accion</th> 
                                                    
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
                                        <h4 class="modal-title text-light" id="tituloModal">Agregar Nuevo Usuario</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <input type="hidden" id="txtOpcion" name="txtOpcion">
                                    <div class="modal-body p-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Nombres</label>
                                                    <input type="text" class="form-control" name="txtNombres" id="txtNombres" placeholder="Nombres Completos">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-1" class="control-label">Apellido Paterno</label>
                                                    <input type="text" class="form-control" name="txtApaterno" id="txtApaterno" placeholder="Apellido Paterno">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">Apellido Materno</label>
                                                    <input type="text" class="form-control" name="txtAmaterno" id="txtAmaterno" placeholder="Apellido Materno">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="field-3" class="control-label">Direccion</label>
                                                    <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Direccion">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="field-4" class="control-label">Dni</label>
                                                    <input type="text" class="form-control" name="txtDni" id="txtDni" placeholder="Dni">
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
                                                    <label for="field-6" class="control-label">Fecha Ingreso</label>
                                                    <input type="date" class="form-control" name="txtFecha" id="txtFecha" placeholder="fecha">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-1" class="control-label">Usuario</label>
                                                    <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" placeholder="Usuario">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">Password</label>
                                                    <input type="password" class="form-control" name="txtPass" placeholder="Ingrese Clave" autocomplete="off">
                                                    <input type="hidden" name="passwordActual" id="passwordActual">
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
                                                <label for="field-3" class="control-label">Tipo Usuario</label>                                                       
                                                <select class="form-control" name="txtTipo" id="selecTCargo"  data-toggle="select2">
                                                <option>Seleciona</option>  
                                                <?php
                                                $cargos = ControladorCargos::crtMostrarCargos();
                                                foreach ($cargos as $key => $value) {
                                                    echo'<option value="'.$value["cargo_id"].'">'.$value["cargo"].'</option>';
                                                         }
                                                ?>
                                                 
                                                </select>                                             
                                                </div>                                                        
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">  
                                                
                                                <div class="form-group">
                                                    <label for="field-1" class="control-label">Foto de Perfil</label>
                                                    <input type="hidden" name="fotoSinEditar" id="fotoSinEditar" >
                                                    <input type="file" name="nuevaFoto" class="nuevaFoto" id="nuevaFoto" >
                                                    <p class="text-muted font-13 m-b-30">
                                                        Peso Maximo de la foto 2MB
                                                    </p>
                                                    <img src="vistas/img/usuarios/default/anonymous.png" alt="" id="previsualizar" class="img-thumbnail avatar-xl previsualizar">
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