$(window).load(function() {

  $(function () {

    //'use strict';
    //var result = $('#mini_1');
    function update(){
      $.ajax({
        async:true,
        type:"post",
        beforeSend:function(request) {$("#loading").show();},
        complete:function(request, json) {
          $("#post").html(request.responseText);
        },
        url: url_post
      })
    }

    $('#modal-btn').click(function(){
      $('#myModal').modal('show');
    });

    $(".fileUpload").fileUploader({
      allowedExtension: 'jpg|jpeg|gif|png|odt|txt',
      timeInterval: [1, 2, 4, 2, 1, 5],
      percentageInterval: [1, 2, 3, 4, 5, 6,7,8,9,10],
      afterEachUpload: function(formContainer) {
        $(".filename").hide("slow");
        $(".success").hide("slow");
        update();
      },
      onFileChange: function(e, form) {
        var result = $('#mini_' + $(form).attr('id').replace('pxupload', '') );
        loadImage(
          e,
          function (img) {
            result.prepend(img);
          },
          {
            maxWidth: 80,
            maxHeight: 80,
            minWidth: 80,
            minHeight: 80,
            canvas: true
          } // Options
        );

      },
      afterUpload: function(formContainer) {
        $('#myModal').modal('hide');
      }
    });

  });

});