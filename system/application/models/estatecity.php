<?php
class Estatecity extends DataMapper{
    
    public $table = 'estatecitys';
    
    public $has_one=array(
        
    );
    public $has_many=array(
        'estatedistrict','estate','estateuser', 'article'
    );
    
    function __construct($id = NULL){
        parent::__construct($id);
    }
    
    public $validation = array(
        'name'=>array(
            'label'=>'Tên Thành phố/Tỉnh',
            'rules'=>array('required','unique','trim','max_length'=>200))
    );
    function save($object = '', $related_field = '')
    {
        if (!$this->exists()) {
            $o = new Estatecity();
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
/* End of file estatecity.php */
/* Location: ./application/models/estatecity.php */
?>