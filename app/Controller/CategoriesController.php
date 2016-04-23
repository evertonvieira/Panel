<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class CategoriesController extends AppController {

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
	public function admin_index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
	}


/**
 * getParent method
 *
 * @return void
 * retornas as categorias filhas
 */
	public function getChildren($id) {
		$this->Category->recursive = 0;
		$Children  = $this->Category->find('all', array('conditions'=> array('Category.parent_id'=> $id )));
		return $Children;
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->pageTitle = 'Ver Categoria';
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Não foi encontrado o registro para o ID especificado!'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->pageTitle = 'Adicionar Categoria';
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('A categoria foi <strong>cadastrada</strong> com sucesso!'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não foi possível realizar o <strong>cadastro</strong> da categoria. Por favor, tente novamente.'), 'flash/error');
			}
		}
		$parents = $this->Category->ParentCategory->find('list');
		$this->set(compact('parents'));
		$this->__set_views_and_layouts();
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->pageTitle = 'Editar Categorias';
		$this->Category->id = $id;
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Não foi encontrado o registro para o ID especificado!'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('A categoria foi <strong>editada</strong> com sucesso!'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não foi possível <strong>editar</strong> a categoria. Por favor, tente novamente.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
		$parents = $this->Category->ParentCategory->find('list');
		$this->set(compact('parents'));
		$this->__set_category($id);
    $this->__set_views_and_layouts();
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Não foi encontrado o registro para o ID especificado!'));
		}
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('A categoria foi <strong>deletada</strong> com sucesso!'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Não foi possível <strong>deletar</strong> a categoria especificada. Por favor, tente novomente.'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}

	/**
 * admin_list_view_and_layout method
 *
 * @return array $data['view'] $data['layout']
 */
  private function __set_views_and_layouts() {
    $dir = new Folder( APP . 'View' . DS . 'Themed'. DS . $this->theme . DS . 'Categories' . DS );
    $_views = $dir->find('.*\.ctp');
    $views = array();
    foreach($_views as $_view){
      $views[$_view] = $_view;
    }
    $dir = new Folder( APP . 'View' . DS . 'Themed'. DS . $this->theme . DS . 'Layouts'. DS );
    $_layouts = $dir->find('.*\.ctp');
    $layouts = array();
    $excludes = array('error.ctp','ajax.ctp','flash.ctp');
    foreach($_layouts as $_layout){
      if(!in_array($_layout, $excludes)) $layouts[$_layout] = $_layout;
    }
    $this->set('views', $views );
    $this->set('layouts', $layouts );
  }


/**
 * set_page method
 *
 * @return void
 */
  private function __set_category( $id = null ) {

    $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
    $category = $this->Category->find('first', $options);

    if($this->action == 'admin_edit'){
      $this->request->data = $this->Category->find('first', $options);
    }

    if($this->action == 'admin_view'){
      $this->set(compact('category'));
    }
  }


}
