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
			 $this->load->library('session');
			 if ( ! $this->session->userdata('logged_in')){
				  redirect('/user/signin', 'refresh');
	    	}
			 $this->load->model('common');
			 $this->load->model('service');
			 $this->load->model('quotation_model');
			 $this->load->model('user_model');

	 }
	public function index()
	{
		$data['quotations'] = $this->quotation_model->get_all_quotations();
		$data['isAdmin'] = $this->user_model->is_admin();
		$this->load->view('quotation_head');
		$this->load->view('side_menu');
		$this->load->view('quotation',$data);
		//$this->load->view('quotation_foot');

	}


	public function view($id){
		$data['company'] = $this->common->company_info(1);
		$data['quotation_info'] = $this->quotation_model->get_quotation_data($id);
		$data['hotel']=$this->quotation_model->get_quotation_hotel($id);
		$data['dayplan']=$this->quotation_model->get_quotation_dayplan($id);
		$data['txr']=$this->quotation_model->get_quotation_txr($id);
		$data['isAdmin'] = $this->user_model->is_admin();
		$this->load->view('quotation_head');
		$this->load->view('side_menu');
		$this->load->view('view_quotation',$data);
	}

	function itenary($id){
		$data['company'] = $this->common->company_info(1);
		$data['quotation_info'] = $this->quotation_model->get_quotation_data($id);
		$data['hotel']=$this->quotation_model->get_quotation_hotel($id);
		$data['dayplan']=$this->quotation_model->get_quotation_dayplan($id);
		$data['txr']=$this->quotation_model->get_quotation_txr($id);
		$this->load->view('quotation_head');
		$this->load->view('side_menu');
		$this->load->view('itenary', $data);
	}


	public function id($id)
	{
		$data['quot'] = $id;
		$this->load->view('quot',$data);
	}
	public function new_quotation()
	{
		$this->load->view('form_head');
		$this->load->view('side_menu');
		$this->load->view('new_quotation_form');
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
		$data['quotation_hotel'] = $this->quotation_model->get_quotation_hotel($id);
		$data['quotation_dayplan'] = $this->quotation_model->get_quotation_dayplan($id);
		$data['timing'] = $this->quotation_model->get_timing($id);
		$data['transfer_type'] = $this->quotation_model->get_transfer_type();
		$data['services'] = $this->quotation_model->get_services();
		$data['services_type'] = $this->quotation_model->get_services_type();
		$data['transfer_type'] = $this->quotation_model->get_transfer_type();
		$this->load->view('new_quotation_head');
		$this->load->view('side_menu');
		$this->load->view('new_quotation_wizard',$data);
		$this->load->view('new_quotation_foot');
	}


	public function get_hotels_list($id)	{
                $data['hotels'] = $this->quotation_model->get_hotels($id);
	        echo json_encode($data);
	}

	public function get_rooms($id)	{
                $data['rooms'] = $this->quotation_model->get_rooms($id);
	        echo json_encode($data);
	}


	function add_hotel(){
		$res = $this->quotation_model->add_hotel();
		echo json_encode($res);
	}

	public function add_dayplan(){
		$res = $this->quotation_model->add_dayplan();
		echo json_encode($res);
	}


	public function add_txr_type(){
		$res = $this->quotation_model->add_txr_type();
		echo json_encode($res);
	}

	// function pdf($id){
	// 	$this->load->helper(array('dompdf', 'file'));
  //    // page info here, db calls, etc.
  //   //  $html = $this->load->view('controller/viewfile', $data, true);
	// 	$this->load->helper('file');
	// 	$data['company'] = $this->common->company_info(1);
 // 		$data['quotation_info'] = $this->quotation_model->get_quotation_data($id);
 // 		$data['hotel']=$this->quotation_model->get_quotation_hotel($id);
 // 		$data['dayplan']=$this->quotation_model->get_quotation_dayplan($id);
 // 		$data['txr']=$this->quotation_model->get_quotation_txr($id);
	//
	// 	$html = $this->load->view('quotation_head');
 // 		$html .=$this->load->view('side_menu');
 // 		$html .=$this->load->view('view_quotation',$data);
  //   //  pdf_create($html, 'filename'); or
	//
  //    $data = pdf_create($html, '', false);
  //    write_file('name', $data);
  //    //if you want to write it to disk and/or send it as an attachment
	// }


	function pdf($id){
		$data['company'] = $this->common->company_info(1);
		$data['quotation_info'] = $this->quotation_model->get_quotation_data($id);
		$data['hotel']=$this->quotation_model->get_quotation_hotel($id);
		$data['dayplan']=$this->quotation_model->get_quotation_dayplan($id);
		$data['txr']=$this->quotation_model->get_quotation_txr($id);;
		$this->load->view('quotation_head');
		$this->load->view('side_menu');
		$this->load->view('view_quotation',$data);
	}

	function delete(){
		$res = $this->quotation_model->delete();
		echo json_encode($res);

	}
	function deleteHotel(){
		$res = $this->quotation_model->deleteHotel();
		echo json_encode($res);

	}
	function deleteDayplan(){
		$res = $this->quotation_model->deleteDayplan();
		echo json_encode($res);

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
