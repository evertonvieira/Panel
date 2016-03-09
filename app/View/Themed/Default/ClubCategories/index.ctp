<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Club Categories'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i> New Club Category'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>
			<div class="box-body">
				<table id="ClubCategories" class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
													<th class="text-left"><?php echo __("id"); ?></th>
													<th class="text-left"><?php echo __("title"); ?></th>
													<th class="text-left"><?php echo __("slug"); ?></th>
													<th class="text-left"><?php echo __("created"); ?></th>
													<th class="text-left"><?php echo __("updated"); ?></th>
													<th class="text-left"><?php echo __("club_id"); ?></th>
													<th width="60" class="text-left"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($clubCategories as $clubCategory): ?>
	<tr>
		<td class="text-left"><?php echo h($clubCategory['ClubCategory']['id']); ?>&nbsp;</td>
		<td class="text-left"><?php echo h($clubCategory['ClubCategory']['title']); ?>&nbsp;</td>
		<td class="text-left"><?php echo h($clubCategory['ClubCategory']['slug']); ?>&nbsp;</td>
		<td class="text-left"><?php echo h($clubCategory['ClubCategory']['created']); ?>&nbsp;</td>
		<td class="text-left"><?php echo h($clubCategory['ClubCategory']['updated']); ?>&nbsp;</td>
		<td class="text-center">
			<?php echo $this->Html->link($clubCategory['Club']['name'], array('controller' => 'clubs', 'action' => 'view', $clubCategory['Club']['id'])); ?>
		</td>
		<td class="text-left">
			<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $clubCategory['ClubCategory']['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
			<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('action' => 'edit', $clubCategory['ClubCategory']['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
			<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $clubCategory['ClubCategory']['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $clubCategory['ClubCategory']['id'])); ?>
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
		$("#ClubCategories").dataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
			}

		});
	});
</script>
