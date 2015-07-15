<?php
App::uses('AppModel', 'Model');
/**
 * MenuFood Model
 *
 * @property Menu $Menu
 * @property Food $Food
 */
class MenuFood extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'menu_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Menu' => array(
			'className' => 'Menu',
			'foreignKey' => 'menu_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Food' => array(
			'className' => 'Food',
			'foreignKey' => 'food_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
