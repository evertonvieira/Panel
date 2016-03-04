<?php
App::uses('AppController', 'Controller');
/**
 * MenuSections Controller
 *
 * @property MenuSection $MenuSection
 */
class MenuSectionsController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MenuSection->recursive = 0;
		$this->set('menuSections', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->MenuSection->exists($id)) {
			throw new NotFoundException(__('Invalid menu section'));
		}
		$options = array('conditions' => array('MenuSection.' . $this->MenuSection->primaryKey => $id));
		$this->set('menuSection', $this->MenuSection->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MenuSection->create();
			if ($this->MenuSection->save($this->request->data)) {
				$this->Session->setFlash(__('The menu section has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu section could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$menus = $this->MenuSection->Menu->find('list');
		$this->set(compact('menus'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->MenuSection->exists($id)) {
			throw new NotFoundException(__('Invalid menu section'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MenuSection->save($this->request->data)) {
				$this->Session->setFlash(__('The menu section has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu section could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('MenuSection.' . $this->MenuSection->primaryKey => $id));
			$this->request->data = $this->MenuSection->find('first', $options);
		}
		$menus = $this->MenuSection->Menu->find('list');
		$this->set(compact('menus'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->MenuSection->id = $id;
		if (!$this->MenuSection->exists()) {
			throw new NotFoundException(__('Invalid menu section'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MenuSection->delete()) {
			$this->Session->setFlash(__('Menu section deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Menu section was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
