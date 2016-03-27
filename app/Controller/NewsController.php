<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class NewsController extends AppController {

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
		$this->News->recursive = 2;
		$this->set('news', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->News->recursive = 2;
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->pageTitle = 'Listar Posts';
		$this->News->recursive = 0;
		$this->set('news', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->pageTitle = 'Ver Post';
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->pageTitle = 'Adicionar Post';

		if ($this->request->is('post')) {
			if (!empty($this->request->data['News']['imagem']['name'])){
				$data['News']['title'] = $this->request->data['News']['title'];
				$data['News']['body'] = $this->request->data['News']['body'];
				$data['News']['ext'] = $this->Upload->get_extension($this->request->data['News']['imagem']);
				$data['News']['summary'] = $this->data['News']['summary'];
				$data['News']['status'] = $this->data['News']['status'];
				$data['News']['featured'] = $this->data['News']['featured'];
				$data['News']['data'] = $this->data['News']['data'];
				$data['Category'] = $this->data['Category'];

				// Valida os dados da imagem com relação ao banco de dados

				$this->News->set($this->request->data);
				if( !$this->News->validates() ) {
					$result = 'error';
				}

				// Valida a imagem no componente
				$valida = $this->Upload->validate(
					$this->request->data['News']['imagem'],
					array('image/*')
				);
				if(!$valida){
					$result = 'error';
				}

				if($valida){
					$this->News->create();
					if ($this->News->save( $data ) ) {
						// Monta o array de opções para o Download
						// ATENÇÃO !!! NÂO é necessário informar o diretório img
						// O diretório img já é definido em path_root
						// Caso queira que a imagem fique em outro diretório
						// informar path_root diferente: options['path_root'] = 'nove/endereco/para/imagem'
						$options = array(
							'name'    => $this->News->id,
							'dir'     => 'News',
						);
						$upload = $this->Upload->image($this->request->data['News']['imagem'], $options);
						$this->Session->setFlash(__('The news has been saved'), 'flash/success');
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The club could not be saved. Please, try again.'), 'flash/error');
					}
				}
			}else{
				$this->News->create();
				if ($this->News->save($this->request->data)) {
					$this->Session->setFlash(__('The news has been saved'), 'flash/success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The news could not be saved. Please, try again.'), 'flash/error');
				}
			}
		}
		$categories = $this->News->Category->find('list');
		$this->set(compact('categories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->pageTitle = 'Editar Post';
		$this->News->id = $id;
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			if (!empty($this->request->data['News']['imagem']['name'])){
				// Monta o array de dados para o banco de dados
				$this->request->data['News']['ext'] = $this->Upload->get_extension($this->request->data['News']['imagem']);
				// Valida os dados da imagem com relação ao banco de dados

				$this->News->set($this->request->data);
				if( !$this->News->validates() ) {
					$result = 'error';
				}
				// Valida a imagem no componente
				$valida = $this->Upload->validate(
					$this->request->data['News']['imagem'],
					array('image/*')
				);
				if(!$valida){
					$result = 'error';
				}

				if($valida){
					// Monta o array de opções para o Download
					// ATENÇÃO !!! NÂO é necessário informar o diretório img
					// O diretório img já é definido em path_root
					// Caso queira que a imagem fique em outro diretório
					// informar path_root diferente: options['path_root'] = 'nove/endereco/para/imagem'
					$options = array(
						'name'    => $this->News->id,
						'dir'     => 'News',
					);
					$upload = $this->Upload->image($this->request->data['News']['imagem'], $options);
				}
			}


			if ($this->News->save($this->request->data)) {
				$this->Session->setFlash(__('The news has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The news could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
			$this->request->data = $this->News->find('first', $options);
		}
		$categories = $this->News->Category->find('list');
		$this->set(compact('categories'));
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
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->News->delete()) {
			$this->Session->setFlash(__('News deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('News was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
