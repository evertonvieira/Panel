<?php
/**
 *
 * PHP 5
 *
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
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Vital Saúde');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $this->Html->charset(); ?>

    <?php //echo $this->Seo->metaTags( isset($seo) ? $seo : null ); ?>
    <?php
      echo $this->Html->meta('icon');
      echo $this->Html->css(
        array(
          'bootstrap.min',
          'bootstrap-theme.min',
          'style'
        )
      );
      echo $this->Html->script(
        array(
          'jquery.min',
          'bootstrap.min',
        )
      );
      echo $this->fetch('meta');
      echo $this->fetch('css');
      echo $this->fetch('script');
    ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php // echo $this->element("header"); ?>
    <?php //if($this->name =='Home'){echo $this->element("slideshow");} ?>
    <div class="container">
      <div id="content">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
      </div>
    </div>
      <?php if(
        $this->name =='Home') {
          //echo $this->element("sidebar");
        }
      ?>
    <?php //echo $this->element("footer"); ?>
    <?php //echo $this->element('sql_dump'); ?>
  </body>
</html>
