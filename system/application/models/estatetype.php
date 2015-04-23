<?php
class Estatetype extends DataMapper{
    
    public $table = 'estatetypes';
    
    public $has_one=array(
        'estatecatalogue'
    );
    public $has_many=array(
        'estate',
        'article'
    );
    
    function __construct($id = NULL){
        parent::__construct($id);
    }
    
    public $validation = array(
    
    );
    function save($object = '', $related_field = '')
    {
        if (!$this->exists()) {
            $o = new Estatetype();
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
/* End of file estatetype.php */
/* Location: ./application/models/estatetype.php */
?>