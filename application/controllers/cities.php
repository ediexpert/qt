<?php if( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Cities extends CI_Controller{
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
    $data['title'] = 'Cities | Quoataion Manager';
    $data['cities'] = $this->common->get_all_cities();
    $this->load->view('head',$data);
    $this->load->view('side_menu',$data);
    $this->load->view('cities',$data);
    $this->load->view('quotation_foot',$data);
  }
  public function add(){

  }
  public function remove(){

  }
  public function areas(){
    $data['title'] = 'City Area(s)';
    $data['cities'] = $this->common->get_all_city_areas();
    $this->load->view('head',$data);
    $this->load->view('side_menu',$data);
    $this->load->view('areas',$data);
    $this->load->view('quotation_foot',$data);
  }
}
