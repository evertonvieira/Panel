<div class="images view">
  <h2><?php  echo __('Image'); ?></h2>
  <div class="internal_menu">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
  		<li><?php echo $this->Tbst->link('edit', __('Edit Image'), array('action' => 'edit', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Tbst->link('del', __('Delete Image'), array('action' => 'delete', $image['Image']['id']), __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Tbst->link('list', __('List Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Tbst->link('add', __('New Image'), array('action' => 'add')); ?> </li>
    </ul>
  </div>
	<dl class="tabela">
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($image['Image']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($image['Image']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ext'); ?></dt>
		<dd>
			<?php echo h($image['Image']['ext']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Model'); ?></dt>
		<dd>
			<?php echo h($image['Image']['model']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foreign Key'); ?></dt>
		<dd>
			<?php echo h($image['Image']['foreign_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($image['Image']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($image['Image']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
