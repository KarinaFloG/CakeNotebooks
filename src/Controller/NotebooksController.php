<?php
// src/Controller/NotebooksController.php

namespace App\Controller;

class NotebooksController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index()
    {
         $this->set('notebooks', $this->Notebooks->find('all'));
    }

    public function view($id)
    {
        $notebook = $this->Notebooks->get($id);
        $this->set(compact('notebook'));
    }

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
        $notebook = $this->Notebooks->get($id);
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

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $notebook = $this->Notebooks->get($id);
        if ($this->Notebooks->delete($notebook)) {
            $this->Flash->success(__('The notebook with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
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