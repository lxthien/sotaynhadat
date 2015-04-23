<?php
class Estate_photo extends DataMapper
{
    public $table = 'estates_photos';

    public $has_one = array('estate');

    function __construct($id = NULL){
        parent::__construct($id);
    }
}