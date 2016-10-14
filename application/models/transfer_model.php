<?php class Transfer_Model extends CI_Model{
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
      $this->load->database();
  }
  function add(){
	  $insert_data = array(
		'transfer_type_id' => $_REQUEST['ttid'],
		'transfer_origin' => $_REQUEST['to'],
		'transfer_destination' => $_REQUEST['td'],
		'transfer_unit_price' => $_REQUEST['tup'],
		'transfer_full_price' => $_REQUEST['tfp']
	  );

	  $insert_data1 = array(
		'transfer_type_id' => $_REQUEST['ttid'],
		'transfer_origin' => $_REQUEST['td'],
		'transfer_destination' => $_REQUEST['to'],
		'transfer_unit_price' => $_REQUEST['tup'],
		'transfer_full_price' => $_REQUEST['tfp']
	  );


	  if($this->db->insert('tbl_transfer',$insert_data) && $this->db->insert('tbl_transfer',$insert_data1) ){
		echo '<tr><td>'.$_REQUEST['to'].'</td><td>'.$_REQUEST['td'].'</td><td>'.$_REQUEST['tup'].'</td><td>'.$_REQUEST['tfp'].'</td></tr>';
	  }else{
		echo "Unable to add data due to " . $this->db->error();
	  }
	}
	function get_all(){
		$query = "SELECT * FROM tbl_transfer a, tbl_transfer_type b WHERE a.transfer_type_id = b.id";
		if($res = $this->db->query($query)){
			return $res->result();
		}else{
			return $this->db->error();
		}
	}

	function add_vehicle(){
		$insert_data = array('transfer_type' => $_REQUEST['txr_type']);
		if($this->db->insert('tbl_transfer_type', $insert_data)){
			return $this->db->insert_id();
		}else{
			return $this->db->error();
		}
	}

}
