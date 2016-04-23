<?php
App::uses('SeoAppController', 'Seo.Controller');
/**
 * MetaTags Controller
 *
 * @property MetaTag $MetaTag
 */
class MetaTagsController extends SeoAppController {

/**
 * getMetaTags method
 *
 * @return void
 */
	public function getMetaTags($model=null, $foreignKey=null ) {
		$this->MetaTag->recursive = 0;
    $metaTags = $this->MetaTag->findByModelForeignKey($model, $foreignKey);
		$this->set('metaTags', $this->paginate());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MetaTag->recursive = 0;
		$this->set('metaTags', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MetaTag->exists($id)) {
			throw new NotFoundException(__('Invalid meta tag'));
		}
		$options = array('conditions' => array('MetaTag.' . $this->MetaTag->primaryKey => $id));
		$this->set('metaTag', $this->MetaTag->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MetaTag->create();
			if ($this->MetaTag->save($this->request->data)) {
				$this->Session->setFlash(__('The meta tag has been saved'), 'msg/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meta tag could not be saved. Please, try again.'), 'msg/error');
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
		if (!$this->MetaTag->exists($id)) {
			throw new NotFoundException(__('Invalid meta tag'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MetaTag->save($this->request->data)) {
				$this->Session->setFlash(__('The meta tag has been saved'), 'msg/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meta tag could not be saved. Please, try again.'), 'msg/error');
			}
		} else {
			$options = array('conditions' => array('MetaTag.' . $this->MetaTag->primaryKey => $id));
			$this->request->data = $this->MetaTag->find('first', $options);
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
		$this->MetaTag->id = $id;
		if (!$this->MetaTag->exists()) {
			throw new NotFoundException(__('Invalid meta tag'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MetaTag->delete()) {
			$this->Session->setFlash(__('Meta tag deleted'), 'msg/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Meta tag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MetaTag->recursive = 0;
		$this->set('metaTags', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->MetaTag->exists($id)) {
			throw new NotFoundException(__('Invalid meta tag'));
		}
		$options = array('conditions' => array('MetaTag.' . $this->MetaTag->primaryKey => $id));
		$this->set('metaTag', $this->MetaTag->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MetaTag->create();
			if ($this->MetaTag->save($this->request->data)) {
				$this->Session->setFlash(__('The meta tag has been saved'), 'msg/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The meta tag could not be saved. Please, try again.'), 'msg/error');
			}
		}
	}

/**
 * admin_config method
 *
 * @throws NotFoundException
 * @return void
 */
	public function admin_config() {

		if ($this->request->is('post') || $this->request->is('put')) {
      $this->request->data['MetaTag']['model'] = 'all';
      $this->request->data['MetaTag']['foreign_key'] = 0;
			if ($this->MetaTag->save($this->request->data)) {
				$this->Session->setFlash(__('The meta tag has been saved'), 'flash/success');
				$this->redirect(array('controller'=>'settings', 'action' => 'index', 'plugin'=>false, 'admin'=>true));
			} else {
				$this->Session->setFlash(__('The meta tag could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('MetaTag.' . $this->MetaTag->primaryKey => $id));
			$this->request->data = $this->MetaTag->findByModel('all');
			$this->render('Settings/admin_index');
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->MetaTag->id = $id;
		if (!$this->MetaTag->exists()) {
			throw new NotFoundException(__('Invalid meta tag'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MetaTag->delete()) {
			$this->Session->setFlash(__('Meta tag deleted'), 'msg/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Meta tag was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
