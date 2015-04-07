<div class="students form">
    <?php echo $this->Form->create('Student'); ?>
    <fieldset>
        <legend><?php echo __('Add Student'); ?></legend>
        <?php
        echo $this->Form->input('id',array('type'=>'text'));
        echo $this->Form->input('barcode');
        echo $this->Form->input('firstname');
        echo $this->Form->input('lastname');
        echo $this->Form->input('email');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Students'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Student Schedules'), array('controller' => 'student_schedules', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Student Schedule'), array('controller' => 'student_schedules', 'action' => 'add')); ?> </li>
    </ul>
</div>
