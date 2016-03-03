<div class="images index">
  <div class="page-header">
    <h2><?php echo __d('O', 'Images for '); ?> <?=$parent_model_str;?> <?=$parent_record[$parent_model_str]['id'];?></h2>
  </div>
    <?php
      // Executa o helper Plupload para criar o furmulário
      $options = array();
      $options['parent_model_str'] = $parent_model_str;
      $options['parent_controller_str'] = $parent_controller_str;
      $options['parent_record_id'] = $parent_record[$parent_model_str]['id'];
      echo $this->Plupload->form( $options );
    ?>
  <div id="post">
    <?php echo $this->element("image_list"); ?>
  </div>
</div>