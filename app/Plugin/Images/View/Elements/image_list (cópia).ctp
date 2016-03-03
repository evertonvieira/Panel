  <?php
    echo $this->Form->create('GalleryImages.Image', array('action'=>'delete_all', 'url'=>'/admin/gallery_images/images/delete_all'));
    echo $this->Form->hidden("controller_name", array('value'=>$parent_controller_str));
    echo $this->Form->hidden("foreign_key", array('value'=>$parent_record[$parent_model_str]['id']));
  ?>
  <table class="table table-bordered table-hover">
  <tr>
    <th class="span1">Capa</th>
    <th></th>
    <th class="delete_one"><i class="icon-trash"></i></th>
    <th class='select_delete'><?php echo $this->Form->input("checkbox_all", array('id'=>'checkbox_all', 'label'=>false, 'type'=>'checkbox', 'div'=>false) ); ?>&nbsp;</th>
  </tr>
  <?php

  foreach ($images as $image): ?>
     <tr>
      <td style="text-align:center;">
        <?php
          $options = array($image['Image']['id'] => null);
          $attributes = array('legend' => false, 'class'=>'imagem_destaque');
          if ( $parent_record['ImageFeatured']['image_id']  ==  $image['Image']['id'] ){
            $attributes['checked'] = 'checked';
          }
          echo $this->Form->radio('imagem_destaque', $options, $attributes);
        ?>&nbsp;
      </td>
      <td><?php echo $this->Html->image("/img/Image/{$parent_model_str}/{$image['Image']['foreign_key']}/thumbs/" . $image['Image']['id'] . '.' . $image['Image']['ext'], array('alt' => $image['Image']['id'] . '.' . $image['Image']['ext'] )); ?>&nbsp;</td>
      <td class="actions">
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
      </td>
    <td style="text-align:center;"><?php echo $this->Form->input("delete.{$image['Image']['id']}", array('class'=>'checkbox', 'value'=>$image['Image']['id'], 'label'=>false, 'type'=>'checkbox', 'div'=>false) ); ?>&nbsp;</td>
    </tr>
  <?php endforeach; ?>
    <tr>
      <td colspan="4" class="delete_all">
        <?=$this->Form->button('Excluir selecionados', array('type' => 'submit', 'class'=>'btn btn-danger', 'id'=>'submit_delete_all') );?>
      </td>
    </tr>
  </table>
  <?php echo $this->Form->end(); ?>



  <script>
    var BASE_URL =  "<?php echo $this->base; ?>";
    $(document).ready(function(){
      $('.imagem_destaque').change(function() {
        maque_destaque($(this).val());
      });
      function maque_destaque(image){
        $.ajax({
          async:true,
          type:'post',
          //beforeSend:function(request) {$('#loading').show();},
          complete:function(request, json) {
            //$('#post').html(request.responseText);
            //$('#loading').hide()
          },
          url: BASE_URL + "/admin/images/images/marque_destaque/" + image
        })
      }
    });
  </script>


<?php //echo $this->Html->css('/GalleryImages/css/gallery_images.css', null, array('inline'=>false)) ;?>

<?php
echo $this->Html->scriptBlock('
  $(document).ready(function(){

    $("#checkbox_all").click(function(){
      var checked_status = this.checked;
      $(".checkbox").each(function()
      {
        this.checked = checked_status;
      });
    });

    enable_disabled_submit();
    $(":checkbox").change(function() {
      enable_disabled_submit();
    });
    function enable_disabled_submit(){
      var checked = $(":checkbox").filter(":checked").length;
      if( checked == 0){
        $("#submit_delete_all").attr("disabled", "disabled");
      }else{
        $("#submit_delete_all").removeAttr("disabled");
      }
    }


  });
');
?>
