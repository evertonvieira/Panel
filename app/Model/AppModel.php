<?php

App::uses('Model', 'Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class AppModel extends Model {
  /**
   * Behavior
   *
   * @actsAs string
	*/
  public $actsAs = array('AjusteData', 'Images.Images');

	public function beforeValidate($options = array()) {
		if (isset($this->data[$this->name]['title'])){
			if(!empty($this->data[$this->name]['title'])){
				// Obtém o slug pelo título
				$titulo = Inflector::slug($this->data[$this->name]['title'], '-');
				$this->data[$this->name]['slug'] =  strtolower($titulo);
			}
			return true;
		}
	}
}

