<?php
App::uses('StudentSchedule', 'Model');

/**
 * StudentSchedule Test Case
 *
 */
class StudentScheduleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.student_schedule',
		'app.student',
		'app.timeslot',
		'app.teacher',
		'app.attendance'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->StudentSchedule = ClassRegistry::init('StudentSchedule');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->StudentSchedule);

		parent::tearDown();
	}

}
