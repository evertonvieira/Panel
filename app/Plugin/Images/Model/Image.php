<?php
App::uses('ImagesAppModel', 'Images.Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Image Model
 *
 */
class Image extends ImagesAppModel {

  /**
   * Armazena os dados do registro antes de ser excluído
   *
   * @current_image string
   */
  var $current_image;


/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'ext' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'model' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'foreign_key' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

/**
 * Called before every deletion operation.
 *
 * @param boolean $cascade If true records that depend on this record will also be deleted
 * @return boolean True if the operation should continue, false if it should abort
 * @link http://book.cakephp.org/2.0/en/models/callback-methods.html#beforedelete
 */
	public function beforeDelete($cascade = true) {
    // Obtém os dados do registro antes de ser excluído
    $this->current_image = $this->findById($this->id);
    parent::beforeDelete($cascade = true);
		return true;
	}

/**
 * Called after every deletion operation.
 *
 * @return void
 * @link http://book.cakephp.org/2.0/en/models/callback-methods.html#afterdelete
 */
  public function afterDelete() {
    $file =  IMAGES . $this->current_image['Image']['model'] . DS . $this->current_image['Image']['foreign_key'] . DS . $this->current_image['Image']['id'] . '.' . $this->current_image['Image']['ext'] ;
    $file = new File( $file );
    $file->delete();
    parent::afterDelete();
  }

  public $hasOne = array(
    'ImageFeatured' => array(
      'className' => 'ImageFeatured',
      'foreignKey' => 'image_id',
      'dependent' => true
    )
  );

}
