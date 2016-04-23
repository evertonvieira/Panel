<div class="row">
	<div class="panel-body">
		<?php echo $this->Form->create('Category', array('role' => 'form')); ?>
		<div class="col-md-9">
			<div class="form-group">
				<?php echo $this->Form->input('id', array('label'=>'Id:', 'class'=>'form-control', 'placeholder'=>'id'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('title', array('label'=> __('Title'), 'class'=>'form-control input-lg', 'placeholder'=>'title'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('description', array('label'=>__('Description'), 'type'=>'textarea', 'class'=>'form-control', 'placeholder'=>'description'));?>
			</div>
			<?php
				echo $this->Seo->form();
			?>
		</div>
		<div class="col-md-3">
			<h4><?php echo __d('O', 'Configurações da categoria:'); ?></h4>
			<div class="form-group">
				<label><?php echo __d('O', 'Categoria Pai'); ?></label>
				<?php
					echo $this->Form->input('parent_id', array('class'=>'form-control', 'label'=>false,));
				?>
			</div>
			<div class="form-group">
				<label><?php echo __d('O', 'Layout'); ?></label>
				<?php
					echo $this->Form->input('layout', array('class'=>'form-control', 'label'=>false,));
				?>
			</div>
			<div class="form-group">
				<label><?php echo __d('O', 'View'); ?></label>
				<?php
					echo $this->Form->input('view', array('class'=>'form-control', 'label'=>false,));
				?>
			</div>
		</div>
		<div class="col-md-12">
			<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Salvar', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>