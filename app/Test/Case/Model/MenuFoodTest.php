<?php
App::uses('MenuFood', 'Model');

/**
 * MenuFood Test Case
 *
 */
class MenuFoodTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.menu_food',
		'app.menu',
		'app.food'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MenuFood = ClassRegistry::init('MenuFood');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MenuFood);

		parent::tearDown();
	}

}
