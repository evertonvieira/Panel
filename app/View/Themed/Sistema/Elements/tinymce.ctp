<?php echo $this->Html->script('tinymce/tinymce.min', false); ?>

<script>
	tinymce.init({
		selector: 'textarea',
		height: 300,
		plugins: [
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table contextmenu paste code'
		],
		toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		language : 'pt_BR'
	});
</script>