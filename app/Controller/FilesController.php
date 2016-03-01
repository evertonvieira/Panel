<?php
App::uses('AppController', 'Controller');
class FilesController extends AppController {
  public $layout = 'files_tinymce';
  public $uses = array();
  public $components = array('RequestHandler');
  public $helpers = array('Js', 'Html');

  /**
   * Registra as extenções inválidas para serem usadas no gerenciador de arquivos
   * @var array
   */
  public $extencoes_invalidas = array(
    'phar',
    'txt',
    'php',
    'ctp',
    'exe',
    'rb',
    'js',
  );

  /**
   * Função não permite o acesso a diretórios pre-fixados por pont [.]
   * @param  string $attr
   * @param  string $path
   * @param  array $data
   * @param  array $volume
   * @return boolean
   */
  function access($attr, $path, $data, $volume)
  {
    return strpos(basename($path), '.') === 0
      ? !($attr == 'read' || $attr == 'write')
      :  null;
  }

  /**
   * Função que verifica se o nome do arquivo é válido
   * @param  string  $name
   * @return boolean
   */
  function isValidName($name = '')
  {
    $extension = end(explode('.', $name));
    return !in_array($extension, $this->extencoes_invalidas );
  }

  public function admin_index() {
    $file_manager = false;
    if(isset( $this->request->query['call'] )){
      if($this->request->query['call'] == 'file_manager'){
        $file_manager = true;
      }
    }
    $this->set(compact('file_manager'));
    App::import('Vendor', 'ElFinderConnector', array('file' => 'elFinder'. DS. 'php' . DS . 'elFinderConnector.class.php'));
    App::import('Vendor', 'ElFinder', array('file' => 'elFinder'. DS. 'php' . DS . 'elFinder.class.php'));
    App::import('Vendor', 'ElFinderVolumeDriver', array('file' => 'elFinder'. DS. 'php' . DS . 'elFinderVolumeDriver.class.php'));
    App::import('Vendor', 'ElFinderVolumeLocalFileSystem', array('file' => 'elFinder'. DS. 'php' . DS . 'elFinderVolumeLocalFileSystem.class.php'));

    $opts = array(
      'debug' => false,
      'roots' => array(
        array(
          'driver'        => 'LocalFileSystem',    // driver for accessing file system (REQUIRED)
          'path'          => WWW_ROOT . 'files' . DS . 'media' . DS,             // path to files (REQUIRED)
          'URL'           => Router::url('/', true) . 'files' . DS . 'media' . DS,             // URL to files (REQUIRED)
          'tmbURL'        => Router::url('/', true) . 'files' . DS . 'media' . DS . '.tmb',
          'tmbPath'       => WWW_ROOT . 'files' . DS . 'media' . DS . '.tmb',
          'separator'     => DS,
          'accessControl' => array($this, 'access'),             // disable and hide dot starting files (OPTIONAL)
          'acceptedName' => array($this, 'isValidName'),             // disable and hide dot starting files (OPTIONAL)
          'alias'         => 'Arquivos',
          'startPath'     => '../img/files/',

          'copyOverwrite' => true,
          'uploadOverwrite' => false,

          'uploadAllow'  => array('image'),
          'uploadDeny'   => array('all'),
          'uploadOrder'  => 'deny,allow',
          'archiveMimes' => array('image'),
        )
      )
    );

    if($this->RequestHandler->isAjax() || $this->RequestHandler->isPost()) {
      $connector = new ElFinderConnector(new ElFinder($opts));
      $connector->run();
    }

  }

  public function admin_manager() {
    $this->layout = 'default';
  }

}