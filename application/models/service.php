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
	function add(){
	  $insert_data = array(
		'service_type_id' => $_REQUEST['stid'],
		'service_name' => $_REQUEST['ser'],
		'service_price' => $_REQUEST['price'],
		'service_price_minor' => $_REQUEST['price_minor']
	  );
	  if($this->db->insert('tbl_services',$insert_data)){
		echo '<tr><td>#</td><td>'.$_REQUEST['ser'].'</td><td>'.$_REQUEST['stid'].'</td><td>'.$_REQUEST['price'].'</td><td>'.$_REQUEST['price_minor'].'</td></tr>';
	  }else{
		echo "Unable to add data due to " . $this->db->error();
	  }
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
          $file_name = ($_REQUEST['img_name'])?$_REQUEST['img_name']:"";
        }
    $update_data = array(
      'service_name' => $_REQUEST['sname'],
      'service_price' => $_REQUEST['sprice'],
	  'service_price_minor' => $_REQUEST['sprice_minor'],
      'img' => $file_name
    );
    $where_data = array('id' => $_REQUEST['id']);
    $this->db->where($where_data);
    $this->db->update('tbl_services', $update_data);
  }

}
