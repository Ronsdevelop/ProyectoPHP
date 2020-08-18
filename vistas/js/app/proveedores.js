 
$(document).ready(function() {
    tblproveedor =  $('#tablaProveedor').DataTable({
                        language: {
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en Proveedores",
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
                            "url": "controladores/proveedor.controlador.php",   
                            "method": 'POST', //usamos el metodo POST
                            "data":{"txtOpcion":1}, //enviamos opcion 4 para que haga un SELECT                   
                            "dataSrc":""
                        },                
                        columns: [
                          {data: "ID" },
                          {data: "Rason"},
                           {data: "Ruc"},                          
                           {data: "Direccion"},
                           {data: "Contacto"},
                           {data: "Email"},
                           {data: "Celular"},
                           {data: "Telefono"},
                           {data: "Referencia"},
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
    fetch("controladores/proveedor.controlador.php",
        {method:"POST",
        body:data}).then(response => response.text())
                   .then(response =>                 
                    tblproveedor.ajax.reload())
                   



})


/* ====================================== 
FUNCION PARA ELIMINAR PROVEEDOR
====================================== */
 
$(document).on("click",".btn-eliminarPro", function () {
    let codProveedor = $(this).attr("idProveedor");
    const datos = new FormData();
    datos.append('codProveedor',codProveedor); 
  
    const url = "ajax/proveedores.ajax.php";

    Swal.fire({
        title: 'Seguro que deseas elimar el Proveedor?',
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
                .then(response => confirmarEliminacionProveedor(response))
          }      
        
        
        });
});


function confirmarEliminacionProveedor(respuesta){ 
    console.log(respuesta);
   
    if (respuesta == "ok"){        
        Swal.fire({
            icon:"success",
            title:"Se Elimino correctamente",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
        }).then(function(result){

            if(result.value){            
                tblproveedor.ajax.reload();

            }

        });
         
        
    }else{
        tblproveedor.ajax.reload();
        Swal.fire(
            'No se pudo Eliminar!',
            'El Proveedor no se a eliminado de la base de datos.',
            'error'
          )
      }
} 




$("#txtRazon").change(function(){ 
    $(".alert").remove();
   let razon = $(this).val();
   let etiqueta = "#txtRazon";
   const datos = new FormData();
   datos.append('valorValidar',razon);
   datos.append('itemValidar','rason');
   let url = "ajax/proveedores.ajax.php";
 
  fetch(url,{
      method:'POST',
      body: datos

  }).then(resp=> resp.json())
  .then(response => comprobarDatosProveedor(response,etiqueta));
    
    
});

$("#txtIndetificacion").change(function(){ 
    $(".alert").remove();
   let ruc = $(this).val();
   let etiqueta ="#txtIndetificacion";
   const datos = new FormData();
   datos.append('valorValidar',ruc);
   datos.append('itemValidar','ruc');
   let url = "ajax/proveedores.ajax.php";
 
  fetch(url,{
      method:'POST',
      body: datos

  }).then(resp=> resp.json())
  .then(response => comprobarDatosProveedor(response,etiqueta));
    
    
});

function comprobarDatosProveedor(resp,etiqueta) {
    if (resp) {
        $(etiqueta).parent().after('<div class="alert alert-danger" role="alert" ><i class="mdi mdi-block-helper mr-2"></i>El Proveedor ya esta registrado en la base de datos!!</div>');
        $(etiqueta).val("");
        
    }
    
}

 





})

/* ====================================== 
FUNCION PARA ABRIR MODAL PARA REGISTRAR PROVEEDOR
====================================== */

function abrirModalProveedor() {    

    let opcion = 2;
    let cabeceraModal = document.getElementById("cabeceraM");
    cabeceraModal.classList.remove("bg-success");
    cabeceraModal.classList.add("bg-dark");
    document.getElementById("tituloModal").innerText = "Agregar Nuevo Proveedor"; 
    document.getElementById("btnEditar").innerText = "Guardar Proveedor";
    document.getElementById("formulario").reset(); 
  
    document.getElementById("txtOpcion").value = opcion;      
    
    $("#con-close-modal").modal("show");
    
}




 /* ------------------------- */
 /* EDITAR PROVEEDOR  */
 /* ------------------------- */ 
 
$(document).on("click",".btn-editarPro", function () {
    let codProveedor = $(this).attr("idProveedor");
    let opcion = 3;
    let cabeceraModal = document.getElementById("cabeceraM");
    cabeceraModal.classList.remove("bg-dark");
    cabeceraModal.classList.add("bg-success");
   document.getElementById("tituloModal").innerText = "Editar Usuario";
 
   document.getElementById("btnEditar").innerText = "Actualizar Usuario";
   
   document.getElementById("txtOpcion").value = opcion;
     const data = new FormData();
     data.append('codigoProv',codProveedor);
     $("#con-close-modal").modal("show");
 
  let url = "ajax/proveedores.ajax.php";
 
  fetch(url,{
      method:'POST',
      body: data
 
  }).then(resp=> resp.json())
  .then(response =>cargarDatosProveedor(response));
    
});



 /* ------------------------- */
/* FUNCION PARA ASIGNAR LOS DATOS A CADA ELEMENTO DEL MODAL EDITAR USURAIO*/
/* ------------------------- */

function cargarDatosProveedor(datos) {
    document.getElementById("txtRazon").value = datos["rason"];
    document.getElementById("txtDireccion").value = datos["direccion"];
    document.getElementById("txtContacto").value = datos["contacto"];
    document.getElementById("txtIndetificacion").value = datos["ruc"];
    document.getElementById("txtCelular").value = datos["nCelular"];
    document.getElementById("txtFijo").value = datos["nFono"];
    document.getElementById("txtCorreo").value = datos["email"];
    document.getElementById("txtReferencia").value = datos["referencia"];
    document.getElementById("txtId").value = datos["proveedor_id"];
     
}



/*=====================
COMPROBAR SI LA RAZON SOCIAL ESTA REPETIDA
======================*/

