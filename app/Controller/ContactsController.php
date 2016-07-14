<?php
App::uses('AppController', 'Controller');
/**
 * Contacts Controller
 *
 * @property Contact $Contact
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ContactsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * Update status
 *
 * @return void
 */
	public function admin_read($id = null) {
		$this->Contact->id = $id;
		if ($this->request->is('post')) {
			$options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
			$data =	$this->Contact->find('first', $options);
			if ($data['Contact']['status'] == 0){
				$this->Contact->saveField('status', '1');
			}
		}
		$this->Session->setFlash(__('Mensagem marcada como <strong>lida</strong> com sucesso!'), 'flash/success');
		$this->redirect(array('action' => 'view', $id));
	}

/**
		* retorna mensagens de contatos enviados pelo site
		* @return void
	*/
	public function notifications(){
		$this->recursive = 0;
		$data = $this->Contact->find('all',
			array(
				'limit'=> 10,
				'conditions'=> array(
					'Contact.status'=> 0
				),
				'order' => array(
					'Contact.created' => 'DESC'
				)
			)
		);
		return $data;
	}


/**
	* retorna o tatal de mensagem de contatos enviados que não foram lidas
	* @return void
*/
	public function totalMensage(){
		$this->recursive = 0;
		$total = $this->Contact->find('count',
			array(
				'conditions'=> array(
					'Contact.status'=> 0
				)
			)
		);
		return $total;
	}


	public function index() {
		if ($this->request->is('post')) {
			$this->Contact->create();
			if ($this->Contact->save($this->request->data)) {
				$this->Session->setFlash(__('The Contact has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Contact could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->pageTitle = 'Listar Contatos';
		$this->Contact->recursive = 0;
		$this->set('contacts', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->pageTitle = 'Ver Contato';
		if (!$this->Contact->exists($id)) {
			throw new NotFoundException(__('Invalid contact'));
		}
		$options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
		$this->set('contact', $this->Contact->find('first', $options));
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
		$this->Contact->id = $id;
		if (!$this->Contact->exists()) {
			throw new NotFoundException(__('Não foi encontrado o registro para o ID especificado!'));
		}
		if ($this->Contact->delete()) {
			$this->Session->setFlash(__('O contato foi <strong>deletado</strong> com sucesso!'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Houve um erro ao <strong>deletar</strong> o contato. Por favor, tente novamente.'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
