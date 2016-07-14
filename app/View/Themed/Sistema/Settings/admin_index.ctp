<script>
$(document).ready(function(){
	$('.nav-tabs a').click(function (e) {
		url = $(this).attr("rel");
		tab = $(this).attr("href");
		window.location = url;
		event.preventdefault();
	})
});
</script>

<div class="row">
	<div class="col-xs-12">
    <div class="box box-primary">
			<div class="box-body">
				<div>
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="<?php if($this->request->params['action'] == 'admin_index'){ echo "active";}?>"><a href="#home" rel="<?php echo $this->Html->url('/admin/settings/', true);?>" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
						<li role="presentation" class="<?php if($this->request->params['action'] == 'admin_seo'){ echo "active";}?>"><a href="#seo" rel="<?php echo $this->Html->url('/admin/settings/seo', true);?>" aria-controls="seo" role="tab" data-toggle="tab">Seo</a></li>
						<li role="presentation" class="<?php if($this->request->params['action'] == 'admin_profile'){ echo "active";}?>"><a href="#profile" rel="<?php echo $this->Html->url('/admin/amanager/users/profile', true);?>" aria-controls="profile" role="tab" data-toggle="tab">Configurações de Usuário</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane <?php if($this->request->params['action'] == 'admin_index'){ echo "active";}?>" id="home">

						</div>
						<div role="tabpanel" class="tab-pane <?php if($this->request->params['action'] == 'admin_seo'){ echo "active";}?>" id="seo">
							<?php
								echo $this->Form->create('MetaTags', array('role' => 'form'));
							?>
								<?php
									echo $this->Seo->form();
								?>
								<div class="pull-left">
									<?php echo $this->Form->button('<i class="glyphicon glyphicon-saved"></i> Salvar', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>
								</div>
							<?php echo $this->Form->end(); ?>
						</div>
						<div role="tabpanel" class="tab-pane <?php if($this->request->params['action'] == 'admin_profile'){ echo "active";}?>" id="profile">
							<div class="page-header">
								<h1>Configurações:</h1>
							</div>
							<?php
								//$error = array('attributes' => array('class' => 'alert alert-danger'));
								$required = '';
								$password_options = array(
									'value'=>null,
									'label'=>__d('amanager', 'Nova senha'),
									'class'=>'form-control',
									//'error'=>$error,
									//'required'=> $required,
								);
								$password2_options = array(
									'value'=>null,
									'label'=>__d('amanager', 'Confirme a nova senha'),
									'class'=>'form-control',
									//'error'=>$error,
									//'required'=> $required,
									'type'=> 'password',
								);
								if(!$required){
									$password_options['value'] = '';
									$password2_options['value'] = '';
								}
							?>

							<?php echo $this->Form->create('User', array('role'=>'form')); ?>
								<div class="form-group">
									<?php
										echo $this->Form->input('username',
											array(
												'label'=>__d('amanager', 'Username'),
												'class'=>'form-control',
											)
										);
									?>
								</div>
								<div class="form-group">
									<?php
										echo $this->Form->input('password', $password_options);
									?>
								</div>
								<div class="form-group">
									<?php
										echo $this->Form->input('password2', $password2_options);
									?>
								</div>
								<div class="form-group">
									<?php
										echo $this->Form->input('email',
											array(
												'label'=>__d('amanager', 'Email'),
												'class'=>'form-control',
											)
										);
									?>
								</div>
								<div class="form-group">
									<?php
										echo $this->Form->input('name',
											array(
												'label'=>__d('amanager', 'Name'),
												'class'=>'form-control',
											)
										);
									?>
									<br />
									<?php echo $this->Form->button('<i class="icon-white icon-plus-sign"></i>  ' . __d('amanager', 'Submit'), array('type' => 'submit', 'class'=>'btn btn-primary'), array('escape'=>false) );  ?>
								</div>
							<?php echo $this->Form->end(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

