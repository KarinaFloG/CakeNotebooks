<?php
// src/Model/Table/NotebooksTable.php
namespace App\Model\Table;

use Cake\Validation\Validator;

use Cake\ORM\Table;

use Cake\Utility\Text;

use Cake\ORM\Query;

class NotebooksTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsTo('Notebooks');
        $this->belongsTo('Materials');
    }
}
