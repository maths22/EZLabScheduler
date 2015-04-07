<?php

App::uses('AppController', 'Controller');

/**
 * Attendances Controller
 *
 * @property Attendance $Attendance
 */
class AttendancesController extends AppController {

    public $components = array('RequestHandler');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Attendance->recursive = 0;
        $this->set('attendances', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Attendance->exists($id)) {
            throw new NotFoundException(__('Invalid attendance'));
        }
        $options = array('conditions' => array('Attendance.' . $this->Attendance->primaryKey => $id));
        $this->set('attendance', $this->Attendance->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Attendance->create();
            if ($this->Attendance->save($this->request->data)) {
                $this->Session->setFlash(__('The attendance has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The attendance could not be saved. Please, try again.'));
            }
        }
        $studentSchedules = $this->Attendance->StudentSchedule->find('list');
        $this->set(compact('studentSchedules'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Attendance->exists($id)) {
            throw new NotFoundException(__('Invalid attendance'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Attendance->save($this->request->data)) {
                $this->Session->setFlash(__('The attendance has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The attendance could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Attendance.' . $this->Attendance->primaryKey => $id));
            $this->request->data = $this->Attendance->find('first', $options);
        }
        $studentSchedules = $this->Attendance->StudentSchedule->find('list');
        $this->set(compact('studentSchedules'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Attendance->id = $id;
        if (!$this->Attendance->exists()) {
            throw new NotFoundException(__('Invalid attendance'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Attendance->delete()) {
            $this->Session->setFlash(__('Attendance deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Attendance was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function take_attendance($date = null) {
        if (is_null($date)) {
            $day = date('Y-m-d');
            $this->redirect('./take_attendance/' . $day);
        } else {
            $datetime = DateTime::createFromFormat('Y-m-d', $date);
            $day = $datetime->format('l');
        }
        $options = array('conditions' => array('Timeslot.day' => $day));
        $periods = $this->Attendance->StudentSchedule->Timeslot->find('all', $options);
        $this->set('periods', $periods);
        foreach ($periods as $period) {
            $options = array('conditions' => array('Timeslot.id' => $period['Timeslot']['id']));
            $students = $this->Attendance->StudentSchedule->find('all', $options);
            foreach ($students as &$student) {
                $student['Today']['present'] = false;
                $student['Today']['makeup'] = false;
                $student['Today']['pass'] = false;
                foreach ($student['Attendance'] as $attendance) {
                    if ($attendance['date'] == $date && $attendance['student_schedule_id'] == $student['StudentSchedule']['id'] && $attendance['timeslot_id'] == $period['Timeslot']['id']) {
                        $student['Today']['present'] = true;
                        $student['Today']['makeup'] = $attendance['makeup'];
                        $student['Today']['pass'] = $attendance['pass'];
                    }
                }
            }
            $options = array('conditions' => array('Attendance.timeslot_id' => $period['Timeslot']['id']));
            $attendances = $this->Attendance->find('all', $options);
            foreach ($attendances as $attendance) {
                foreach ($students as $student) {
                    if ($student['StudentSchedule']['id'] == $attendance['Attendance']['student_schedule_id']) {
                        break 2;
                    }
                }
                $student2 = $this->Attendance->StudentSchedule->findById($attendance['Attendance']['student_schedule_id']);
                $student2['Today']['present'] = false;
                $student2['Today']['makeup'] = false;
                $student2['Today']['pass'] = false;
                foreach ($student2['Attendance'] as $attendance) {
                    if ($attendance['date'] == $date && $attendance['student_schedule_id'] == $student2['StudentSchedule']['id'] && $attendance['timeslot_id'] == $period['Timeslot']['id']) {
                        $student2['Today']['present'] = true;
                        $student2['Today']['makeup'] = $attendance['makeup'];
                        $student2['Today']['pass'] = $attendance['pass'];
                    }
                }
                array_push($students, $student2);
            }
            $this->set('attendance' . $period['Timeslot']['id'], $students);
        }
    }

    public function set_present($schedule_id, $timeslot_id, $date, $state) {
        if ($state == 'true') {
            $data = array('Attendance' => array('student_schedule_id' => $schedule_id, 'date' => $date, 'Attendance.timeslot_id' => $timeslot_id));
            $this->Attendance->create();
            $this->Attendance->save($data);
        } else {
            $id = $this->Attendance->find('first', array('conditions' => array('student_schedule_id' => $schedule_id, 'date' => $date, 'Attendance.timeslot_id' => $timeslot_id)))['Attendance']['id'];
            $this->Attendance->delete($id);
        }
    }

    public function present($timeslot_id, $date, $student_id) {
        if (isset($this->Attendance->StudentSchedule->find('first', array('conditions' => array('Timeslot.id' => $timeslot_id, 'Student.id' => $student_id)))['StudentSchedule']['id'])||
                $this->Attendance->find('first', array('conditions' => array('Attendance.timeslot_id' => $timeslot_id, 'StudentSchedule.student_id' => $student_id, 'date'=>$date)))) {
            $scheduled = true;
        } else {
            $scheduled = false;
        }
        $schedule_id = $this->Attendance->StudentSchedule->find('first', array('conditions' => array('Student.id' => $student_id)))['StudentSchedule']['id'];
        if ($this->Attendance->find('count', array('conditions' => array('student_schedule_id' => $schedule_id, 'date' => $date, 'Attendance.timeslot_id' => $timeslot_id))) == 0) {
            $data = array('Attendance' => array('student_schedule_id' => $schedule_id, 'date' => $date, 'timeslot_id' => $timeslot_id));
            $this->Attendance->create();
            $this->Attendance->save($data);
        }
        $this->set('scheduled', $scheduled);
        $this->set('student', $this->Attendance->StudentSchedule->findByStudentId($student_id));
        $this->set('timeslot_id',$timeslot_id);
        $this->set('id', $schedule_id);
    }

    public function set_makeup($schedule_id, $timeslot_id, $date, $state) {
        if ($this->Attendance->find('count', array('conditions' => array('student_schedule_id' => $schedule_id, 'date' => $date, 'Attendance.timeslot_id' => $timeslot_id))) > 0) {
            $id = $this->Attendance->find('first', array('conditions' => array('student_schedule_id' => $schedule_id, 'date' => $date, 'Attendance.timeslot_id' => $timeslot_id)))['Attendance']['id'];
            $this->Attendance->id = $id;
            $data = array('Attendance' => array('makeup' => $state == 'true', 'pass' => false));
            $this->Attendance->save($data);
        } else {
            $this->Attendance->create();
            $data = array('Attendance' => array('student_schedule_id' => $schedule_id, 'timeslot_id' => $timeslot_id, 'date' => $date, 'makeup' => $state == 'true', 'pass' => false));
            $this->Attendance->save($data);
        }
    }

    public function set_pass($schedule_id, $timeslot_id, $date, $state) {
        if ($this->Attendance->find('count', array('conditions' => array('student_schedule_id' => $schedule_id, 'date' => $date, 'Attendance.timeslot_id' => $timeslot_id))) > 0) {
            $id = $this->Attendance->find('first', array('conditions' => array('student_schedule_id' => $schedule_id, 'date' => $date, 'Attendance.timeslot_id' => $timeslot_id)))['Attendance']['id'];
            $this->Attendance->id = $id;
            $data = array('Attendance' => array('makeup' => true, 'pass' => $state == 'true'));
            $this->Attendance->save($data);
        } else {
            $this->Attendance->create();
            $data = array('Attendance' => array('student_schedule_id' => $schedule_id, 'timeslot_id' => $timeslot_id, 'date' => $date, 'makeup' => true, 'pass' => $state == 'true'));
            $this->Attendance->save($data);
        }
    }

}
