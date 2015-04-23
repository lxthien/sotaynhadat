<?php
class showroomphotos extends MY_Controller {
    function __construct(){
        parent::MY_Controller();
        $this->session->set_userdata(array(config_item('session_admin').'menu_current'=>246));
        $this->load->library('login_manager');
    }
    function index(){
        $this->listAll();
    }
    function listAll($offset=0,$limit=20){
        $showroomphotos= new Productphoto();
        $showroomphotos->order_by('id', 'asc');
        $showroomphotos->get_paged($offset,$limit,TRUE);
        setPagination($this->admin.'productphoto/list_all/',$showroomphotos->paged->total_rows,$limit,4);
        $dis['base_url']=base_url();
        $dis['view']='showroomphoto/list';
        $dis['showroomphotos']=$showroomphotos;
        $dis['menu_active']="Hình ảnh";
        $dis['title_table']="Trang hiện tại:".$showroomphotos->paged->current_page.'/'.$showroomphotos->paged->total_pages;
        $dis['title']="Tất cả hình ảnh";
        $dis['nav_menu']=array(
            array(
                "type"=>"add",
                "text"=>"Thêm",
                "link"=>"{$this->admin_url}productphotos/edit",
                "onclick"=>""
            )
        );
        $this->viewadmin($dis);
    }
    function edit($id){

        $filePath = 'img/showroom/';
        if($_SERVER['REQUEST_METHOD']=="GET"){}
        else{
            $this->load->library('file_lib');
            $numfile = $this->input->post('numfile');
            foreach($numfile as $row){
                $dataupload=$this->file_lib->upload('image'.$row, $filePath);
                if(is_array($dataupload)){
                    $showroomphotos= new showroomphoto();
                    $showroomphotos->showroom_id = $id;
                    $showroomphotos->image = $filePath . $dataupload['file_name'];
                    $showroomphotos->name = $this->input->post('caption'.$row);
                    $showroomphotos->save();
                    $showroomphotos->clear();
                    flash_message('success',$dataupload['file_name'].' đã được thêm.');

                }
            }
            redirect($this->admin.'showrooms/edit/'.$id);
        }
        $dis['base_url']=base_url();
        $dis['product_id']=$id;
        $dis['title']="Thêm hình ảnh";
        $dis['menu_active']="Showroom";
        $dis['view']="showroomphoto/edit";
        $dis['nav_menu']=array(
            array(
                "type"=>"back",
                "text"=>"Back",
                "link"=>"{$this->admin_url}showrooms/edit/".$product_id,
                "onclick"=>""
            )
        );
        $this->viewadmin($dis);
    }


    /**
     * Cnews::resize_image()
     *
     * @param mixed $file_link
     * @return
     */
    function resize_image($file_link)
    {
        $this->load->config("images");
        $preset = $this->config->item("image_sizes");
        foreach($preset as $key =>$value)
        {
            if(substr($key,0,7) == "product")
            {
                $config["source_image"] = $file_link;
                $config['new_image'] = image($file_link,$key);
                $config["width"] = $preset[$key][0];
                $config["height"] = $preset[$key][1];
                $this->load->library('image_lib', $config);
                $this->image_lib->fit();
                $this->image_lib->clear();
            }
        }





        /*
        $config['image_library'] = 'gd2';
        $config['source_image'] = $file_link;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 70;
        $config['height'] = 110;
        $config['quality'] = '100%';
        $config['thumb_marker'] = "_70x110";
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        $this->image_lib->clear();
        
        
        
        $config['image_library'] = 'gd2';
        $config['source_image'] = $file_link;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 143;
        $config['height'] = 227;
        $config['quality'] = '100%';
        $config['thumb_marker'] = "_143x227";
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        $this->image_lib->clear();
        
        
        */
    }

    function delete($id){
        $photos= new showroomphoto($id);
        if(!$photos->exists())
            show_404();
        else{
            $photos->delete();
            flash_message('success', 'Thành công. Đối tượng đã được xóa.');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    function setDefault($id){
        $productphotos= new Productphoto($id);
        $photo = new Productphoto();
        $photo->where('product_id',$productphotos->product_id);
        $photo->get_iterated();

        foreach($photo as $row)
        {
            $row->isDefault = 0;
            $row->save();
        }


        $product = new Product($productphotos->product_id);
        $product->image = $productphotos->path;
        $product->save();
        $productphotos->isDefault = 1;
        $productphotos->save();
        //$this->resize_image($productphotos->path);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
?>