<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php  echo __('Club'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $club['Club']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>

			<div class="box-body table-responsive">
				<table id="Clubs" class="table table-bordered table-striped">
					<tbody>
						<tr>
							<td><strong><?php echo __('Id'); ?></strong></td>
							<td>
								<?php echo h($club['Club']['id']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Name'); ?></strong></td>
							<td>
								<?php echo h($club['Club']['name']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Body'); ?></strong></td>
							<td>
								<?php echo $club['Club']['body']; ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Ext'); ?></strong></td>
							<td>
								<?php echo h($club['Club']['ext']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Club Category'); ?></strong></td>
							<td>
								<?php echo h($club['ClubCategory']['title']); ?>
								&nbsp;
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Related Competitions'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Competition'), array('controller' => 'competitions', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>					</div><!-- /.actions -->
			</div>
			<?php if (!empty($club['Competition'])): ?>
				<div class="box-body table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th class="text-center"><?php echo __('Id'); ?></th>
								<th class="text-center"><?php echo __('Data'); ?></th>
								<th class="text-center"><?php echo __('Hora'); ?></th>
								<th class="text-center"><?php echo __('Score'); ?></th>
								<th class="text-center"><?php echo __('Estadio'); ?></th>
								<th class="text-center"><?php echo __('Created'); ?></th>
								<th class="text-center"><?php echo __('Updated'); ?></th>
							<th class="text-center"><?php echo __('Actions'); ?></th>
							</tr>
						</thead>
						<tbody>
								<?php
								$i = 0;
								foreach ($club['Competition'] as $competition): ?>
									<tr>
										<td class="text-center"><?php echo $competition['id']; ?></td>
										<td class="text-center"><?php echo $competition['data']; ?></td>
										<td class="text-center"><?php echo $competition['hora']; ?></td>
										<td class="text-center"><?php echo $competition['score']; ?></td>
										<td class="text-center"><?php echo $competition['estadio']; ?></td>
										<td class="text-center"><?php echo $competition['created']; ?></td>
										<td class="text-center"><?php echo $competition['updated']; ?></td>
										<td class="text-center">
											<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'competitions', 'action' => 'view', $competition['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
											<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'competitions', 'action' => 'edit', $competition['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
											<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'competitions', 'action' => 'delete', $competition['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $competition['id'])); ?>
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
