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
        $this->belongsToMany('Stocks');
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
        $notebooks = $this->find()
            ->select(['type', 'description', 'price', 'created']);

        if (empty($options['stocks'])) {
            $notebooks
                ->leftJoinWith('Stocks')
                ->where(['Stocks.name IS' => null]);
        } else {
            $notebooks
                ->innerJoinWith('Stocks')
                ->where(['Stocks.name IN ' => $options['stocks']]);
        }

        return $notebooks->group(['Notebooks.id']);
    }
}