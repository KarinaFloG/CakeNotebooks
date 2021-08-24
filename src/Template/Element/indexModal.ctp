<div class="container">
<div class="modal fade" id="<?php echo $idModal?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $action?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body-add container">
        
            <?php
                echo $this->Form->create('Notebooks',['id'=>$idForm] );
                echo $this->Form->input('type');
                echo $this->Form->input('description', ['rows' => '3']);
                echo $this->Form->button(__('Save notebook'));
                echo $this->Form->end();
            ?>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>