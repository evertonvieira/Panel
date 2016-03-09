<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php  echo __('Club Category'); ?></h3>
				<div class="box-tools pull-right">
					<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-pencil"></i> Edit'), array('action' => 'edit', $clubCategory['ClubCategory']['id']), array('class' => 'btn btn-primary', 'escape' => false)); ?>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table id="ClubCategories" class="table table-bordered table-striped">
					<tbody>
						<tr>
							<td><strong><?php echo __('Id'); ?></strong></td>
							<td>
								<?php echo h($clubCategory['ClubCategory']['id']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Title'); ?></strong></td>
							<td>
								<?php echo h($clubCategory['ClubCategory']['title']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Slug'); ?></strong></td>
							<td>
								<?php echo h($clubCategory['ClubCategory']['slug']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Created'); ?></strong></td>
							<td>
								<?php echo h($clubCategory['ClubCategory']['created']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Updated'); ?></strong></td>
							<td>
								<?php echo h($clubCategory['ClubCategory']['updated']); ?>
								&nbsp;
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
