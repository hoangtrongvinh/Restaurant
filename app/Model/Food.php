<?php
App::uses('AppModel', 'Model');
/**
 * Food Model
 *
 * @property FoodType $FoodType
 * @property MenuFood $MenuFood
 * @property InvoiceDetail $InvoiceDetail
 */
class Food extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'FoodType' => array(
			'className' => 'FoodType',
			'foreignKey' => 'food_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MenuFood' => array(
			'className' => 'MenuFood',
			'foreignKey' => 'food_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'InvoiceDetail' => array(
			'className' => 'InvoiceDetail',
			'foreignKey' => 'food_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
