<?php echo $this->Form->create('News', array('role' => 'form', 'type'=>'file')); ?>
	<div class="form-group">
		<?php echo $this->Form->input('id', array('label'=>'Id:', 'class'=>'form-control', 'placeholder'=>'id'));?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('title', array('label'=>'Title:', 'class'=>'form-control input-lg', 'placeholder'=>'title'));?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('body', array('label'=>'Conteúdo:', 'class'=>'editor form-control', 'placeholder'=>'body'));?>
	</div>
	<div class="form-group">
		<?php echo $this->Form->input('summary', array('label'=>'Summary:', 'type'=>'textarea', 'rows'=>'3', 'class'=>'form-control', 'placeholder'=>'summary'));?>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<?php
					echo $this->Form->input('status', array( 'type'=>'select', 'options' => array(0=>'Rascunho',1=>'Publicado'), 'class'=>'form-control', 'label' =>'Status:'));
				?>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('featured', array( 'type'=>'select', 'options' => array(0=>'Sim',1=>'Não'), 'class'=>'form-control', 'label' =>'Featured:'));
				?>
			</div>
		</div>
		<div class="col-md-6">

			<div class="form-group">
				<label class="control-label">Data a ser publicado:</label>
				<div class="input-group">
					<?php echo $this->Form->input('data', array('label'=>false, 'id'=>'datetimepicker', 'class'=>'date-picker form-control', 'type'=>'text'));?>
					<label for="datetimepicker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>
					</label>
				</div>
			</div>
			<div class="form-group">
				<?php
					echo $this->Form->input('imagem', array( 'type'=>'file', 'class'=>'form-control', 'label' =>'Imagem:'));
				?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('Category', array('label'=>'Category:','multiple' =>'checkbox','type' => 'select'));?>
			</div>
		</div>
	</div>

	<div class="pull-left">
		<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Save data', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
	</div>
<?php echo $this->Form->end(); ?>