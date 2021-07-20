<?php
// src/Model/Entity/Notebook.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Notebook extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];
}