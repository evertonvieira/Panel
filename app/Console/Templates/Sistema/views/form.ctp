<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link http://cakephp.org CakePHP(tm) Project
 * @package Cake.Console.Templates.default.views
 * @since CakePHP(tm) v 1.2.0.5234
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="row">
	<div class="col-lg-12">
		<div class="box panel panel-primary">
			<div class="panel-heading panel-black">
				<h3 class="panel-title"><?php printf(Inflector::humanize($action), $singularHumanName); ?></h3>
			</div>
			<div class="panel-body">
				<?php echo "<?php echo \$this->Form->create('{$modelClass}', array('role' => 'form')); ?>\n"; ?>
					<?php
						foreach ($fields as $field) {
							if (strpos($action, 'add') !== false && $field == $primaryKey) {
								continue;
							} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
								echo "\t\t\t\t\t<div class=\"form-group\">\n";
								echo "\t\t\t\t\t\t<?php echo \$this->Form->input('{$field}', array('label'=>'" . ucfirst($field) .":', 'class'=>'form-control', 'placeholder'=>'{$field}'));?>\n";
								echo "\t\t\t\t\t</div>\n";
							}
						}
						if (!empty($associations['hasAndBelongsToMany'])) {
							foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
								echo "\t\t\t\t\t<div class=\"form-group\">\n";
								echo "\t\t\t\t\t\t\t<?php echo \$this->Form->input('{$assocName}');?>\n";
								echo "\t\t\t\t\t</div>\n";
							}
						}
						echo "\n";
						echo "\t\t\t\t\t<div class=\"pull-left\">\n";
						echo "\t\t\t\t\t\t<?php echo \$this->Form->button('<i class=\"glyphicon glyphicon-saved\"></i> Save data', array('type' => 'submit', 'class' => 'btn btn-large btn-primary', 'escape' => false)); ?>\n";
						echo "\t\t\t\t\t</div>\n";
					?>
				<?php echo "<?php echo \$this->Form->end(); ?>\n";?>
			</div>
		</div>
	</div>
</div>