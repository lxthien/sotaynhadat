<?php
Class Jobsmethod extends DataMapper{
    // table to datamapper
    public $table = 'jobsmethods';


    //relate with orther datamapper
    public $has_many = array(
        'job'
    );

    //validation
    public $validation = array(
        'name_vietnamese' =>array(
            'label' => 'Tên tiếng việt',
            'rules' => array('trim', 'max_length' => 200)
        ),
        'name_english' => array(
            'label' => 'Tên tiếng anh',
            'rules' => array('trim', 'max_length' => 200)
        ),
        'name_japanese' =>array(
            'label' => 'Tên tiếng nhật',
            'rules' => array('trim', 'max_length' => 200)
        )
    );

    //constructor
    function __construct($id=NULL){
        parent::__construct($id);
    }

    function save($object = '', $related_field = '')
    {
        if (!$this->exists()) {
            $o = new Jobsmethod();
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