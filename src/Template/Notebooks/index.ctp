<!-- File: src/Template/Notebooks/index.ctp -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="/css/index.css" />
<?php echo $this->Html->script('app.js'); ?>


<!--
  SIN UTILIZAR ELEMENT-----
<div class="container">
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit notebook</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body-add container">
        
            <?php
                /*
                echo $this->Form->create('Notebooks',['id'=>'edit-notebook'] );
                echo $this->Form->input('type');
                echo $this->Form->input('description', ['rows' => '3']);
                echo $this->Form->button(__('Edit notebook'));
                echo $this->Form->end();
                */
            ?>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>
-->

<?php echo $this->element('indexModal', ['action'=>'ADD', 'idModal'=>'addModal', 'idForm'=>'form-notebook']); ?>
<?php echo $this->element('indexModal', ['action'=>'EDIT', 'idModal'=>'editModal', 'idForm'=>'edit-notebook']); ?>



<body>
<h1>Notebooks</h1>
<button style="margin: 14px" type="button" id="btn-add-notebook" class="btn btn-info fas fa-plus-square"> Add notebook</button>

<!--
< ? =
    $this->Html->link(
    'Add notebook',
    ['controller' => 'Notebooks', 'action' => 'addEdit'],
    ['class' => 'fas fa-plus']
    )?>

 -->

<table class="table table-striped table-hover">
    <tr>
        <th>Action</th>
        <th>Id</th>
        <th>Type</th>
        <th>Created</th>
        
    </tr>

<!-- Aquí es donde iteramos nuestro objeto de consulta $articles, mostrando en pantalla la información del artículo -->

<?php foreach ($notebooks as $notebook): ?>
    <tr notebookId="<?=$notebook->id?>">
        <td>
            <button style="margin: 8px" type="button" class="btn btn-danger fas fa-trash btn-delete-notebook">
            </button>
            <!--?= 
            $this->Form->postLink( 
                '',
                ['action' => 'delete', $notebook->id],
                ['confirm' => __('Are you sure you?'), 'class'=> 'fas fa-trash']
            )?>
            -->
            

            <button type="button" class="btn btn-warning fas fa-edit btn-edit-notebook">
            </button>
        
            <!--
            ?=
            $this->Html->link(
                '',
                ['action' => 'addEdit', $notebook->id],
                ['class' => 'fas fa-edit']
            )?>    
            ?= $this->Html->link('Edit', ['action' => 'addEdit', $notebook->id]) ?> 
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
</div>
</body>
