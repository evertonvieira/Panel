<?php
  echo $this->Form->create('Images.Image', array('action'=>'delete_all', 'url'=>"/admin/{$parent_controller_str}/images/{$parent_record[$parent_model_str]['id']}/delete_all"));
  echo $this->Form->hidden("parent_model_str", array('value'=>$parent_model_str));
  echo $this->Form->hidden("parent_controller_str", array('value'=>$parent_controller_str));
  echo $this->Form->hidden("foreign_key", array('value'=>$parent_record[$parent_model_str]['id']));
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
      <span class="glyphicon glyphicon-ok checked"></span>
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

        <div class="plugin_images_list_images_item_delete">
          <?php
            echo $this->Html->link(
                 '<span class="glyphicon glyphicon-trash"></span>',
              array(
                'admin'=>true,
                'plugin'=>false,
                'controller'=>$parent_controller_str . "/images/{$parent_record[$parent_model_str]['id']}",
                'action'=> 'delete',
                $image['Image']['id']
              ),
              array(
                'class'    => 'tip btn btn-danger',
                'escape'   => false,
                'confirm'  => __('Are you sure you want to delete # %s?', $image['Image']['id'])
              )
            );
          ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  <div class="clr"></div>
  <div colspan="4" class="delete_all">
    <div class='select_delete'>
      <?=$this->Form->input("checkbox_all", array('id'=>'checkbox_all', 'label'=>false, 'before'=>'<label>' . __d('O', 'Select all') . '</label>', 'type'=>'checkbox', 'div'=>false) ); ?>
    </div>
    <?=$this->Form->button('Excluir selecionados', array('type' => 'submit', 'class'=>'btn btn-danger', 'id'=>'submit_delete_all') );?>
  </div>
  <div class="clr"></div>

</div>
<?php echo $this->Form->end(); ?>
<?php //echo $this->element('pagination');?>
<?php echo $this->Html->script('/images/js/images', true); ?>
<?php echo $this->Html->css('/images/css/style', null, array('inline' => true)); ?>
