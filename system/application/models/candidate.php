<?php
Class Candidate extends DataMapper{
    // table to datamapper
    public $table = 'candidates';

    // relate with orther model datamapper
    public $has_one = array('province');
    public $has_many = array('CurriculumViate');

    //validate
    public $validation = array(
        'username' => array(
            'label' => 'Tên đăng nhập',
            'rules' => array('required')
        ),
        'password' =>array(
            'label' => 'Mật khẩu',
            'rules' => array('required')
        ),
        'email' =>array(
            'label' => 'Địa chỉ email',
            'rules' => 'required'
        )
    );

    //construct
    function __construct($id=NULL){
        parent :: __construct($id);
    }

    function save($object = '', $related_field = '')
    {
        if (!$this->exists()) {
            $o = new Candidate();
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