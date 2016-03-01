<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>elFinder 2.0</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>



    <?php
    $files_CSS = array(
      'elfinder.min',
      'elfinder-theme',
    );
    $files_JS = array(
      'elfinder.min',
      'i18n/elfinder.pt_BR',
    );
    echo $this->Html->css( $files_CSS );
    echo $this->Html->script( $files_JS );

    if($file_manager){ // Se for chamado para gerenciar arquivos apenas
      ?>
      <!-- elFinder initialization (REQUIRED) -->
      <script type="text/javascript" charset="utf-8">
        $().ready(function() {
          var elf = $('#elfinder').elfinder({
            url : '<?php echo Router::url('/', true); ?>admin/files',  // connector URL (REQUIRED)
            lang: 'pt_BR',             // language (OPTIONAL)
            width: '100%',
            resizable: false,
            height: '460',
          }).elfinder('instance');
        });
      </script>
      <?php
    }else{ ?>
      <!-- elFinder initialization (REQUIRED) -->
      <script type="text/javascript" charset="utf-8">
        $().ready(function() {
          var FileBrowserDialogue = {
              init: function() {
                // Here goes your code for setting your custom things onLoad.
              },
              mySubmit: function (URL) {
                // pass selected file path to TinyMCE
                parent.tinymce.activeEditor.windowManager.getParams().setUrl(URL);

                // close popup window
                parent.tinymce.activeEditor.windowManager.close();
              }
            }
          var elf = $('#elfinder').elfinder({
            url : '<?php echo Router::url('/', true); ?>admin/files',  // connector URL (REQUIRED)
            getFileCallback: function(file) { // editor callback
              FileBrowserDialogue.mySubmit(file); // pass selected file path to TinyMCE
            },
            lang: 'pt_BR',             // language (OPTIONAL)
            width: 980,
            height: 480,
          }).elfinder('instance');
        });
      </script>
      <?php
    } ?>
	</head>
	<body>
    <?=$this->fetch('content');?>
	</body>
</html>
