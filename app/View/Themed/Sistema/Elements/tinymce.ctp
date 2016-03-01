<?php echo $this->Html->script(array('tinymce/tinymce.min'), false); ?>
<script type="text/javascript">
//<![CDATA[
	var BASE_URL =  "<?php echo Router::url('/', true); ?>";
//]]>
</script>
<?php
echo $this->Html->scriptBlock("

  function elFinderBrowser (field_name, url, type, win) {
    tinymce.activeEditor.windowManager.open({
      file: '".Router::url(array('controller' => 'files', '?e=tinymce'))."',
      title: 'Gerenciamento de Arquivos',
      width: 1006,
      height: 500,
      resizable: 'yes'
    }, {
      setUrl: function (url) {
        win.document.getElementById(field_name).value = url;
      }
    });
    return false;
  }

  tinymce.init({

    mode: 'specific_textareas',
    editor_selector : 'tinymce',
    selector: '.editor',
    theme: 'modern',
    height: 300,

    // Urls
    document_base_url: 'http://localhost/cms/',
    convert_urls: true,
    relative_urls: false,

    // Plugins
    plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table contextmenu paste code'
		],

		toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		toolbar2: 'print preview media | forecolor backcolor emoticons',

		image_advtab: true ,
    file_browser_callback: elFinderBrowser,
    language : 'pt_BR'
 });


");
?>
