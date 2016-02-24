<?php
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class AdminController extends AppController {
  var $uses = false;
  public function admin_index() {
  }
  public function index() {
		$this->admin_index;
    $this->autoRender = false;
    $this->render("admin_index");
  }

  public function beforeFilter(){
    parent::beforeFilter();
  }

}

