<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php  echo __('Menus'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $menuSection['MenuSection']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table id="News" class="table table-bordered table-striped">
					<tbody>
						<tr>
							<td><strong><?php echo __('Id'); ?></strong></td>
							<td>
								<?php echo h($menuSection['MenuSection']['id']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Name'); ?></strong></td>
							<td>
								<?php echo h($menuSection['MenuSection']['name']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Name'); ?></strong></td>
							<td>
								<?php echo $this->Html->link($menuSection['Menu']['name'], array('controller' => 'menus', 'action' => 'view', $menuSection['Menu']['id'])); ?>
								&nbsp;
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Related Menu Section Links'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Menu Section Link'), array('controller' => 'menu_section_links', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>					</div><!-- /.actions -->
				</div>
			<?php if (!empty($menuSection['MenuSectionLink'])): ?>
				<div  class="box-body table-responsive">
					<table id="MenuSectionLink" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center"><?php echo __('Id'); ?></th>
								<th class="text-center"><?php echo __('Name'); ?></th>
								<th class="text-center"><?php echo __('Alias'); ?></th>
								<th class="text-center"><?php echo __('Menu Section Id'); ?></th>
								<th class="text-center"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
								$i = 0;
								foreach ($menuSection['MenuSectionLink'] as $MenuSectionLink): ?>
								<tr>
									<td class="text-center"><?php echo $MenuSectionLink['id']; ?></td>
									<td class="text-center"><?php echo $MenuSectionLink['name']; ?></td>
									<td class="text-center"><?php echo $MenuSectionLink['alias']; ?></td>
									<td class="text-center"><?php echo $MenuSectionLink['menu_section_id']; ?></td>
									<td width="50" class="dropdown">
										<button type="button" class="btn btn-primary" data-toggle="dropdown">
											<span class="caret">
											</span>&nbsp;<span class="glyphicon glyphicon-cog"></span>
										</button>
										<ul class="dropdown-menu pull-right">
											<li><?php echo $this->Html->link(__d('O','View'), array('controller' => 'menu_section_links', 'action' => 'view', $MenuSectionLink['id'])); ?></li>
											<li><?php echo $this->Html->link(__d('O','Edit'), array('controller' => 'menu_section_links', 'action' => 'edit', $MenuSectionLink['id'])); ?></li>
											<li><?php echo $this->Form->postLink(__d('O','Delete'), array('controller' => 'menu_section_links', 'action' => 'delete', $MenuSectionLink['id']), null, __('Are you sure you want to delete # %s?', $MenuSectionLink['id'])); ?></li>
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
		$("#MenuSectionLink").dataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
			}

		});
	});
</script>