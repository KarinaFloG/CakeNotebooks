<?php
// src/Model/Table/MaterialsTable.php
namespace App\Model\Table;

use Cake\Validation\Validator;

use Cake\ORM\Table;

use Cake\Utility\Text;

use Cake\ORM\Query;

class MaterialsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
        $this->belongsToMany('Notebooks', [
            'through' => 'MaterialsNotebooks',
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
            ->notEmpty('material')
            ->notEmpty('description');

        return $validator;
    }
}

