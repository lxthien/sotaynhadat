<?php
class Estatecount extends DataMapper
{
    public $table = "estatecounts";
    // --------------------------------------------------------------------
	// Relationships
	// --------------------------------------------------------------------
   
    public $has_many=array(    
    );
    // --------------------------------------------------------------------
	// Validation
	// --------------------------------------------------------------------
    public $validation = array(
         
    );
    function __construct($id=NULL)
    {
        parent::__construct($id);
    }

}
/* End of file estatecount.php */
/* Location: ./application/models/estatecount.php */