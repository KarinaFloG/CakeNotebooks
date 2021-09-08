<?php
/*
Autor: Karina Flores G. (Github: @KarinaFloG)
Descripción: Modelo del MVC para el sistema de registro de libretas con CRUD completo haciendo uso de AJAX.
Fecha: 
*/



// src/Model/Table/NotebooksTable.php
namespace App\Model\Table;

use Cake\Validation\Validator;

use Cake\ORM\Table;

use Cake\Utility\Text;

use Cake\ORM\Query;

use Cake\ORM\TableRegistry;

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

    public function index(){
        $notebooksTable = TableRegistry::getTableLocator()->get('Notebooks');
        $notebooks = $notebooksTable->find('all');
        return $notebooks;
    }

    public function deleteNotebook($entity, $options = []){
        $notebooksTable = TableRegistry::getTableLocator()->get('Notebooks');
        if($notebooksTable->delete($entity)){
            return true;
        }
        return false;
    }
    
    public function addEdit($data = null, $id = null){
        //Se obtiene todo lo que hay en notebooks
        console.log($id);
        if($id != null){
            $notebooksTable = TableRegistry::getTableLocator()->get('Notebooks'); 
            $notebook = $notebooksTable->get($id); 
            $notebook = $notebooksTable->patchEntity($notebook, $data); 
            if($notebooksTable->save($notebook)){
                return true;
            }
            return false;//sino un false
        }else{
            $notebooksTable = TableRegistry::getTableLocator()->get('Notebooks'); 
            $notebookEntity = $notebooksTable->newEntity();
            $notebook = $notebooksTable->patchEntity($notebookEntity, $data);
            if($notebooksTable->save($notebook)){
                return true; 
            }
            return false;
        }
        
        return false;//sino un false
        
    }
}