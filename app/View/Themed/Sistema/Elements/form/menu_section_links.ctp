<div class="row">
	<?php echo $this->Form->create('MenuSectionLink', array('role'=>'form')); ?>
		<div class="panel-body">
			<div class="col-md-12">
				<div class="form-group">
					<?php echo $this->Form->input('id');?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('name', array('type'=>'text','label'=>'Título do Menu:', 'class'=>'input-lg form-control'));?>
				</div>
				<div class="form-group">
					<label><?php echo __d('O', 'Alias'); ?></label>
					<?php
						echo $this->Form->input('alias', array('class'=>'form-control', 'label'=>false));
					?>
				</div>
				<div class="form-group">
					<label><?php echo __d('O', 'Menu Section'); ?></label>
					<?php
						echo $this->Form->input('menu_section_id', array('class'=>'form-control', 'label'=>false));
					?>
				</div>
				<div class="bs-glyphicons">
					<?php
						$options = array(
							'0'=>'Selecione um ícone',
							'1' => 'glyphicon-plus',
							'2' => 'glyphicon-pencil',
							'3' => 'glyphicon-search',
							'4' => 'glyphicon-user',
							'5' => 'glyphicon-off',
							'6' => 'glyphicon-signal',
							'7' => 'glyphicon-cog',
							'8' => 'glyphicon-trash',
							'9' => 'glyphicon-home',
							'10' => 'glyphicon-file',
							'11' => 'glyphicon-time',
							'12' => 'glyphicon-repeat',
							'13' => 'glyphicon-refresh',
							'14' => 'glyphicon-list-alt',
							'15' => 'glyphicon-lock',
							'16' => 'glyphicon-flag',
							'17' => 'glyphicon-tag',
							'18' => 'glyphicon-book',
							'19' => 'glyphicon-print',
							'20' => 'glyphicon-list',
							'21' => 'glyphicon-picture',
							'22' => 'glyphicon-map-marker',
							'23' => 'glyphicon-edit',
							'24' => 'glyphicon-check',
							'25' => 'glyphicon-calendar',
							'26' => 'glyphicon-comment',
							'27' => 'glyphicon-wrench',
							'28' => 'glyphicon-tasks',
							'29' => 'glyphicon-dashboard',
							'30' => 'glyphicon-phone',
							'31' => 'glyphicon-send',
							'32' => 'glyphicon-earphone',
							'33' => 'glyphicon-phone-alt',
							'34' => 'glyphicon-stats',
							'35' => 'glyphicon-cloud-download',
							'36' => 'glyphicon-cloud-upload',
						);
					?>
					<div class="form-group">
						<?php
							echo $this->Form->input("icon", array(
								'type' => 'select',
								'label'=>'ícone: ',
								'options' => $options,
								'escape'=>false,
								'class'=>'form-control'
							));
						?>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Salvar', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
			</div>
		</div>
	<?php echo $this->Form->end(); ?>
</div>