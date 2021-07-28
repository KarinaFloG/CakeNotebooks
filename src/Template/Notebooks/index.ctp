<!-- File: src/Template/Notebooks/index.ctp -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<h1>Notebooks</h1>
<?= $this->Html->link('Add notebook',['controller' => 'Notebooks', 'action' => 'addEdit']) ?>
<table>
    <tr>
        <th>Id</th>
        <th>Type</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

<!-- Aquí es donde iteramos nuestro objeto de consulta $articles, mostrando en pantalla la información del artículo -->

<?php foreach ($notebooks as $notebook): ?>
    <tr>
        <td>
            <?php
            echo  $this->Form->postLink( 
                '',
                ['action' => 'delete', $notebook->id],
                ['confirm' => __('Are you sure you?'), 'class'=> 'fas fa-trash-alt']
            );
            
            echo $this->Html->link(
                '',
                ['action' => 'addEdit', $notebook->id],
                ['class' => 'fas fa-edit']
            );
            ?>
            
        
            <!-- ?= $this->Html->link('Edit', ['action' => 'addEdit', $notebook->id]) ?> 
            ?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $notebook->id],
                ['confirm' => 'Are you sure?'])
            ?>  -->
            
        </td>
        <td><?= $notebook->id ?></td>
        <td>
            <?= $this->Html->link($notebook->type, ['action' => 'view', $notebook->id]) ?>
        </td>
        <td>
            <?= $notebook->created->format(DATE_RFC850) ?>
        </td>
        
    </tr>
<?php endforeach; ?>

</table>