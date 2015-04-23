<?php
Class CurriculumViate extends DataMapper{
    //table to datamapper
    public $table = 'curriculumVitaes';

    // relate with orther model
    public $has_one = array('candidate');
    public $has_many = array(

    );

    // validation
    public $validation = array(

    );

    //constructor
    function __construct($id=NULL){
        parent::_construct($id);
    }

    function save($object = '', $related_field = ''){
        if (!$this->exists() || empty($this->code)){
            $o = new CurriculumViate();
            $o->select_max('position');
            $o->get();
            if (count($o->all) != 0){
                $max = $o->position + 1;
                $this->position = $max;
            }else {
                $this->postion = 1;
            }
        }
        return parent::save($object, $related_field);
    }
}