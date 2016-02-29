
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php  echo __('News'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $news['News']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table id="News" class="table table-bordered table-striped">
					<tbody>
						<tr>
							<td><strong><?php echo __('Id'); ?></strong></td>
							<td>
								<?php echo h($news['News']['id']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Title'); ?></strong></td>
							<td>
								<?php echo h($news['News']['title']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Slug'); ?></strong></td>
							<td>
								<?php echo h($news['News']['slug']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Summary'); ?></strong></td>
							<td>
								<?php echo h($news['News']['summary']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Body'); ?></strong></td>
							<td>
								<?php echo h($news['News']['body']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Ext'); ?></strong></td>
							<td>
								<?php echo h($news['News']['ext']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Data'); ?></strong></td>
							<td>
								<?php echo $news['News']['data']; ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Status'); ?></strong></td>
							<td>
								<?php echo $this->Formatacao->visivel($news['News']['status']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Created'); ?></strong></td>
							<td>
								<?php echo $this->Formatacao->dataHora($news['News']['created']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Modified'); ?></strong></td>
							<td>
								<?php echo $this->Formatacao->dataHora($news['News']['modified']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Featured'); ?></strong></td>
							<td>
								<?php echo $this->Formatacao->featured($news['News']['featured']); ?>
								&nbsp;
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>


			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title"><?php echo __('Related Categories'); ?></h3>
					<div class="box-tools pull-right">
						<?php echo $this->Html->link('<i class="glyphicon glyphicon-plus"></i> '.__('New Category'), array('controller' => 'categories', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>					</div><!-- /.actions -->
				</div>
				<?php if (!empty($news['Category'])): ?>
					<div class="box-body table-responsive">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th class="text-center"><?php echo __('Id'); ?></th>
									<th class="text-center"><?php echo __('Title'); ?></th>
									<th class="text-center"><?php echo __('Slug'); ?></th>
									<th class="text-center"><?php echo __('Created'); ?></th>
									<th class="text-center"><?php echo __('Modified'); ?></th>
									<th class="text-center"><?php echo __('Actions'); ?></th>
								</tr>
							</thead>
							<tbody>
									<?php
									$i = 0;
									foreach ($news['Category'] as $category): ?>
									<tr>
										<td class="text-center"><?php echo $category['id']; ?></td>
										<td class="text-center"><?php echo $category['title']; ?></td>
										<td class="text-center"><?php echo $category['slug']; ?></td>
										<td class="text-center"><?php echo $this->Formatacao->dataHora($category['created']); ?></td>
										<td class="text-center"><?php echo $this->Formatacao->dataHora($category['modified']); ?></td>
										<td class="text-center">
											<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('controller' => 'categories', 'action' => 'view', $category['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
											<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i>'), array('controller' => 'categories', 'action' => 'edit', $category['id']), array('class' => 'btn btn-warning btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'edit')); ?>
											<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('controller' => 'categories', 'action' => 'delete', $category['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $category['id'])); ?>
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
