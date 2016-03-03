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

/**
 * Tbst helper library.
 *
 * Automatic generation of HTML FORMs from given data.
 *
 * @package       Cake.View.Helper
 * @property      HtmlHelper $Html
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/form.html
 */
class PluploadHelper extends AppHelper {

/**
 * Other helpers used by TbstHelper
 *
 * @var array
 */
  public $helpers = array(
    'Form',
    'Session',
    'Html',
    'Js' => array('Jquery'),
  );


    // - $parent_record = O registro em questão



  /**
   * form method
   *
   * @param array $options
   * $options['parent_model_str'] = Nome do modelo em questão
   * $options['parent_controller_str'] = Nome do controlador em questão
   * $options['parent_record_id'] = Identificador do registro em questão
   *
   * @return void
   */
  public function form ($options) {    ?>
      <?php echo $this->Html->link('<i class="icon-white icon-upload"></i>  ' . __('Upad Image'), '#myModal', array('class'=>'btn btn-primary', 'id'=>"modal-btn", 'escape'=>false)); ?>
      <!-- Modal -->
      <script>
        var url_post = "<?php echo $this->base . DS . 'admin' . DS . $options['parent_controller_str'] .  DS . 'images' . DS . $options['parent_record_id'];?>";
      </script>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">

              <?php
              echo $this->Form->create('Image', array('type' => 'file', 'url' => array('plugin'=>false, 'admin'=>true, 'controller'=>$options['parent_controller_str'] .  DS . 'images' . DS . $options['parent_record_id'] , 'action' => 'add')));
              echo $this->Form->hidden("parent_model_str", array('value'=>$options['parent_model_str']));
              echo $this->Form->hidden("controller_name", array('value'=>$options['parent_controller_str']));
              echo $this->Form->hidden("foreign_key", array('value'=>$options['parent_record_id']));

              echo $this->Form->input('imagem', array(
                'type' => 'file',
                'label' => false, 'div' => false,
                'class' => 'fileUpload',
                'multiple' => 'multiple'
              ));
              echo $this->Form->button('Upload', array('type' => 'submit', 'id' => 'px-submit'));
              echo $this->Form->button('Clear', array('type' => 'reset', 'id' => 'px-clear'));
              echo $this->Form->end();
              ?>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    <?php

    echo $this->Html->css('/plupload/css/ui-lightness/jquery-ui-1.8.14.custom', null, array('inline'=>true));
    echo $this->Html->css('/plupload/css/fileUploader', null, array('inline'=>true));
    echo $this->Html->css('/plupload/css/plupload.css', null, array('inline'=>true));


    //echo $this->Html->script('/plupload/js/jquery-1.6.2.min.js', true);
    echo $this->Html->script('/plupload/js/jquery-ui-1.8.14.custom.min.js', true);
    echo $this->Html->script('/plupload/js/jquery.fileUploader.js', true);

    // Load Image
    echo $this->Html->script('/plupload/js/JavaScript-Load-Image/js/load-image.js', false);
    echo $this->Html->script('/plupload/js/JavaScript-Load-Image/js/load-image-meta.js', false);

    // Mostra o formulário de uplod
    //echo $this->Html->script('/plupload/js/bootstrap.min', false);

    echo $this->Html->script('/plupload/js/plupload.js', true);


  }
}


