<?php if( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Services extends CI_Controller{
  function __Construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    if( !$this->session->userdata('logged_in')  ){
      redirect('user/signin', 'refresh');
    }
    $this->load->database();
    $this->load->model('common');
    $this->load->model('service');
  }
  public function index(){
    $data['title'] = 'Services | Quoataion Manager';
    $data['heading'] = 'Services';
    $data['services'] = $this->common->get_all_services();
    $data['service_type'] = $this->common->get_all_service_types();
    $this->load->view('head',$data);
    $this->load->view('side_menu',$data);
    $this->load->view('services',$data);
    // $this->load->view('quotation_foot',$data);
  }

  public function edit($id){
    $data['service'] = $this->service->get_service($id);
    $this->load->view('head',$data);
    $this->load->view('side_menu',$data);
    $this->load->view('edit_service', $data);
  }
  public function add(){
    $res = $this->common->add_service();
    echo json_encode($res);
  }
  // function view($id){
  //   $data['service'] = $this->common->get_service_by_id($id);
  // }

  function update(){
    $res = $this->service->update();
    redirect('services/','refresh');
  }
  function upload(){
    $res = $this->service->upload_img();
    echo json_encode($res);
  }
  public function remove(){

  }



}
