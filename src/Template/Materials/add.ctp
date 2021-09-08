<h1>Add Material</h1>
<?php
    echo $this->Form->create($material);
    echo $this->Form->input('material');
    echo $this->Form->input('description', ['rows' => '5']);
    echo $this->Form->button(__('Save material'));
    echo $this->Form->end();
?>