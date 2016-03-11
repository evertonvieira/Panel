
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php  echo __('Phase'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $phase['Phase']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>

			<div class="box-body table-responsive">
				<table id="Phases" class="table table-bordered table-striped">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($phase['Phase']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($phase['Phase']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Updated'); ?></strong></td>
		<td>
			<?php echo h($phase['Phase']['updated']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Ano'); ?></strong></td>
		<td>
			<?php echo h($phase['Phase']['ano']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Title'); ?></strong></td>
		<td>
			<?php echo h($phase['Phase']['title']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Championship'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($phase['Championship']['title'], array('controller' => 'championships', 'action' => 'view', $phase['Championship']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table>
			</div>
		</div>

			</div>
</div>
