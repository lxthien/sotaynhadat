<?php
class Estate extends DataMapper{
    
    public $table = 'estates';
    
    public $has_one=array(
        'estatetype','estatedistrict','estateuser','estatedirection','estatecity','estatecatalogue', 'estatearea', 'estateprice', 'article', 'estateward', 'estate_photo'
    );
    public $has_many=array(
        
    );
    
    function __construct($id = NULL){
        parent::__construct($id);
    }
    
    public $validation = array(
    
    );
    function save($object = '', $related_field = '')
    {
        if (!$this->exists()) {
            $o = new Estate();
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
    function max_id(){
        $max = new Estate();
        $max->select_max('id');
        $max->get();
        return $max->id;
    }
}
/* End of file estate.php */
/* Location: ./application/models/estate.php */
?>