<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<link rel="stylesheet" href="/css/modal.css" />

<div class="container">
<div class="modal fade" id="<?php echo $idModal?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo $action?></h5>
        <button type="button"  class="btn-close btnclose" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body-add container">
            <section>
              <?php
                echo $this->Form->create('Notebooks',['id'=>$idForm] );  
              ?>

            <div class="tipo">
              <?php
                echo $this->Form->input('type'); 
              ?>
            </div>

            <div class="ti">
              <?php
                echo $this->Form->input('description');
              ?>
            </div>

            <div class="boton">
              <?php
                echo $this->Form->button(__('Save notebook'));
              ?>
            </div>

            <?php
                echo $this->Form->end();
            ?>
            </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary closebtn" data-bs-dismiss="modal" >Close</button>
      
      </div>
    </div>
  </div>
</div>