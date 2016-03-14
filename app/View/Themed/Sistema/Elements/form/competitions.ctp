<?php echo $this->Form->create('Competition', array('role' => 'form')); ?>
	<div class="row">
		<div class="form-group col-lg-4">
			<?php echo $this->Form->input('estadio', array('label'=>'Estadio:', 'class'=>'form-control', 'placeholder'=>'estadio'));?>
		</div>
		<div class="form-group col-lg-4">
			<?php echo $this->Form->input('championship_id', array('label'=>'Campeonato:', 'class'=>'form-control', 'placeholder'=>'championship_id'));?>
		</div>
		<div class="form-group col-lg-4">
			<?php echo $this->Form->input('data', array('label'=>'Data:', 'class'=>'form-control', 'type'=>'text', 'id'=>'datajogo'));?>
		</div>
	</div>
		<hr />
		<div class="row">
			<div class="form-group col-lg-4">
				<?php echo $this->Form->input('Club', array('label'=>'Clubes:','multiple' =>'checkbox','type' => 'select'));?>
			</div>
			<div class="form-group col-lg-3">
				<?php echo $this->Form->input('score_first', array('label'=>"Primeiro placar:", 'class'=>'form-control', 'id'=>'placar1', 'type'=>'number', 'placeholder'=>'placar'));?>
			</div>
			<div class="form-group col-lg-2 vezes">
				<p>x</p>
			</div>
			<div class="form-group col-sm-3">
				<?php echo $this->Form->input('score_second', array('label'=>"Segundo placar:", 'class'=>'form-control', 'id'=>'placar2', 'type'=>'number', 'placeholder'=>'placar'));?>
			</div>
		</div>

	<div class="pull-left">
		<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Save data', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
	</div>
<?php echo $this->Form->end(); ?>
