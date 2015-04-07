<?php
App::uses('AppController', 'Controller');
/**
 * Timeslots Controller
 *
 * @property Timeslot $Timeslot
 */
class TimeslotsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Timeslot->recursive = 0;
		$this->set('timeslots', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Timeslot->exists($id)) {
			throw new NotFoundException(__('Invalid timeslot'));
		}
		$options = array('conditions' => array('Timeslot.' . $this->Timeslot->primaryKey => $id));
		$this->set('timeslot', $this->Timeslot->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Timeslot->create();
			if ($this->Timeslot->save($this->request->data)) {
				$this->Session->setFlash(__('The timeslot has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timeslot could not be saved. Please, try again.'));
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
		if (!$this->Timeslot->exists($id)) {
			throw new NotFoundException(__('Invalid timeslot'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Timeslot->save($this->request->data)) {
				$this->Session->setFlash(__('The timeslot has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timeslot could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Timeslot.' . $this->Timeslot->primaryKey => $id));
			$this->request->data = $this->Timeslot->find('first', $options);
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
		$this->Timeslot->id = $id;
		if (!$this->Timeslot->exists()) {
			throw new NotFoundException(__('Invalid timeslot'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Timeslot->delete()) {
			$this->Session->setFlash(__('Timeslot deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Timeslot was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
