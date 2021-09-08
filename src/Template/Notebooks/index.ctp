<!--
Autor: Karina Flores G. (Github: @KarinaFloG)
Descripción: Plantilla HTML del index del sistio para la gestión del CRUD con AJAX.
Fecha: 
-->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="/css/index.css" />
<?php echo $this->Html->script('app.js'); ?>



<?php echo $this->element('indexModal', ['action'=>'ADD', 'idModal'=>'addModal', 'idForm'=>'form-notebook']); ?>
<?php echo $this->element('indexModal', ['action'=>'EDIT', 'idModal'=>'editModal', 'idForm'=>'edit-notebook']); ?>



<body>
<h1>Notebooks</h1>
<button style="margin: 14px" type="button" id="btn-add-notebook" class="btn btn-info fas fa-plus-square"> Add notebook</button>


<table class="table table-striped table-hover">
    <tr>
        <th>Action</th>
        <th>Id</th>
        <th>Type</th>
        <th>Created</th>
        
    </tr>
    <tbody id="tableListNotebooks">
        
    </tbody>

</table>
</div>
</body>
