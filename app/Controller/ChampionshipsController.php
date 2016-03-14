<?php
App::uses('AppController', 'Controller');
/**
 * Championships Controller
 *
 * @property Championship $Championship
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ChampionshipsController extends AppController {

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
		$this->Championship->recursive = 0;
		$this->set('championships', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Championship->exists($id)) {
			throw new NotFoundException(__('Invalid championship'));
		}
		$options = array('conditions' => array('Championship.' . $this->Championship->primaryKey => $id));
		$this->set('championship', $this->Championship->find('first', $options));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Championship->recursive = 0;
		$this->set('championships', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Championship->exists($id)) {
			throw new NotFoundException(__('Invalid championship'));
		}
		$options = array('conditions' => array('Championship.' . $this->Championship->primaryKey => $id));
		$this->set('championship', $this->Championship->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Championship->create();
			if ($this->Championship->save($this->request->data)) {
				$this->Session->setFlash(__('The championship has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The championship could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$array = $this->Championship->Phase->find('all');
		$phases = array();
		foreach ($array as $key => $arr) {
			$phases[$key] = $arr['Phase']['name'];
		}
		$this->set(compact('phases'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
        $this->Championship->id = $id;
		if (!$this->Championship->exists($id)) {
			throw new NotFoundException(__('Invalid championship'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Championship->save($this->request->data)) {
				$this->Session->setFlash(__('The championship has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The championship could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Championship.' . $this->Championship->primaryKey => $id));
			$this->request->data = $this->Championship->find('first', $options);
		}
		$array = $this->Championship->Phase->find('all');
		$phases = array();
		foreach ($array as $key => $arr) {
			$phases[$key] = $arr['Phase']['name'];
		}
		$this->set(compact('phases'));
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
		$this->Championship->id = $id;
		if (!$this->Championship->exists()) {
			throw new NotFoundException(__('Invalid championship'));
		}
		if ($this->Championship->delete()) {
			$this->Session->setFlash(__('Championship deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Championship was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
