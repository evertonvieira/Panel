<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Menus'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i> New Menu'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>
			<div class="box-body">
				<table id="Menus" class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th class="text-left"><?php echo __("id"); ?></th>
							<th class="text-left"><?php echo __("name"); ?></th>
							<th width="60" class="text-left"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($menus as $menu): ?>
							<tr>
								<td class="text-left"><?php echo h($menu['Menu']['id']); ?>&nbsp;</td>
								<td class="text-left"><?php echo h($menu['Menu']['name']); ?>&nbsp;</td>
								<td width="50" class="dropdown">
									<button type="button" class="btn btn-primary" data-toggle="dropdown">
										<span class="caret">
										</span>&nbsp;<span class="glyphicon glyphicon-cog"></span>
									</button>
									<ul class="dropdown-menu pull-right">
										<li><?php echo $this->Html->link(__('View'), array('action' => 'view', $menu['Menu']['id'])); ?></li>
										<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $menu['Menu']['id'])); ?></li>
										<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $menu['Menu']['id']), null, __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?></li>
									</ul>
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
		$("#Menus").dataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
			}

		});
	});
</script>
