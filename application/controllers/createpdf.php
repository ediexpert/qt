<?php if( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Createpdf extends CI_Controller{
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
      $this->load->model('quotation_model');

  }
  function pdf($id){
    $this->load->helper('pdf_helper');

    $this->load->view('pdfreport');
}


function view($id){
  $this->load->helper('pdf_helper');
  $this->load->database();
  $this->load->helper('url');
  $this->load->library('session');
  if ( ! $this->session->userdata('logged_in')){
     redirect('/user/signin', 'refresh');
   }
  $this->load->model('common');
  $this->load->model('quotation_model');
  $data['company'] = $this->common->company_info(1);
  $data['quotation_info'] = $this->quotation_model->get_quotation_data($id);
  $data['hotel']=$this->quotation_model->get_quotation_hotel($id);
  $data['dayplan']=$this->quotation_model->get_quotation_dayplan($id);
  $data['txr']=$this->quotation_model->get_quotation_txr($id);;
  $this->load->view('invoice',$data);
}
}
