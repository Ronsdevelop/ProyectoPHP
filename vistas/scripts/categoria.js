var tabla;
//Funcion que se ejecuta al incio

function init(){
    mostrarform(false);
    listar();

}
//Funvion limpiar

function limpiar(){
    $("#idcategoria").val("");
    $("#nombre").val("");
    $("#descripcion").val("");
}

//Función mostrar formulario
function mostrarform(flag){
    limpiar();
    if (flag) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled",false);        
    }else{
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
    }
}

//Funcion Cancelar Form

function cancelarform(){
    limpiar();
    mostrarform(false);
}
//Función Listar
function listar(){
    tabla = $('#tbllistado').dataTable({
        "responsive": true,
        "autoWidth": false,
        language: {
          "lengthMenu": "Mostrar _MENU_ registros",
          "zeroRecords": "No se encontraron resultados",
          "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sSearch": "Buscar:",
          "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
          },
          "sProcessing": "Procesando...",
        },
        "ajax":
        {
            url:'../ajax/categoria.php?op=listar',
            type:"get",
            dataType:"json",
            error:function(e){
                console.log(e.responseText);
                
            }
        },
        "bDestroy":true,
        "iDisplayLength":10,//paginacion
        "order":[[0,"desc"]]//ordenar los datos de manera descente
    }).DataTable();
     
}

init();