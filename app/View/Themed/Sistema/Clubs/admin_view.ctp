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
	</div>
</div>
