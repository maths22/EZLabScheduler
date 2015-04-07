<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Students Controller
 *
 * @property Student $Student
 */
class StudentsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Student->recursive = 0;
        $this->set('students', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
        $this->set('student', $this->Student->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Student->create();
            if ($this->Student->save($this->request->data)) {
                $this->Session->setFlash(__('The student has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The student could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Student->save($this->request->data)) {
                $this->Session->setFlash(__('The student has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The student could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
            $this->request->data = $this->Student->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Student->id = $id;
        if (!$this->Student->exists()) {
            throw new NotFoundException(__('Invalid student'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Student->delete()) {
            $this->Session->setFlash(__('Student deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Student was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

    public function send_email($id = null) {
        if (!$this->Student->exists($id)) {
            throw new NotFoundException(__('Invalid student schedule'));
        }
        $student = $this->Student->read(null,$id);
        $this->set('title_for_layout', 'HPHS ID card left in the EZ lab');
        $Email = new CakeEmail('smtp');
        $Email->template('forgot_id');
        $Email->viewVars(array('name' => $student['Student']['firstname'] . ' ' . $student['Student']['lastname']));
        $Email->emailFormat('both');
        $Email->from(array('EZaremski@dist113.org' => 'Zaremski,Elena'));
        $Email->sender(array('EZaremski@dist113.org' => 'Zaremski,Elena'));
        $Email->to($student['Student']['email']);
        $Email->subject("HPHS ID card left in the EZ lab");
        $Email->send();
    }

}
