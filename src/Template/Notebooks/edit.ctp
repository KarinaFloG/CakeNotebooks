<h1>Edit Notebook</h1>
<?php
    echo $this->Form->create($notebook);
    echo $this->Form->input('type');
    echo $this->Form->input('description', ['rows' => '5']);
    echo $this->Form->button(__('Save notebook'));
    echo $this->Form->end();
?>