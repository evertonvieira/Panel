<?php echo $this->Form->create('Page', array('role' => 'form')); ?>
	<div class="form-group">
		<?php echo $this->Form->input('id', array('label'=>'Id:', 'class'=>'form-control', 'placeholder'=>'id'));?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('title', array('type'=>'text','label'=>'Título da Página:', 'class'=>'input-lg form-control'));?>
	</div>

	<div class="form-group">
		<?php
			echo $this->Form->input('status', array( 'type'=>'select', 'options' => array(0=>'Rascunho',1=>'Publicado'), 'class'=>'form-control', 'label' =>'Status:'));
		?>
	</div>

	<div class="form-group">
		<?php echo $this->Form->input('body', array('label'=>'Conteúdo:', 'class'=>'editor form-control', 'placeholder'=>'body'));?>
	</div>

	<div class="pull-left">
		<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Save data', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
	</div>
<?php echo $this->Form->end(); ?>