<div class="row">
	<div class="col-lg-12">
		<div class="box panel panel-primary">
			<div class="panel-heading panel-black">
				<h3 class="panel-title">Add</h3>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->create('Contact', array('role' => 'form')); ?>
										<div class="form-group">
						<?php echo $this->Form->input('name', array('label'=>'Name:', 'class'=>'form-control', 'placeholder'=>'name'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('email', array('label'=>'Email:', 'class'=>'form-control', 'placeholder'=>'email'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('subject', array('label'=>'Subject:', 'class'=>'form-control', 'placeholder'=>'subject'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('message', array('label'=>'Message:', 'class'=>'form-control', 'placeholder'=>'message'));?>
					</div>

					<div class="pull-left">
						<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Save data', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
					</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>