<div class="timeslots form">
<?php echo $this->Form->create('Timeslot'); ?>
	<fieldset>
		<legend><?php echo __('Add Timeslot'); ?></legend>
	<?php
		echo $this->Form->input('day');
		echo $this->Form->input('period');
		echo $this->Form->input('sub_period');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Timeslots'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Student Schedules'), array('controller' => 'student_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Schedule'), array('controller' => 'student_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
