<?php
App::uses('AppController', 'Controller');
/**
 * MenuSectionLinks Controller
 *
 * @property MenuSectionLink $MenuSectionLink
 */
class MenuSectionLinksController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MenuSectionLink->recursive = 0;
		$menuSectionLinks = $this->MenuSectionLink->find('all', array('limit' => 100));
		$this->set(compact('menuSectionLinks'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->MenuSectionLink->exists($id)) {
			throw new NotFoundException(__('Invalid menu section link'));
		}
		$options = array('conditions' => array('MenuSectionLink.' . $this->MenuSectionLink->primaryKey => $id));
		$this->set('menuSectionLink', $this->MenuSectionLink->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MenuSectionLink->create();
			if ($this->MenuSectionLink->save($this->request->data)) {
				$this->Session->setFlash(__('The menu section link has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu section link could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$menuSections = $this->MenuSectionLink->MenuSection->find('list');
		$this->set(compact('menuSections'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->MenuSectionLink->exists($id)) {
			throw new NotFoundException(__('Invalid menu section link'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MenuSectionLink->save($this->request->data)) {
				$this->Session->setFlash(__('The menu section link has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu section link could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('MenuSectionLink.' . $this->MenuSectionLink->primaryKey => $id));
			$this->request->data = $this->MenuSectionLink->find('first', $options);
		}
		$menuSections = $this->MenuSectionLink->MenuSection->find('list');
		$this->set(compact('menuSections'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->MenuSectionLink->id = $id;
		if (!$this->MenuSectionLink->exists()) {
			throw new NotFoundException(__('Invalid menu section link'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MenuSectionLink->delete()) {
			$this->Session->setFlash(__('Menu section link deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Menu section link was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
