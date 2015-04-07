<div class="attendances view">
<h2><?php  echo __('Attendance'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student Schedule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attendance['StudentSchedule']['id'], array('controller' => 'student_schedules', 'action' => 'view', $attendance['StudentSchedule']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Makeup'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['makeup']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pass'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['pass']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attendancecol'); ?></dt>
		<dd>
			<?php echo h($attendance['Attendance']['attendancecol']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attendance'), array('action' => 'edit', $attendance['Attendance']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attendance'), array('action' => 'delete', $attendance['Attendance']['id']), null, __('Are you sure you want to delete # %s?', $attendance['Attendance']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attendances'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attendance'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Student Schedules'), array('controller' => 'student_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Schedule'), array('controller' => 'student_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
