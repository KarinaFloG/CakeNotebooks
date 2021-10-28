<!-- File: src/Template/Notebooks/index.ctp -->
<!--
Autor: Karina Flores G. (Github: @KarinaFloG)
Descripción: Plantilla HTML del index del sistio para la gestión del CRUD con AJAX.
Fecha: 
-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="/css/index.css" />

<?php echo $this->Html->script('app.js'); ?>

<h1>Materials</h1>
<?= $this->Html->link(
    'Add material',
    ['controller' => 'Materials', 'action' => 'add']
) ?>

<table class="table table-striped">

    <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Material</th>
      <th scope="col">Created</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

<!-- Aquí es donde iteramos nuestro objeto de consulta $articles, mostrando en pantalla la información del artículo -->

<?php foreach ($materials as $material): ?>
    <tr>
        <td><?= $material->id ?></td>
        <td>
            <?= $this->Html->link($material->material, ['action' => 'view', $material->id]) ?>
        </td>
        <td>
            <?= $material->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $material->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $material->id]) ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>