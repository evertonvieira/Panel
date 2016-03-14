<?php
App::uses('AppController', 'Controller');
/**
 * Competitions Controller
 *
 * @property Competition $Competition
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class CompetitionsController extends AppController {

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
		$this->Competition->recursive = 0;
		$this->set('competitions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Competition->exists($id)) {
			throw new NotFoundException(__('Invalid competition'));
		}
		$options = array('conditions' => array('Competition.' . $this->Competition->primaryKey => $id));
		$this->set('competition', $this->Competition->find('first', $options));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Competition->recursive = 0;
		$this->set('competitions', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Competition->exists($id)) {
			throw new NotFoundException(__('Invalid competition'));
		}
		$options = array('conditions' => array('Competition.' . $this->Competition->primaryKey => $id));
		$this->set('competition', $this->Competition->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Competition->create();
			if ($this->Competition->save($this->request->data)) {
				$this->Session->setFlash(__('The competition has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competition could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$championships = $this->Competition->Championship->find('list');
		$clubs = $this->Competition->Club->find('list');
		$this->set(compact('championships', 'clubs'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
        $this->Competition->id = $id;
		if (!$this->Competition->exists($id)) {
			throw new NotFoundException(__('Invalid competition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Competition->save($this->request->data)) {
				$this->Session->setFlash(__('The competition has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The competition could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Competition.' . $this->Competition->primaryKey => $id));
			$this->request->data = $this->Competition->find('first', $options);
		}
		$championships = $this->Competition->Championship->find('list');
		$clubs = $this->Competition->Club->find('list');
		$this->set(compact('championships', 'clubs'));
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
		$this->Competition->id = $id;
		if (!$this->Competition->exists()) {
			throw new NotFoundException(__('Invalid competition'));
		}
		if ($this->Competition->delete()) {
			$this->Session->setFlash(__('Competition deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Competition was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
