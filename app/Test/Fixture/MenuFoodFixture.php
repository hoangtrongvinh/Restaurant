<?php
/**
 * MenuFoodFixture
 *
 */
class MenuFoodFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'menu_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'food_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'amount' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('menu_id', 'food_id'), 'unique' => 1),
			'mon_an_id' => array('column' => 'food_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'menu_id' => 1,
			'food_id' => 1,
			'amount' => 1,
			'created' => '2015-07-15 04:56:18',
			'modified' => '2015-07-15 04:56:18'
		),
	);

}
