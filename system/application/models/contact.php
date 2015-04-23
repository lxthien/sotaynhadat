<?php
class Contact extends DataMapper
{
    public $table = "contact";
    // --------------------------------------------------------------------
	// Relationships
	// --------------------------------------------------------------------
   
    public $has_many=array(    
    );
    // --------------------------------------------------------------------
	// Validation
	// --------------------------------------------------------------------
    public $validation = array(
         'title'=>array(
            'label'=>'Tiêu đề',
            'rules'=>array('trim','required')),
         'name'=>array(
            'label'=>'Tên',
            'rules'=>array('trim','max_length'=>200,'required')),
         'email'=>array(
            'label'=>'Địa chỉ email',
            'rules'=>array('trim','required','email')),
         'content'=>array(
            'label'=>'Nội dung',
            'rules'=>array('trim','required'))
    );
    function __construct($id=NULL)
    {
        parent::__construct($id);
    }

}
/* End of file album.php */
/* Location: ./application/models/album.php */