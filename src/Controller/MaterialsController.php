<?php
// src/Controller/MaterialsController.php

namespace App\Controller;

class MaterialsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
         $this->set('materials', $this->Materials->find('all'));
    }

    public function view($id)
    {
        $material = $this->Materials->get($id);
        $this->set(compact('material'));
    }

    public function add()
    {
        $material = $this->Materials->newEntity();
        if ($this->request->is('post')) {
            $material = $this->Materials->patchEntity($material, $this->request->getData());
            if ($this->Materials->save($material)) {
                $this->Flash->success(__('Your material has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your material.'));
        }
        $this->set('material', $material);
    }

    public function edit($id = null)
    {
        $material = $this->Materials->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Materials->patchEntity($material, $this->request->getData());
            if ($this->Materials->save($material)) {
                $this->Flash->success(__('Your material has been update.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error updating material.'));
        }

        $this->set('material', $material);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $material = $this->Materials->get($id);
        if ($this->Materials->delete($material)) {
            $this->Flash->success(__('The material with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}