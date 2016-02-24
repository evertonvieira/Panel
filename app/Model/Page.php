<?php
App::uses('AppModel', 'Model');
/**
 * Page Model
 *
 */
class Page extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'data' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);


	public function beforeValidate($options = array()) {

    if(!empty($this->data['Page']['title'])){
      // Onbtém o slug pelo título
      $titulo = Inflector::slug($this->data['Page']['title'], '-');
      $this->data['Page']['slug'] =  strtolower($titulo);

    }

		return true;
	}

}
