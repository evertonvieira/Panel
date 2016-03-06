
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php  echo __('Player'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $player['Player']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>

			<div class="box-body table-responsive">
				<table id="Players" class="table table-bordered table-striped">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Apelido'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['apelido']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Data Nascimento'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['data_nascimento']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('N Contrato'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['n_contrato']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Sexo'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['sexo']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nacionalidade'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['nacionalidade']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Filiacao Pai'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['filiacao_pai']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Filiacao Mae'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['filiacao_mae']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Escolaridade'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['escolaridade']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Identidade'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['identidade']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Orgao Identidade'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['orgao_identidade']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('N Carteira'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['n_carteira']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Carteira Serie'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['carteira_serie']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('N Certidao Nascimento'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['n_certidao_nascimento']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nascimento Cartorio'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['nascimento_cartorio']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nascimento Livro'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['nascimento_livro']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nascimento Folha'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['nascimento_folha']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Militar N'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['militar_n']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Militar Ministerio'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['militar_ministerio']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cidade'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['cidade']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Uf'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['uf']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Logradouro'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['logradouro']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Bairro'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['bairro']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('N Casa'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['n_casa']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Cep'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['cep']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Telefone'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['telefone']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Data Pagamento'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['data_pagamento']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Updated'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['updated']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table>
			</div>
		</div>

		
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?php echo __('Related Payments'); ?></h3>
					<div class="box-tools pull-right">
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Payments'), array('controller' => 'payments', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>					</div><!-- /.actions -->
				</div>
				<?php if (!empty($player['Payments'])): ?>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
											<th class="text-center"><?php echo __('Id'); ?></th>
		<th class="text-center"><?php echo __('Data'); ?></th>
		<th class="text-center"><?php echo __('Created'); ?></th>
		<th class="text-center"><?php echo __('Updated'); ?></th>
		<th class="text-center"><?php echo __('Status'); ?></th>
		<th class="text-center"><?php echo __('Valor'); ?></th>
		<th class="text-center"><?php echo __('Obs'); ?></th>
		<th class="text-center"><?php echo __('Players Id'); ?></th>
									<th class="text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
									$i = 0;
									foreach ($player['Payments'] as $payments): ?>
		<tr>
			<td class="text-center"><?php echo $payments['id']; ?></td>
			<td class="text-center"><?php echo $payments['data']; ?></td>
			<td class="text-center"><?php echo $payments['created']; ?></td>
			<td class="text-center"><?php echo $payments['updated']; ?></td>
			<td class="text-center"><?php echo $payments['status']; ?></td>
			<td class="text-center"><?php echo $payments['valor']; ?></td>
			<td class="text-center"><?php echo $payments['obs']; ?></td>
			<td class="text-center"><?php echo $payments['players_id']; ?></td>
			<td class="text-center">
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'payments', 'action' => 'view', $payments['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'payments', 'action' => 'edit', $payments['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
				<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'payments', 'action' => 'delete', $payments['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $payments['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php endif; ?>

			</div>
			</div>
</div>
