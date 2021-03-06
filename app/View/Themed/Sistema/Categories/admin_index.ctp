<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
			<div class="box-header">
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i> New Category'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>
			<div class="box-body">
				<table id="Categories" class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th class="text-left"><?php echo __("id"); ?></th>
							<th class="text-left"><?php echo __("title"); ?></th>
							<th class="text-left"><?php echo __("slug"); ?></th>
							<th class="text-left"><?php echo __("created"); ?></th>
							<th class="text-left"><?php echo __("Updated"); ?></th>
							<th width="60" class="text-left"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($categories as $category): ?>
							<tr>
								<td class="text-left"><?php echo h($category['Category']['id']); ?></td>
								<td class="text-left"><?php echo h($category['Category']['title']); ?></td>
								<td class="text-left"><?php echo h($category['Category']['slug']); ?></td>
								<td class="text-left"><?php echo $this->Formatacao->dataHora($category['Category']['created']); ?></td>
								<td class="text-left"><?php echo $this->Formatacao->dataHora($category['Category']['updated']); ?></td>
								<td class="text-left">
									<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $category['Category']['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
									<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $category['Category']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
									<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $category['Category']['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
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
		$("#Categories").dataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
			}

		});
	});
</script>
