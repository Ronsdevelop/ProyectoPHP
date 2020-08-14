$(document).ready(function(){  
    listarUsuario();  

    function listarUsuario() {
        let url = 'controladores/prueba.php';
        fetch(url).then(respuesta=>respuesta.json())
                  .then(respuesta=>{
                      let tablaDatos = '';
                      respuesta.forEach(usuario => {
                        tablaDatos +=`<tr>
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
                        </td>                                          

                    </tr>`
                      });
                      $("#tabla").html(tablaDatos);
                  })
        

    }
});