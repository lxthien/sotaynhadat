<?php
Class Jobscat extends DataMapper{
    //public to datamapper
    public $table = 'jobscats';


    //relate with orther datamapper
    public $has_many = array(
        'job'
    );


    //validation
    public $validation = array(
        'name_vietnamese' =>array(
            'label' => 'Tên danh mục công việc tiếng việt',
            'rules' => array('trim', 'max_length' => 200, 'required')
        ),
        'name_english' => array(
            'label' => 'Tên danh mục công việc tiếng anh',
            'rules' => array('trim', 'max_length' => 200, 'required')
        ),
        'name_japanese' =>array(
            'label' => 'Tên danh mục công việc tiếng nhật',
            'rules' => array('trim', 'max_length' => 200, 'required')
        )
    );

    // constructor
    function __construct($id=NULL){
        parent::__construct($id);
    }

    function save($object = '', $related_field = '')
    {
        if (!$this->exists()) {
            $o = new Jobscat();
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