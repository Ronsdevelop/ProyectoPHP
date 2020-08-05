
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

                                <button type="button" class="btn btn-success width-xl waves-effect waves-light float-right" data-toggle="modal" data-target="#con-close-modal"><i
                                                    class="mdi mdi-plus-circle mr-1"></i>Agregar Usuario</button>

                              
                                     
                                    <h4 class="mb-4">USUARIOS DEL SISTEMA</h4>

                                    <table  class="table table-hover m-0 table-centered dt-responsive nowrap w-100 tablas" id="tablas">   <!--id="tickets-table" -->
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>Nombre</th>
                                            <th>Foto</th>
                                            <th>Dni</th>
                                            <th>Cargo</th> 
                                            <th>Estado</th>
                                            <th>Celular</th>  
                                            <th>Acciones</th>                                    
                                        </tr>
                                        </thead>

                                        <tbody>    
                                        <tr>
                                            <td><b>#1256</b></td>
                                            <td>
                                               
                                                
                                                    <span class="ml-2">George A. Llanes</span>
                                              
                                            </td>
                                            <td>
                                                <a href="javascript: void(0);">
                                                    <img src="vistas/public/assets/images/users/user-anonimo.png" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs" />
                                                </a>
                                            </td>

                                            <td>
                                                46565757
                                            </td>
                                            <td>
                                                admin
                                            </td>
                                         
                                            <td>
                                                <span class="badge badge-success">Activo</span>
                                            </td>

                                            <td>
                                                9645566455
                                            </td>                                           

                                            <td>
                                                <div class="btn-group dropdown">
                                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-secondary btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Editar</a>
                                                        <a class="dropdown-item" href="#"><i class="mdi mdi-block-helper mr-2 text-muted font-18 vertical-middle"></i>Desactivar</a>
                                                        <a class="dropdown-item" href="#"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Eliminar</a>
                                                        
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>                           
                           

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>Nombre</th>
                                            <th>Foto</th>
                                            <th>Dni</th>
                                            <th>Cargo</th> 
                                            <th>Estado</th>
                                            <th>Celular</th>  
                                            <th>Acciones</th>                                    
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

                                                <form action="" method="post" enctype="multipart/form-darta">
                                                <div class="modal-header bg-dark">
                                                    <h4 class="modal-title text-light ">Agregar Nuevo Usuario</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">Nombres</label>
                                                                <input type="text" class="form-control" id="field-3" placeholder="Nombres Completos">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Apellido Paterno</label>
                                                                <input type="text" class="form-control" id="field-1" placeholder="Paterno">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">Apellido Materno</label>
                                                                <input type="text" class="form-control" id="field-2" placeholder="Materno">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">Direccion</label>
                                                                <input type="text" class="form-control" id="field-3" placeholder="Direccion">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">Dni</label>
                                                                <input type="text" class="form-control" id="field-4" placeholder="Dni">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-5" class="control-label">Celular</label>
                                                                <input type="text" class="form-control" id="field-5" placeholder="Celular">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">Fecha Ingreso</label>
                                                                <input type="date" class="form-control" id="field-6" placeholder="fecha">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Usuario</label>
                                                                <input type="text" class="form-control" id="field-1" placeholder="Usuario">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">Password</label>
                                                                <input type="password" class="form-control" id="field-2" placeholder="Clave">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">Correo</label>
                                                                <input type="email" class="form-control" id="field-3" placeholder="Direccion de email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group"> 
                                                            <label for="field-3" class="control-label">Tipo Usuario</label>                                                       
                                                            <select class="form-control" data-toggle="select2">
                                                            <option>Select</option>                                                  
                                                            <option value="AK">Alaska</option>
                                                            <option value="HI">Hawaii</option>
                                                            <option value="HI">Hawaii</option>   
                                                            </select>                                             
                                                            </div>                                                        
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">  
                                                           
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Foto de Perfil</label>
                                                                <input type="file" name="file" >
                                                                <p class="text-muted font-13 m-b-30">
                                                                    Peso Maximo de la foto 200 mb
                                                                </p>
                                                                <img src="vistas/public/assets/images/users/user-anonimo.png" alt="" class="img-thumbnail avatar-xl">
                                                            </div>                                                
                                             
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-success waves-effect waves-light">Guardar</button>
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