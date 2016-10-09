<?php
class User_Model extends CI_Model {

    // var $title   = '';
    // var $content = '';
    // var $date    = '';
    //
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
 			 $this->load->library('session');
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

    function login(){
      $loginQuery = array(
        'username' => $_REQUEST['user'],
        'pass' => $_REQUEST['pass']
      );
      $user = $_REQUEST['user'];
      $pass = $_REQUEST['pass'];
      $query = $this->db->get_where('tbl_user',$loginQuery);
      // $ql = $this->db->select('pass')->from('tbl_user')->where('name',$user)->get();

    if( $query->num_rows() > 0 ) {
      // $qry = $this->db->get_where('tbl_user',array('name'=>$user));
      // return $qry->result();
      foreach ($query->result() as $row){
        $sess_array = array(
          'id' => $row->id,
           'username' => $row->username,
             'name' => $row->name,
             'is_admin' => $row->is_admin
         );
        }
       $this->session->set_userdata('logged_in', $sess_array);
      return true;
    } else {
        // $a = array('id' => $id, 'message' => $message);
        // $this->db->insert('testing', $a);
        // return $ql->num_rows();
        return false;
    }

      // $qry=(
      //   name : $_REQUEST['user'],
      //   pass : $_REQUEST['pass']
      // );

      // return $query->result();
      // return $qry->result();
    }

    public function is_admin(){
         $r = $this->session->userdata('logged_in');
        return $r['is_admin'];
        // foreach ($r as $key => $value) {
        //   return $value->is_admin;
        // }
    }

}
?>
