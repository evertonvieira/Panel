<?php
App::uses('AppModel', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');
/**
 * Club Model
 *
 * @property ClubCategory $ClubCategory
 * @property Competition $Competition
 * @property Competition $Competition
 */
class Club extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'club_category_id' => array(
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

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ClubCategory' => array(
			'className' => 'ClubCategory',
			'foreignKey' => 'club_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function beforeDelete ($options = array()) {
		$registro = $this->findById( $this->id );
		if(isset($registro[$this->name]['ext'])){
			$modulo = $this->name;
			$file = new File ( APP.WEBROOT_DIR.DS."img" . "/{$this->name}/{$registro[$this->name]['id']}.{$registro[$this->name]['ext']}" );
			if( $file->exists() ){
				$file->delete();
			}
		}
	}

	public function beforeValidate ($options = array()) {
		$registro = $this->findById( $this->id );
		if(isset($registro[$this->name]['ext'])){
			$modulo = $this->name;
			$file = new File ( APP.WEBROOT_DIR.DS."img" . "/{$this->name}/{$registro[$this->name]['id']}.{$registro[$this->name]['ext']}" );
			if( $file->exists() ){
				$file->delete();
			}
		}
	}

}
