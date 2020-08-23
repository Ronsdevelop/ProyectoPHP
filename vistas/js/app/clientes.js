 
$(document).ready(function() {
    tblcliente =  $('#tablaClientes').DataTable({
                        language: {
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en Clientes",
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
                            "url": "controladores/cliente.controlador.php",   
                            "method": 'POST', //usamos el metodo POST
                            "data":{"txtOpcion":1}, //enviamos opcion 4 para que haga un SELECT                   
                            "dataSrc":""
                        },                
                        columns: [
                           {data: "ID" },
                           {data: "Rason"},
                           {data: "Direccion"},
                           {data: "Documento"},                          
                           {data: "Numero"},
                           {data: "Alias"},
                           {data: "Referencia"},
                           {data: "Celular"},
                           {data: "Contacto"},
                           {data: "Cumpleaños"},
                           {data: "Tipoc"},                           
                           {data: "Accion"}
                        
                        ]});
                        
/* ====================================== 
EVENTO SUBMIT PARA AGREGAR Y EDITAR PROVEEDOR
====================================== */

const form = document.getElementById('formulario');
form.addEventListener('submit',function(e){
    e.preventDefault();
    let data = new FormData(form); 
    $("#con-close-modal").modal('hide');
    fetch("controladores/cliente.controlador.php",
        {method:"POST",
        body:data}).then(response => response.json())
                   .then(response =>  
                               
                    tblcliente.ajax.reload())
                   



})



 /* ------------------------- */
 /* EDITAR PROVEEDOR  */
 /* ------------------------- */ 
 
 $(document).on("click",".btn-editar", function () {
    let codCliente = $(this).attr("idCliente");
    
    let opcion = 3;
    let cabeceraModal = document.getElementById("cabeceraM");
    cabeceraModal.classList.remove("bg-dark");
    cabeceraModal.classList.add("bg-success");
   document.getElementById("tituloModal").innerText = "Editar Cliente"; 
   document.getElementById("btnEditar").innerText = "Actualizar Cliente";   
   document.getElementById("txtOpcion").value = opcion;
     const data = new FormData();
     data.append('codigoEditar',codCliente);
     $("#con-close-modal").modal("show");
 
  let url = "ajax/clientes.ajax.php";
 
  fetch(url,{
      method:'POST',
      body: data
 
  }).then(resp => resp.text())
  .then(response =>
   console.log(response))
   /* cargarDatos(response))*/
    
});



 /* ------------------------- */
/* FUNCION PARA ASIGNAR LOS DATOS A CADA ELEMENTO DEL MODAL EDITAR USURAIO*/
/* ------------------------- */

function cargarDatos(datos) {
   
    document.getElementById("txtRazon").value = datos["nombre_razon"];
    document.getElementById("txtDireccion").value = datos["direccion"];
    document.getElementById("txtContacto").value = datos["representante"];
    document.getElementById("txtIndetificacion").value = datos["documento_identi"];
    document.getElementById("txtCelular").value = datos["nCelular"];
    document.getElementById("txtAlias").value = datos["alias"];
    document.getElementById("txtCumpleanos").value = datos["cumpleaños"];
    document.getElementById("txtCorreo").value = datos["email"];
    document.getElementById("txtReferencia").value = datos["referencia"];
    document.getElementById("txtId").value = datos["cliente_id"];
    document.getElementById("txtTipoCli").selectedIndex = datos["tipoCliente_id"];
    document.getElementById("txtTipoDoc").selectedIndex = datos["identificacion_id"];
     
}




/* ====================================== 
FUNCION PARA ELIMINAR PROVEEDOR
====================================== */
 
$(document).on("click",".btn-eliminar", function () {
    let codCliente = $(this).attr("idCliente");
    const datos = new FormData();
    datos.append('codCliente',codCliente); 
  
    const url = "ajax/clientes.ajax.php";

    Swal.fire({
        title: 'Seguro que deseas elimar el Cliente?',
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
                tblcliente.ajax.reload();

            }

        });
         
        
    }else{
        tblcliente.ajax.reload();
        Swal.fire(
            'No se pudo Eliminar!',
            'El Cliente no se a eliminado de la base de datos.',
            'error'
          )
      }
} 




$("#txtRazonnn").change(function(){ 
    $(".alert").remove();
   let razon = $(this).val();
   let etiqueta = "#txtRazon";
   const datos = new FormData();
   datos.append('valorValidar',razon);
   datos.append('itemValidar','rason');
   let url = "ajax/clientes.ajax.php";
 
  fetch(url,{
      method:'POST',
      body: datos

  }).then(resp=> resp.json())
  .then(response => comprobarDatos(response,etiqueta));
    
    
});

$("#txtIndetificacionnn").change(function(){ 
    $(".alert").remove();
   let ruc = $(this).val();
   let etiqueta ="#txtIndetificacion";
   const datos = new FormData();
   datos.append('valorValidar',ruc);
   datos.append('itemValidar','ruc');
   let url = "ajax/clientes.ajax.php";
 
  fetch(url,{
      method:'POST',
      body: datos

  }).then(resp=> resp.json())
  .then(response => comprobarDatos(response,etiqueta));
    
    
});

function comprobarDatos(resp,etiqueta) {
    if (resp) {
        $(etiqueta).parent().after('<div class="alert alert-danger" role="alert" ><i class="mdi mdi-block-helper mr-2"></i>El Cliente ya esta registrado en la base de datos!!</div>');
        $(etiqueta).val("");
        
    }
    
}

 





})

/* ====================================== 
FUNCION PARA ABRIR MODAL PARA REGISTRAR PROVEEDOR
====================================== */

function abrirModal() {    

    let opcion = 2;
    let cabeceraModal = document.getElementById("cabeceraM");
    cabeceraModal.classList.remove("bg-success");
    cabeceraModal.classList.add("bg-dark");
    document.getElementById("tituloModal").innerText = "Agregar Nuevo Cliente"; 
    document.getElementById("btnEditar").innerText = "Guardar Cliente";
    document.getElementById("formulario").reset(); 
  
    document.getElementById("txtOpcion").value = opcion;      
    
    $("#con-close-modal").modal("show");
    
}



