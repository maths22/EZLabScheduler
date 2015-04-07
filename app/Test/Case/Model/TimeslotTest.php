<?php
App::uses('Timeslot', 'Model');

/**
 * Timeslot Test Case
 *
 */
class TimeslotTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.timeslot',
		'app.student_schedule'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Timeslot = ClassRegistry::init('Timeslot');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Timeslot);

		parent::tearDown();
	}

}
