<?php 
namespace App\Model\Table;

use Cake\ORM\Table;

class CountrysTable extends Table
{
    public function initialize(array $config)
    {
        $this->setPrimaryKey('country_id');
    }
}
