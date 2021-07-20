<!-- File: src/Template/Stocks/index.ctp -->

<h1>Stock</h1>

<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>

<!-- Aquí es donde iteramos nuestro objeto de consulta $articles, mostrando en pantalla la información del artículo -->

<?php foreach ($stocks as $stock): ?>
    <tr>
        <td><?= $stock->id ?></td>
        <td>
            <?= $this->Html->link($stock->name, ['action' => 'view', $stock->id]) ?>
        </td>
        <td>
            <?= $stock->name?>
        </td>
        <td>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $stock->id],
                ['confirm' => 'Are you sure?'])
            ?>
            <?= $this->Html->link('Edit', ['action' => 'edit', $stock->id]) ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>