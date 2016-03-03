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

          // Oculta os labels de marcação de imagem de capa
          $(".image_featured_selected").hide();

          // Exibe o label da imagem marcada como destaque
          $("#plugin_images_list_images_item_" + request.responseText ).children(".image_featured_selected").show();
        },
        url: BASE_URL + "/admin/images/images/marque_destaque/" + image
      })
    }

  $("#checkbox_all").click(function(){
    var checked_status = this.checked;
    $(".checkbox").each(function()
    {
      if(checked_status){
        $(".checked").show();
      }else{
        $(".checked").hide();
      }
      this.checked = checked_status;
    });
  });

  enable_disabled_submit();


  $(":checkbox").change(function() {

    if( $(this).is(":checked")){

      $("#plugin_images_list_images_item_" + $(this).val() ).children(".checked").show();
    }else{
      $("#plugin_images_list_images_item_" + $(this).val() ).children(".checked").hide();
    }

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

  $("div.plugin_images_list_images_item_tools").each(function(){

    $(this).css("opacity", 0);

    $(this).css("width", $(this).siblings("img").width());


    $(this).parent().css("width", $(this).siblings("img").width());

    $(this).css("display", "block");
  });

  $("div.plugin_images_list_images_item").hover(function(){
    $(this).children(".plugin_images_list_images_item_tools").stop().fadeTo(500, 0.7);
  },function(){
    $(this).children(".plugin_images_list_images_item_tools").stop().fadeTo(500, 0);
  });

});