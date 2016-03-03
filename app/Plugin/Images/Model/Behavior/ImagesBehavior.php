<?php
App::uses('Folder', 'Utility');
class ImagesBehavior extends ModelBehavior {

  public $settings = array();
  /**
  * Initiate Callbacks Behavior
  *
  * @param object $Model
  * @param array $config
  * @return void
  * @access public
  */
  public function setup(Model $Model, $config = array()) {
  }

/**
 * Called after every deletion operation.
 *
 * @return void
 * @link http://book.cakephp.org/2.0/en/models/callback-methods.html#afterdelete
 */
  public function afterDelete(Model $Model) {

    $conditions = array('Image.model' => $Model->alias, 'Image.foreign_key' => $Model->id);
    $Model->bindModel(
      array(
        'hasMany' => array(
          "Image" => array(
            'className' => "Image",
            //'foreignKey' => "foreign_key",
          ),
        ),
      )
    );
    $Model->Image->deleteAll($conditions);
    $dir =  IMAGES . $Model->alias . DS . $Model->id;
    $folder = new Folder( $dir );
    $folder->delete();
  }

}

?>