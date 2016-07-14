<?php
class SettingsController extends AppController {
	public $uses = array('MetaTag', 'AmUser' );


	public function admin_index () {
		$this->pageTitle = 'Configurações';

	}

	/**
 * admin_seo method
 * Define os metadados default para o sistema
 *
 * @throws NotFoundException
 * @return void
 */
	public function admin_seo() {
		$this->pageTitle = 'Configurações de SEO';
		if ($this->request->is('post') || $this->request->is('put')) {
      $this->request->data['MetaTag']['model'] = 'all';
      $this->request->data['MetaTag']['foreign_key'] = 0;
			if ($this->MetaTag->save($this->request->data)) {
				$this->Session->setFlash(__('Dados de <strong>SEO DEFAULT</strong> foram atualizados com sucesso.'), 'flash/success');
				$this->redirect(array('controller'=>'settings','action' => 'seo'));
			} else {
				$this->Session->setFlash(__('Houve um erro ao atualizar os dados de <strong>seo</strong>. Por favor, tente novamente.'), 'flash/error');
			}
		} else {
			$this->request->data = $this->MetaTag->findByModel('all');
			$this->render('admin_index');
		}
	}



}