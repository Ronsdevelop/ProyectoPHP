/* ------------------------- */
/* SUBIENDO FOTO DEL USUARIO */
/* ------------------------- */

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

/* ------------------------- */
/* FUNCION PARA ASIGNAR LOS DATOS A CADA ELEMENTO DEL MODAL EDITAR USURAIO*/
/* ------------------------- */

function cargarDatos(datos) {
    document.getElementById("txtNombresEdit").value = datos["nombre"];
    document.getElementById("txtApaternoEdit").value = datos["aPaterno"];
    document.getElementById("txtAmaternoEdit").value = datos["aMaterno"];
    document.getElementById("txtDireccionEdit").value = datos["direccion"];
    document.getElementById("txtDniEdit").value = datos["dni"];
    document.getElementById("txtCelularEdit").value = datos["nCelular"];
    document.getElementById("txtFechaEdit").value = datos["fIngreso"];
    document.getElementById("txtUsuariosEdit").value = datos["user"];
    document.getElementById("passwordActual").value = datos["pass"];
    document.getElementById("fotoSinEditar").value = datos["avatar"];
    document.getElementById("txtCorreoEdit").value = datos["email"]; 
    document.getElementById("selecTCargo").selectedIndex = datos["cargo_id"];
    if (datos["avatar"] != "") {
        document.getElementById("previsualizarEdit").setAttribute("src",datos["avatar"]);   
    } 
     
}
/* ------------------------- */
/* TRAENDO DATOS MEDIANTE FETCH */
/* ------------------------- */

 
 function editUser(codUser) {
     const data = new FormData();
     data.append('codigUser',codUser)
 
  let url = "ajax/usuarios.ajax.php";
 
  fetch(url,{
      method:'POST',
      body: data

  }).then(resp=> resp.json())
  .then(response =>cargarDatos(response));
 }
/* ------------------------- */
/* CAMBIANDO EL ESTADO DE LOS USUARIOS */
/* ------------------------- */


function estadoUser(idUser,estadoUsuario) {

    if (estadoUsuario==0) {
        estadoUsuario = 1;
        estado = "Activo";
        clase = "badge badge-success classEstado";
    }else{
        estadoUsuario = 0;
        estado = "Inactivo";
        clase ="badge badge-danger classEstado";
    } 


    const data = new FormData();
    data.append('codigoUser',idUser);
    data.append('estadoUser',estadoUsuario);       

 
    let url = "ajax/usuarios.ajax.php";
    
    fetch(url,{
        method:'POST',
        body: data

    }).then(resp=> resp.text())
    .then( )         

    
}



