<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ManufacturersTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('manufacturers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        
        $this->hasMany('Products') 
            ->setForeignKey('manufacturers_id');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        return $validator;
    }

    public function updateManufacturerUploaded(){
        $this->query()
            ->update()
            ->set(['manufacturers_uploaded' => 1])
            ->where(['manufacturers_uploaded' => 0])
            ->execute();
    }

    //  public function getAllProductsOfManufacturer(){

    //     $select = [
    //     'Products.id',
    //     'Products.product_name'
    //   ];

    //   $joins = [
    //     'table'=>'manufacturers',
    //     'alias'=>'Manufacturer',
    //     'type'=>'LEFT',
    //     'conditions'=>array(
    //       'Products.manufacturers_id = Manufacturer.id'
    //     )
    //   ];
 

    //   $query =  $this->find()->select($select);

    //   $query->hydrate(false); // Results as arrays instead of entities

    //   return $query->toList();;
    // }
}
