<?php
class showroomphoto extends DataMapper
{
    public $table = "showroomphotos";
    // --------------------------------------------------------------------
    // Relationships
    // --------------------------------------------------------------------

    public $has_one=array(
        'showroom',
    );
    // --------------------------------------------------------------------
    // Validation
    // --------------------------------------------------------------------
    public $validation = array(
        'name'=>array(
            'label'=>'Tên hình ảnh',
            'rules'=>array('trim','max_length'=>200))

    );
    function __construct($id=NULL)
    {
        parent::__construct($id);
    }
    /********************************
     * Up the position
     * swap position with object that have higher position
     **********************************/
    function up_position()
    {
        $max = new showroom();
        $max->select_max('position');
        $max->where('position <', $this->position);

        $max->get();
        $o = new showroom();
        $o->where('position', $max->position);

        $o->get();
        if ($o->result_count() > 0) {
            $tg = $this->position;
            $this->position = $o->position;
            $o->position = $tg;
            $o->save();
            $this->save();
            return TRUE;
        } else
            return FALSE;
    }
    /********************************
     * Down the position
     * swap position with object that have lower position
     **********************************/
    function down_position()
    {
        $min = new showroom();
        $min->select_min('position');
        $min->where('position >', $this->position);

        $min->get();
        $o = new showroom();
        $o->where('position', $min->position);

        $o->get();
        if ($o->result_count() > 0) {
            $tg = $this->position;
            $this->position = $o->position;
            $o->position = $tg;
            $o->save();
            $this->save();
            return true;
        } else {
            return false;
        }
    }
    /********************************
     * Override the save method
     * check if new insert the position property
     **********************************/
    function save($object = '', $related_field = '')
    {
        if (!$this->exists()) {
            $o = new showroomphoto();
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
/* End of file bannercat.php */
/* Location: ./application/models/bannercat.php */