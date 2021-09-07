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
                    //alert("El registro se guardo con éxito");
                    //window.location.href = '/list-students'
                },
                error:function(response){
                    var erro = new PNotify({
                        title: 'Add notebook',
                        text: 'El registro se guardo con éxito',
                        type: 'error'
                    }); 
                    //alert("No se pudo guardar el registro");
                    //window.location.href = '/list-students'
                }
            });
        });
    });

    $(document).on("click", ".btn-edit-notebook", function(){
        var row = $(this)[0].parentElement.parentElement;
        //Para obtener el id del registro que se desea eliminar a través del contenido de la fila
        var id = $(this).parents("tr").find("td")[1].innerHTML;
        //var id = $(row).attr('notebookId'); Es necesario para editar registro con el index sin AJAX
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
                    //alert("Se modifico correctamente ");
                    PNotify({
                        title: 'Edit notebook',
                        text: 'Se modifico correctamente',
                        type: 'success'
                    }); 
                },
                error:function(response){
                    var success = new PNotify({
                        title: 'Edit notebook',
                        text: 'No se pudo modificar',
                        type: 'error'
                    }); 
                    //alert("No se pudo modificar");
                    //window.location.href = '/list-students'
                }
            });
        });
    });

    $(document).on("click", ".btn-delete-notebook", function(){
        var row = $(this)[0].parentElement.parentElement;
        //Para obtener el id del registro que se desea eliminar a través del contenido de la fila
        var id = $(this).parents("tr").find("td")[1].innerHTML;
        //var id = $(row).attr('notebookId'); Es necesario para eliminar registro con el index sin AJAX
        var datos = $("#edit-notebook input[name='_csrfToken']").attr('value');
        var token = '_csrfToken='+datos;
        console.log(datos);
        console.log(typeof id);
        //console.log(id); //para saber el tipo de dato de la variable
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
                    window.location.href = '/notebooks';
                },
                error:function(response){
                    console.log(datos);
                    var error = new PNotify({
                        title: 'Delete notebook',
                        text: 'No se ha podido eliminar',
                        type: 'error'
                    });
                    //alert("No se pudo eliminar");
                    window.location.href = '/notebooks';
                }
            });
        }
    });

    $(document).ready(function(){
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
    });
});
