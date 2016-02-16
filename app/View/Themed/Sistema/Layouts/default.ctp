<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>
			<?php echo $cakeDescription ?>: <?php echo $this->fetch('title'); ?>
		</title>
		<?php
			echo $this->Html->meta('icon');
			echo $this->Html->css(
				array(
					'../assets/components/bootstrap/dist/css/bootstrap.min',
					'../assets/components/bootstrap/dist/css/bootstrap-theme.min',
					'../assets/components/datatables/media/css/dataTables.bootstrap.min.css',
					'font-awesome.min',
					'sb-admin'
				)
			);
			echo $this->Html->script(
				array('../assets/components/jquery/dist/jquery.min',
					'../assets/components/bootstrap/dist/js/bootstrap.min',
					'../assets/components/datatables/media/js/jquery.dataTables.min',
					'../assets/components/datatables/media/js/dataTables.bootstrap.min',
					'scripts'
				)
			);
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div id="wrapper">
			<?php echo $this->element("menu_top"); ?>
			<div id="page-wrapper">
				<div class="container-fluid">
					<!-- Page Heading -->
					<div class="row">
						<aside class="right-side">
						<div class="col-lg-12">

							<section class="content-header">
								<h1>
									<?php echo $title_for_layout; ?> <small>Control panel</small>
								</h1>
								<ol class="breadcrumb">
									<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
									<li class="active">Blank page</li>
								</ol>
							</section>
							<?php echo $this->Flash->render(); ?>
							<?php echo $this->fetch('content'); ?>
							<?php //echo $this->element('sql_dump'); ?>
						</div>
					</div>
				</div>
			</div>
    </div>
	</body>
</html>