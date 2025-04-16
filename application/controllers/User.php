<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class User extends CI_Controller {
			public function __construct()
		{
			parent::__construct();
			$this->load->helper('url'); // Load the URL helper
			$this->load->helper('form'); // (optional) Load form helper if using forms
			$this->load->library('session'); // (optional) if using flashdata
			$this->load->model('apimodel');

		}
		public function check_session()
{
    $userType = $this->session->userdata('usertype');

    if (!$userType || !$userType === 'user') {
        // If usertype is missing or is just a normal user, log them out
        redirect('logout'); // No need for return, just call redirect
    }

    // Otherwise, continue
}
		
    public function index(){
		$this->check_session();
		$data=array(
			'title'=>'Sign up',
			'carde_title'=>'Create Account'
		);
		$this->load->view('user/home',$data);
    }

	public function logout()
{
    $this->session->sess_destroy();
    redirect('login'); // or wherever your login page is
}

		
		}
