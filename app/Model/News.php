<?php
App::uses('AppModel', 'Model');
/**
 * News Model
 *
 * @property Category $Category
 */
class News extends AppModel {

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
				'message' => 'Já existe uma notícia com este título!'
			)
		),
		'summary' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
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
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Category' => array(
			'className' => 'Category',
			'joinTable' => 'news_categories',
			'foreignKey' => 'news_id',
			'associationForeignKey' => 'category_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
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

		if (isset($this->data[$this->name]['title'])){
			if(!empty($this->data[$this->name]['title'])){
				// Obtém o slug pelo título
				$titulo = Inflector::slug($this->data[$this->name]['title'], '-');
				$this->data[$this->name]['slug'] =  strtolower($titulo);
			}
			return true;
		}

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
