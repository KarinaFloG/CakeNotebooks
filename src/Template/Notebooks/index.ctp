<!-- File: src/Template/Notebooks/index.ctp -->

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
        <td><?= $notebook->id ?></td>
        <td>
            <?= $this->Html->link($notebook->type, ['action' => 'view', $notebook->id]) ?>
        </td>
        <td>
            <?= $notebook->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $notebook->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <!-- ?= $this->Html->link('Add/Edit', ['action' => 'edit', $notebook->id]) ?>  -->
            <?= $this->Html->link('Edit', ['action' => 'addEdit', $notebook->id]) ?> 
            
        </td>
    </tr>
<?php endforeach; ?>

</table>