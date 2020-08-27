
 
$(document).ready(function() {
    tblProd =  $('#tablaProducto').DataTable({
                        language: {
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en tabla Productos",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            },
                
                            paginate: {
                                previous: "<i class='mdi mdi-chevron-left'>",
                                next: "<i class='mdi mdi-chevron-right'>"
                            }
                        },
                        
                        drawCallback: function() {
                            $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                        },
                        ajax:{            
                            "url": "controladores/producto.controlador.php",   
                            "method": 'POST', //usamos el metodo POST
                            "data":{"txtOpcion":1}, //enviamos opcion 4 para que haga un SELECT                   
                            "dataSrc":""
                        },                
                        columns: [
                          {data: "ID"},
                          {data: "NOMBRE"},
                           {data: "IMAGEN"},
                           {data: "PRESENTACION"},
                           {data: "PRECIO"},
                           {data: "CATEGORIA"},
                           {data: "SECCION"},
                           {data: "STOCK"},
                           {data: "DESCRIPCION"},
                           {data: "ACCION"}
                        
                        ]}); 
    
     
    /* ====================================== 
    EVENTO SUBMIT PARA AGREGAR Y EDITAR USUARIO
    ====================================== */
    
    const form = document.getElementById('formulario');
    form.addEventListener('submit',function(e){
        e.preventDefault();
        let data = new FormData(form); 
        let categoria = document.getElementById('txtCategoria').options[document.getElementById('txtCategoria').selectedIndex].text;
     
        data.append("categoria",categoria);
        $("#con-close-modal").modal('hide');
        fetch("controladores/producto.controlador.php",
            {method:"POST",
            body:data}).then(response => response.text())
                       .then(response => {
                        console.log(response);              
                         tblProd.ajax.reload();
                       } 
                       )
                       
    
    
    
    })

    /* ====================================== 
    VALIDANDO IMAGEN DE PERFIL
    ====================================== */
    
    $(".nuevaFoto").change(function() {
        let imagen = this.files[0];
        /* ------------------------- */
        /* VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG */
        /* ------------------------- */
    
        if (imagen["type"] !== "image/jpeg" && imagen["type"] !== "image/png" && imagen["type"] !== "image/jpg") {
            $(".nuevaFoto").val("");
            Swal.fire({
                title:"Error al subir la imagen",
                text:"!La imagen debe estar en formato JPG o PNG!",
                icon:"error",
                confirmButtonText:"!Cerrar¡"
            });
            
        }else if (imagen["size"]>2000000) { 
           $(".nuevaFoto").val("");
           Swal.fire({
               title:"Error al subir la imagen",
               text:"!La imagen no debe pesar mas de 2MB!",
               icon:"error",
               confirmButtonText:"!Cerrar¡"
           });
            
        }else{
            let datosImagen = new FileReader;
            datosImagen.readAsDataURL(imagen);
            $(datosImagen).on("load",function(event){
                var rutaImagen = event.target.result;
                $(".previsualizar").attr("src",rutaImagen);
            })
        }
    
       
    })

    /*=====================
    COMPROBAR SI NO ESTA REPETIDO EL USUARIO
    ======================*/

    $("#txtUsuario").change(function(){ 
        $(".alert").remove();
       let usuario = $(this).val();
       
       const datos = new FormData();
       datos.append('validarUsuario',usuario); 
       let url = "ajax/usuarios.ajax.php";
     
      fetch(url,{
          method:'POST',
          body: datos
    
      }).then(resp=> resp.json())
      .then(response => comprobarDatosUser(response));
        
        
    });
    
    function comprobarDatosUser(resp) {
        if (resp) {
            $("#txtUsuario").parent().after('<div class="alert alert-danger" role="alert" ><i class="mdi mdi-block-helper mr-2"></i>El usuario ya esta registrado en la base de datos!!</div>');
            $("#txtUsuario").val("");
            
        }
        
    }
    
    
     
    
    /* ====================================== 
    FUNCION PARA ELIMINAR USUARIO
    ====================================== */
     
    $(document).on("click",".btn-eliminar", function () {
        let codUsuario = $(this).attr("idUsuario");
        let usuario = $(this).attr("usuario");
        let userfoto = $(this).attr("fotoUser");
    
     
        const datos = new FormData();
        datos.append('codUsuario',codUsuario); 
        datos.append('user',usuario);
        datos.append('fotoUser',userfoto);
        const url = "ajax/usuarios.ajax.php";
    
        Swal.fire({
            title: 'Seguro que deseas elimar el usuario?',
            text: "Se eliminara totalmente de la base de datos!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, eliminar!'
          }).then((result) => { 
              if (result.value) {
                    fetch(url,{
                        method:'POST',
                        body: datos
            
                    }).then(resp => resp.json())
                    .then(response => confirmarEliminacion(response))
              }      
            
            
            });
    });
    
    
    function confirmarEliminacion(respuesta){ 
        console.log(respuesta);
       
        if (respuesta == "ok"){        
            Swal.fire({
                icon:"success",
                title:"Se Elimino correctamente",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then(function(result){
    
                if(result.value){
                
                    tblUser.ajax.reload();
    
                }
    
            });
             
            
        }else{
            tblUser.ajax.reload();
            Swal.fire(
                'No se pudo Eliminar!',
                'El usuario no se a eliminado de la base de datos.',
                'error'
              )
          }
    } 
        
    
    })
    
    function abrirModal() {
        
    
        let opcion = 2;
        let cabeceraModal = document.getElementById("cabeceraM");
        cabeceraModal.classList.remove("bg-success");
        cabeceraModal.classList.add("bg-dark");
        document.getElementById("tituloModal").innerText = "Agregar Nuevo Producto";   
        document.getElementById("btnEditar").innerText = "Guardar producto";
        document.getElementById("formulario").reset();       
        document.getElementById("previsualizar").setAttribute("src","vistas/img/productos/productoDefault.png");
        document.getElementById("txtOpcion").value = opcion;    
        $("#con-close-modal").modal("show");
         
        fetch("controladores/producto.controlador.php")
        .then(resp => resp.json()).then(resp => {
             
            document.getElementById("txtId").value = resp[0][0];
        })
        
    }
    
    
 /* ------------------------- */
 /* EDITAR PROVEEDOR  */
 /* ------------------------- */ 
 
$(document).on("click",".btn-editar", function () {
    let codProducto = $(this).attr("idProducto");
    let opcion = 3;
    let cabeceraModal = document.getElementById("cabeceraM");
    cabeceraModal.classList.remove("bg-dark");
    cabeceraModal.classList.add("bg-success");
   document.getElementById("tituloModal").innerText = "Editar Producto";
 
   document.getElementById("btnEditar").innerText = "Actualizar Producto";
   
   document.getElementById("txtOpcion").value = opcion;
     const data = new FormData();
     data.append('codigoProd',codProducto);
     $("#con-close-modal").modal("show");
 
  let url = "ajax/productos.ajax.php";
 
  fetch(url,{
      method:'POST',
      body: data
 
  }).then(resp=> resp.json())
  .then(response =>{
    document.getElementById("txtNombre").value = response["nombre"];
    document.getElementById("txtPrecio").value = response["pVenta"];
    document.getElementById("txtStock").value = response["stock"];
    document.getElementById("txtPresentacion").value = response["presentacion"];
    document.getElementById("txtDescripcion").value = response["descripcion"];   
    document.getElementById("fotoSinEditar").value = response["imagen"];  
    document.getElementById("txtId").value = response["producto_id"]; 
    document.getElementById("txtCategoria").value = response["categoria_id"];
   
    if (response["imagen"] != "") {
        document.getElementById("previsualizar").setAttribute("src",response["imagen"]);   
    } 
  } );
    
});



  
