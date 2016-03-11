<?php
App::uses('AppController', 'Controller');
/**
 * Phases Controller
 *
 * @property Phase $Phase
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PhasesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Phase->recursive = 0;
		$this->set('phases', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Phase->exists($id)) {
			throw new NotFoundException(__('Invalid phase'));
		}
		$options = array('conditions' => array('Phase.' . $this->Phase->primaryKey => $id));
		$this->set('phase', $this->Phase->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Phase->create();
			if ($this->Phase->save($this->request->data)) {
				$this->Session->setFlash(__('The phase has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The phase could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$championships = $this->Phase->Championship->find('list');
		$this->set(compact('championships'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Phase->id = $id;
		if (!$this->Phase->exists($id)) {
			throw new NotFoundException(__('Invalid phase'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Phase->save($this->request->data)) {
				$this->Session->setFlash(__('The phase has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The phase could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Phase.' . $this->Phase->primaryKey => $id));
			$this->request->data = $this->Phase->find('first', $options);
		}
		$championships = $this->Phase->Championship->find('list');
		$this->set(compact('championships'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Phase->id = $id;
		if (!$this->Phase->exists()) {
			throw new NotFoundException(__('Invalid phase'));
		}
		if ($this->Phase->delete()) {
			$this->Session->setFlash(__('Phase deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Phase was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Phase->recursive = 0;
		$this->set('phases', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Phase->exists($id)) {
			throw new NotFoundException(__('Invalid phase'));
		}
		$options = array('conditions' => array('Phase.' . $this->Phase->primaryKey => $id));
		$this->set('phase', $this->Phase->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Phase->create();
			if ($this->Phase->save($this->request->data)) {
				$this->Session->setFlash(__('The phase has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The phase could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$championships = $this->Phase->Championship->find('list');
		$this->set(compact('championships'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
        $this->Phase->id = $id;
		if (!$this->Phase->exists($id)) {
			throw new NotFoundException(__('Invalid phase'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Phase->save($this->request->data)) {
				$this->Session->setFlash(__('The phase has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The phase could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Phase.' . $this->Phase->primaryKey => $id));
			$this->request->data = $this->Phase->find('first', $options);
		}
		$championships = $this->Phase->Championship->find('list');
		$this->set(compact('championships'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Phase->id = $id;
		if (!$this->Phase->exists()) {
			throw new NotFoundException(__('Invalid phase'));
		}
		if ($this->Phase->delete()) {
			$this->Session->setFlash(__('Phase deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Phase was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
