<div class="timeslots view">
<h2><?php  echo __('Timeslot'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($timeslot['Timeslot']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Day'); ?></dt>
		<dd>
			<?php echo h($timeslot['Timeslot']['day']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Period'); ?></dt>
		<dd>
			<?php echo h($timeslot['Timeslot']['period']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub-period'); ?></dt>
		<dd>
			<?php echo h($timeslot['Timeslot']['sub_period']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Timeslot'), array('action' => 'edit', $timeslot['Timeslot']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Timeslot'), array('action' => 'delete', $timeslot['Timeslot']['id']), null, __('Are you sure you want to delete # %s?', $timeslot['Timeslot']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Timeslots'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timeslot'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Student Schedules'), array('controller' => 'student_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Schedule'), array('controller' => 'student_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Student Schedules'); ?></h3>
	<?php if (!empty($timeslot['StudentSchedule'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Student Id'); ?></th>
		<th><?php echo __('Timeslot Id'); ?></th>
		<th><?php echo __('Teacher Id'); ?></th>
		<th><?php echo __('Class'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($timeslot['StudentSchedule'] as $studentSchedule): ?>
		<tr>
			<td><?php echo $studentSchedule['id']; ?></td>
			<td><?php echo $studentSchedule['student_id']; ?></td>
			<td><?php echo $studentSchedule['timeslot_id']; ?></td>
			<td><?php echo $studentSchedule['teacher_id']; ?></td>
			<td><?php echo $studentSchedule['class']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'student_schedules', 'action' => 'view', $studentSchedule['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'student_schedules', 'action' => 'edit', $studentSchedule['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'student_schedules', 'action' => 'delete', $studentSchedule['id']), null, __('Are you sure you want to delete # %s?', $studentSchedule['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Student Schedule'), array('controller' => 'student_schedules', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
