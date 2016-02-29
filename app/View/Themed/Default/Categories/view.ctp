
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php  echo __('Category'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $category['Category']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>

			<div class="box-body table-responsive">
				<table id="Categories" class="table table-bordered table-striped">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Title'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['title']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Slug'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['slug']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Description'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['description']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
		<td>
			<?php echo h($category['Category']['modified']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table>
			</div>
		</div>

		
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?php echo __('Related News'); ?></h3>
					<div class="box-tools pull-right">
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New News'), array('controller' => 'news', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>					</div><!-- /.actions -->
				</div>
				<?php if (!empty($category['News'])): ?>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
											<th class="text-center"><?php echo __('Id'); ?></th>
		<th class="text-center"><?php echo __('Title'); ?></th>
		<th class="text-center"><?php echo __('Slug'); ?></th>
		<th class="text-center"><?php echo __('Summary'); ?></th>
		<th class="text-center"><?php echo __('Body'); ?></th>
		<th class="text-center"><?php echo __('Ext'); ?></th>
		<th class="text-center"><?php echo __('Data'); ?></th>
		<th class="text-center"><?php echo __('Status'); ?></th>
		<th class="text-center"><?php echo __('Created'); ?></th>
		<th class="text-center"><?php echo __('Modified'); ?></th>
		<th class="text-center"><?php echo __('Featured'); ?></th>
		<th class="text-center"><?php echo __('Thumb'); ?></th>
									<th class="text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
									$i = 0;
									foreach ($category['News'] as $news): ?>
		<tr>
			<td class="text-center"><?php echo $news['id']; ?></td>
			<td class="text-center"><?php echo $news['title']; ?></td>
			<td class="text-center"><?php echo $news['slug']; ?></td>
			<td class="text-center"><?php echo $news['summary']; ?></td>
			<td class="text-center"><?php echo $news['body']; ?></td>
			<td class="text-center"><?php echo $news['ext']; ?></td>
			<td class="text-center"><?php echo $news['data']; ?></td>
			<td class="text-center"><?php echo $news['status']; ?></td>
			<td class="text-center"><?php echo $news['created']; ?></td>
			<td class="text-center"><?php echo $news['modified']; ?></td>
			<td class="text-center"><?php echo $news['featured']; ?></td>
			<td class="text-center"><?php echo $news['thumb']; ?></td>
			<td class="text-center">
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'news', 'action' => 'view', $news['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'news', 'action' => 'edit', $news['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
				<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'news', 'action' => 'delete', $news['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $news['id'])); ?>
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
