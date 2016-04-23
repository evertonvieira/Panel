<div class="row">
	<div class="panel-body">
		<div class="col-md-12">
			<?php echo $this->Form->create('Menu', array('role'=>'form')); ?>
			<?php echo $this->Form->input('id');?>
			<div class="form-group">
				<?php echo $this->Form->input('name', array('type'=>'text','label'=>'Título do Menu:', 'class'=>'input-lg form-control'));?>
			</div>
		</div>
		<div class="col-md-12">
			<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Salvar', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>