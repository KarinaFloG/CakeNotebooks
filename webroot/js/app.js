function listIndex(){
    $.ajax({
        url:'/notebooks/listNotebooks',
        success:function(response){
            let template = '';
            $('#tableListNotebooks').html(response);
        },
        error:function(response){
            var error = new PNotify({
                title: 'ERROR',
                text: 'No se ha podido listar el contenido',
                type: 'error'
            });
        }

    });
};

$(function(){
    $("#btn-add-notebook").on("click", function(){
        $('#addModal').modal('show');
        $("#form-notebook").on("submit",function(){
            var datos = $("#form-notebook").serialize();
            console.log(datos);          
            $.ajax({
                url: "/notebooks/addEdit",
                data: datos,
                type: "JSON",
                method: "POST",
                success:function(response){
                    console.log(datos);
                    new PNotify({
                        title: 'Add notebook',
                        text: 'El registro se guardo con éxito',
                        type: 'success'
                    }); 
                    $('#addModal').modal('hide');
                    listIndex();
                },
                error:function(response){
                    var error = new PNotify({
                        title: 'Add notebook',
                        text: 'El registro se guardo con éxito',
                        type: 'error'
                    }); 
                    listIndex();
                }
            });
        });
    });

    $(document).on("click", ".btn-edit-notebook", function(){
        var row = $(this)[0].parentElement.parentElement;
        //Para obtener el id del registro que se desea eliminar a través del contenido de la fila
        var id = $(this).parents("tr").find("td")[1].innerHTML;
        console.log(id);

        $('#editModal').modal('show');
        $("#edit-notebook").on("submit",function(){
            var datos = $("#edit-notebook").serialize();
            console.log(datos);

            $.ajax({
                url: "/notebooks/addEdit/"+id,
                data: datos,
                type: "JSON",
                method: "POST",
                success:function(response){
                    PNotify({
                        title: 'Edit notebook',
                        text: 'Se modifico correctamente',
                        type: 'success'
                    }); 
                    $('#editModal').modal('hide');
                    listIndex();
                },
                error:function(response){
                    var error = new PNotify({
                        title: 'Edit notebook',
                        text: 'No se pudo modificar',
                        type: 'error'
                    }); 
                    listIndex();
                }
            });
        });
    });

    $(document).on("click", ".btn-delete-notebook", function(){
        var row = $(this)[0].parentElement.parentElement;
        //Para obtener el id del registro que se desea eliminar a través del contenido de la fila
        var id = $(this).parents("tr").find("td")[1].innerHTML;
        var datos = $("#edit-notebook input[name='_csrfToken']").attr('value');
        var token = '_csrfToken='+datos;
        console.log(datos);
        console.log(typeof id);
        if(confirm("Are you sure want to delete ?")){
            $.ajax({
                url: "/notebooks/delete/"+id,
                data: token,
                type: "JSON",
                method: "post",
                success:function(response){
                    var success = new PNotify({
                        title: 'Delete notebook',
                        text: 'Se ha eliminado',
                        type: 'success'
                    });
                    listIndex(); 
                },
                error:function(response){
                    console.log(datos);
                    var error = new PNotify({
                        title: 'Delete notebook',
                        text: 'No se ha podido eliminar',
                        type: 'error'
                    });
                    listIndex();

                }
            });
        }
    });

    $(document).ready(function(){
        listIndex();
    });
});
