<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $theme = "Default";

	var $components = array(
		'Upload',
    'Amanager.Amanager' => array(
      'login_action' => array('controller'=>'users', 'action'=>'login', 'plugin'=>'amanager', 'admin'=>false ),
      'login_redirect' => array('controller'=>'amanager', 'plugin' => 'amanager', 'action'=>'index', 'admin'=>false ),
      'logout_redirect' => array('controller'=>'pages', 'plugin' => false, 'action'=>'display', 'admin'=>false )
    ),
  );
  public $helpers = array(
    //'Form',
    //'Session',
    //'Html',
    //'Js' => array('Jquery'),
    'Amanager.Amanager',
    'Formatacao',
    'Plupload.Plupload',
    //'Seo.Seo',
  );

  public function beforeFilter(){
    if( $this->request->params['controller'] == 'admin'  ){
      $this->Amanager->beforeFilter($this);
    }

    if( $this->name == 'Restrict'  ){
      $this->Amanager->beforeFilter($this);
    }

    if( isset( $this->request->params['plugin'] ) ){
      if( $this->request->params['plugin'] == 'amanager' ){
        $this->Amanager->beforeFilter($this);
      }
    }

    if( isset( $this->request->params['prefix'] ) ){
      if( $this->request->params['prefix'] == 'admin' ){
        $this->Amanager->beforeFilter($this);
      }

      if( $this->request->params['prefix'] == 'restrict' ){
        $this->Amanager->beforeFilter($this);
      }

    }
  }

  public function beforeRender(){
    if ( isset($this->request->params['prefix']) ){
      if ( $this->request->params['prefix'] == 'admin' ){
        $this->theme = 'Sistema';
      }
    }
    if( $this->request->params['controller'] == 'admin'  ){
      $this->theme = 'Sistema';
    }
  }


}
