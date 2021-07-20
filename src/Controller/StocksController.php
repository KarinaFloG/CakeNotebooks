<?php
// src/Controller/StocksController.php

namespace App\Controller;

class StocksController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
         $this->set('stocks', $this->Stocks->find('all'));
    }

    public function view($id)
    {
        $stock = $this->Stocks->get($id);
        $this->set(compact('stock'));
    }

    public function add()
    {
        $stock = $this->Stocks->newEntity();
        if ($this->request->is('post')) {
            $stock = $this->Stocks->patchEntity($stock, $this->request->getData());
            if ($this->Stocks->save($stock)) {
                $this->Flash->success(__('Your Stock has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your stock.'));
        }
        $this->set('stock', $stock);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $stock = $this->Stocks->get($id);
        if ($this->Stocks->delete($stock)) {
            $this->Flash->success(__('The stock with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
}