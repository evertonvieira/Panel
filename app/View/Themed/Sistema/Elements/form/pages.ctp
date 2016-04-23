<div class="row">
	<div class="panel-body">
		<?php echo $this->Form->create('Page', array('role' => 'form')); ?>
			<div class="col-md-9">
				<?php echo $this->Form->input('id', array('label'=>'Id:', 'class'=>'form-control', 'placeholder'=>'id'));?>
				<div class="form-group">
					<?php echo $this->Form->input('title', array('type'=>'text','label'=>__('Title'), 'class'=>'input-lg form-control'));?>
				</div>

				<div class="form-group">
					<?php echo $this->Form->input('body', array('label'=>__('Body'), 'class'=>'editor form-control', 'placeholder'=>'body'));?>
				</div>
			</div>
			<div class="col-md-3">
				<h4><?php echo __d('O', 'Configurações da página:'); ?></h4>
				<div class="form-group">
					<label><?php echo __d('O', 'Parent'); ?></label>
					<?php
						echo $this->Form->input('parent_id', array('class'=>'form-control', 'label'=>false, 'empty'=>'Selecione'));
					?>
				</div>
				<div class="form-group">
					<label><?php echo __d('O', 'View'); ?></label>
					<?php
						echo $this->Form->input('view', array('class'=>'form-control', 'label'=>false,));
					?>
				</div>
				<div class="form-group">
					<label><?php echo __d('O', 'Layout'); ?></label>
					<?php
						echo $this->Form->input('layout', array('class'=>'form-control', 'label'=>false,));
					?>
				</div>
				<div class="form-group">
					<?php
						echo $this->Form->input('status', array('type'=>'select', 'options' => array(0=>'Rascunho',1=>'Publicado'), 'class'=>'form-control', 'label' =>__('Status')));
					?>
				</div>
				<?php
					echo $this->Seo->form();
				?>
			</div>
			<div class="col-md-12">
				<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Salvar', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
			</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>