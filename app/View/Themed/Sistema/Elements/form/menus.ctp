<?php echo $this->Form->create('Menu', array('role'=>'form')); ?>
	<div class="form-group">
		<?php echo $this->Form->input('id');?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('name', array('type'=>'text','label'=>'Título do Menu:', 'class'=>'input-lg form-control'));?>
	</div>
	<div class="pull-left">
		<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Save data', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
	</div>
<?php echo $this->Form->end(); ?>
