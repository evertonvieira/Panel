
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php  echo __('Page'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $page['Page']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>

			<div class="box-body table-responsive">
				<table id="Pages" class="table table-bordered table-striped">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($page['Page']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Title'); ?></strong></td>
		<td>
			<?php echo h($page['Page']['title']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Slug'); ?></strong></td>
		<td>
			<?php echo h($page['Page']['slug']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Data'); ?></strong></td>
		<td>
			<?php echo h($page['Page']['data']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Body'); ?></strong></td>
		<td>
			<?php echo h($page['Page']['body']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Summary'); ?></strong></td>
		<td>
			<?php echo h($page['Page']['summary']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($page['Page']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($page['Page']['modified']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table>
			</div>
		</div>

			</div>
</div>
