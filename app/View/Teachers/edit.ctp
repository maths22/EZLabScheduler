<div class="teachers form">
<?php echo $this->Form->create('Teacher'); ?>
	<fieldset>
		<legend><?php echo __('Edit Teacher'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Teacher.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Teacher.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Student Schedules'), array('controller' => 'student_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Schedule'), array('controller' => 'student_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
