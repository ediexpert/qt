<?php class Common extends CI_Model{
  function __construct()
  {
      // Call the Model constructor
      parent::__construct();
      $this->load->database();
  }
  public function date_format($date){
    $date = date("Y/m/d", strtotime($date));
    return $date;
  }

  public function convert_date_format_to_dmY($date){
    $date = date("d/m/Y", strtotime($date));
    return $date;
  }


  public function company_info($id){
    $qry = array(
      'id' => $id
    );
    $query = $this->db->get_where('tbl_company',$qry);
    return $query->result();
  }
  public function get_all_cities(){
    $query = $this->db->get('tbl_city');
    return $query->result();
  }
  public function get_all_city_areas(){
    // $sql = 'select b.id,a.city_name,b.area_name from tbl_city a,tbl_city_area b';
    $query = $this->db->get('tbl_city_area');
    return $query->result();
  }

  public function get_areas_by_city($id){
    $qry = array(
      'city_id' => $id
    );
    $query = $this->db->get_where('tbl_city_area',$qry);
    return $query->result();
  }

  public function get_all_hotels(){
    $query = $this->db->get('tbl_hotel');
    return $query->result();
  }
  public function get_all_services(){
    $query = $this->db->get('tbl_services');
    return $query->result();
  }


  public function get_all_service_types(){
    $query = $this->db->get('tbl_services_type');
    return $query->result();
  }


  public function get_service($id){
    $qry = array(
      'id' => $id
    );
    $query = $this->db->get_where('tbl_services',$qry);
    return $query->result();
  }
  public function get_service_type_name($id){
    $qry = array(
      'id' => $id
    );
    $query = $this->db->get_where('tbl_services_type',$qry);
    while($row =  $query->result()){
      return $row['service_type'];
    }

  }


  public function get_service_name_by_id($id){
    $this->db->select('service_name');
    $this->db->where('id',$id);
    $query = $this->db->get('tbl_services');
    return $query->result();
  }


  public function get_hotel_room_type_by_id($id){
    $this->db->select('room_type');
    $this->db->where('id',$id);
    $query = $this->db->get('tbl_room');
    return $query->result();
  }



  public function get_service_name_by_id_str($id){
    $str='';
    $parameters = explode(",",$id);
    foreach ($parameters as $key => $val) {
      $r = $this->get_service_name_by_id($val);
      $str = $str.$r[0]->service_name.', ';
    }
    return $str;

  }


  public function get_hotel_room_type_by_id_str($id){
    $str='';
    $parameters = explode(",",$id);
    foreach ($parameters as $key => $val) {
      $r = $this->get_hotel_room_type_by_id($val);
      $str = $str.$r[0]->room_type.', ';
    }
    return $str;

  }


  public function get_all_transfers(){
    $query = $this->db->get('tbl_transfer');
    return $query->result();
  }

  public function get_all_transfer_types(){
    $query = $this->db->get('tbl_transfer_type');
    return $query->result();
  }

  public function get_city_by_id($id){
    $search_query = array(
      'id' => $id
    );
    $query = $this->db->get_where('tbl_city',$search_query);
    foreach($query->result_array() as $row){
        return $row['city_name'];
    }
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


  function get_time_by_id($id){
    $search_query = array(
      'id' => $id
    );
    $query = $this->db->get_where('tbl_daytime',$search_query);
    foreach($query->result_array() as $row){
        return $row['daytime'];
    }
  }



// city functions
    function add_city(){
      $insert_data = array(
        'city_name' => $_REQUEST['city_name']
      );
      if($this->db->insert('tbl_city',$insert_data)){
        echo '<tr><td></td><td>'.$_REQUEST['city_name'].'</td></tr>';
      }else{
        echo "Unable to add data due to " . $this->db->error();
      }
  }


  function add_area(){
    $insert_data = array(
      'city_id' => $_REQUEST['city_id'],
      'area_name' => $_REQUEST['area']
    );
    if($this->db->insert('tbl_city_area',$insert_data)){
      echo '<tr><td></td><td>'.$_REQUEST['area'].'</td></tr>';
    }else{
      echo "Unable to add data due to " . $this->db->error();
    }
}


function add_service(){
  $insert_data = array(
    'service_type_id' => $_REQUEST['stid'],
    'service_name' => $_REQUEST['ser'],
    'service_price' => $_REQUEST['price']
  );
  if($this->db->insert('tbl_services',$insert_data)){
    echo '<tr><td></td><td>'.$_REQUEST['ser'].'</td><td>'.$_REQUEST['stid'].'</td></tr>';
  }else{
    echo "Unable to add data due to " . $this->db->error();
  }
}

function add_transfers(){
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
    echo '<tr><td></td><td>'.$_REQUEST['to'].'</td><td>'.$_REQUEST['td'].'</td><td>'.$_REQUEST['tup'].'</td><td>'.$_REQUEST['tfp'].'</td></tr>';
  }else{
    echo "Unable to add data due to " . $this->db->error();
  }
}

function add_hotel(){
    $insert_data = array(
      'city_id' => $_REQUEST['city'],
      'hotel_name' => $_REQUEST['hotel']
    );
    if($this->db->insert('tbl_hotel',$insert_data)){
      echo '<tr><td></td><td>'.$_REQUEST['hotel'].'</td></tr>';
    }else{
      echo "Unable to add data due to " . $this->db->error();
    }
  }

}
