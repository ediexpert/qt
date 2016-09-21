<?php if( ! defined('BASEPATH'))  exit('No direct script access allowed');
class Dashboard extends CI_Controller{
  function __Construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    if( !$this->session->userdata('logged_in')  ){
      $this->load->view('login');
    }
    $this->load->database();
  }

  public function index(){
      if( !$this->session->userdata('logged_in')  ){
        redirect('./');
      }
    $this->load->view('dashboard_head');
		$this->load->view('side_menu');
		$this->load->view('dashboard');
		$this->load->view('dashboard_foot');
  }
}
