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
		$apimodel = new Apimodel();
		$apimodel->tablename = 'categories';
		$data['categories'] = $apimodel->getMultipleData();
		$this->load->view('user/home',$data);
    }

	public function logout()
{
    $this->session->sess_destroy();
    redirect('login'); // or wherever your login page is
}

public function getServicesByCategory()
{
	$this->check_session();

    $catId = $this->input->get('category_id'); // from GET

	// echo $catId;	
    $this->load->model('Apimodel');
    $this->Apimodel->tablename = 'services';

    $services = $this->Apimodel->getMultipleData(['category' => $catId], '*');
    
    echo json_encode($services); // for AJAX
}


public function getServicesByservice(){
	$this->check_session();

    $catId = $this->input->get('category_id'); // from GET
//   echo $catId;
	// echo $catId;	
    $this->load->model('Apimodel');
    $this->Apimodel->tablename = 'services';

    // $services = $this->Apimodel->getMultipleData(['category' => $catId], '*');
    $services = $this->Apimodel->getSingleData(['id' => $catId], '*');
    
    echo json_encode($services); // for AJAX

}

		
		}
