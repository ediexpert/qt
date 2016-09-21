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
    $data['cities'] = $this->common->get_all_transfers();
    $this->load->view('head',$data);
    $this->load->view('side_menu',$data);
    $this->load->view('transfers',$data);
    $this->load->view('quotation_foot',$data);
  }
  public function add(){

  }
  public function remove(){

  }

}
