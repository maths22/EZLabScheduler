<div class="attendances index">
	<h2><?php echo __('Attendances'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('student_schedule_id'); ?></th>
			<th><?php echo $this->Paginator->sort('makeup'); ?></th>
			<th><?php echo $this->Paginator->sort('pass'); ?></th>
			<th><?php echo $this->Paginator->sort('attendancecol'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($attendances as $attendance): ?>
	<tr>
		<td><?php echo h($attendance['Attendance']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($attendance['StudentSchedule']['id'], array('controller' => 'student_schedules', 'action' => 'view', $attendance['StudentSchedule']['id'])); ?>
		</td>
		<td><?php echo h($attendance['Attendance']['makeup']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['pass']); ?>&nbsp;</td>
		<td><?php echo h($attendance['Attendance']['attendancecol']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $attendance['Attendance']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $attendance['Attendance']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $attendance['Attendance']['id']), null, __('Are you sure you want to delete # %s?', $attendance['Attendance']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Attendance'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Student Schedules'), array('controller' => 'student_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Schedule'), array('controller' => 'student_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
