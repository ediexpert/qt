<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quotation extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct()
	 {
			 // Call the Model constructor
			 parent::__construct();
			 $this->load->database();
			 $this->load->helper('url');
			 $this->load->model('quotation_model');
			 $this->load->library('session');
			 $this->load->model('common');
	 }
	public function index()
	{
		$data['quotations'] = $this->quotation_model->get_all_quotations();
		$this->load->view('quotation_head');
		$this->load->view('side_menu');
		$this->load->view('quotation',$data);
		$this->load->view('quotation_foot');
	}
	public function id($id)
	{
		$data['quot'] = $id;
		$this->load->view('quot',$data);
	}
	public function new_quotation()
	{
		if(	! $this->session->userdata('logged_in')	){
			redirect('user/signin');
		}
		// 	$this->load->view('new_quotation_head');
		// $this->load->view('side_menu');
		// $this->load->view('new_quotation');
		// $this->load->view('new_quotation_foot');
		$this->load->view('form_head');
		$this->load->view('side_menu');
		$this->load->view('new_quotation_form');
		$this->load->view('form_foot');
	}

	function add(){
		$id = $this->quotation_model->create_quotation();
		redirect('quotation/quot/'.$id,'refresh');
		// $this->load->view('test',$data);
		// $this->quot($id);
	}

	function quot($id){
		$data['quot'] = $this->quotation_model->get_quotation_data($id);
		$data['cities'] = $this->quotation_model->get_cities();
		$this->load->view('new_quotation_head');
		$this->load->view('side_menu');
		$this->load->view('new_quotation_wizard',$data);
		$this->load->view('new_quotation_foot');
	}


	public function get_hotels_list($id)	{
                $data['hotels'] = $this->quotation_model->get_hotels($id);
	        echo json_encode($data);
	}

	function add_hotel(){
		$res = $this->quotation_model->add_hotel();
		echo json_encode($res);
	}

	function add_dayplan(){
		$res = $this->quotation_model->add_dayplan();
		echo json_encode($res);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
