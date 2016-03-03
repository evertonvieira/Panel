<div class="galleries index">
  <h2><?php echo __('Images'); ?></h2>
  <h3><?=__d('O', 'Você confirma a exclusão das imagens abaixo?'); ?></h3>
  <?php
    echo $this->Form->create('Images.Image', array('action'=>'delete_all', 'url'=>"/admin/{$parent_controller_str}/images/{$foreign_key}/delete_all"));
    echo $this->Form->hidden("delete.confirm", array('value'=>'yes'));
    echo $this->Form->hidden("parent_controller_str", array('value'=>$parent_controller_str));
    echo $this->Form->hidden("foreign_key", array('value'=>$foreign_key));
  ?>
  <div class="plugin_images_list_images">
    <?php foreach ($images as $image): ?>
      <div class="plugin_images_list_images_item" id="plugin_images_list_images_item_<?=$image['Image']['id'];?>">
        <?php
          $image_featured_display = 'none';
          if ( $image_featured  ==  $image['Image']['id'] ){
            $image_featured_display = 'block';
          }
        ?>
        <span style="display:<?=$image_featured_display;?>;" class="label label label-default image_featured_selected"><?=__d('O', 'Image featured');?></span>
        <span class="glyphicon glyphicon-ok checked" style="display:block;"></span>
        <div class="plugin_images_list_images_item_img">
          <?=$this->Html->image("/img" . DS . "{$parent_model_str}" . DS . "{$image['Image']['foreign_key']}" . DS . $image['Image']['id'] . '.' . $image['Image']['ext'], array('alt' => $image['Image']['id'] . '.' . $image['Image']['ext'] )); ?>
        </div>
        <div class="plugin_images_list_images_item_tools">
          <div class="plugin_images_list_images_item_destaque">
            <?php
              $options = array($image['Image']['id'] => null);
              $attributes = array('legend' => false, 'class'=>'imagem_destaque');
              if ( $image_featured  ==  $image['Image']['id'] ){
                $attributes['checked'] = 'checked';
              }
              echo $this->Html->div(
                'image_featured',
                $this->Form->radio('imagem_destaque', $options, $attributes) .
                '<span>' .  __d('O', 'Image featured') . '</span>'
              );
            ?>
          </div>
          <div class="plugin_images_list_images_item_check">
            <?php echo $this->Form->input("delete.{$image['Image']['id']}", array('class'=>'checkbox', 'value'=>$image['Image']['id'], 'label'=>__d('O', 'Check'), 'type'=>'checkbox', 'div'=>false) ); ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <div class="clr"></div>
    <hr />
    <div class="confirm">
      <div class="cancel col-md-4">
        <?=$this->Html->link('Cancelar exclusão', array('plugin'=>false, 'admin'=>true, 'controller'=>$parent_controller_str, 'action'=>'images', $foreign_key), array('class'=>'btn btn-success') );?>
      </div>
      <div class="yes col-md-4 col-md-offset-4">
        <?=$this->Form->button('Excluir selecionados', array('type' => 'submit', 'class'=>'btn btn-danger') );;?>
      </div>
    </div>
  <?php echo $this->Form->end(); ?>
</div>
<?php echo $this->Html->script('/images/js/images', true); ?>
<?php echo $this->Html->css('/images/css/style', null, array('inline' => false)); ?>
