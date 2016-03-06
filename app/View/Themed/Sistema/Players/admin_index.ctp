<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Players'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i> New Player'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>
			<div class="box-body">
				<table id="Players" class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th class="text-left"><?php echo __("id"); ?></th>
							<th class="text-left"><?php echo __("name"); ?></th>
							<th class="text-left"><?php echo __("apelido"); ?></th>
							<th class="text-left"><?php echo __("data_nascimento"); ?></th>
							<th class="text-left"><?php echo __("telefone"); ?></th>
							<th class="text-left"><?php echo __("data_pagamento"); ?></th>
							<th class="text-left"><?php echo __("created"); ?></th>
							<th class="text-left"><?php echo __("updated"); ?></th>
							<th width="60" class="text-left"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($players as $player): ?>
							<tr>
								<td class="text-left"><?php echo h($player['Player']['id']); ?>&nbsp;</td>
								<td class="text-left"><?php echo h($player['Player']['name']); ?>&nbsp;</td>
								<td class="text-left"><?php echo h($player['Player']['apelido']); ?>&nbsp;</td>
								<td class="text-left"><?php echo h($player['Player']['data_nascimento']); ?>&nbsp;</td>
								<td class="text-left"><?php echo h($player['Player']['telefone']); ?>&nbsp;</td>
								<td class="text-left"><?php echo h($player['Player']['data_pagamento']); ?>&nbsp;</td>
								<td class="text-left"><?php echo $this->Formatacao->dataHora($player['Player']['created']); ?>&nbsp;</td>
								<td class="text-left"><?php echo $this->Formatacao->dataHora($player['Player']['updated']); ?>&nbsp;</td>
								<td class="text-left">
									<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $player['Player']['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
									<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $player['Player']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
									<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $player['Player']['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $player['Player']['id'])); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$("#Players").dataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
			}

		});
	});
</script>