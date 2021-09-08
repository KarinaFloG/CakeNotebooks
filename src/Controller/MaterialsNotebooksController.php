<?php
// src/Controller/MaterialsNotebooksController.php

namespace App\Controller;

class MaterialsNotebooksController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

}