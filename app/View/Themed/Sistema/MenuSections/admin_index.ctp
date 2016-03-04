<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Menu Sections'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-plus"></i> New Menu Section'), array('action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>
			<div class="box-body">
				<table id="MenusSection" class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th class="text-left"><?php echo __("id"); ?></th>
							<th class="text-left"><?php echo __("name"); ?></th>
							<th class="text-left"><?php echo __("menu id"); ?></th>
							<th width="60" class="text-left"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($menuSections as $menuSection): ?>
							<tr>
								<td class="text-left"><?php echo h($menuSection['MenuSection']['id']); ?>&nbsp;</td>
								<td class="text-left"><?php echo h($menuSection['MenuSection']['name']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link($menuSection['Menu']['name'], array('controller' => 'menus', 'action' => 'view', $menuSection['Menu']['id'])); ?>
								</td>
								<td width="50" class="dropdown">
									<button type="button" class="btn btn-primary" data-toggle="dropdown">
										<span class="caret">
										</span>&nbsp;<span class="glyphicon glyphicon-cog"></span>
									</button>
									<ul class="dropdown-menu pull-right">
										<li><?php echo $this->Html->link(__d('O','View'), array('action' => 'view', $menuSection['MenuSection']['id'])); ?></li>
										<li><?php echo $this->Html->link(__d('O','Edit'), array('action' => 'edit', $menuSection['MenuSection']['id'])); ?></li>
										<li><?php echo $this->Form->postLink(__d('O','Delete'), array('action' => 'delete', $menuSection['MenuSection']['id']), null, __('Are you sure you want to delete # %s?', $menuSection['MenuSection']['id'])); ?></li>
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
		$("#MenusSection").dataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
			}

		});
	});
</script>

