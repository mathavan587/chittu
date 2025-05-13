		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Welcome extends CI_Controller {
			public function __construct()
		{
			parent::__construct();
			$this->load->helper('url'); // Load the URL helper
			$this->load->helper('form'); // (optional) Load form helper if using forms
			$this->load->library('session'); // (optional) if using flashdata
			$this->load->model('apimodel');

		}
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
			* @see https://codeigniter.com/userguide3/general/urls.html
			*/
			public function index()
			{
			$data=[
		            'title'=>'home',
					'include'=> 'body',
					// 'services'=>$services,
				 ];
				 
				$this->load->view('home/include/header',$data);
				$this->load->view('home/body');
				$this->load->view('home/include/footer');
			}
			
			public function signup(){
				$data=array(
					'title'=>'Sign up',
					'carde_title'=>'Create Account',
					'include'=> 'registration',
					'services'=>$services
				);

				$this->load->view('home/include/header',$data);
				$this->load->view('home/body');
				$this->load->view('home/include/footer');
				// $this->load->view('registration',$data);
			}
			public function register()
			{
			log_message('debug',json_encode('register'));

			$json = file_get_contents('php://input');
			$data = json_decode($json, true);			
			$data = array(
			    'name' => $data['name'],
			    'email' => $data['email'],
			    'password' => md5($data['password']),
			    'mobile' => $data['mobile'],
			    'usertype' => 'user',
			    'otp' => rand(10000000, 99999999),
				'status'=> true,
				'is_deleted'=> false,
				'created_at'=>date('Y-m-d H:i:s'),
				'modified_at' =>date('Y-m-d H:i:s')	);
				
				$apimodel = new Apimodel();
				$apimodel->tablename = 'users';
				$result = $apimodel->insertData($data);
				// log_message('debug',json_encode($result));
if ($result==0) {
 
	echo json_encode($result);
}else{
	$id=$result;
	$this->sendmail($id);
	echo json_encode($result);
}
		}
public function sendmail($id=null){
	$apimodel = new Apimodel();
	$apimodel->tablename = 'users';
	$getdata=$apimodel->getSingleData(array('id' => $id));
	include('smtp/SMTP.php');
          $apimodel->tablename = 'settings';
          $condition=array('categories'=>'email-smtp');
          $link = $apimodel->getSingleData($condition,$select);
          $email = $link->link;
		    $condition=array('categories'=>'password-smtp');
          $link = $apimodel->getSingleData($condition,$select);
          $password = $link->link;
	return email($email,$password,'Chittu.in',$getdata->email,'Chittu.in','email id verification Chittu.in','email id verification code : '.$getdata->otp.'<br>'.'verification Url : '.base_url('verification'));
}

public function verification(){


	$data=array(
		            'title'=>'verification',
					'include'=> 'verification',
             		'carde_title'=>'Account verify'		
					// 'services'=>$services,
	);
				 
				$this->load->view('home/include/header',$data);
				$this->load->view('home/body');
				$this->load->view('home/include/footer');
	// $this->load->view('verification',$data);
}

public function verify(){
	$json = file_get_contents('php://input');
	$data = json_decode($json, true);	
	$data = array(
		'email' => $data['email'],
		'otp' => $data['otp']
		);
	$apimodel = new Apimodel();
	$apimodel->tablename = 'verification';
	$result = $apimodel->insertData($data);
	if($result==0){
	
		echo json_encode($result);

	}else{
		$apimodel = new Apimodel();
		$apimodel->tablename = 'users';
		$result=$apimodel->updateData($data, array('status' =>  0));		
		echo json_encode($result);
	}

}
public function login(){


	$userType = $this->session->userdata('usertype');
    if ($userType === 'user') {
    redirect('user'); // No need for return, just call redirect
        
    }elseif ($userType === 'admin') {
		redirect('admin'); // No need for return, just call redirect
			
		}
		$data=array(
		            'title'=>'Login',
		            'carde_title'=>'Login Account',
					'include'=> 'login',
					// 'services'=>$services
				);

					$this->load->view('home/include/header',$data);
				$this->load->view('home/body');
				$this->load->view('home/include/footer');
			



	// $this->load->view('login',$data);
}
public function services(){

			
	  $apimodel = new Apimodel();
                                    
                                        $apimodel->tablename = 'services';
                                        $select=array('id', 'service_id', 'name', 'category', 'rate', 'set_rate','percentage', 'min', 'max', 'type','avg_time', 'desc');
                                        $condition=array('is_deleted'=>'0');
                                        $services_count = count($apimodel->getMultipleData($condition,$select));
                                        $services = $apimodel->getMultipleData($condition,$select);
	$data=array(
		            'title'=>'services',
					'include'=> 'services',
					'services'=>$services
				);

				$this->load->view('home/include/header',$data);
				$this->load->view('home/body');
				$this->load->view('home/include/footer');
}


	public function about()
			{
			$data=[
		            'title'=>'About',
					'include'=> 'about',
					// 'services'=>$services,
				 ];
				 
				$this->load->view('home/include/header',$data);
				$this->load->view('home/body');
				$this->load->view('home/include/footer');
			}


			public function contact()
			{	
			$data=[
		            'title'=>'Contact',
					'include'=> 'contact',
					// 'services'=>$services,
				 ];
				 
				$this->load->view('home/include/header',$data);
				$this->load->view('home/body');
				$this->load->view('home/include/footer');
			}

				public function blog()
			{	
			$data=[
		            'title'=>'Blog',
					'include'=> 'blog',
					// 'services'=>$services,
				 ];
				 
				$this->load->view('home/include/header',$data);
				$this->load->view('home/body');
				$this->load->view('home/include/footer');
			}
		
		}
