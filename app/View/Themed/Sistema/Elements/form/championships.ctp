<?php echo $this->Form->create('Championship', array('role' => 'form')); ?>
	<div class="form-group">
		<?php echo $this->Form->input('title', array('label'=>'Title:', 'class'=>'form-control input-lg', 'placeholder'=>'title'));?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('Phase', array('label'=>'Fases do campeonato:','multiple' =>'checkbox','type' => 'select'));?>
	</div>
	<div class="pull-left">
		<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Save data', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
	</div>
<?php echo $this->Form->end(); ?>