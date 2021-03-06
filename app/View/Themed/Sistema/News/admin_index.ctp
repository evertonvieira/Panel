<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
			<div class="box-header">
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i> Novo Post'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
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
							<th class="text-left"><?php echo __("updated"); ?></th>
							<th width="100" class="text-left"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($news as $news): ?>
							<tr>
								<td class="text-left"><?php echo h($news['News']['id']); ?></td>
								<td class="text-left"><?php echo h($news['News']['title']); ?></td>
								<td class="text-left"><?php echo h($news['News']['slug']); ?></td>
								<td class="text-left"><?php echo $news['News']['data']; ?></td>
								<td class="text-left"><?php echo $this->Formatacao->visivel($news['News']['status']); ?></td>
								<td class="text-left"><?php echo $this->Formatacao->featured($news['News']['featured']); ?></td>
								<td class="text-left"><?php echo $this->Formatacao->dataHora($news['News']['created']); ?></td>
								<td class="text-left"><?php echo $this->Formatacao->dataHora($news['News']['updated']); ?></td>
								<td class="text-left">
									<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-picture"></i>'), array('controller'=>'news','action' => 'images', $news['News']['id']), array('class' => 'btn btn-info btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
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
