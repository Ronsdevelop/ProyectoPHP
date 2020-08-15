/*function cargarArreglo() {  
    var datosUser =[];

      let url = 'controladores/prueba.php';
    fetch(url).then(respuesta=>respuesta.json())
              .then(respuesta=>{        

                

                respuesta.forEach(user => {                 

                    let estado = `<span class="badge ${(user.estado!=0)?'badge-success':'badge-danger'} classEstado" idUsuario="${user.colaborador_id}">${(user.estado!=0)?'Activo':'Inactivo'}</span>`;
                    let accion =` 
                    <div class="btn-group dropdown">
                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-secondary btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button class="dropdown-item"  onClick="editUser(${user.colaborador_id})"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Editar</button>
                        <button class="dropdown-item btn-activar" idUsuario="${user.colaborador_id}" estadoUsuario="${(user.estado!=0)?0:1}" ><i class="mdi  ${(user.estado!=0)?'mdi-block-helper':'mdi-check-all '} mr-2 text-muted font-18 vertical-middle"></i>${(user.estado!=0)?'Desactivar':'Activar'}</button>
                        <button class="dropdown-item btn-eliminar" idUsuario="${user.colaborador_id}" usuario="${user.user}" fotoUser="${user.avatar}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Eliminar</button>
                        
                    </div>
                    </div>`;

                  
                    datosUser.push({
                       "ID": "<b>"+user.colaborador_id+"</b>",
                       "Nombre": "<span class='ml-2'>"+user.nombre+' '+user.aPaterno+' '+user.aMaterno+"</span>",
                       "Foto":"<a href='javascript: void(0);'><img src="+user.avatar+" alt='contact-img' title='contact-img' class='rounded-circle avatar-xs' /></a>",
                       "Dni": user.dni,
                       "Direccion":user.direccion,
                       "Usuario":user.user,
                       "ULogeo":user.ultimoLogeo,
                       "Estado":estado,
                       "Telefono":user.nCelular,
                       "Accion":accion

                    })
                    
                });
                
                
            
})
return datosUser;

};*/
 
$(document).ready(function() {
tblUser =  $('#tablas').DataTable({
                    language: {
                        "sProcessing":     "Procesando...",
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla",
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
                        "url": "controladores/prueba.php",   
                        "method": 'POST', //usamos el metodo POST
                        "data":{"txtOpcion":1}, //enviamos opcion 4 para que haga un SELECT                   
                        "dataSrc":""
                    },                
                    columns: [
                      {data: "ID" },
                      {data: "Nombre"},
                       {data: "Foto"},
                       {data: "Dni"},
                       {data: "Direccion"},
                       {data: "Usuario"},
                       {data: "ULogeo"},
                       {data: "Estado"},
                       {data: "Telefono"},
                       {data: "Accion"}
                    
                    ]});

            
 /*

                  respuesta.forEach(usuario => {
                      let fila
                   =`<tr>
                    <td><b>${usuario.colaborador_id}</b></td>
                    <td>
                        <span class="ml-2">${usuario.nombre+' '+usuario.aPaterno+' '+usuario.aMaterno}</span>
                    </td>
                    <td>
                        <a href="javascript: void(0);">
                            <img src="${usuario.avatar}" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs" />
                        </a>
                    </td>
                    <td>
                    ${usuario.dni}
                    </td>
                    <td>
                    ${usuario.direccion}
                    </td>
                    <td>
                    ${usuario.user}
                    </td>
                    
                    <td>
                    ${usuario.ultimoLogeo}
                    </td> 
                     <td>
                    <span class="badge ${(usuario.estado!=0)?'badge-success':'badge-danger'} classEstado" idUsuario="${usuario.colaborador_id}">${(usuario.estado!=0)?'Activo':'Inactivo'}</span>
                    </td>                                               
                    <td>
                    ${usuario.nCelular}
                    -
                    </td>
                    <td>
                        <div class="btn-group dropdown">
                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-secondary btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button class="dropdown-item" data-toggle="modal" data-target="#con-close-modal" onClick="editUser(${usuario.colaborador_id})"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Editar</button>
                            <button class="dropdown-item btn-activar" idUsuario="${usuario.colaborador_id}" estadoUsuario="0" ><i class="mdi  ${(usuario.estado!=0)?'mdi-block-helper':'mdi-check-all '} mr-2 text-muted font-18 vertical-middle"></i>${(usuario.estado!=0)?'Desactivar':'Activar'}</button>
                            <button class="dropdown-item btn-eliminar" idUsuario="${usuario.colaborador_id}" usuario="${usuario.user}" fotoUser="${usuario.avatar}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Eliminar</button>
                                
                            </div>
                        </div>
                    </td>

                </tr>`;
                $(fila).appendTo("#tablas tbody");;
                  }); */

                  

            
                  

    

 
/* ====================================== 
AGREGAR USUARIO
====================================== */

const form = document.getElementById('formulario');
form.addEventListener('submit',function(e){
    e.preventDefault();
    let data = new FormData(form);  
    fetch("controladores/prueba.php",{method:"POST",body:data}).then(response => response.text())
    .then(response => console.log(response))



})


/* ====================================== 
ACTIVAR USUSARIO
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



 $(document).on("click",".btn-activar", function(){ 
    
    let idUsuario = $(this).attr("idUsuario");
    let estadoUsuario = $(this).attr("estadoUsuario");
     
    console.log(estadoUsuario);
    
    const datos = new FormData();
    datos.append('activarId',idUsuario);
    datos.append('activarUsuario',estadoUsuario);
    let url = "ajax/usuarios.ajax.php";
 
  fetch(url,{
      method:'POST',
      body: datos

  }).then(resp=> resp.text())
  .then(response =>  
    Swal.fire({
        icon:"success",
        title:"!El Usuario se Cambio de Estado",
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
    }).then(function(result){

        if(result.value){
        
            tblUser.ajax.reload();

        }

    })
    
    );
   
});



/*=====================
COMPROBAR SI NO ESTA REPETIDO EL USUARIO
======================*/

function comprobarDatosUser(resp) {
    if (resp) {
        $("#txtUsuario").parent().after('<div class="alert alert-danger" role="alert" ><i class="mdi mdi-block-helper mr-2"></i>El usuario ya esta registrado en la base de datos!!</div>');
        $("#txtUsuario").val("");
        
    }
    
}

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
        Swal.fire(
            'No se pudo Eliminar!',
            'El usuario no se a eliminado de la base de datos.',
            'error'
          )
      }
} 
    
 
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

})

function abrirModal() {
    let opcion = 2;
    let cabeceraModal = document.getElementById("cabeceraM");
     cabeceraModal.classList.remove("bg-success");
     cabeceraModal.classList.add("bg-dark");
     document.getElementById("tituloModal").innerText = "Agregar Nuevo Usuario";
     document.getElementById("txtUsuario").readOnly = false;
     document.getElementById("btnEditar").innerText = "Guardar Usuario";
    document.getElementById("formulario").reset();   
    document.getElementById("previsualizar").setAttribute("src","vistas/public/assets/images/users/user-anonimo.png");
    document.getElementById("txtOpcion").value = opcion;
      /*let ulr = 'controladores/prueba.php';
    fetch(url,{
        method:'POST',
        data: dataAgregar,
    }).then(resp=> resp.text())
    .then(response =>
  
      "nombre"=>$_POST["txtNombres"],
                    "aPaterno"=>$_POST["txtApaterno"],
                    "aMaterno"=>$_POST["txtAmaterno"],
                    "dni"=>$_POST["txtDni"],
                    "direccion"=>$_POST["txtDireccion"],
                    "avatar"=>$ruta,
                    "nCelular"=>$_POST["txtCelular"],
                    "fIngreso"=>$_POST["txtFecha"],
                    "user"=>$_POST["txtUsuario"],
                    "pass"=>$conEncriptada,
                    "email"=>$_POST["txtCorreo"],
                    "cargo_id"=>$_POST["txtTipo"],

    */
    
    
    $("#con-close-modal").modal("show");
    
}


/* ------------------------- */
/* SUBIENDO FOTO DEL USUARIO */
/* ------------------------- */



/* ------------------------- */
/* FUNCION PARA ASIGNAR LOS DATOS A CADA ELEMENTO DEL MODAL EDITAR USURAIO*/
/* ------------------------- */

function cargarDatos(datos) {
    document.getElementById("txtNombres").value = datos["nombre"];
    document.getElementById("txtApaterno").value = datos["aPaterno"];
    document.getElementById("txtAmaterno").value = datos["aMaterno"];
    document.getElementById("txtDireccion").value = datos["direccion"];
    document.getElementById("txtDni").value = datos["dni"];
    document.getElementById("txtCelular").value = datos["nCelular"];
    document.getElementById("txtFecha").value = datos["fIngreso"];
    document.getElementById("txtUsuario").value = datos["user"];
    document.getElementById("passwordActual").value = datos["pass"];
    document.getElementById("fotoSinEditar").value = datos["avatar"];
    document.getElementById("txtCorreo").value = datos["email"]; 
    document.getElementById("selecTCargo").selectedIndex = datos["cargo_id"];
    if (datos["avatar"] != "") {
        document.getElementById("previsualizar").setAttribute("src",datos["avatar"]);   
    } 
     
 }
 /* ------------------------- */
 /* TRAENDO DATOS MEDIANTE FETCH */
 /* ------------------------- */
 
 
 function editUser(codUser) {
    let cabeceraModal = document.getElementById("cabeceraM");
    cabeceraModal.classList.remove("bg-dark");
    cabeceraModal.classList.add("bg-success");
   document.getElementById("tituloModal").innerText = "Editar Usuario";
   document.getElementById("txtUsuario").readOnly = true;
   document.getElementById("btnEditar").innerText = "Actualizar Usuario";
     const data = new FormData();
     data.append('codigUser',codUser);
     $("#con-close-modal").modal("show");
 
  let url = "ajax/usuarios.ajax.php";
 
  fetch(url,{
      method:'POST',
      body: data
 
  }).then(resp=> resp.json())
  .then(response =>cargarDatos(response));
 }


