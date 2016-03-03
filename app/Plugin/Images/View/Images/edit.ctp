<div class="images form">
  <div class="page-header">
    <h2 id="forms">Manager Menu</h2>
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
                        <li><?php echo $this->Html->Link(__d('O', 'Delete'), array('action' => 'delete', $this->Form->value('Image.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Image.id'))); ?></li>
                        <li><?php echo $this->Html->link(__d('O', 'List Images'), array('action' => 'index')); ?></li>
                  </ul>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>

<?php echo $this->Form->create('Image', array('role'=>'form')); ?>
  <div class="form-group">
	<?php
		echo $this->Tbst->input('id');
		echo $this->Tbst->input('title');
		echo $this->Tbst->input('ext');
		echo $this->Tbst->input('model');
		echo $this->Tbst->input('foreign_key');
	?>
	</div>
<?php echo $this->Tbst->submit_end(__('Submit')); ?>
</div>
