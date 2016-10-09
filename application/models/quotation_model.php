<?php
class Quotation_Model extends CI_Model {

    // var $title   = '';
    // var $content = '';
    // var $date    = '';
    //
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->model('common');
    }
    //
    // function get_last_ten_entries()
    // {
    //     $query = $this->db->get('entries', 10);
    //     return $query->result();
    // }
    //
    // function insert_entry()
    // {
    //     $this->title   = $_POST['title']; // please read the below note
    //     $this->content = $_POST['content'];
    //     $this->date    = time();
    //
    //     $this->db->insert('entries', $this);
    // }
    //
    // function update_entry()
    // {
    //     $this->title   = $_POST['title'];
    //     $this->content = $_POST['content'];
    //     $this->date    = time();
    //
    //     $this->db->update('entries', $this, array('id' => $_POST['id']));
    // }

    function get_all_quotations(){
      $q = array('is_active' => '1');
      $query = $this->db->get_where('tbl_quotation', $q);
      if( $query->num_rows() > 0 ) {
        return $query->result();
      } else {
          return 0;
      }

    }

    function create_quotation(){
      $data = array(
  			'quot_name' => $_REQUEST['qname'],
  			'arrival_date' => $this->common->date_format($_REQUEST['cidate']),
  			'departure_date' => $this->common->date_format($_REQUEST['codate']),
  			'contact' => '',
  			'email' => $_REQUEST['email'],
  			'created_by' => $_REQUEST['user'],
        'pax' => $_REQUEST['pax'],
        'minor' => $_REQUEST['minors']
  		);
      //$str = $this->db->insert_string('tbl_quotation', $data);
      //$str = $this->db->insert('tbl_quotation', $data);
      $this->db->insert('tbl_quotation', $data);
      $str = $this->db->insert_id();
      return $str;
    }

    function get_quotation_data($id){
      $data = array(
        'id' => $id
      );
  		 $query = $this->db->get_where('tbl_quotation',$data);
  		return $query->result();
  	}

    function get_cities(){
      $query = $this->db->get('tbl_city');
      return $query->result();
    }
    function get_hotels($id){
      $data = array(
        'city_id' => $id
      );
      $query = $this->db->get_where('tbl_hotel',$data);
     return $query->result();
    }

    function get_rooms($id){
      $data = array(
        'hotel_id' => $id
      );
      $query = $this->db->get_where('tbl_room',$data);
     return $query->result();
    }

    function get_transfer_type(){
      $query = $this->db->get('tbl_transfer_type');
      return $query->result();
    }
    function get_timing(){
      $query = $this->db->get('tbl_daytime');
      return $query->result();
    }

    function get_services(){
      $query = $this->db->get('tbl_services');
      return $query->result();
    }
    function get_services_type(){
      $query = $this->db->get('tbl_services_type');
      return $query->result();
    }


    function get_quotation_hotel($id){
      $search_query = array(
        'quotation_id' => $id
      );
      $query = $this->db->get_where('tbl_quot_hotel',$search_query);
      return $query->result();
    }

    function get_quotation_dayplan($id){
      $search_query = array(
        'quotation_id' => $id
      );
      $query = $this->db->get_where('tbl_dayplan',$search_query);
      return $query->result();
    }

    function get_quotation_txr($id){
      $search_query = array(
        'quotation_id' => $id
      );
      $query = $this->db->get_where('tbl_quot_txr_type',$search_query);
      return $query->result();
    }


    function add_hotel(){
      $insert_data = array(
        'quotation_id' => $_REQUEST['qid'],
        'city_id' => $_REQUEST['city_id'],
        // 'city_area_id' => $_REQUEST['qname'],
        'cin_date' => $_REQUEST['cidate'],
        'cout_date' => $_REQUEST['codate'],
        'no_pax' => $_REQUEST['pax'],
        'hotel_id' => $_REQUEST['hotel_id'],
        'room_type_id' => $_REQUEST['room_id'],
      );
      if($this->db->insert('tbl_quot_hotel',$insert_data)){
        echo '<div class="panel panel-default"> <div class="panel-body"> <table class="table table-hover"> <tr> <th>city</th><th>Hotel</th><th>Checkin</th><th>checkout</th><th>Night(s)</th><th>PAX</th><th>Minor(s)</th> </tr> <tr> <td>'.$_REQUEST['city_id'].'</td><td>'.$_REQUEST['hotel_id'].'</td><td>'.$_REQUEST['cidate'].'</td><td>'.$_REQUEST['codate'].'</td><td>Night(s)</td><td>'.$_REQUEST['pax'].'</td><td>Minor(s)</td> </tr> </table> </div> </div>';
      }else{
        echo "Unable to add data due to " . $this->db->error();
      }

    }



    function add_dayplan(){
      $insert_data = array(
        'quotation_id' => $_REQUEST['qid'],
        'dayplan_date' => $_REQUEST['dayplan_date'],
        'daytime_id' => $_REQUEST['daytime_id'],
         'services_type_id' => '1',
        'services_id' => $_REQUEST['services_id']
      );
      if($this->db->insert('tbl_dayplan',$insert_data)){
        echo '<div class="panel panel-default"> <div class="panel-body"> <table class="table table-hover"> <tr><th>date</th><th>Time</th><th>Services</th></tr><td>'.$_REQUEST['dayplan_date'].'</td><td>'.$_REQUEST['daytime_id'].'</td><td>'.$_REQUEST['services_id'].'</td></tr> </table> </div> </div>';
      }else{
        echo "Unable to add data due to " . $this->db->error();
      }
      // echo '<div class="panel panel-default"><div class="panel-body"><table class="table table-hover"><tr><th>date</th><th>Time</th><th>Services</th></tr><tr><td>date</td><td>Time</td><td>Services</td></tr></table></div></div>';
    }


    function add_txr_type(){
      $insert_data = array(
        'quotation_id' => $_REQUEST['qid'],
        'txr_type' => $_REQUEST['txr_type']
      );
      if($this->db->insert('tbl_quot_txr_type',$insert_data)){
        echo '<div class="panel panel-default"> <div class="panel-body"> <table class="table table-hover"> <tr><th>id</th><th>transfer type</th></tr><td>'.$_REQUEST['qid'].'</td><td>'.$_REQUEST['txr_type'].'</td></tr> </table> </div> </div>';
      }else{
        echo "Unable to add data due to " . $this->db->error();
      }
      // echo '<div class="panel panel-default"><div class="panel-body"><table class="table table-hover"><tr><th>date</th><th>Time</th><th>Services</th></tr><tr><td>date</td><td>Time</td><td>Services</td></tr></table></div></div>';
    }


    function quotation_hotel_room_price($id){
      $query = "select max(room_price) FROM tbl_room where id in (select room_type_id from tbl_quot_hotel where quotation_id = '$id')";
      $q = $this->db->query($query);
      return $q->result();
    }
    function get_service_ids_by_qid_date($qid,$dt){
      $query = "select group_concat(services_id) FROM tbl_dayplan WHERE quotation_id = '$qid' AND dayplan_date = '$dt'";
      $q = $this->db->query($query);
      return $q->result();
    }
    function get_price_by_service_ids($ids){
      $query = "select sum(service_price) FROM tbl_services WHERE id in ($ids)";
      $q = $this->db->query($query);
      return $q->result();
    }
    function delete(){
      // $update_data = array(
      //   'id' => $_REQUEST['id'],
      //   'is_active' => '0'
      // );
      $this->db->set('is_active', '0');
      $this->db->where('id', $_REQUEST['id']);
    $this->db->update('tbl_quotation'); // give
      //$this->db->replace('tbl_quotation', $update_data);
      return $this->db->affected_rows() > 0 ? true:false;
    }
}
?>
