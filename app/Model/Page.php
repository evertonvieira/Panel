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
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'uniqueTitleRule' => array(
				'rule' => 'isUnique',
				'message' => 'Já existe uma página com este título!'
			)
		),
	);

	public function beforeValidate($options = array()) {
    if(!empty($this->data['Page']['title'])){
      // Obtém o slug pelo título
      $titulo = Inflector::slug($this->data['Page']['title'], '-');
      $this->data['Page']['slug'] =  strtolower($titulo);
    }
		return true;
	}

}
