<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Le
 * Date: 5/17/13
 * Time: 5:40 PM
 * To change this template use File | Settings | File Templates.
 */

class Experience extends DataMapper{
    // table to datamaper.
    public $table = 'experiences';

    //relate with orther datamapper
    public $has_many = array(
        'job'
    );

    //validate

    //construct class Experience
    function __construct($id=NULL){
        parent :: __construct($id);
    }

    function save($object = '', $related_field = '')
    {
        if (!$this->exists()) {
            $o = new Experience();
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