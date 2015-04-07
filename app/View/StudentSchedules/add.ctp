<div class="studentSchedules form">
<?php echo $this->Form->create('StudentSchedule'); ?>
	<fieldset>
		<legend><?php echo __('Add Student Schedule'); ?></legend>
	<?php
		echo $this->Form->input('student_id', array('type'=>'text'));
                echo $this->Form->input('week', array('options' => $enumOptions, 'label' => 'Week:'));
                echo "<div class='input select required'>";
                echo "<label>Period</label>";
                echo $this->Form->input('day', array('name'=>'data[Timeslot][day]','type'=>'select','div'=>false,'label'=>false));
                echo $this->Form->input('period', array('name'=>'data[Timeslot][period]','type'=>'select','div'=>false,'label'=>false));
                echo "</div>";
		echo $this->Form->input('teacher_id');
		echo $this->Form->input('class');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Student Schedules'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Students'), array('controller' => 'students', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('controller' => 'students', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Timeslots'), array('controller' => 'timeslots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timeslot'), array('controller' => 'timeslots', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teachers'), array('controller' => 'teachers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Teacher'), array('controller' => 'teachers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendances'), array('controller' => 'attendances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance'), array('controller' => 'attendances', 'action' => 'add')); ?> </li>
	</ul>
</div>
