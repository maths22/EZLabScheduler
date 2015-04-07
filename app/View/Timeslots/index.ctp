<div class="timeslots index">
	<h2><?php echo __('Timeslots'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('day'); ?></th>
			<th><?php echo $this->Paginator->sort('period'); ?></th>
			<th><?php echo $this->Paginator->sort('sub_period'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($timeslots as $timeslot): ?>
	<tr>
		<td><?php echo h($timeslot['Timeslot']['id']); ?>&nbsp;</td>
		<td><?php echo h($timeslot['Timeslot']['day']); ?>&nbsp;</td>
		<td><?php echo h($timeslot['Timeslot']['period']); ?>&nbsp;</td>
		<td><?php echo h($timeslot['Timeslot']['sub_period']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $timeslot['Timeslot']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $timeslot['Timeslot']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $timeslot['Timeslot']['id']), null, __('Are you sure you want to delete # %s?', $timeslot['Timeslot']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Timeslot'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Student Schedules'), array('controller' => 'student_schedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Student Schedule'), array('controller' => 'student_schedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
