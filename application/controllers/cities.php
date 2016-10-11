<?php if( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Cities extends CI_Controller{
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

	 }
  public function index(){
    $data['title'] = 'Cities | Quoataion Manager';
    $data['cities'] = $this->common->get_all_cities();
	$data['isAdmin'] = $this->user_model->is_admin();
    $this->load->view('head',$data);
    $this->load->view('side_menu',$data);
    $this->load->view('cities',$data);
  }
  public function add(){
    $res = $this->common->add_city();
    echo json_encode($res);
  }


  public function remove(){

  }
  public function areas(){
    $data['title'] = 'City Area(s)';
    $data['cities'] = $this->common->get_all_cities();
    $data['areas'] = $this->common->get_all_city_areas();
	$data['isAdmin'] = $this->user_model->is_admin();
    $this->load->view('head',$data);
    $this->load->view('side_menu',$data);
    $this->load->view('areas',$data);
    // $this->load->view('quotation_foot',$data);
  }
  public function add_area(){
    $res = $this->common->add_area();
    echo json_encode($res);
  }

  public function get_area_list($id)	{
                $data['areas'] = $this->common->get_areas_by_city($id);
          echo json_encode($data);
  }



}
