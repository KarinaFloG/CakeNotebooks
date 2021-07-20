<h1>Add Stock</h1>
<?php
    echo $this->Form->create($stock);
    echo $this->Form->input('name');
    echo $this->Form->input('quantity');
    echo $this->Form->button(__('Save stock'));
    echo $this->Form->end();
?>