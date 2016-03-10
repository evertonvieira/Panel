<?php
App::uses('AppController', 'Controller');
/**
 * Clubs Controller
 *
 * @property Club $Club
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ClubsController extends AppController {

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
		$this->Club->recursive = 0;
		$this->set('clubs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Club->exists($id)) {
			throw new NotFoundException(__('Invalid club'));
		}
		$options = array('conditions' => array('Club.' . $this->Club->primaryKey => $id));
		$this->set('club', $this->Club->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {

		if ($this->request->is('post')) {
			if (!empty($this->request->data['Club']['imagem']['name'])){
				// Monta o array de dados para o banco de dados
				$data = array();
				$data['Club']['name'] = $this->request->data['Club']['name'];
				$data['Club']['club_category_id'] = $this->data['Club']['club_category_id'];
				$data['Club']['body'] = $this->request->data['Club']['body'];
				$data['Club']['ext'] = $this->Upload->get_extension($this->request->data['Club']['imagem']);
				// Valida os dados da imagem com relação ao banco de dados

				$this->Club->set($this->request->data);
				if( !$this->Club->validates() ) {
					$result = 'error';
				}

				// Valida a imagem no componente
				$valida = $this->Upload->validate(
					$this->request->data['Club']['imagem'],
					array('image/*')
				);
				if(!$valida){
					$result = 'error';
				}

				if($valida){
					$this->Club->create();
					if ($this->Club->save( $data ) ) {
						// Monta o array de opções para o Download
						// ATENÇÃO !!! NÂO é necessário informar o diretório img
						// O diretório img já é definido em path_root
						// Caso queira que a imagem fique em outro diretório
						// informar path_root diferente: options['path_root'] = 'nove/endereco/para/imagem'
						$options = array(
							'name'    => $this->Club->id,
							'dir'     => 'Club',
						);
						$upload = $this->Upload->image($this->request->data['Club']['imagem'], $options);
						$this->Session->setFlash(__('The club has been saved'), 'flash/success');
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash(__('The club could not be saved. Please, try again.'), 'flash/error');
					}
				}
			}else{
				$this->Club->create();
				if ($this->Club->save($this->request->data)) {
					$this->Session->setFlash(__('The club has been saved'), 'flash/success');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The club could not be saved. Please, try again.'), 'flash/error');
				}
			}
		}
		$clubCategories = $this->Club->ClubCategory->find('list');
		$this->set(compact('clubCategories'));
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Club->recursive = 0;
		$this->set('clubs', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Club->exists($id)) {
			throw new NotFoundException(__('Invalid club'));
		}
		$options = array('conditions' => array('Club.' . $this->Club->primaryKey => $id));
		$this->set('club', $this->Club->find('first', $options));
	}


/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
			$this->Club->id = $id;
		if (!$this->Club->exists($id)) {
			throw new NotFoundException(__('Invalid club'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {

			if (!empty($this->request->data['Club']['imagem']['name'])){
				// Monta o array de dados para o banco de dados
				$this->request->data['Club']['ext'] = $this->Upload->get_extension($this->request->data['Club']['imagem']);
				// Valida os dados da imagem com relação ao banco de dados

				$this->Club->set($this->request->data);
				if( !$this->Club->validates() ) {
					$result = 'error';
				}
				// Valida a imagem no componente
				$valida = $this->Upload->validate(
					$this->request->data['Club']['imagem'],
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
						'name'    => $this->Club->id,
						'dir'     => 'Club',
					);
					$upload = $this->Upload->image($this->request->data['Club']['imagem'], $options);
				}
			}

			if ($this->Club->save($this->request->data)) {
				$this->Session->setFlash(__('The club has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The club could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Club.' . $this->Club->primaryKey => $id));
			$this->request->data = $this->Club->find('first', $options);
		}
		$clubCategories = $this->Club->ClubCategory->find('list');
		$this->set(compact('clubCategories', 'competitions'));
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
		$this->Club->id = $id;
		if (!$this->Club->exists()) {
			throw new NotFoundException(__('Invalid club'));
		}
		if ($this->Club->delete()) {
			$this->Session->setFlash(__('Club deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Club was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
