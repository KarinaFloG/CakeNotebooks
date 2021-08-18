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
                    alert("El registro se guardo con éxito");
                    //window.location.href = '/list-students'
                },
                error:function(response){
                    alert("No se pudo guardar el registro");
                    //window.location.href = '/list-students'
                }
            });
        });
    });

    $(document).on("click", ".btn-edit-notebook", function(){
        var row = $(this)[0].parentElement.parentElement;
        var id = $(row).attr('notebookId');
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
                    alert("Se modifico correctamente ");
                },
                error:function(response){
                    alert("No se pudo modificar");
                    //window.location.href = '/list-students'
                }
            });
        });
    });

    $(document).on("click", ".btn-delete-notebook", function(){
        var row = $(this)[0].parentElement.parentElement;
        var id = $(row).attr('notebookId');
        console.log(id);

        if(confirm("Are you sure want to delete ?")){
            $.ajax({
                url: "/notebooks/delete/"+id,
                data: postdata,
                type: "JSON",
                method: "post",
                success:function(response){
                    alert("Se elimino el registro ");
                },
                error:function(response){
                    alert("No se pudo eliminar");
                    //window.location.href = '/list-students'
                }
            });
        }
    });
});
