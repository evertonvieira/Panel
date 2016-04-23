<div class="pages form">
  <div class="page-header">
    <h2 id="forms">Manager Seo</h2>
  </div>
  <nav role="navigation" class="navbar navbar-default">
    <!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
    <div class="container-fluid">
      <div class="navbar-header">
        <button data-target="#bs-example-navbar-collapse-7" data-toggle="collapse" class="navbar-toggle" type="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <span href="#" class="navbar-brand">Actions</span>
      </div>
      <div id="bs-example-navbar-collapse-7" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><?php echo $this->Html->link(__d('O', 'List Pages'), array('action' => 'index')); ?></li>
          <li><?php echo $this->Html->link(__d('O', 'View Page'), array('action' => 'view', $this->Form->value('Page.id'))); ?></li>
          <li><?php echo $this->Html->Link(__d('O', 'Delete Page'), array('action' => 'delete', $this->Form->value('Page.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Page.id'))); ?></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>

  <?php echo $this->Form->create('MetaTag', array('role'=>'form')); ?>
    <div class="form-group">
      <?php echo $this->Seo->form(); ?>
      <div class="clr"></div>
    </div>
  <?php echo $this->Tbst->submit_end(__d('O', 'Submit')); ?>

</div>
