<div class="studentSchedules view">
<h2><?php  echo __('Student Schedule'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($studentSchedule['StudentSchedule']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($studentSchedule['Student']['id'], array('controller' => 'students', 'action' => 'view', $studentSchedule['Student']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timeslot'); ?></dt>
		<dd>
			<?php echo $this->Html->link($studentSchedule['Timeslot']['id'], array('controller' => 'timeslots', 'action' => 'view', $studentSchedule['Timeslot']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Teacher'); ?></dt>
		<dd>
			<?php echo $this->Html->link($studentSchedule['Teacher']['id'], array('controller' => 'teachers', 'action' => 'view', $studentSchedule['Teacher']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class'); ?></dt>
		<dd>
			<?php echo h($studentSchedule['StudentSchedule']['class']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Week'); ?></dt>
		<dd>
			<?php echo h($studentSchedule['StudentSchedule']['week']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student Schedule'), array('action' => 'edit', $studentSchedule['StudentSchedule']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Student Schedule'), array('action' => 'delete', $studentSchedule['StudentSchedule']['id']), null, __('Are you sure you want to delete # %s?', $studentSchedule['StudentSchedule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Student Schedules'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Schedule'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Attendances'); ?></h3>
	<?php if (!empty($studentSchedule['Attendance'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Student Schedule Id'); ?></th>
		<th><?php echo __('Makeup'); ?></th>
		<th><?php echo __('Pass'); ?></th>
		<th><?php echo __('Attendancecol'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($studentSchedule['Attendance'] as $attendance): ?>
		<tr>
			<td><?php echo $attendance['id']; ?></td>
			<td><?php echo $attendance['student_schedule_id']; ?></td>
			<td><?php echo $attendance['makeup']; ?></td>
			<td><?php echo $attendance['pass']; ?></td>
			<td><?php echo $attendance['attendancecol']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attendances', 'action' => 'view', $attendance['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attendances', 'action' => 'edit', $attendance['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'attendances', 'action' => 'delete', $attendance['id']), null, __('Are you sure you want to delete # %s?', $attendance['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Attendance'), array('controller' => 'attendances', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
