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
		<?php echo $this->Html->link('Serp FIP', array('controller'=>'admin', 'action'=>'index', 'admin'=>false, 'plugin'=>false),array('class'=>'navbar-brand', 'title'=>'Serp FIP', 'escape'=>false));?>
	</div>

	<?php if ($this->Amanager->is_logged()): ?>
		<!-- Top Menu Items -->
		<ul class="nav navbar-right top-nav">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
				<ul class="dropdown-menu message-dropdown">
					<li class="message-preview">
						<a href="#">
							<div class="media">
								<span class="pull-left">
									<img class="media-object" src="http://placehold.it/50x50" alt="">
								</span>
								<div class="media-body">
									<h5 class="media-heading">
										<strong>John Smith</strong>
									</h5>
									<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
									<p>Lorem ipsum dolor sit amet, consectetur...</p>
								</div>
							</div>
						</a>
					</li>
					<li class="message-preview">
						<a href="#">
							<div class="media">
								<span class="pull-left">
									<img class="media-object" src="http://placehold.it/50x50" alt="">
								</span>
								<div class="media-body">
									<h5 class="media-heading">
										<strong></strong>
									</h5>
									<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
									<p>Lorem ipsum dolor sit amet, consectetur...</p>
								</div>
							</div>
						</a>
					</li>
					<li class="message-preview">
						<a href="#">
							<div class="media">
								<span class="pull-left">
									<img class="media-object" src="http://placehold.it/50x50" alt="">
								</span>
								<div class="media-body">
									<h5 class="media-heading">
										<strong>John Smith</strong>
									</h5>
									<p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
									<p>Lorem ipsum dolor sit amet, consectetur...</p>
								</div>
						</div>
						</a>
					</li>
					<li class="message-footer">
							<a href="#">Read All New Messages</a>
					</li>
				</ul>
			</li>
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
							echo $this->Html->link('<i class="fa fa-fw fa-power-off"></i> Log Out',	array('controller'=> 'users',	'action'=>'logout',	'plugin'=>'amanager'),
							array('escape' => false, 'title' => 'Log Out'));
						?>
					</li>
				</ul>
			</li>
		</ul>
	<?php endif; ?>
	<?php echo $this->element("menu_sidebar"); ?>
</nav>