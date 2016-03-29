<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-header">
				<div class="box-tools pull-right">
					<?php
						if (!$contact['Contact']['status']){
							echo $this->Form->postLink(__('<i class="glyphicon glyphicon-saved"></i> Marcar como lido'), array('action' => 'read', $contact['Contact']['id']), array('class' => 'btn btn-primary', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'Marcar como lido'), __('Tem certeza que quer marcar isto como lido #%s?', $contact['Contact']['id']));
						}
					?>
					<a class="btn btn-primary" title="Responder e-mail" href="mailto:<?php echo h($contact['Contact']['email']); ?>"><i class="glyphicon glyphicon-envelope"></i> Responder</a>
				</div>
			</div>
			<div class="box-body table-responsive">
				<table id="Contacts" class="table table-bordered table-striped">
					<tbody>
						<tr>
							<td><strong><?php echo __('Id'); ?></strong></td>
							<td>
								<?php echo h($contact['Contact']['id']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Name'); ?></strong></td>
							<td>
								<?php echo h($contact['Contact']['name']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Email'); ?></strong></td>
							<td>
								<?php echo h($contact['Contact']['email']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Subject'); ?></strong></td>
							<td>
								<?php echo h($contact['Contact']['subject']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Message'); ?></strong></td>
							<td>
								<?php echo h($contact['Contact']['message']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Status'); ?></strong></td>
							<td>
								<?php echo $this->Formatacao->featured($contact['Contact']['status']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Created'); ?></strong></td>
							<td>
								<?php echo $this->Formatacao->dataHora($contact['Contact']['created']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Updated'); ?></strong></td>
							<td>
								<?php echo $this->Formatacao->dataHora($contact['Contact']['updated']); ?>
								&nbsp;
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
