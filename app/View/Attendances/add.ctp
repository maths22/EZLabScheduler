<div class="attendances form">
<?php echo $this->Form->create('Attendance'); ?>
	<fieldset>
		<legend><?php echo __('Add Attendance'); ?></legend>
	<?php
		echo $this->Form->input('student_schedule_id');
		echo $this->Form->input('makeup');
		echo $this->Form->input('pass');
		echo $this->Form->input('attendancecol');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Attendances'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Student Schedules'), array('controller' => 'student_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Schedule'), array('controller' => 'student_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
