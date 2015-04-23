<?php
Class Province extends DataMapper{
    // table to datamapper
    public $table = 'provinces';

    //relate with orther table
    public $has_many = array('candidate', 'recruiter');


    // constructor class Province
    function __construct($id=NULL){
        parent::__construct($id);
    }


    function save($object = '', $related_field = '')
    {
        if (!$this->exists()) {
            $o = new Province();
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