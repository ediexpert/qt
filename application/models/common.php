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
  public function get_all_cities(){
    $query = $this->db->get('tbl_city');
    return $query->result();
  }
  public function get_all_city_areas(){
    // $sql = 'select b.id,a.city_name,b.area_name from tbl_city a,tbl_city_area b';
    $query = $this->db->get('tbl_city_area');
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
    $str ="";
    $parameters = explode(",",$id);
    foreach ($parameters as $key => $val) {
      $qry = array(
        'id' => $val
      );
      $query = $this->db->get_where('tbl_services',$qry);
      while($row =  $query->result()){
        $str = $str.','.$row['service_name'];
      }
    }
    return $str;

  }
  public function get_all_transfers(){
    $query = $this->db->get('tbl_transfer');
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
}
