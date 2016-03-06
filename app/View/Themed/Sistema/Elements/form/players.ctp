<?php echo $this->Form->create('Player', array('role' => 'form')); ?>
	<div class="form-group">
		<?php echo $this->Form->input('id', array('label'=>'Id:', 'class'=>'form-control', 'placeholder'=>'id'));?>
	</div>
	<fieldset>
		<legend><strong>REGISTRO:</strong></legend>
		<div class="form-group">
			<?php echo $this->Form->input('name', array('label'=>'Nome do atleta:', 'class'=>'form-control input-lg', 'placeholder'=>'name'));?>
		</div>
		<div class="row">
			<div class="form-group col-lg-4">
				<?php echo $this->Form->input('apelido', array('label'=>'Apelido:', 'class'=>'form-control', 'placeholder'=>'apelido'));?>
			</div>
			<div class="form-group col-lg-4">
				<label class="control-label">Data de nascimento:</label>
				<div class="input-group">
					<?php echo $this->Form->input('data_nascimento', array('label'=>false, 'id'=>'datetimepicker', 'class'=>'date-picker form-control', 'type'=>'text'));?>
					<label for="datetimepicker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>
					</label>
				</div>
			</div>
			<div class="form-group col-lg-4">
				<?php
					echo $this->Form->input('sexo', array( 'type'=>'select', 'options' => array(0=>'Masculino',1=>'Feminino'), 'class'=>'form-control', 'label' =>'Sexo:'));
				?>
			</div>
			<div class="form-group col-lg-4">
				<?php echo $this->Form->input('nacionalidade', array('label'=>'Nacionalidade:', 'class'=>'form-control', 'placeholder'=>'nacionalidade'));?>
			</div>
			<div class="form-group col-lg-4">
				<?php echo $this->Form->input('telefone', array('label'=>'Telefone:', 'class'=>'form-control', 'id'=>'telefone'));?>
			</div>
			<div class="form-group col-lg-4">
				<?php
					echo $this->Form->input('escolaridade', array( 'type'=>'select', 'options' => array(0=>'Fundamental',1=>'Médio', 2=>'Superior', 3=>'Outros'), 'class'=>'form-control', 'label' =>'Escolaridade:'));
				?>
			</div>
		</div>
	</fieldset>
	<fieldset>
		<legend><strong>FILIAÇÃO:</strong></legend>
		<div class="form-group">
			<?php echo $this->Form->input('filiacao_pai', array('label'=>'Nome do pai:', 'class'=>'form-control', 'placeholder'=>'nome do pai'));?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('filiacao_mae', array('label'=>'Nome da Mãe:', 'class'=>'form-control', 'placeholder'=>'nome da mãe'));?>
		</div>
	</fieldset>
	<fieldset>
		<legend><strong>IDENTIDADE:</strong></legend>
		<div class="row">
			<div class="form-group col-lg-6">
				<?php echo $this->Form->input('identidade', array('label'=>'N° da identidade:', 'class'=>'form-control', 'id'=>'identidade'));?>
			</div>
			<div class="form-group col-lg-6">
				<?php echo $this->Form->input('orgao_identidade', array('label'=>'Orgão Expedidor:', 'class'=>'form-control', 'placeholder'=>'orgão expedidor'));?>
			</div>
		</div>
	</fieldset>
	<fieldset>
		<legend><strong>CARTEIRA DE TRABALHO:</strong></legend>
		<div class="row">
			<div class="form-group col-lg-6">
				<?php echo $this->Form->input('n_carteira', array('label'=>'N° da carteira:', 'class'=>'form-control', 'placeholder'=>'n° da carteira'));?>
			</div>
			<div class="form-group col-lg-6">
				<?php echo $this->Form->input('carteira_serie', array('label'=>'Série:', 'class'=>'form-control', 'placeholder'=>'série'));?>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend><strong>CERTIFICADO MILITAR:</strong></legend>
		<div class="row">
			<div class="form-group col-lg-6">
				<?php echo $this->Form->input('militar_n', array('label'=>'Número:', 'class'=>'form-control', 'placeholder'=>'número'));?>
			</div>
			<div class="form-group col-lg-6">
				<?php echo $this->Form->input('militar_ministerio', array('label'=>'Ministério:', 'class'=>'form-control', 'placeholder'=>'ministério'));?>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend><strong>CERTIDÃO DE NASCIMENTO:</strong></legend>
		<div class="row">
			<div class="form-group col-lg-4">
				<?php echo $this->Form->input('n_certidao_nascimento', array('label'=>'Número:', 'class'=>'form-control', 'placeholder'=>'número'));?>
			</div>
			<div class="form-group col-lg-4">
				<?php echo $this->Form->input('nascimento_cartorio', array('label'=>'Cartório:', 'class'=>'form-control', 'placeholder'=>'cartório'));?>
			</div>
			<div class="form-group col-lg-2">
				<?php echo $this->Form->input('nascimento_livro', array('label'=>'Livro:', 'class'=>'form-control', 'placeholder'=>'livro'));?>
			</div>
			<div class="form-group col-lg-2">
				<?php echo $this->Form->input('nascimento_folha', array('label'=>'Folha:', 'class'=>'form-control', 'placeholder'=>'folha'));?>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend><strong>ENDEREÇO:</strong></legend>
		<div class="row">
			<div class="form-group col-lg-2">
				<?php echo $this->Form->input('cep', array('label'=>'Cep:', 'id'=>'cep', 'class'=>'form-control'));?>
			</div>
			<div class="form-group col-lg-5">
				<?php echo $this->Form->input('logradouro', array('label'=>'Logradouro:', 'class'=>'form-control','id'=>'logradouro', 'placeholder'=>'logradouro'));?>
			</div>
			<div class="form-group col-lg-5">
				<?php echo $this->Form->input('cidade', array('label'=>'Cidade:', 'class'=>'form-control', 'id'=>'cidade', 'placeholder'=>'cidade'));?>
			</div>
			<div class="form-group col-lg-5">
				<?php echo $this->Form->input('uf', array('label'=>'UF:', 'class'=>'form-control', 'id'=>'estado', 'placeholder'=>'estado'));?>
			</div>
			<div class="form-group col-lg-5">
				<?php echo $this->Form->input('bairro', array('label'=>'Bairro:', 'class'=>'form-control', 'id'=>'bairro', 'placeholder'=>'bairro'));?>
			</div>
			<div class="form-group col-lg-2">
				<?php echo $this->Form->input('n_casa', array('label'=>'Número:', 'class'=>'form-control', 'placeholder'=>'número'));?>
			</div>
		</div>
	</fieldset>
	<div class="row">
		<div class="form-group col-lg-6">
			<?php echo $this->Form->input('n_contrato', array('label'=>'N° do contrato:', 'class'=>'form-control', 'placeholder'=>'número'));?>
		</div>
		<div class="form-group col-lg-6">
			<label class="control-label">Data do pagamento da mensalidade:</label>
			<div class="input-group">
				<?php echo $this->Form->input('data_pagamento', array('label'=>false, 'id'=>'contrato', 'class'=>'date-picker form-control', 'type'=>'text'));?>
				<label for="contrato" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span>
				</label>
			</div>
		</div>
	</div>
	<div class="pull-left">
		<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Save data', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
	</div>
<?php echo $this->Form->end(); ?>