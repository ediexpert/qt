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
      $query = $this->db->get('tbl_quotation');
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
  			'contact' => $_REQUEST['qname'],
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
    function add_hotel(){
      echo '<div class="panel panel-default"> <div class="panel-body"> <table class="table table-hover"> <tr> <th>city</th><th>Hotel</th><th>Checkin</th><th>checkout</th><th>Night(s)</th><th>PAX</th><th>Minor(s)</th> </tr> <tr> <td>city</td><td>Hotel</td><td>Checkin</td><td>checkout</td><td>Night(s)</td><td>PAX</td><td>Minor(s)</td> </tr> </table> </div> </div>';
    }
    function add_dayplan(){
      echo '<div class="panel panel-default"><div class="panel-body"><table class="table table-hover"><tr><th>date</th><th>Time</th><th>Services</th></tr><tr><td>date</td><td>Time</td><td>Services</td></tr></table></div></div>';
    }

}
?>
