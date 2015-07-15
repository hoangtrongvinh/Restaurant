<?php
App::uses('Food', 'Model');

/**
 * Food Test Case
 *
 */
class FoodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.food',
		'app.food_type',
		'app.menu_food',
		'app.menu',
		'app.invoice_detail'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Food = ClassRegistry::init('Food');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Food);

		parent::tearDown();
	}

}
