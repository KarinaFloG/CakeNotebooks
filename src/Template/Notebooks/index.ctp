<!-- File: src/Template/Notebooks/index.ctp -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="/css/index.css" />

<body>
<h1>Notebooks</h1>
<button style="margin: 14px" type="button" class="btn btn-info">
<?=
    $this->Html->link(
    'Add notebook',
    ['controller' => 'Notebooks', 'action' => 'addEdit'],
    ['class' => 'fas fa-plus']
    )?>
</button>
<table class="table table-striped table-hover">
    <tr>
        <th>Action</th>
        <th>Id</th>
        <th>Type</th>
        <th>Created</th>
        
    </tr>

<!-- Aquí es donde iteramos nuestro objeto de consulta $articles, mostrando en pantalla la información del artículo -->

<?php foreach ($notebooks as $notebook): ?>
    <tr>
        <td>
            <button style="margin: 8px" type="button" class="btn btn-danger">
            <?= 
            $this->Form->postLink( 
                '',
                ['action' => 'delete', $notebook->id],
                ['confirm' => __('Are you sure you?'), 'class'=> 'fas fa-trash']
            )?>
            </button>
            <button type="button" class="btn btn-warning">
            <?=
            $this->Html->link(
                '',
                ['action' => 'addEdit', $notebook->id],
                ['class' => 'fas fa-edit']
            )?>
            </button>
        
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
</body>
