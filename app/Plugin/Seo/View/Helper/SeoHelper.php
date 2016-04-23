<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright   Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link        http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Helper
 * @since       CakePHP(tm) v 0.10.0.1076
 * @license     MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('ClassRegistry', 'Utility');
App::uses('AppHelper', 'View/Helper');
App::uses('Hash', 'Utility');

/**
 * Html helper library.
 *
 * Automatic generation of HTML FORMs from given data.
 *
 * @package       Cake.View.Helper
 * @property      HtmlHelper $Html
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html
 */
class SeoHelper extends AppHelper {

/**
 * Other helpers used by HtmlHelper
 *
 * @var array
 */
	public $helpers = array('Html', 'Form');

	public function form() {
     echo '<div class="page-header">';
		echo '<b>Otimização para motores de busca:</b>';
		echo '</div>';
		echo $this->Form->input('MetaTag.id', array('type'=>'hidden'));

		echo '<div class="form-group">';
		 echo "<label>" . __('Title') . "</label>";
			echo $this->Form->input('MetaTag.title', array('class'=>'form-control', 'label'=>false,));
    echo '</div>';

		echo '<div class="form-group">';
			echo "<label>" . __('Description') . "</label>";
			echo $this->Form->input('MetaTag.description', array('class'=>'form-control', 'label'=>false, 'type'=>'textarea', 'rows'=>3));
    echo '</div>';

		echo '<div class="form-group">';
			echo "<label>" . __d('O', 'Keywords') . "</label>";
			echo $this->Form->input('MetaTag.keywords', array('class'=>'form-control', 'label'=>false,));
			echo "<p class=\"help-block\"><em>". __d('seo_helper', 'Separe as palavras por vírgula.')."</em></p>";
    echo '</div>';
  }

	public function metaTags($seo = NULL) {

		if(!isset($seo['MetaTag'])){
			$class = App::import("Model", "MetaTag");
			if ($class){
				$model = new MetaTag();
				$seo = $model->findByModel('all');
			}
		}
		$metaTags = '';
		$metaTags.= '<title>' . $seo['MetaTag']['title'] . '</title>' . PHP_EOL;
		$metaTags.= '<meta name="description" content="' . $seo['MetaTag']['description'] . '">' . PHP_EOL;
		$metaTags.= '<meta name="keywords" content="' . $seo['MetaTag']['keywords'] . '">' . PHP_EOL;

    return $metaTags;
  }

}
