<?php

App::uses('AppModel', 'Model');

/**
 * Timeslot Model
 *
 * @property StudentSchedule $StudentSchedule
 */
class Timeslot extends AppModel {
    
    public $displayField = 'descriptor';
    
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'StudentSchedule' => array(
            'className' => 'StudentSchedule',
            'foreignKey' => 'timeslot_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    public $virtualFields = array(
        'descriptor' => "CONCAT(Timeslot.day,' Period ',Timeslot.period,IFNULL(Timeslot.sub_period,''))"
    );

}
