<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Le
 * Date: 5/17/13
 * Time: 5:33 PM
 * To change this template use File | Settings | File Templates.
 */

class Job extends DataMapper {
    // table to datamapper
    public $table = 'jobs';


    //relate
    public $has_one = array(
        'jobscat',
        'jobsmethod',
        'experience',
        'level',
        'recruiter'
    );

    //validate
    public $validation = array(
        'name_vietnamese'=>array(
            'label'=>'Tên công việc việt nam',
            'rules'=>array('trim','max_length'=>200)
        ),
        'name_english'=>array(
            'label'=>'Tên công việc tiếng anh',
            'rules'=>array('trim','max_length'=>200)
        ),
        'name_japanese'=>array(
            'label'=>'Tên công việc tiếng nhật',
            'reles'=>array('trim', 'max_lenght'=>200)
        ),
        'name_none'=>array(
            'label'=>'Tên ko dấu',
            'rules'=>array('required'))
    );

    //constructor
    function __construct($id=NULL){
        parent::__construct($id);
    }

    function save($object = '', $related_field = '')
    {
        if (!$this->exists()) {
            $o = new Job();
            $o->select_max('position');
            $o->get();
            if (count($o->all) != 0) {
                $max = $o->position + 1;
                $this->position = $max;
            } else {
                $this->postion = 1;
            }
        }
        return parent::save($object, $related_field);
    }
}