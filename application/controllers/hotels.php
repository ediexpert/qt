<?php if( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Hotels extends CI_Controller{
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
			 $this->load->model('hotel_model');

	 }
  public function index(){
    $data['title'] = 'Hotels | Quoataion Manager';
    $data['cities'] = $this->common->get_all_cities();
    $data['hotels'] = $this->common->get_all_hotels();
	$data['isAdmin'] = $this->user_model->is_admin();
    $this->load->view('head',$data);
    $this->load->view('side_menu',$data);
    $this->load->view('hotels',$data);
    // $this->load->view('quotation_foot',$data);
  }
  public function view($id){
    $data['title'] = $this->hotel_model->get_hotel_by_id($id);
    $data['cities'] = $this->common->get_all_cities();
    $data['hotels'] = $this->common->get_all_hotels();
	$data['isAdmin'] = $this->user_model->is_admin();
	$data['info'] = $this->hotel_model->get_hotel_info($id);
	$data['rooms'] = $this->hotel_model->get_rooms_by_hotelId($id);
    $this->load->view('head',$data);
    $this->load->view('side_menu',$data);
    $this->load->view('hotels_view',$data);
    // $this->load->view('quotation_foot',$data);
  }
  public function add(){
    $res = $this->common->add_hotel();
    echo json_encode($res);
  }
  public function remove(){

  }
  public function add_room(){
    $res = $this->hotel_model->add_room();
    echo json_encode($res);
  }

}
