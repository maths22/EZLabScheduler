<?php

App::uses('AppController', 'Controller');

/**
 * StudentSchedules Controller
 *
 * @property StudentSchedule $StudentSchedule
 */
class StudentSchedulesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->StudentSchedule->recursive = 0;
        $this->set('studentSchedules', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->StudentSchedule->exists($id)) {
            throw new NotFoundException(__('Invalid student schedule'));
        }
        $options = array('conditions' => array('StudentSchedule.' . $this->StudentSchedule->primaryKey => $id));
        $this->set('studentSchedule', $this->StudentSchedule->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->StudentSchedule->create();
            $this->request->data['StudentSchedule']['timeslot_id']=$this->request->data['Timeslot']['period'];
            if ($this->StudentSchedule->save($this->request->data)) {
                $this->Session->setFlash(__('The student schedule has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The student schedule could not be saved. Please, try again.'));
            }
        }
        $students = $this->StudentSchedule->Student->find('list');
        $timeslots = $this->StudentSchedule->Timeslot->find('list');
        $teachers = $this->StudentSchedule->Teacher->find('list');
        $this->set(compact('students', 'timeslots', 'teachers'));
        $enumOptions = ClassRegistry::init('StudentSchedule')->enumOptions('week');
        $this->set(compact('enumOptions'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->StudentSchedule->exists($id)) {
            throw new NotFoundException(__('Invalid student schedule'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->StudentSchedule->save($this->request->data)) {
                $this->Session->setFlash(__('The student schedule has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The student schedule could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('StudentSchedule.' . $this->StudentSchedule->primaryKey => $id));
            $this->request->data = $this->StudentSchedule->find('first', $options);
        }
        $students = $this->StudentSchedule->Student->find('list');
        $timeslots = $this->StudentSchedule->Timeslot->find('list');
        $teachers = $this->StudentSchedule->Teacher->find('list');
        $this->set(compact('students', 'timeslots', 'teachers'));
        $enumOptions = ClassRegistry::init('StudentSchedule')->enumOptions('week');
        $this->set(compact('enumOptions'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->StudentSchedule->id = $id;
        if (!$this->StudentSchedule->exists()) {
            throw new NotFoundException(__('Invalid student schedule'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->StudentSchedule->delete()) {
            $this->Session->setFlash(__('Student schedule deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Student schedule was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
    
    public function open_periods($week) {
        $threshold = 1;
        $this->response->type('json');
        $this->autoLayout = false;
        $choices = array();
        $timeslots = $this->StudentSchedule->Timeslot->find('all');
        foreach($timeslots as $timeslot)
        {
            if($week=='A&B'){
                $options = array('conditions'=>array('timeslot_id'=>$timeslot['Timeslot']['id'], 'OR'=>array(array('week'=>'A'),array('week'=>'A&B'))));
                $count1 = $this->StudentSchedule->find('count',$options);
                $options = array('conditions'=>array('timeslot_id'=>$timeslot['Timeslot']['id'],'OR'=>array(array('week'=>'B'),array('week'=>'A&B'))));
                $count2 = $this->StudentSchedule->find('count',$options);
                $count = max($count1, $count2);
            } else{
                $options = array('conditions'=>array('timeslot_id'=>$timeslot['Timeslot']['id'],'OR'=>array(array('week'=>$week),array('week'=>'A&B'))));
                $count = $this->StudentSchedule->find('count',$options);
            }
$full = '';
            if($count>=$threshold)
            {

              $full = ' (FULL)';
            }
            if(isset($timeslot['Timeslot']['sub_period']))
            {
                
$choices[$timeslot['Timeslot']['day']][$timeslot['Timeslot']['id']]=$timeslot['Timeslot']['period'].$timeslot['Timeslot']['sub_period'].$full;
            }
            else {
                
$choices[$timeslot['Timeslot']['day']][$timeslot['Timeslot']['id']]=$timeslot['Timeslot']['period'].$full;
            }
        }
        $this->set('choices',$choices);
    }

}
