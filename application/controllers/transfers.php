<?php if( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Transfers extends CI_Controller{
  function __construct()
	 {
			 // Call the Model constructor
			 parent::__construct();
			 $this->load->database();
			 $this->load->helper('url');
			 $this->load->library('session');
			 if ( ! $this->session->userdata('logged_in')){
				  redirect('/user/signin', 'refresh');
	    	}
			 $this->load->model('common');
			 $this->load->model('service');
			 $this->load->model('quotation_model');
			 $this->load->model('user_model');
			 $this->load->model('transfer_model');

	 }
  public function index(){
    $data['title'] = 'Transfers | Quoataion Manager';
    $data['heading'] = 'Transfers';
    $data['transfers'] = $this->transfer_model->get_all();
    $data['ttype'] = $this->common->get_all_transfer_types();
    $data['areas'] = $this->common->get_all_city_areas();
	$data['isAdmin'] = $this->user_model->is_admin();
    $this->load->view('head',$data);
    $this->load->view('side_menu',$data);
    $this->load->view('transfers',$data);
    //$this->load->view('quotation_foot',$data);
  }
  public function add(){
    $res = $this->transfer_model->add();
    echo json_encode($res);
  }
  public function add_vehicle(){
    $res = $this->transfer_model->add_vehicle();
    echo json_encode($res);
  }
  public function remove(){

  }

}
