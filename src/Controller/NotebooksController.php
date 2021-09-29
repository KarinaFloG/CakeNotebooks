<?php
/*
Autor: Karina Flores G. (Github: @KarinaFloG)
Descripción: Controlador de sistema de registro de libretas con CRUD completo.
Fecha: 
*/

namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\Table;

class NotebooksController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    //PARA MOSTRAR LA LISTA DE NOTEBOOKS EN EL INDEX HACIENDO USO DE AJAX
    public function list(){
        $notebooks = $this->Notebooks->listNotebooks();
        $this->set(compact('notebooks'));
    }

    public function index()
    {
        
    }

    public function view($id)
    {
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

     

    public function addEdit($id = null)
    {
        if(empty($id)){
            $result = $this->Notebooks->addEdit($this->request->getData());
            if($result){
                $bool = true;
               //$this->Flash->success(__('The notebook with id: {0} has been updated.', h($id)));
            }else{
                $bool= false;
                //$this->Flash->error(__('The notebook with id: {0} has not been updated.', h($id)));
            }
        }else{
            $notebook = $this->Notebooks->get($id);
            $result = $this->Notebooks->addEdit($this->request->getData(),$id);
            if($result){
                $bool = true;
                //$this->Flash->success(__('The notebook with id: {0} has been updated.', h($id)));
            }else{
                $bool = false;
                //$this->Flash->error(__('The notebook with id: {0} has not been updated.', h($id)));
            }
        }
    }

    
    public function delete($id)
    {
        $notebook = $this->Notebooks->get($id);
        $result = $this->Notebooks->deleteNotebook($notebook,['atomic' => false]);
        if ($result){
            $bool = true;
           // $this->Flash->success(__('The notebook with id: {0} has been deleted.', h($id)));
        }else{
            $bool = false;
            //$this->Flash->error(__('The notebook with id: {0} has not been deleted.', h($id)));
        }
        
        return $this->redirect(['action' => 'index']);
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