		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Auth extends CI_Controller {
			public function __construct()
		{
			parent::__construct();
			$this->load->helper('url'); // Load the URL helper
			$this->load->helper('form'); // (optional) Load form helper if using forms
			$this->load->library('session'); // (optional) if using flashdata
			$this->load->model('apimodel');

		}
        public function login()
        {
            // Load session library if not autoloaded
            $this->load->library('session');
        
            // Get JSON POST data
            $json = file_get_contents('php://input');
            $requestData = json_decode($json, true);
        
            if (!isset($requestData['email']) || !isset($requestData['password'])) {
                echo "0";
                return;
            }
        
            $apimodel = new Apimodel();
            $apimodel->tablename = 'users';
        
            // Get user data by email
            $user = $apimodel->getSingleData(['email' => $requestData['email']]);
        
            if (!$user) {
                echo "0"; // User not found
                return;
            }
        
            // Validate password
            $inputPassword = md5($requestData['password']);
            if ($inputPassword !== $user->password) {
                echo "0"; // Wrong password
                return;
            }
        
            // Check if account is active
            if ($user->status != 0) {
                echo "0"; // Inactive account
                return;
            }
        
            // Log the login event
            $apimodel->tablename = 'logs';
            $apimodel->insertData([
                'email' => $user->email,
                'mobile' => $user->mobile,
                'logged_at' => date('Y-m-d H:i:s')
            ]);
        
            // Set session data
            $this->session->set_userdata([
                'user_id'    => $user->id,
                'email'      => $user->email,
                'name'       => $user->name,
                'mobile'       => $user->mobile,
                'usertype'   => $user->usertype,
                'logged_in'  => true
            ]);
        
            // Return based on usertype
            switch ($user->usertype) {
                case 'user':
                    echo "1";
                    break;
                case 'admin':
                    echo "2";
                    break;
                case 'superadmin':
                    echo "3";
                    break;
                default:
                    echo "0"; // Fallback
            }
        }
        
        
		
		
		}
