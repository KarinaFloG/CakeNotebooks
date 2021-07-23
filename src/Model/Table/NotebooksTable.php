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
        $this->belongsToMany('Materials', [
            'className' => 'Materials',
            'joinTable' => 'materials_notebooks',
            'foreignKey' => 'material_id',
            'bindingKey' => 'notebook_id',
            'unique' => true,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'finderQuery' => '',
            'with' => '',
        ]);
    
    
    }

    public function beforeSave($event, $entity, $options)
    {
        if ($entity->isNew() && !$entity->slug) {
            $sluggedType = Text::slug($entity->type);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedType, 0, 191);
        }
    }

       
    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('type')
            ->notEmpty('description');

        return $validator;
    }

}