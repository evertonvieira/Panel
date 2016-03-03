<?php
App::uses('ImagesAppController', 'Images.Controller');
/**
 * Images Controller
 *
 */
class ImagesController extends ImagesAppController {

  public $components = array(
    'Upload',
  );

/**
 * Armazena o registro parent da lista de imagens para uso entre métodos durante execução
 *
 * var string parent_record
 *
 */
  var $parent_record;

/**
 * Armazena a lista de imagens para uso entre métodos durante execução
 *
 * var string images
 *
 */
  var $images;

/**
 * Define a quantidade de imagens que podem ser cadastradas
 *
 * var string limit
 *
 * Valor padrão = 1
 *
 */
  var $limit = 1;

/**
 * Define as medidas a serem cortadas ou redimencionadas da imagem
 *
 * var array measures
 *
 * Valor padrão = array('origin') // Apenas sobe a imagem em questão
 *
 */
  var $measures = array(
    'origin'
  );

	public function get_extencao($imagem){
    $Upload = new UploadComponent;
    $Upload->upload($imagem);
    return $Upload->file_src_name_ext;
  }




  /**
   * index method
   *
   * @return void
   */
  public function admin_index($id = null) {
    if( $this->__is_ajax() ){
      $this->autoRender = false;
      $this->layout = false;
    }
    //Verifica se foi passado o nome do controlador após /admin
    if( !isset($this->params['parent']) ){
      throw new NotFoundException(__('Invalid parent') . '[JalgajTeiv7]');
    }
    // Verifica se foi passado o id do registro
    if( $id == null ){
      throw new NotFoundException(__('Invalid parent') . '[ulHoherph4]');
    }
    // Separa o nome do controlador para usá-lo como parâmetro em outras funcionalidades
    $parent_controller_str = $this->params['parent'];
    // Importa o controlador informado em parent para obter o nome do modelo que o mesmo usa
    $obj_str = Inflector::camelize($parent_controller_str);
    App::import('Controller', $obj_str );
    $obj = $obj_str . 'Controller';
    $parent_controller = new $obj;
    // Obtém o nome do modelo usado pelo controlador
    $parent_model_str = $parent_controller->modelClass;
    // Cria um relacionamento entre imagens e o modelo pretendido
    $this->Image->bindModel(
      array(
        'belongsTo' => array(
          "{$parent_model_str}" => array(
            'className' => "{$parent_model_str}",
            'foreignKey' => "foreign_key",
          )
        )
      )
    );
    // Verifica se existe realmente um registro com o id passado
    if ( !$this->Image->{$parent_model_str}->exists($id) ) {
      throw new NotFoundException(__('Invalid parent') . '[dujCaid5]');
    }
    // Cria um relacionamento entre o modelo pretendido e image_featureds
    $this->__bind_model_image_featureds($parent_model_str);
    // Obtém os o registro em questão, aqui chmado de parent_record
    $this->Image->{$parent_model_str}->id = $id;
    $parent_record = $this->parent_record = $this->Image->{$parent_model_str}->read();
    // Obtém as imagens relacionadas ao registro
    $this->paginate = array(
      'conditions' => array(
        'Image.model' => $parent_model_str,
        'Image.foreign_key' => $id,
      ),
      'limit' => 24,
      'recursive' => 0
    );
    $images = $this->images = $this->paginate('Image');
    $image_featured = $this->__get_image_featured($parent_model_str, $id);

    // Disponibiliza as variáveis para a visualização
    //
    // - $images = As imagens relacionadas ao registro em questão
    // - $parent_model_str = Nome do modelo em questão
    // - $parent_controller_str = Nome do controlador em questão
    // - $parent_record = O registro em questão
    // - $image_featured = A imagem usada como capa para a lista de imagens
    $this->set(compact('images', 'parent_model_str', 'parent_controller_str', 'parent_record', 'image_featured'));

    if( $this->__is_ajax() ){
      $this->render('/Elements/image_list');
    }
  }

/**
 * admin_add method
 *
 * @return void
 */

  public function add($id) {

    //Verifica se foi passado o nome do controlador após /admin
    if( !isset($this->params['parent']) ){
      throw new NotFoundException(__('Invalid parent') . '[JalgajTeiv7]');
    }

    // Verifica se foi passado o id do registro
    if( $id == null ){
      throw new NotFoundException(__('Invalid parent') . '[ulHoherph4]');
    }

    // Verifica se foi passado o nome do modelo em questão
    if( !isset($this->request->data['Image']['parent_model_str']) ){
      throw new NotFoundException(__('Invalid parent') . '[NagDocWoydd5]');
    }

    //$this->autoRender = false;
    if ($this->request->is('post')) {

      $this->layout = 'ajax';

      // Monta o array de dados para o banco de dados
      $data = array();
      $data['Image']['model'] = $this->request->data['Image']['parent_model_str'];
      $data['Image']['foreign_key'] = $this->request->params['id'];
      $data['Image']['imagem'] = $this->request->data['Image']['imagem'];
      $data['Image']['ext'] = $this->Upload->get_extension($data['Image']['imagem']);
      // Valida os dados da imagem com relação ao banco de dados
      $this->Image->set($this->request->data);
      if( !$this->Image->validates() ) {
        $result = 'error';
      }

      // Valida a imagem no componente
      $valida = $this->Upload->validate(
        $data['Image']['imagem'],
        array('image/*')
      );
      if(!$valida){
        $result = 'error';
      }

      if($valida){
        $this->Image->create();
        if ($this->Image->save( $data ) ) {
          // Monta o array de opções para o Download
          // ATENÇÃO !!! NÂO é necessário informar o diretório img
          // O diretório img já é definido em path_root
          // Caso queira que a imagem fique em outro diretório
          // informar path_root diferente: options['path_root'] = 'nove/endereco/para/imagem'
          $options = array(
            'name'    => $this->Image->id,
            'dir'     => $data['Image']['model'] . DS . $data['Image']['foreign_key'],
          );
          $upload = $this->Upload->image($data['Image']['imagem'], $options);
          $result = 'success';
        } else {
          $result = 'error';
        }
      }
      $this->set('result',$result);
      $this->render('/Elements/plupload_result');
    }
  }

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
  public function admin_delete($id = null, $image_id = null) {
    $this->Image->id = $image_id;
    if (!$this->Image->exists()) {
      throw new NotFoundException(__('Invalid slide'));
    }
    $this->request->onlyAllow('post', 'delete', 'get');
    if ($this->Image->delete(array('Image.id' => $image_id), true)) {
      $this->Session->setFlash( __d('O', 'Image deleted'), 'msg/success' );
      $this->redirect(
        array(
          'admin'=>true,
          'plugin'=>false,
          'controller'=>$this->request->params['parent'] . "/images/{$id}",
          'action'=> 'index'
        )
      );
    }
  }

/**
 * delete_all method
 *
 * @return void
 */
  public function admin_delete_all($id = null) {
    // Verifica se foi passado o id do parent
    if( is_null($id) ){
      throw new NotFoundException(__('Invalid id parent') . '[0215algajTeiJhgbv7]');
    }
    // Verifica se foi passado o nome do controlador após /admin
    if( !isset($this->params['parent']) ){
      throw new NotFoundException(__('Invalid parent') . '[JalgajTeiv7]');
    }
    // Verifica se foi passado o id do registro
    if( $id == null ){
      throw new NotFoundException(__('Invalid parent') . '[ulHoherph4]');
    }
    // Separa o nome do controlador para usá-lo como parâmetro em outras funcionalidades
    $parent_controller_str = $this->params['parent'];
    // Importa o controlador informado em parent para obter o nome do modelo que o mesmo usa
    $obj_str = Inflector::camelize($parent_controller_str);
    App::import('Controller', $obj_str );
    $obj = $obj_str . 'Controller';
    $parent_controller = new $obj;
    // Obtém o nome do modelo usado pelo controlador
    $parent_model_str = $parent_controller->modelClass;
    // Cria um relacionamento entre imagens e o modelo pretendido
    $this->Image->bindModel(
      array(
        'belongsTo' => array(
          "{$parent_model_str}" => array(
            'className' => "{$parent_model_str}",
            'foreignKey' => "foreign_key",
          )
        )
      )
    );

    // Cria um relacionamento entre o modelo pretendido e image_featureds
    $this->__bind_model_image_featureds($parent_model_str);

    // Obtém os o registro em questão, aqui chmado de parent_record
    $this->Image->{$parent_model_str}->id = $id;

    $this->parent_record = $this->Image->{$parent_model_str}->read();

    // Verifica se existe realmente um registro com o id passado
    if ( !$this->Image->{$parent_model_str}->exists($id) ) {
      throw new NotFoundException(__('Invalid parent') . '[dujCaid5]');
    }

    $foreign_key = $id;
    $image_featured = $this->__get_image_featured($parent_model_str, $foreign_key );
    if( isset($this->request->data['delete']['confirm']) ){
      if( $this->request->data['delete']['confirm'] == 'yes' ){
        unset( $this->request->data['delete']['confirm']);
        if ($this->Image->deleteAll( array('Image.id' => $this->request->data['delete']), true, true) ) {
          $this->Session->setFlash( __d('O', 'Images deleted'), 'msg/success' );
          $this->redirect(array('plugin'=>false, 'admin'=>true, 'controller'=>$parent_controller_str , 'action'=> 'images', $foreign_key ));
        }
      }
    }
    $this->set(compact('parent_controller_str', 'foreign_key', 'image_featured', 'parent_model_str'));
    $options = array('conditions' => array('Image.id' => $this->request->data['delete']));
    $this->set('images', $this->Image->find('all', $options));
  }


/**
 * admin_maque_destaque method
 *
 * @param string $id
 * @return void
 */
  public function admin_marque_destaque($id = null) {
    $this->autoRender = false;
    if (!$this->request->is('post')) {
      throw new MethodNotAllowedException();
    }
    $image = $this->Image->id = $id;
    if (!$this->Image->exists()) {
      throw new NotFoundException(__('Invalid image [optOrcEctAc4]'));
    }

    // Retorna a imagem marcada como capa
    return $this->__marque_destaque($id);
  }

/**
 * __maque_destaque method
 *
 * @param string $id
 * @return void
 */
  function __marque_destaque($id = null) {


    // Nova imagem de capa
    $this->Image->id = $nova_imagem_de_capa = $id;

    // Obtém os dados da imagem para saber de qual modelo ela pertence e qual registro
    $image = $this->Image->read();
    $model = $image['Image']['model'];
    $foreign_key = $image['Image']['foreign_key'];

    // Monta o array de dados para marcas imagemd e capa
    $image_featured_data = array('ImageFeatured'=>array(
      'image_id'   => $nova_imagem_de_capa,
      'model'      => $model,
      'foreign_key'=> $foreign_key,
    ));


    // Obtém os dados do registro antigo (imagem de capa), se houver
    $image_featured = $this->Image->ImageFeatured->findByModelAndForeignKey($model,$foreign_key);

    // Se já tiver imagem marcada como capa, insere o registro da marcação no array de dados
    // para atualizar
    if($image_featured){
      $image_featured_data['ImageFeatured']['id'] = $image_featured['ImageFeatured']['id'];
    }


    // Salva a nova imagem como capa
    if($this->Image->ImageFeatured->save($image_featured_data )) {
      //if(isset($imagem_a_excluir)){
        //$this->Image->ImageFeatured->id = $imagem_a_excluir;
        //$this->Image->ImageFeatured->delete();
      //}
    }
    return $nova_imagem_de_capa;
  }

  // Verifica se uma requisição foi feita em ajax
  private function __is_ajax() {
    return $this->request->isAjax() || $this->request->ext == 'json';
  }

  /**
   * __get_image_featured method
   *
   * @param string parent_model_str
   * @param string foreign_key
   * @return string image_id
   */
  private function __get_image_featured($parent_model_str = null, $foreign_key = null ) {
    $image_featured = false;
    if( !is_null($this->parent_record['ImageFeatured']['id']) ){
      $image_featured =  $this->parent_record['ImageFeatured']['image_id'];
    }elseif( count($this->images) > 0 ){
      $image_featured = $this->__marque_destaque($this->images[0]['Image']['id']);
    }
    return $image_featured;
  }

  /**
   * __bind_model_image_featureds method
   *
   * @param string parent_model_str
   * @param string foreign_key
   * @return string image_id
   */
  private function __bind_model_image_featureds($parent_model_str = null ) {
    $this->Image->{$parent_model_str}->bindModel(
      array(
        'hasOne' => array(
          "ImageFeatured" => array(
            'className' => "ImageFeatured",
            'foreignKey' => 'foreign_key',
            'conditions' => array('ImageFeatured.model' => $parent_model_str),
            //'order' => 'Comment.created DESC',
            //'limit' => '5',
            'dependent' => true
          )
        )
      )
    );
  }


}
