<?php class Service extends CI_Model{
  function __construct(){
    parent::__construct();
    $this->load->database();
    $config['upload_path']          = "images/";
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['max_size']             = 1000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;
    $this->load->library('upload', $config);

  }

  function get_service($id){
    $where_query = array(
      'id' => $id
    );
    $query = $this->db->get_where('tbl_services',$where_query);
    return $query->result();
  }

  function upload_img(){


      if($this->upload->do_upload()){
        $upload_data = $this->upload->data();
				 $file_name = $upload_data['file_name'];
         return "yes";
      }else{
        $file_name = "empty";
      }
  }
  function update(){
    if($this->upload->do_upload('img')){
					$upload_data = $this->upload->data();
					$file_name = $upload_data['file_name'];
				}else{
					$file_name="";
				}

        if(!$file_name){
          $file_name = $_REQUEST['img_name'];
        }
    $update_data = array(
      'service_name' => $_REQUEST['sname'],
      'service_price' => $_REQUEST['sprice'],
      'img' => $file_name
    );
    $where_data = array('id' => $_REQUEST['id']);
    $this->db->where($where_data);
    $this->db->update('tbl_services', $update_data);
  }

}
