	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

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
			 $this->load->helper('url');
			 $this->load->library('session');
			//  if ( ! $this->session->userdata('logged_in')){
			// 	  redirect('/user/signin', 'refresh');
	    // 	}
			 $this->load->database();
			 $this->load->model('user_model');
			 $this->load->model('common');
			 $this->load->database();

			$this->load->model('quotation_model');


	 }


	 public function signin(){
		 $this->load->view('login');
	 }
	public function login()
	{


		$res =$this->user_model->login();
		if($res === false){
			$data['err'] = "Username or Password is wrong!";
			$this->load->view('login',$data);
		}else{
			redirect('dashboard', 'refresh');
		}


	}

	

	function logout(){
		 $this->session->unset_userdata('logged_in');
		 redirect('user/signin','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
