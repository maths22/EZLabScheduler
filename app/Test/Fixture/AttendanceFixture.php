<?php
/**
 * AttendanceFixture
 *
 */
class AttendanceFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'student_schedule_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'makeup' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'pass' => array('type' => 'boolean', 'null' => false, 'default' => null),
		'attendancecol' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_attendance_student_schedules1_idx' => array('column' => 'student_schedule_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'student_schedule_id' => 1,
			'makeup' => 1,
			'pass' => 1,
			'attendancecol' => 'Lorem ipsum dolor sit amet'
		),
	);

}
