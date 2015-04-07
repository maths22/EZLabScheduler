<?php if(!$scheduled):?>
<tr>
    <td><?php echo $student['StudentSchedule']['week']; ?></td>
    <td><?php echo $student['Student']['id']; ?></td>
    <td><?php echo $student['Student']['name']; ?></td>
    <td><?php echo $student['StudentSchedule']['class']; ?></td>
    <td><?php echo $student['Teacher']['name']; ?></td>
    <td><?php echo $this->Form->input(false, array('type' => 'checkbox', 'checked' => true, 'class' => 'present', 'id' => 'present' . $student['StudentSchedule']['id'] . '_' . $timeslot_id)) ?></td>
    <td><?php echo $this->Form->input(false, array('type' => 'checkbox', 'checked' => false, 'class' => 'makeup', 'id' => 'makeup' . $student['StudentSchedule']['id'] . '_' . $timeslot_id)) ?></td>
    <td><?php echo $this->Form->input(false, array('type' => 'checkbox', 'checked' => false, 'class' => 'pass', 'id' => 'pass' . $student['StudentSchedule']['id'] . '_' . $timeslot_id)) ?></td>
    <td><?php echo $this->Js->link('Send Message', array('controller' => 'Students', 'action' => 'send_email', $student['Student']['id']), array('complete' => 'alert("Message sent");')); ?></td>
</tr>
<?php  else: echo json_encode($id);
endif;?>