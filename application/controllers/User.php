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

public function getCategorypercentage(){
	// echo "getCategorypercentage";


	$this->check_session();

    $catId = $this->input->get('category_id'); // from GET
//   echo $catId;
	// echo $catId;	
    $this->load->model('Apimodel');
    $this->Apimodel->tablename = 'categories';

    // $services = $this->Apimodel->getMultipleData(['category' => $catId], '*');
    $categories = $this->Apimodel->getSingleData(['id' => $catId], 'percentage');
    
    echo json_encode($categories);

}


public function placeOrder()
{
    $category_id = $this->input->post('category_id');
    $service_id = $this->input->post('service_id');
    $link = $this->input->post('link');
    $quantity = $this->input->post('quantity');
    $amount = $this->input->post('amount');
    $user_id = $this->input->post('user_id');

    // Basic validation (do more in production)
    if (!$category_id || !$service_id || !$link || !$quantity || !$amount) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        return;
    }

    // Example insert
    $this->load->model('Apimodel');
    $this->Apimodel->tablename = 'orders';

    $insertData = [
        'category_id' => $category_id,
        'service_id' => $service_id,
        'link' => $link,
        'quantity' => $quantity,
        'amount' => $amount,
        'user_id' => $user_id,
        'created_at' => date('Y-m-d H:i:s')
    ];

    $this->Apimodel->insertData($insertData);

    echo json_encode(['status' => 'success', 'message' => 'Order placed successfully!']);
}

		
		}
