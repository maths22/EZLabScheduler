<?php
/**
 * StudentScheduleFixture
 *
 */
class StudentScheduleFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'student_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'timeslot_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'teacher_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'class' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_student_schedules_students_idx' => array('column' => 'student_id', 'unique' => 0),
			'fk_student_schedules_timeslots1_idx' => array('column' => 'timeslot_id', 'unique' => 0),
			'fk_student_schedules_teachers1_idx' => array('column' => 'teacher_id', 'unique' => 0)
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
			'student_id' => 1,
			'timeslot_id' => 1,
			'teacher_id' => 1,
			'class' => 'Lorem ipsum dolor sit amet'
		),
	);

}
