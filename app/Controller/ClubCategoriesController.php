<?php
App::uses('AppController', 'Controller');
/**
 * ClubCategories Controller
 *
 * @property ClubCategory $ClubCategory
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ClubCategoriesController extends AppController {

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
		$this->ClubCategory->recursive = 0;
		$this->set('clubCategories', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ClubCategory->exists($id)) {
			throw new NotFoundException(__('Invalid club category'));
		}
		$options = array('conditions' => array('ClubCategory.' . $this->ClubCategory->primaryKey => $id));
		$this->set('clubCategory', $this->ClubCategory->find('first', $options));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ClubCategory->recursive = 0;
		$this->set('clubCategories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ClubCategory->exists($id)) {
			throw new NotFoundException(__('Invalid club category'));
		}
		$options = array('conditions' => array('ClubCategory.' . $this->ClubCategory->primaryKey => $id));
		$this->set('clubCategory', $this->ClubCategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ClubCategory->create();
			if ($this->ClubCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The club category has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The club category could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
        $this->ClubCategory->id = $id;
		if (!$this->ClubCategory->exists($id)) {
			throw new NotFoundException(__('Invalid club category'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ClubCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The club category has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The club category could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('ClubCategory.' . $this->ClubCategory->primaryKey => $id));
			$this->request->data = $this->ClubCategory->find('first', $options);
		}
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
		$this->ClubCategory->id = $id;
		if (!$this->ClubCategory->exists()) {
			throw new NotFoundException(__('Invalid club category'));
		}
		if ($this->ClubCategory->delete()) {
			$this->Session->setFlash(__('Club category deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Club category was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
