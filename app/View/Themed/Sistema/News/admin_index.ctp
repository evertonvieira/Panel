<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('News'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i> New News'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>
			<div class="box-body">
				<table id="News" class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th class="text-left"><?php echo __("id"); ?></th>
							<th class="text-left"><?php echo __("title"); ?></th>
							<th class="text-left"><?php echo __("slug"); ?></th>
							<th class="text-left"><?php echo __("data"); ?></th>
							<th class="text-left"><?php echo __("status"); ?></th>
							<th class="text-left"><?php echo __("featured"); ?></th>
							<th class="text-left"><?php echo __("created"); ?></th>
							<th class="text-left"><?php echo __("modified"); ?></th>
							<th width="60" class="text-left"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($news as $news): ?>
							<tr>
								<td class="text-left"><?php echo h($news['News']['id']); ?>&nbsp;</td>
								<td class="text-left"><?php echo h($news['News']['title']); ?>&nbsp;</td>
								<td class="text-left"><?php echo h($news['News']['slug']); ?>&nbsp;</td>
								<td class="text-left"><?php echo $news['News']['data']; ?>&nbsp;</td>
								<td class="text-left"><?php echo $this->Formatacao->visivel($news['News']['status']); ?>&nbsp;</td>
								<td class="text-left"><?php echo $this->Formatacao->featured($news['News']['featured']); ?>&nbsp;</td>
								<td class="text-left"><?php echo $this->Formatacao->dataHora($news['News']['created']); ?>&nbsp;</td>
								<td class="text-left"><?php echo $this->Formatacao->dataHora($news['News']['modified']); ?>&nbsp;</td>
								<td class="text-left">
									<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $news['News']['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
									<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $news['News']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
									<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $news['News']['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $news['News']['id'])); ?>
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
		$("#News").dataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
			}

		});
	});
</script>
