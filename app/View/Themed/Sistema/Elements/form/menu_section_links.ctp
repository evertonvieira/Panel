<?php echo $this->Form->create('MenuSectionLink', array('role'=>'form')); ?>
	<div class="form-group">
		<?php echo $this->Form->input('id');?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('name', array('type'=>'text','label'=>'Título do Menu:', 'class'=>'input-lg form-control'));?>
	</div>
	<div class="form-group">
		<label><?php echo __d('O', 'Alias'); ?></label>
		<?php
			echo $this->Form->input('alias', array('class'=>'form-control', 'label'=>false));
		?>
	</div>
	<div class="form-group">
		<label><?php echo __d('O', 'Menu Section'); ?></label>
		<?php
			echo $this->Form->input('menu_section_id', array('class'=>'form-control', 'label'=>false));
		?>
	</div>
	<div class="pull-left">
		<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Save data', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
	</div>
<?php echo $this->Form->end(); ?>
