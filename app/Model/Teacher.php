<?php

App::uses('AppModel', 'Model');

/**
 * Teacher Model
 *
 * @property StudentSchedule $StudentSchedule
 */
class Teacher extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'firstname' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'lastname' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'StudentSchedule' => array(
            'className' => 'StudentSchedule',
            'foreignKey' => 'teacher_id',
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
        'name' => 'CONCAT(Teacher.lastname, ", ", Teacher.firstname)'
    );
    public $displayField = 'name';

}
