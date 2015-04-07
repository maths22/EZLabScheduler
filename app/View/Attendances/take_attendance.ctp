<div class="view">
    <div id="periods">
        <ul>
            <?php foreach ($periods as $period): ?>
                <li><a href="#timeslot-<?php echo $period['Timeslot']['id']; ?>"><?php echo $period['Timeslot']['period'] . $period['Timeslot']['sub_period']; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php foreach ($periods as $period): ?>
            <div id="timeslot-<?php echo $period['Timeslot']['id']; ?>">
                <?php
                echo $this->Form->create(false,array('default'=>false,'class'=>'submitAttendance','id'=>'submitAttendance'.$period['Timeslot']['id']));
                echo $this->Form->input('studentid',array('type'=>'text','div'=>false,'label'=>false));
                echo $this->Form->end();
                ?>
                <table id="table-<?php echo $period['Timeslot']['id']; ?>">
                    <tr>
                        <th>Week</th>
                        <th>Student ID</th>
                        <th>Student name</th>
                        <th>Class</th>
                        <th>Teacher name</th>
                        <th>Present</th>
                        <th>Makeup</th>
                        <th>Pass</th>
                        <th>Forgot ID</th>
                    </tr>
                    <?php
                    foreach (${'attendance' . $period['Timeslot']['id']} as $student):
                        ?>
                        <tr>
                            <td><?php echo $student['StudentSchedule']['week']; ?></td>
                            <td><?php echo $student['Student']['id']; ?></td>
                            <td><?php echo $student['Student']['name']; ?></td>
                            <td><?php echo $student['StudentSchedule']['class']; ?></td>
                            <td><?php echo $student['Teacher']['name']; ?></td>
                            <td><?php echo $this->Form->input(false, array('type' => 'checkbox', 'checked' => $student['Today']['present'], 'class' => 'present', 'id' => 'present' . $student['StudentSchedule']['id'].'_'.$period['Timeslot']['id'])) ?></td>
                            <td><?php echo $this->Form->input(false, array('type' => 'checkbox', 'checked' => $student['Today']['makeup'], 'class' => 'makeup', 'id' => 'makeup' . $student['StudentSchedule']['id'].'_'.$period['Timeslot']['id'])) ?></td>
                            <td><?php echo $this->Form->input(false, array('type' => 'checkbox', 'checked' => $student['Today']['pass'], 'class' => 'pass', 'id' => 'pass' . $student['StudentSchedule']['id'].'_'.$period['Timeslot']['id'])) ?></td>
                            <td><?php echo $this->Js->link('Send Message', array('controller' => 'Students', 'action' => 'send_email', $student['Student']['id']), array('complete' => 'alert("Message sent");')); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<div>
    <div id="calendar"></div>
</div>
