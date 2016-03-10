<?php echo $this->element("tinymce"); ?>
<?php echo $this->Form->create('Club', array('role' => 'form', 'type'=>'file')); ?>
	<div class="form-group">
		<?php echo $this->Form->input('id', array('label'=>'Id:', 'class'=>'form-control', 'placeholder'=>'id'));?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('name', array('label'=>'Name:', 'class'=>'form-control input-lg', 'placeholder'=>'name'));?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('body', array('label'=>'Body:', 'class'=>'form-control editor', 'placeholder'=>'body'));?>
	</div>
	<div class="row">

	<div class="form-group col-xs-6">
		<?php
      echo $this->Form->input('imagem', array('label'=>"Imagem", 'type' => 'file', 'class'=>'form-control'));
		?>
	</div>
		<div class="form-group col-xs-6">
			<?php echo $this->Form->input('club_category_id', array('label'=>'Categoria do Club:', 'class'=>'form-control', 'placeholder'=>'club_category_id'));?>
		</div>
	</div>

	<div class="pull-left">
		<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Save data', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
	</div>
<?php echo $this->Form->end(); ?>