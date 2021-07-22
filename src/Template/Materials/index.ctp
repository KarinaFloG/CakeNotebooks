<!-- File: src/Template/Notebooks/index.ctp -->

<h1>Materials</h1>
<?= $this->Html->link(
    'Add material',
    ['controller' => 'Materials', 'action' => 'add']
) ?>
<table>
    <tr>
        <th>Id</th>
        <th>Material</th>
        <th>Created</th>
        <th>Action</th>
    </tr>

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