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
		$this->load->view('user/header',$data);
		$this->load->view('user/home');
		$this->load->view('user/footer');

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
    // Step 1: Collect POST data

$data=[
    'category_id' => $this->input->post('category'),
    'service_id'  => $this->input->post('service'),
    'link'        => $this->input->post('link'),
    'quantity'    => $this->input->post('quantity'),
    'amount'      => $this->input->post('amount'),
    'user_id'     => $this->session->userdata('user_id')
];
// print_r($_POST);

        // $apimodel = new Apimodel();
        // $apimodel->tablename = "orders";
        // $dataPushed = $apimodel->insertData($data);
        // echo  $dataPushed;
          
        
    
    $amount      = $data['amount'];

    // // Step 2: Session data (validate session exists)
    // if (!isset($_SESSION['name']) || !isset($_SESSION['email']) || !isset($_SESSION['mobile'])) {
    //     echo json_encode(['status' => 'error', 'message' => 'User session is missing.']);
    //     return;
    // }

    $name   =  $this->session->userdata('name');
    $email  =  $this->session->userdata('email');
    $mobile =  $this->session->userdata('mobile');

    // // Step 3: Razorpay amount (in paise)
    $razorpayAmount = $amount * 100;


    // // Step 4: Call Razorpay Payment class
    include_once "Razorpay_lib/amt.php";
    $amt = new amt();

    $paymentData = [
        "data" => [
            "name"    => $name,
            "email"   => $email,
            "contact" => $mobile,
            "amt"     => $razorpayAmount,
    'category' => $this->input->post('category'),
    'service'  => $this->input->post('service'),
    'link'        => $this->input->post('link'),
    'quantity'    => $this->input->post('quantity'),
    'amount'      =>  $razorpayAmount,
    'user_id'     => $this->session->userdata('user_id')
        ]           
    ];

    // // Step 5: Start Razorpay flow
    $amt->pay($paymentData);


    // Step 6: Save to DB (INR format)


   
}


public function verify_payment()
{


    $razorpayAmount=$this->input->post('amount');
   // --- The Formatting Logic ---

// 1. Ensure the input is treated as a number (important if it might be a string)
$numericAmount = (float)$razorpayAmount;

// 2. Divide by 100 to position the decimal point correctly
$amountWithDecimal = $numericAmount / 100;

// 3. Format the result to always have exactly two decimal places
//    Params: number_format(number, decimals, decimal_separator, thousands_separator)
//    We want 2 decimals, '.' as separator, and no thousands separator ('')
$formattedAmountString = number_format($amountWithDecimal, 2, '.', '');
// Now $formattedAmountString holds the string "20589.66"





    $data=[
        'paymentId' => $this->input->post('razorpay_payment_id'),
        'orderId'   => $this->input->post('razorpay_order_id'),
        'signature' => $this->input->post('razorpay_signature'),
        'category_id' => $this->input->post('category'),
        'service_id'  => $this->input->post('service'),
        'link'        => $this->input->post('link'),
        'quantity'    => $this->input->post('quantity'),
        'amount'      => $formattedAmountString,
        'user_id'     => $_SESSION['user_id']
    ];



    
    // print_r($data);
$apimodel = new Apimodel();
$apimodel->tablename = "orders";
$dataPushed = $apimodel->insertData($data);
if ($dataPushed) {# code...
    include('verify_payment1.php');
}else{
    echo "not";
}


}

public function Transaction(){
    $this->check_session();
    $apimodel = new Apimodel();
    $apimodel->tablename = 'orders';
    $select=array('id','service_id','amount','user_id','created_at','paymentId');
    $condition=array('is_deleted'=>'0','user_id'=>$_SESSION['user_id']);
    $data['transaction'] = $apimodel->getMultipleData($condition,$select);


  

    $this->load->view('user/header',$data);
    $this->load->view('user/transaction');
    $this->load->view('user/footer');
}


		
		}
