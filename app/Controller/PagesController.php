<?php
App::uses('AppController', 'Controller');
/**
 * Pages Controller
 *
 * @property Page $Page
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function display() {
		$path = func_get_args();
		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Page->recursive = 0;
		$this->set('pages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($slug = null) {
		$seo = $page = $this->Page->findBySlug($slug);
    if(!$page){
			throw new NotFoundException(__('Invalid Page'));
    }
    $_page = $this->Page->read(null,  $page['Page']['id'] );
    $this->set('page', $_page);
    $this->set('seo', $seo);
    $_page['Page']['view'] = str_replace('.ctp','', $_page['Page']['view']);
    $this->render($_page['Page']['view']);
    $this->layout = $_page['Page']['layout'];
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->pageTitle = 'Listar Páginas';
		$this->Page->recursive = 0;
		$this->set('pages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->pageTitle = 'Ver Página';
		if (!$this->Page->exists($id)) {
			throw new NotFoundException(__('Não foi encontrado o registro para o ID especificado!'));
		}
		$options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
		$this->set('page', $this->Page->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->pageTitle = 'Adicionar Página';
		if ($this->request->is('post')) {
			$this->Page->create();
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('A página foi <strong>cadastrada</strong> com sucesso!'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não foi possivel <strong>cadastrar</strong> a página. Por favor, tente novamente.'), 'flash/error');
			}
		}
		$parents = $this->Page->ParentPage->find('list');
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
		$this->pageTitle = 'Editar Página';
		$this->Page->id = $id;
		if (!$this->Page->exists($id)) {
			throw new NotFoundException(__('Não foi encontrado o registro para o ID especificado!'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash(__('A página foi <strong>editada</strong> com sucesso!'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não foi possivel <strong>editar</strong> a página. Por favor, tente novamente.'), 'flash/error');
			}
		} else {
      $this->__set_page($id);
		}
		$parents = $this->Page->ParentPage->find('list');
		$this->set(compact('parents'));
    $this->__set_views_and_layouts();
	}

/**
 * admin_list_view_and_layout method
 *
 * @return array $data['view'] $data['layout']
 */
  private function __set_views_and_layouts() {
    $dir = new Folder( APP . 'View' . DS . 'Themed'. DS . $this->theme . DS . 'Pages' . DS );
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
  private function __set_page( $id = null ) {

    $options = array('conditions' => array('Page.' . $this->Page->primaryKey => $id));
    $page = $this->Page->find('first', $options);

    if($this->action == 'admin_edit'){
      $this->request->data = $this->Page->find('first', $options);
    }

    if($this->action == 'admin_view'){
      $this->set(compact('page'));
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
		$this->Page->id = $id;
		if (!$this->Page->exists()) {
			throw new NotFoundException(__('Não foi encontrado o registro para o ID especificado!'));
		}
		if ($this->Page->delete()) {
			$this->Session->setFlash(__('A página foi <strong>deletada</strong> com sucesso!'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Não foi possivel <strong>deletar</strong> a página. Por favor, tente novamente.'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
