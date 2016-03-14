<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php  echo __('Championship'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $championship['Championship']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table id="Championships" class="table table-bordered table-striped">
					<tbody>
						<tr>
							<td><strong><?php echo __('Id'); ?></strong></td>
							<td>
								<?php echo h($championship['Championship']['id']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Created'); ?></strong></td>
							<td>
								<?php echo $this->Formatacao->dataHora($championship['Championship']['created']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Updated'); ?></strong></td>
							<td>
								<?php echo $this->Formatacao->dataHora($championship['Championship']['updated']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Title'); ?></strong></td>
							<td>
								<?php echo h($championship['Championship']['title']); ?>
								&nbsp;
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Related Phases'); ?> </h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Phase'), array('controller' => 'phases', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div><!-- /.actions -->
			</div>
			<?php if (!empty($championship['Phase'])): ?>
				<div class="box-body table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center"><?php echo __('Id'); ?></th>
								<th class="text-center"><?php echo __('Ano'); ?></th>
								<th class="text-center"><?php echo __('Title'); ?></th>
								<th class="text-center"><?php echo __('Championship'); ?></th>
								<th class="text-center"><?php echo __('Created'); ?></th>
								<th class="text-center"><?php echo __('Updated'); ?></th>
								<th class="text-center"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($championship['Phase'] as $phase):?>
								<tr>
									<td class="text-center"><?php echo $phase['id']; ?></td>
									<td class="text-center"><?php echo $phase['ano']; ?></td>
									<td class="text-center"><?php echo $phase['title']; ?></td>
									<td class="text-center"><?php echo $championship['Championship']['title']; ?></td>
									<td class="text-center"><?php echo $this->Formatacao->dataHora($phase['created']); ?></td>
									<td class="text-center"><?php echo $this->Formatacao->dataHora($phase['updated']); ?></td>
									<td class="text-center">
										<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'phases', 'action' => 'view', $phase['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
										<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'phases', 'action' => 'edit', $phase['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
										<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'phases', 'action' => 'delete', $phase['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $phase['id'])); ?>
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
