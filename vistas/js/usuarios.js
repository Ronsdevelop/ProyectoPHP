
document.addEventListener('DOMContentLoaded',function(){   
    listarUsuario();  

})

function listarUsuario() {
    let url = 'controladores/prueba.php';
    fetch(url).then(respuesta=>respuesta.json())
              .then(respuesta=>{

              

                let datosUser =[];

                respuesta.forEach(user => {

                    let estado = `<span class="badge ${(user.estado!=0)?'badge-success':'badge-danger'} classEstado" idUsuario="${user.colaborador_id}">${(user.estado!=0)?'Activo':'Inactivo'}</span>`;

                  
                    datosUser.push({
                       "ID": "<b>"+user.colaborador_id+"</b>",
                       "Nombre": "<span class='ml-2'>"+user.nombre+' '+user.aPaterno+' '+user.aMaterno+"</span>",
                       "Foto":"<a href='javascript: void(0);'><img src="+user.avatar+" alt='contact-img' title='contact-img' class='rounded-circle avatar-xs' /></a>",
                       "Dni": user.dni,
                       "Direccion":user.direccion,
                       "Usuario":user.user,
                       "ULogeo":user.ultimoLogueo,
                       "Estado":estado

                    })
                    
                });

                $('#tablas').DataTable({
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
                     
                    data: datosUser,
                    columns: [
                      {data: "ID" },
                      {data: "Nombre"},
                       {data: "Foto"},
                       {data: "Dni"},
                       {data: "Direccion"},
                       {data: "Usuario"},
                       {data: "Estado"}
                    
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

                  

            
                  
              })
    

}


