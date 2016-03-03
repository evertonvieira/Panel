<?php
App::uses('Component', 'Controller');
class UploadComponent extends Component {

  var $error = false;

  var $upload;

  var $options = array(
    'path_root'        => IMAGES,
    'language'         => '',
  );

  function __construct(ComponentCollection $collection, $settings = array()) {
    parent::__construct($collection, $settings);
    App::import('Vendor', 'upload', array('file' => 'Verot' . DS . 'class.upload_0.32'. DS . 'class.upload.php'));
    $this->Upload = new upload(false);
  }

  function initialize(Controller $controller = null) {
    $this->controller = $controller;
  }

  function startup(Controller $controller = null) {
    if( isset($this->settings->login_action) ) $this->login_action = $this->settings['login_action'];
  }

  function shutdown(Controller $controller = null) {
  }

  function image( $file = null, $options = array() ) {

    $return = array();

    $this->Upload->upload($file);

    $this->Upload->file_new_name_body   = $options['name'];
    $this->Upload->file_safe_name       = false;
    $this->Upload->file_overwrite       = true;
    $this->Upload->jpeg_quality         = 100;
    $this->Upload->process( $this->options['path_root'] . DS . $options['dir'] );

    $return['file_src_name']      = $this->Upload->file_src_name;
    $return['file_src_name_body'] = $this->Upload->file_src_name_body;
    $return['file_src_name_ext']  = $this->Upload->file_src_name_ext;
    $return['file_src_pathname']  = $this->Upload->file_src_pathname;
    $return['file_src_mime']      = $this->Upload->file_src_mime;
    $return['file_src_size']      = $this->Upload->file_src_size;
    $return['file_src_error']     = $this->Upload->file_src_error;
    $return['file_is_image']      = $this->Upload->file_is_image;

    // Se houver erro atribui o erro ao erro do componente
    if ($this->Upload->error){
      $this->error = $this->Upload->error;
    }

    return $return;

  }

  function get_extension($file){
    $this->Upload->upload($file);
    return $this->Upload->file_src_name_ext;
  }

  function validate($file, $allowed = null){
    $return = false;
    $this->Upload->upload($file);
    if($allowed != null) $this->Upload->allowed = $allowed;
    if(in_array($this->Upload->file_src_mime, $this->Upload->allowed)){
      $return = true;
    }
    foreach($this->Upload->allowed as $allowed ) {
      list($m1, $m2) = explode('/', $this->Upload->file_src_mime);
      list($v1, $v2) = explode('/', $allowed);
      if (($v1 == '*' && $v2 == '*') || ($v1 == $m1 && ($v2 == $m2 || $v2 == '*'))) {
        $return = true;
        break;
      }
    }
    return $return;
  }

}

?>
