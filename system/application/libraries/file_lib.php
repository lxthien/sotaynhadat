<?php

/**
 * @author mrKing
 * @copyright 2008
 */
class File_lib 
    {
  	var $ci;

    function File_lib()
	{
		$this->ci=& get_instance();
	}

    function upload($name, $path, $rename_file = false, $allow_type='gif|jpg|png|bmp|jpeg|flv|swf')
    {
        $name_images = $_FILES[$name]['name'];
        $fileNameParts   = explode(".", $name_images );
        $fileExtension   = end( $fileNameParts );
        $fileExtension   = strtolower($fileExtension);
        $encripted_pic_name = md5($name).".".$fileExtension;

        $this->ci->load->library('upload');
        $config['upload_path'] = $path;
        $config['remove_spaces'] = true;
        $config['allowed_types'] = $allow_type;
        if( $rename_file == true ){
            $config['file_name'] = $encripted_pic_name;
            $config['encrypt_name'] = TRUE;
        }
        $config['max_size'] = '2000KB';
        $config['max_width'] = '2048';
        $config['max_height'] = '1536';
        $this->ci->upload->initialize($config);
        if($this->ci->upload->do_upload($name))
        {
            $data = $this->ci->upload->data();
            return $data;
        }
        else
        {
            return $this->ci->upload->display_errors("<span class='upload_error'>","</span>");
        }
    }
}