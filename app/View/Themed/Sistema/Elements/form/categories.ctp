<?php echo $this->Form->create('Category', array('role' => 'form')); ?>
	<div class="form-group">
		<?php echo $this->Form->input('id', array('label'=>'Id:', 'class'=>'form-control', 'placeholder'=>'id'));?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('title', array('label'=> __('Title'), 'class'=>'form-control input-lg', 'placeholder'=>'title'));?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('description', array('label'=>__('Description'), 'type'=>'textarea', 'class'=>'form-control', 'placeholder'=>'description'));?>
	</div>

	<div class="pull-left">
		<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Save data', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
	</div>
<?php echo $this->Form->end(); ?>