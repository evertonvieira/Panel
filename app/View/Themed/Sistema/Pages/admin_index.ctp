<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
			<div class="box-header">
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i> New Page'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>
			<div class="box-body">
				<table id="Pages" class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th class="text-left"><?php echo __("id"); ?></th>
							<th class="text-left"><?php echo __("title"); ?></th>
							<th class="text-left"><?php echo __("slug"); ?></th>
							<th class="text-left"><?php echo __("created"); ?></th>
							<th class="text-left"><?php echo __("updated"); ?></th>
							<th class="text-left"><?php echo __("status"); ?></th>
							<th width="60" class="text-left"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pages as $page): ?>
							<tr>
								<td class="text-left"><?php echo h($page['Page']['id']); ?></td>
								<td class="text-left"><?php echo h($page['Page']['title']); ?></td>
								<td class="text-left"><?php echo h($page['Page']['slug']); ?></td>
								<td class="text-left"><?php echo $this->Formatacao->dataHora($page['Page']['created']); ?></td>
								<td class="text-left"><?php echo $this->Formatacao->dataHora($page['Page']['updated']); ?></td>
								<td class="text-left"><?php echo $this->Formatacao->visivel($page['Page']['status']); ?></td>
								<td class="text-left">
									<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $page['Page']['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
									<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $page['Page']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
									<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $page['Page']['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $page['Page']['id'])); ?>
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
		$("#Pages").dataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
			}

		});
	});
</script>
