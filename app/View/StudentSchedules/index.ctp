<div class="studentSchedules index">
	<h2><?php echo __('Student Schedules'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('student_id'); ?></th>
			<th><?php echo $this->Paginator->sort('timeslot_id'); ?></th>
			<th><?php echo $this->Paginator->sort('teacher_id'); ?></th>
			<th><?php echo $this->Paginator->sort('class'); ?></th>
                        <th><?php echo $this->Paginator->sort('week'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($studentSchedules as $studentSchedule): ?>
	<tr>
		<td><?php echo h($studentSchedule['StudentSchedule']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($studentSchedule['Student']['id'], array('controller' => 'students', 'action' => 'view', $studentSchedule['Student']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($studentSchedule['Timeslot']['id'], array('controller' => 'timeslots', 'action' => 'view', $studentSchedule['Timeslot']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($studentSchedule['Teacher']['id'], array('controller' => 'teachers', 'action' => 'view', $studentSchedule['Teacher']['id'])); ?>
		</td>
		<td><?php echo h($studentSchedule['StudentSchedule']['class']); ?>&nbsp;</td>
                <td><?php echo h($studentSchedule['StudentSchedule']['week']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $studentSchedule['StudentSchedule']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $studentSchedule['StudentSchedule']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $studentSchedule['StudentSchedule']['id']), null, __('Are you sure you want to delete # %s?', $studentSchedule['StudentSchedule']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Student Schedule'), array('action' => 'add')); ?></li>
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
