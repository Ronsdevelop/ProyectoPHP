<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Categorias - Panaderia Leos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Sistema de Gestion para la Panaderia Leos" name="Descripcion" />
        <meta content="Ronsdevelop" name="Autor" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="">

      
        <!-- third party css -->
        <link href="../public/assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- Custom box css -->
        <link href="../public/assets/libs/custombox/custombox.min.css" rel="stylesheet">

        <!-- App css -->
        <link href="../public/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../public/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">


    <?php
        require '../vistas/plantilla/header.php';
        require '../vistas/plantilla/sidebar.php';
    ?>

           

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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Kardex</a></li>
                                            <li class="breadcrumb-item active">Categorias</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Categorias</h4>
                                </div>

                          
                            </div>
                        </div>     
                        <!-- end page title --> 


                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">

                                <button type="button" class="btn btn-success width-xl waves-effect waves-light float-right" data-toggle="modal" data-target="#con-close-modal"><i
                                                    class="mdi mdi-plus-circle mr-1"></i>Agregar Categoria</button>

                              
                                     
                                    <h4 class="mb-4">CATEGORIA DE PRODUCTOS</h4>

                                    <table  class="table table-hover m-0 table-centered dt-responsive nowrap w-100" id="tbllistado">   <!--id="tickets-table" -->
                                        <thead class="thead-dark">
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>Categoria</th>
                                            <th>Descripcion</th>
                                            <th>Estado</th>
                                            <th>Seccion</th>                                    
                                        </tr>
                                        </thead>

                                        <tbody>                               
                           

                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>
                                                ID
                                            </th>
                                            <th>Categoria</th>
                                            <th>Descripcion</th>
                                            <th>Estado</th>
                                            <th>Seccion</th>  
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->  

                        <!-- start modal --> 

                        <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                    <h4 class="modal-title text-light ">Agregar Nueva Categoría</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Name</label>
                                                                <input type="text" class="form-control" id="field-1" placeholder="John">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">Surname</label>
                                                                <input type="text" class="form-control" id="field-2" placeholder="Doe">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">Address</label>
                                                                <input type="text" class="form-control" id="field-3" placeholder="Address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">City</label>
                                                                <input type="text" class="form-control" id="field-4" placeholder="Boston">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-5" class="control-label">Country</label>
                                                                <input type="text" class="form-control" id="field-5" placeholder="United States">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">Zip</label>
                                                                <input type="text" class="form-control" id="field-6" placeholder="123456">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group no-margin">
                                                                <label for="field-7" class="control-label">Personal Info</label>
                                                                <textarea class="form-control" id="field-7" placeholder="Write something about yourself"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancelar</button>
                                                    <button type="button" class="btn btn-success waves-effect waves-light">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->

                        
                   

                        
                    </div> <!-- container -->

                </div> <!-- content -->
 

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
            <?php
        require '../vistas/plantilla/footer.php';
      
        ?>


        </div>
        <!-- END wrapper -->     

        <!-- Vendor js -->
        <script src="../public/assets/js/vendor.min.js"></script>

        <!-- third party js -->
        <script src="../public/assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="../public/assets/libs/datatables/dataTables.bootstrap4.js"></script>
        <script src="../public/assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="../public/assets/libs/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Tickets js -->
        <script src="../public/assets/js/pages/tickets.js"></script>

          <!-- Modal-Effect -->
        <script src="../public/assets/libs/custombox/custombox.min.js"></script>

   
        <!-- App js -->
        <script src="../public/assets/js/app.min.js"></script>
        <script type="text/javascript" src="scripts/categoria.js" ></script>
        
    </body>
</html>