
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php  echo __('Competition'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $competition['Competition']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>

			<div class="box-body table-responsive">
				<table id="Competitions" class="table table-bordered table-striped">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($competition['Competition']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Data'); ?></strong></td>
		<td>
			<?php echo h($competition['Competition']['data']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Estadio'); ?></strong></td>
		<td>
			<?php echo h($competition['Competition']['estadio']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Score First'); ?></strong></td>
		<td>
			<?php echo h($competition['Competition']['score_first']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Score Second'); ?></strong></td>
		<td>
			<?php echo h($competition['Competition']['score_second']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Championship'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($competition['Championship']['title'], array('controller' => 'championships', 'action' => 'view', $competition['Championship']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($competition['Competition']['created']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Updated'); ?></strong></td>
		<td>
			<?php echo h($competition['Competition']['updated']); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table>
			</div>
		</div>

		
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?php echo __('Related Clubs'); ?></h3>
					<div class="box-tools pull-right">
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Club'), array('controller' => 'clubs', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>					</div><!-- /.actions -->
				</div>
				<?php if (!empty($competition['Club'])): ?>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
											<th class="text-center"><?php echo __('Id'); ?></th>
		<th class="text-center"><?php echo __('Name'); ?></th>
		<th class="text-center"><?php echo __('Body'); ?></th>
		<th class="text-center"><?php echo __('Ext'); ?></th>
		<th class="text-center"><?php echo __('Club Category Id'); ?></th>
									<th class="text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
									$i = 0;
									foreach ($competition['Club'] as $club): ?>
		<tr>
			<td class="text-center"><?php echo $club['id']; ?></td>
			<td class="text-center"><?php echo $club['name']; ?></td>
			<td class="text-center"><?php echo $club['body']; ?></td>
			<td class="text-center"><?php echo $club['ext']; ?></td>
			<td class="text-center"><?php echo $club['club_category_id']; ?></td>
			<td class="text-center">
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'clubs', 'action' => 'view', $club['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
				<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'clubs', 'action' => 'edit', $club['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
				<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'clubs', 'action' => 'delete', $club['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $club['id'])); ?>
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
