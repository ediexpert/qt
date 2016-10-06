<?php if( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Dashboard extends CI_Controller{
  function __Construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->database();
    $this->load->model('common');
    $this->load->model('quotation_model');
  }

  public function index(){
      if( !$this->session->userdata('logged_in')  ){
        redirect('user/signin', 'referesh');
      }
      $data['quotations'] = $this->quotation_model->get_all_quotations();

  		$this->load->view('quotation_head');
  		$this->load->view('side_menu');
  		$this->load->view('quotation',$data);
  		$this->load->view('quotation_foot');
  }
}
