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

	/**
	 * Called before each find operation. Return false if you want to halt the find
	 * call, otherwise return the (modified) query data.
	 *
	 * @param array $queryData Data used to execute this query, i.e. conditions, order, etc.
	 * @return mixed true if the operation should continue, false if it should abort; or, modified
	 *               $queryData to continue with new $queryData
	 * @link http://book.cakephp.org/2.0/en/models/callback-methods.html#beforefind
	 */
	public function beforeFind(Model $model, $queryData) {
		if($model->alias != 'Mage'){
			$model->bindModel(
				array('hasMany' => array(
					'Image' => array(
						'className' => 'Images.Image',
						'foreignKey' => "foreign_key",
						'conditions' => array(
							'Image.model' => "{$model->alias}"
						),
						'dependent' => true
					)
				))
			);

		}
		return true;
	}


}

?>