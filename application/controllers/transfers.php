<?php if( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Transfers extends CI_Controller{
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
    $data['title'] = 'Transfers | Quoataion Manager';
    $data['heading'] = 'Transfers';
    $data['transfers'] = $this->common->get_all_transfers();
    $data['ttype'] = $this->common->get_all_transfer_types();
    $data['areas'] = $this->common->get_all_city_areas();
    $this->load->view('head',$data);
    $this->load->view('side_menu',$data);
    $this->load->view('transfers',$data);
    //$this->load->view('quotation_foot',$data);
  }
  public function add(){
    $res = $this->common->add_transfers();
    echo json_encode($res);
  }
  public function remove(){

  }

}
