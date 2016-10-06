<?php if( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Hotels extends CI_Controller{
  function __Construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    if( !$this->session->userdata('logged_in')  ){
      redirect('user/signin', 'refresh');
    }
    $this->load->database();
    $this->load->model('common');
  }
  public function index(){
    $data['title'] = 'Hotels | Quoataion Manager';
    $data['cities'] = $this->common->get_all_cities();
    $data['hotels'] = $this->common->get_all_hotels();
    $this->load->view('head',$data);
    $this->load->view('side_menu',$data);
    $this->load->view('hotels',$data);
    // $this->load->view('quotation_foot',$data);
  }
  public function add(){
    $res = $this->common->add_hotel();
    echo json_encode($res);
  }
  public function remove(){

  }

}
