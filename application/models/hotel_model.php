<?php class Hotel_Model extends CI_Model{
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
      $this->load->database();
  }
 
  public function get_hotel_by_id($id){
    $search_query = array(
      'id' => $id
    );
    $query = $this->db->get_where('tbl_hotel',$search_query);
    foreach($query->result_array() as $row){
        return $row['hotel_name'];
    }
  }
  
  function get_hotel_info($id){
	$search_query = array(
      'id' => $id
    );
    $query = $this->db->get_where('tbl_hotel',$search_query);
	return $query->result();
  }
  function get_rooms_by_hotelId($id){
	  $search_query = array(
      'hotel_id' => $id
    );
    $query = $this->db->get_where('tbl_room',$search_query);
	return $query->result();
  }
  function add_room(){
      $insert_data = array(
		'hotel_id' => $_REQUEST['id'],
        'room_type' => $_REQUEST['room_type'],
		'room_price' => $_REQUEST['room_price']
      );
      if($this->db->insert('tbl_room',$insert_data)){
        echo '<tr><td>#</td><td>'.$_REQUEST['room_type'].'</td><td>'.$_REQUEST['room_price'].'</td><td></td></tr>';
      }else{
        echo "Unable to add data due to " . $this->db->error();
      }
  }



}
