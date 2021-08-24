<?php
// src/Controller/NotebooksController.php

namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\Table;

class NotebooksController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        //$this->loadComponent('Csrf'); 
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
        //$this->loadComponent('Security');
    }

    //Para poder deshabilitar el componente de seguridad CSRF y utilizar AJAX
    //public function beforeFilter(Event $event)
    //{
        //$this->getEventManager()->off($this->Csrf);
    //}
    

    public function index()
    {
        $notebooks = $this->Notebooks->index();
        $this->set(compact('notebooks'));
         //$this->set('notebooks', $this->Notebooks->find('all'));
    }

    public function view($id)
    {
        //$notebook = $this->Notebooks->get($id);
        //$this->set(compact('notebook'));

        $notebook =$this->Notebooks->find('all');
        $notebook->hydrate(false);        
        $notebook->join([
            'n' => [
                'table' => 'materials_notebooks',
                'type' => 'INNER',
                'conditions' => 'n.notebook_id = notebooks.id',
            ],
            'm' => [
                'table' => 'materials',
                'type' => 'INNER',
                'conditions' => 'm.id = n.material_id',
            ]
        ]);
        $notebook->select(['m.material','m.description'])->where(['notebooks.id'=> $id]);
        $notebook->select(['notebooks.type','notebooks.description','notebooks.price'])->where(['notebooks.id'=> $id]);
        $this->set(compact('notebook'));
        
    }

     
    /*
    ---FUNCIONES ADD Y EDIT POR SEPARADO SIN MVC
    public function add()
    {
        $notebook = $this->Notebooks->newEntity();
        if ($this->request->is('post')) {
            $notebook = $this->Notebooks->patchEntity($notebook, $this->request->getData());
            if ($this->Notebooks->save($notebook)) {
                $this->Flash->success(__('Your notebook has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your notebook.'));
        }
        $this->set('notebook', $notebook);
    }
    
    
    public function edit($id = null)
    {
        $notebook = 7$this->Notebooks->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Notebooks->patchEntity($notebook, $this->request->getData());
            if ($this->Notebooks->save($notebook)) {
                $this->Flash->success(__('Your notebook has been update.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error updating notebook.'));
        }

        $this->set('notebook', $notebook);
    }
    */

    public function addEdit($id = null)
    {
        if(empty($id)){
            $result = $this->Notebooks->addEdit($this->request->getData());
            if($result){
                $this->Flash->success(__('The notebook with id: {0} has been updated.', h($id)));
            }else{
                $this->Flash->error(__('The notebook with id: {0} has not been updated.', h($id)));
            }

            /* Esto si el modelo y el controlador se quedan mezclados
            $notebook = $this->Notebooks->newEntity();
            if ($this->request->is(['post'])) {
                $notebook = $this->Notebooks->patchEntity($notebook, $this->request->getData());
                if ($this->Notebooks->save($notebook)) {
                    $this->Flash->success(__('Your notebook has been saved.'));
                    echo json_encode(array(
                        "status" => 1,
                        "messsage" => "Se ha creado una libreta"
                    ));
                    exit;
                    //return $this->redirect(['action' => 'index']);
                    //dump($notebook);
                }
                //$this->Flash->error(__('Unable to add your notebook.'));
                echo json_encode(array(
                    "status" => 0,
                    "messsage" => "No se ha podido crear una libreta"
                ));
            }
            $this->set('notebook', $notebook);
            */
        }else{
            $notebook = $this->Notebooks->get($id);
            $result = $this->Notebooks->addEdit($this->request->getData(),$id);
            if($result){
                $this->Flash->success(__('The notebook with id: {0} has been updated.', h($id)));
            }else{
                $this->Flash->error(__('The notebook with id: {0} has not been updated.', h($id)));
            }
            
            /* Esto si el modelo y el controlador se quedan mezclados
            if ($this->request->is(['post', 'put'])) {
                $this->Notebooks->patchEntity($notebook, $this->request->getData());
                if ($this->Notebooks->save($notebook)) {
                    $this->Flash->success(__('Your notebook has been update.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Error updating notebook.'));
            }
    
            $this->set('notebook', $notebook);
            */
        }
        return $this->redirect(['action' => 'index']);
    }

    
    public function delete($id)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $notebook = $this->Notebooks->get($id);
        $result = $this->Notebooks->deleteNotebook($notebook,['atomic' => false]);
        if ($result){
            $this->Flash->success(__('The notebook with id: {0} has been deleted.', h($id)));
            //return $this->redirect(['action' => 'index']);
        }else{
            $this->Flash->error(__('The notebook with id: {0} has not been deleted.', h($id)));
        }
        
        return $this->redirect(['action' => 'index']);
        
        //if ($this->Notebooks->delete($notebook)) {
           // $this->Flash->success(__('The notebook with id: {0} has been deleted.', h($id)));
            //return $this->redirect(['action' => 'index']);
        //}
    }

    
    public function stocks()
    {
        // The 'pass' key is provided by CakePHP and contains all
        // the passed URL path segments in the request.
        $stocks = $this->request->getParam('pass');

        $notebooks = $this->Notebooks->find('stock', [
            'stocks' => $stocks
        ]);

        // Pass variables into the view template context.
        $this->set([
            'notebooks' => $notebooks,
            'stocks' => $stocks
        ]);
    }

}