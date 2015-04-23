<?php
class newsphoto extends DataMapper
{
    public $table = "newsphotos";
    // --------------------------------------------------------------------
	// Relationships
	// --------------------------------------------------------------------
    public $has_one=array(
        'article'
    );

    // --------------------------------------------------------------------
	// Validation
	// --------------------------------------------------------------------
    public $validation = array(
         'name'=>array(
            'label'=>'Tên hình ảnh ',
            'rules'=>array('trim','max_length'=>200))
         ,
    );
    function __construct($id=NULL)
    {
        parent::__construct($id);
    }


    
}
/* End of file newscomment.php */
/* Location: ./application/models/newscomment.php */