<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<?php echo $this->Html->link('Administração', array('controller'=>'admin', 'action'=>'index', 'admin'=>false, 'plugin'=>false),array('class'=>'navbar-brand', 'title'=>'Administração', 'escape'=>false));?>
	</div>

	<?php if ($this->Amanager->is_logged()): ?>
		<!-- Top Menu Items -->
		<ul class="nav navbar-right top-nav">
			<?php $total = $this->RequestAction("contacts/totalMensage");
				if ($total){
			?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle info-number" data-toggle="dropdown"><i class="fa fa-envelope"></i>
						<span class="badge bg-red">
							<?php echo $total; ?>
						</span>
					</a>
					<?php $data = $this->RequestAction("contacts/notifications");?>
					<ul class="dropdown-menu message-dropdown">
						<?php foreach ($data as $msg):?>
							<li class="message-preview">
								<a href="<?php echo $this->Html->url('/', true)?>admin/contacts/view/<?=$msg['Contact']['id'];?>">
									<div class="media">
										<div class="media-body">
											<h5 class="media-heading">
												<strong>
													<?php if (empty($msg['Contact']['message'])):?>
														<span data-toggle="tooltip" data-placement="right" title="Telefone: <?=$msg['Contact']['phone'];?>" class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
													<?php endif;?>
													<?=$msg['Contact']['name'];?>
												</strong>
											</h5>
											<p class="small badge text-muted"><i class="fa fa-clock-o"></i> <?=$this->Formatacao->tempo($msg['Contact']['created']);?></p>
											<p class="text-body"><?=$this->Formatacao->LimitaCaracter($msg['Contact']['message'], 80);?></p>
										</div>
									</div>
								</a>
							</li>
						<?php endforeach;?>
						<li class="message-footer">
							<?php echo $this->Html->link('Leia todas as mensagens', array('controller'=>'contacts', 'action'=>'index', 'admin'=>true, 'plugin'=>false),array('title'=>'Leia todas as novas mensagens', 'escape'=>false));?>
						</li>
					</ul>
				</li>
			<?php } ?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
				<ul class="dropdown-menu alert-dropdown">
					<li>
						<a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
					</li>
					<li>
						<a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
					</li>
					<li>
						<a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
					</li>
					<li>
						<a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
					</li>
					<li>
						<a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
					</li>
					<li>
						<a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="#">View All</a>
					</li>
				</ul>
			</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $this->Amanager->get_user_info('name');?> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li class="divider"></li>
					<li>
						<?php
							echo $this->Html->link('<i class="fa fa-fw fa-cog"></i> Configurações',	array('controller'=> 'settings',	'action'=>'index', 'admin'=>true),
							array('escape' => false, 'title' => 'Configurações'));
						?>
					</li>
					<li>
						<?php
							echo $this->Html->link('<i class="fa fa-fw fa-power-off"></i> Log Out',	array('controller'=> 'users',	'action'=>'logout',	'plugin'=>'amanager', 'admin'=>false),
							array('escape' => false, 'title' => 'Log Out'));
						?>
					</li>
				</ul>
			</li>
		</ul>
	<?php endif; ?>
	<?php echo $this->element('menu_sidebar', array('id'=>4));?>
</nav>