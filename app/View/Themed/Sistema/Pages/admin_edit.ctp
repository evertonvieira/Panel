<div class="row">
	<div class="col-lg-12">
		<div class="box panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo __('Admin Edit Page'); ?></h3>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->create('Page', array('role' => 'form')); ?>
										<div class="form-group">
						<?php echo $this->Form->input('id', array('label'=>'Id:', 'class'=>'form-control', 'placeholder'=>'id'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('title', array('label'=>'Title:', 'class'=>'form-control', 'placeholder'=>'title'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('slug', array('label'=>'Slug:', 'class'=>'form-control', 'placeholder'=>'slug'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('data', array('label'=>'Data:', 'class'=>'form-control', 'placeholder'=>'data'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('body', array('label'=>'Body:', 'class'=>'form-control', 'placeholder'=>'body'));?>
					</div>
					<div class="form-group">
						<?php echo $this->Form->input('summary', array('label'=>'Summary:', 'class'=>'form-control', 'placeholder'=>'summary'));?>
					</div>

					<div class="pull-left">
						<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Save data', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
					</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>