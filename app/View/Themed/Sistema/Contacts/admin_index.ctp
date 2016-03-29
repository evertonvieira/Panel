<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
			<div class="box-body">
				<table id="Contacts" class="table table-bordered table-striped table-responsive">
					<thead>
						<tr>
							<th class="text-left"><?php echo __("id"); ?></th>
							<th class="text-left"><?php echo __("name"); ?></th>
							<th class="text-left"><?php echo __("email"); ?></th>
							<th class="text-left"><?php echo __("subject"); ?></th>
							<th class="text-left"><?php echo __("message"); ?></th>
							<th class="text-left"><?php echo __("Lido?"); ?></th>
							<th class="text-left"><?php echo __("created"); ?></th>
							<th class="text-left"><?php echo __("updated"); ?></th>
							<th width="60" class="text-left"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($contacts as $contact): ?>
						<tr>
							<td class="text-left"><?php echo h($contact['Contact']['id']); ?>&nbsp;</td>
							<td class="text-left"><?php echo h($contact['Contact']['name']); ?>&nbsp;</td>
							<td class="text-left"><?php echo h($contact['Contact']['email']); ?>&nbsp;</td>
							<td class="text-left"><?php echo h($contact['Contact']['subject']); ?>&nbsp;</td>
							<td class="text-left"><?php echo h($contact['Contact']['message']); ?>&nbsp;</td>
							<td class="text-left"><?php echo $this->Formatacao->featured($contact['Contact']['status']); ?>&nbsp;</td>
							<td class="text-left"><?php echo $this->Formatacao->dataHora($contact['Contact']['created']); ?>&nbsp;</td>
							<td class="text-left"><?php echo $this->Formatacao->dataHora($contact['Contact']['updated']); ?>&nbsp;</td>
							<td class="text-left">
								<?php echo $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $contact['Contact']['id']), array('class' => 'btn btn-primary btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'view')); ?>
								<?php echo $this->Form->postLink(__('<i class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $contact['Contact']['id']), array('class' => 'btn btn-danger btn-xs', 'escape' => false, 'data-toggle'=>'tooltip', 'title' => 'delete'), __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$("#Contacts").dataTable({
			"language": {
				"url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json"
			}
		});
	});
</script>