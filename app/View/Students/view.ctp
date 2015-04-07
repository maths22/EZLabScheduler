<div class="students view">
<h2><?php  echo __('Student'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($student['Student']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Barcode'); ?></dt>
		<dd>
			<?php echo h($student['Student']['barcode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($student['Student']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($student['Student']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($student['Student']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Student'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Student'), array('action' => 'delete', $student['Student']['id']), null, __('Are you sure you want to delete # %s?', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Student Schedules'), array('controller' => 'student_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Schedule'), array('controller' => 'student_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Student Schedules'); ?></h3>
	<?php if (!empty($student['StudentSchedule'])): ?>
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
		foreach ($student['StudentSchedule'] as $studentSchedule): ?>
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
