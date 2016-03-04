<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php  echo __('Menus'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $menu['Menu']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table id="News" class="table table-bordered table-striped">
					<tbody>
						<tr>
							<td><strong><?php echo __('Id'); ?></strong></td>
							<td>
								<?php echo h($menu['Menu']['id']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Name'); ?></strong></td>
							<td>
								<?php echo h($menu['Menu']['name']); ?>
								&nbsp;
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Related Menu Sections'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Menu Sections'), array('controller' => 'menu_sections', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>					</div><!-- /.actions -->
				</div>
			<?php if (!empty($menu['MenuSection'])): ?>
				<div  class="box-body table-responsive">
					<table id="MenuSection" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center"><?php echo __('Id'); ?></th>
								<th class="text-center"><?php echo __('Name'); ?></th>
								<th class="text-center"><?php echo __('Menu_id'); ?></th>
								<th class="text-center"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
								$i = 0;
								foreach ($menu['MenuSection'] as $menuSection): ?>
								<tr>
									<td class="text-center"><?php echo $menuSection['id']; ?></td>
									<td class="text-center"><?php echo $menuSection['name']; ?></td>
									<td class="text-center"><?php echo $menuSection['menu_id']; ?></td>
									<td width="50" class="dropdown">
										<button type="button" class="btn btn-primary" data-toggle="dropdown">
											<span class="caret">
											</span>&nbsp;<span class="glyphicon glyphicon-cog"></span>
										</button>
										<ul class="dropdown-menu pull-right">
											<li><?php echo $this->Html->link(__('View'), array('controller' => 'menu_sections', 'action' => 'view', $menuSection['id'])); ?></li>
											<li><?php echo $this->Html->link(__('Edit'), array('controller' => 'menu_sections', 'action' => 'edit', $menuSection['id'])); ?></li>
											<li><?php echo $this->Form->postLink(__('Delete'), array('controller' => 'menu_sections', 'action' => 'delete', $menuSection['id']), null, __('Are you sure you want to delete # %s?', $menuSection['id'])); ?></li>
										</ul>
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

<script type="text/javascript">
	$(function() {
		$("#MenuSection").dataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
			}

		});
	});
</script>
