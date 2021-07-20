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
        $this->hasMany('Stocks');
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

    // El argumento $query es una instancia de query.
    // El array $options contendrá las opciones de 'tags' que pasemos
    // para encontrar'tagged') en nuestra acción del controlador.
    public function findStock(Query $query, array $options)
    {
        $stocks = $this->find()
            ->select(['id', 'name', 'quantity', 'created']);

        if (empty($options['notebooks'])) {
            $stocks
                ->leftJoinWith('Notebooks')
                ->where(['Notebooks.description IS' => null]);
        } else {
            $stocks
                ->innerJoinWith('Notebooks')
                ->where(['Notebooks.description IN ' => $options['notebooks']]);
        }

        return $stocks->group(['Stocks.id']);
    }
}