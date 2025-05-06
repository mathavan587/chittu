		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		class Admin extends CI_Controller {
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

    if ($userType === 'admin') {
        
    }else{
    redirect('logout'); // No need for return, just call redirect
    }

    // Otherwise, continue
}

public function index()
{
                $this->check_session();

                $apimodel = new Apimodel();
                $apimodel->tablename = 'users';
                $select=array('id');
                $condition=array('is_deleted'=>'0','usertype'=>'user','status'=>'0');
                $user_count = count($apimodel->getMultipleData($condition,$select));
                $apimodel->tablename = 'orders';
                $select=array('id');
                $condition=array('is_deleted'=>'0');
                $orders_count = count($apimodel->getMultipleData($condition,$select));
                $apimodel->tablename = 'services';
                $select=array('id');
                $condition=array('is_deleted'=>'0');
                $services_count = count($apimodel->getMultipleData($condition,$select));
                $apimodel->tablename = 'categories';
                $select='*';
                // $condition='';
                $condition=array('is_deleted'=>'0');
                $categories_count = count($apimodel->getMultipleData($condition,$select));
                $data=[
                'dashboard' => 'Dashboard',
                'path' => 'General/Dashboard',
                'content'=>'',
                 'container'=>'0',
                'include'=> 'card',
                'user_count'=>$user_count,
                'orders_count'=>$orders_count,
                'services_count'=>$services_count,
                'categories_count'=>$categories_count
             ];
            
				$this->load->view('admin/include/header',$data);
				$this->load->view('admin/body');
				$this->load->view('admin/include/footer');
			}



            public function user()
            {
                            $this->check_session();
            
                            $apimodel = new Apimodel();
                            $apimodel->tablename = 'users';
                            $select=array('id');
                            $condition=array('is_deleted'=>'0','usertype'=>'user');
                            $user_count = count($apimodel->getMultipleData($condition,$select));
                            $select=array('id','name','email','mobile','status','otp','usertype','created_at');
                            $users = $apimodel->getMultipleData($condition,$select);
                         
                            $data=[
                            'dashboard' => 'Users',
                            'path' => 'General/Users',
                            'content'=>'',
                             'container'=>'1',
                            'include'=> 'user',
                            'user_count'=>$user_count,
                            'users'=>$users
                         ];
                        
                            $this->load->view('admin/include/header',$data);
                            $this->load->view('admin/body');
                            $this->load->view('admin/include/footer');
                        }     
                        
                        


                        public function get_user() {
                            $id = $this->input->post('id');
                            $user = $this->db->get_where('users', ['id' => $id])->row();
                            echo json_encode($user);
                        }
                        
                        public function update_user() {
                            $id = $this->input->post('id');
                            $data = [
                                'name' => $this->input->post('name'),
                                'email' => $this->input->post('email'),
                                'mobile' => $this->input->post('mobile'),
                                'otp' => $this->input->post('otp'),
                                'status' => $this->input->post('status')
                            ];
                            $updated = $this->db->update('users', $data, ['id' => $id]);
                            echo json_encode(['success' => $updated]);
                        }

                        public function insert_user() {
                            
                            // $data = $this->input->post();
                            // print_r($data);
                            $data = [
                                'name' => $this->input->post('name'),
                                'email' => $this->input->post('email'),
                                'mobile' => $this->input->post('mobile'),
                                'otp' => $this->input->post('otp'),
                                'status' => $this->input->post('status')
                            ];
                        //    print_r($data);
                            // $apimodel = new Apimodel();
                            $apimodel = new Apimodel();
                            $apimodel->tablename = 'users';
                            $result=$apimodel->insertData($data);
                        
                            if ($result) {
                                echo json_encode(['success' => true]);
                            } else {
                                echo json_encode(['success' => false]);
                            }
                        }
                        


                        public function services()
                        {
                                        $this->check_session();
                        
                                        $apimodel = new Apimodel();
                                    
                                        $apimodel->tablename = 'services';
                                        $select=array('id', 'service_id', 'name', 'category', 'rate', 'set_rate','percentage', 'min', 'max', 'type', 'desc');
                                        $condition=array('is_deleted'=>'0');
                                        $services_count = count($apimodel->getMultipleData($condition,$select));
                                        $services = $apimodel->getMultipleData($condition,$select);
 
                                        $apimodel->tablename = 'services_import';
                                        $select=array('id', 'service_id', 'name', 'category', 'rate', 'set_rate','percentage', 'min', 'max', 'type', 'desc' ,'imported');
                                        $services_count = count($apimodel->getMultipleData($condition,$select));
                                        $services_import = $apimodel->getMultipleData($condition,$select);
                              
                                        $apimodel->tablename = 'services_import';
                                        $data=[
                                            'row'=>'cname'
                                        ];
                                        $cname = $apimodel->getGroupedCategories($data);
                                        $apimodel->tablename = 'services';
                                        $data=[
                                            'row'=>'category'
                                        ];
                                        $names = $apimodel->getGroupedCategories($data);
//  log_message('debug',json_encode($names));
                                        $data=[
                                        'dashboard' => 'Services',
                                        'path' => 'General/Services',
                                        'content'=>'',
                                         'container'=>'1',
                                        'container'=>'0',
                                        'include'=> 'Services',
                                        'services_count'=>$services_count,
                                        'services'=>$services,
                                        'names'=>$names,
                                        'cname'=>$cname,
                                        'services_import'=>$services_import
                                     ];
                                    
                                        $this->load->view('admin/include/header',$data);
                                        $this->load->view('admin/body');
                                        $this->load->view('admin/include/footer');
                                    }     
			
                        public function block()
                        {

                            $id = $this->input->post('id');
                            $this->check_session();
                            if (!empty($id) && is_numeric($id)) {
                                // Update user status to Blocked (example: 1 = blocked)
                                
                                $condition = ['id' => $id];
                                
                                $apimodel = new Apimodel();
                                $apimodel->tablename = 'users';
                                $getdata = $apimodel->getSingleData(array('id' => $id),array('status'));
                                if ($getdata->status==1) {
                                     
                                    $data = ['status' => 0];  
                                }else{
                                    $data = ['status' => 1];

                                }
                                // Using the updateData method from Apimodel
                                $update = $apimodel->updateData($condition, $data);
                                if ($update) {
                                    echo json_encode(['success' => true, 'message' => 'User has been blocked.']);
                                } else {
                                     echo json_encode(['success' => false, 'message' => 'Failed to block user. Please try again.']);
                                }
                            } else {
                                echo json_encode(['success' => false, 'message' => 'Invalid or missing user ID.']);
                            }
                        }



                        public function status()
                        {

                            $id = $this->input->post('id');
                            $this->check_session();
                            
                            if (!empty($id) && is_numeric($id)) {
                                // Update user status to Blocked (example: 1 = blocked)
                                
                                $condition = ['id' => $id];
                                
                                $apimodel = new Apimodel();
                                $apimodel->tablename = 'services';
                                $getdata = $apimodel->getSingleData(array('id' => $id),array('status'));
                               
                                if ($getdata->status==1) {
                                     
                                    $data = ['status' => 0];  
                                }else{
                                    $data = ['status' => 1];

                                }
                                // Using the updateData method from Apimodel
                                $update = $apimodel->updateData($condition, $data);
                                if ($update) {
                                    echo json_encode(['success' => true, 'message' => 'User has been blocked.']);
                                } else {
                                     echo json_encode(['success' => false, 'message' => 'Failed to block user. Please try again.']);
                                }
                            } else {
                                echo json_encode(['success' => false, 'message' => 'Invalid or missing user ID.']);
                            }
                        }

                        // In your Controller
    // Handle the form submission to update the service
     // Method to update service details
     public function update() {
        // Check if the request is made via POST
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Get the form data
            $service_id = $this->input->post('service_id');
            $name = $this->input->post('name');
            $rate = $this->input->post('rate');
            $set_rate = $this->input->post('set_rate');
            $min = $this->input->post('min');
            $percentage = $this->input->post('percentage');
            $max = $this->input->post('max');
            $type = $this->input->post('type');
            $desc = $this->input->post('desc');
            $category = $this->input->post('category');
            $status = $this->input->post('status');
            $id = $this->input->post('id'); // the service ID being updated

            // Prepare data for update
            $data = array(
                'service_id' => $service_id,
                'name' => $name,
                'rate' => $rate,
                'set_rate' => $set_rate,
                'min' => $min,
                'category' => $category,
                'percentage' => $percentage,
                'max' => $max,
                'type' => $type,
                'desc' => $desc,
                'status' => $status
            );  
            $condition=array(
               'id' => $id,
            );

            
            // Update service in the database using the model
            // $result = $this->ServiceModel->update_service($id, $data);
            $apimodel = new Apimodel();
           $apimodel->tablename = 'services';
            $result = $apimodel->updateData($condition, $data);
            // Check if the update was successful
            if ($result) {
                // Respond with success (used by SweetAlert for AJAX success)
                echo json_encode(['status' => 'success', 'message' => 'Service updated successfully!']);
            } else {
                // Respond with failure (used by SweetAlert for AJAX error)
                echo json_encode(['status' => 'error', 'message' => 'Failed to update the service. Please try again.']);
            }
        } else {
            // If not a POST request, show an error (for security)
            show_error('Invalid request method');
        }
    }


                        
public function editService($id)
{
    $apimodel = new Apimodel();
    $apimodel->tablename = 'services';
    $service = $apimodel->getSingleData(array('id' => $id,'status'=>'0','is_deleted'=>'0'),array(`id`, `service_id`, `name`, `category`, `rate`, `set_rate`,`category`,`min`, `max`, `type`, `desc`));
    // $apimodel->tablename = 'categories';
    // $select='*';
    // $condition='';
    // $categories = $apimodel->getMultipleData($condition,$select);
    $apimodel->tablename = 'services';
    $data=[
        'row'=>'category'
    ];
    $categories = $apimodel->getGroupedCategories($data);
    $data=[
        'dashboard' => 'Services',
        'path' => 'Services/Edit',
        'content'=>'0',
        'include'=> 'Services_edit',
        'service'=>$service,
        'categories'=>$categories
    ];
        $this->load->view('admin/include/header',$data);
        $this->load->view('admin/body');
        $this->load->view('admin/include/footer');

    }


    			
    public function delete()
    {

        $id = $this->input->post('id');
        $this->check_session();
        if (!empty($id) && is_numeric($id)) {
            // Update user status to Blocked (example: 1 = blocked)
            
            $condition = ['id' => $id];
            
            $apimodel = new Apimodel();
            $apimodel->tablename = 'services';
            $getdata = $apimodel->getSingleData(array('id' => $id),array('is_deleted'));
            if ($getdata->status==1) {
                 
                $data = ['is_deleted' => 0];  
            }else{
                $data = ['is_deleted' => 1];

            }
            // Using the updateData method from Apimodel
            $update = $apimodel->updateData($condition, $data);
            if ($update) {
                echo json_encode(['success' => true, 'message' => 'User has been blocked.']);
            } else {
                 echo json_encode(['success' => false, 'message' => 'Failed to block user. Please try again.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid or missing user ID.']);
        }
    }







    public function import_delete()
    {

        $ids=$this->input->post('service_ids');
        $this->check_session();
        $apimodel = new Apimodel();
            $apimodel->tablename = 'services_import';  
        foreach ($ids as  $id) {
        $data=[
            'id'=>$id
        ];
            $apimodel->deleteData($data);
        }

    }



    public function import(){
        $data=[
            'dashboard' => 'Services    ',
            'path' => 'Services/Import',
            'content'=>'0',
            'include'=> 'Services_import',
        ];
            $this->load->view('admin/include/header',$data);
            $this->load->view('admin/body');
            $this->load->view('admin/include/footer');
    }


    public function categories()
    {
                    $this->check_session();
    
                    $apimodel = new Apimodel();
                    
                    $apimodel->tablename = 'services';
                    $data=[
                        'row'=>'category'
                    ];
                    $categories = $apimodel->getGroupedCategories($data);
                    // log_message('debug',json_encode($categories));
                    $data=[
                    'dashboard' => 'Categories',
                    'path' => 'General/Categories',
                    'content'=>'',
                     'container'=>'1',
                    'container'=>'0',
                    'include'=> 'categories',
                    'categories'=>$categories
                 ];
                
                    $this->load->view('admin/include/header',$data);
                    $this->load->view('admin/body');
                    $this->load->view('admin/include/footer');
                }    

                public function providers()
                {
                                $this->check_session();
                
                                $apimodel = new Apimodel();
                                
                                $apimodel->tablename = 'services';
                                $data=[
                                    'row'=>'cname'
                                ];
                                $providers = $apimodel->getGroupedCategories($data);
                                // log_message('debug',json_encode($providers));
                                $data=[
                                'dashboard' => 'Providers',
                                'path' => 'General/Providers',
                                'content'=>'',
                                 'container'=>'1',
                                'container'=>'0',
                                'include'=> 'providers',
                                'providers'=>$providers
                             ];
                            
                                $this->load->view('admin/include/header',$data);
                                $this->load->view('admin/body');
                                $this->load->view('admin/include/footer');
                            }    
            
                public function delete_categorie() 
                 {

                    $id = $this->input->post('id');
                    $this->check_session();
                    if (!empty($id) && is_numeric($id)) {
                        // Update user status to Blocked (example: 1 = blocked)
                        
                        $condition = ['id' => $id];
                        
                        $apimodel = new Apimodel();
                        $apimodel->tablename = 'categories';
                        $getdata = $apimodel->getSingleData(array('id' => $id),array('is_deleted'));
                        if ($getdata->status==1) {
                             
                            $data = ['is_deleted' => 0];  
                        }else{
                            $data = ['is_deleted' => 1];
            
                        }
                        // Using the updateData method from Apimodel
                        $update = $apimodel->updateData($condition, $data);
                        if ($update) {
                            echo json_encode(['success' => true, 'message' => 'User has been blocked.']);
                        } else {
                             echo json_encode(['success' => false, 'message' => 'Failed to block user. Please try again.']);
                        }
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Invalid or missing user ID.']);
                    }
                    
                }

            public function editcategorie($id) {

                $apimodel = new Apimodel();
                $apimodel->tablename = 'categories';
                $select='*';
                $condition=array('is_deleted'=>'0','id'=>$id);
                $categories = $apimodel->getSingleData($condition,$select);
                $data=[
                    'dashboard' => 'Categories',
                    'path' => 'Categories/Edit',
                    'content'=>'0',
                    'include'=> 'categories_edit',
                    'service'=>$service,
                    'categories'=>$categories
                ];
                    $this->load->view('admin/include/header',$data);
                    $this->load->view('admin/body');
                    $this->load->view('admin/include/footer');

            }
            public function editcategories()  {
                // print_r($_REQUEST);

                if ($this->input->server('REQUEST_METHOD') === 'POST') {
                    // Get the form data
                    $categories = $this->input->post('categories');
                    $percentage = $this->input->post('percentage');
                    $id = $this->input->post('id'); // the service ID being updated
        
                    // Prepare data for update
                    $data = array(
                        'categories' => $categories,
                        'percentage' => $percentage,
                    );
                    $condition=array(
                       'id' => $id,
                    );
        
                    
                    // Update service in the database using the model
                    // $result = $this->ServiceModel->update_service($id, $data);
                    $apimodel = new Apimodel();
                   $apimodel->tablename = 'categories';
                    $result = $apimodel->updateData($condition, $data);
                    // Check if the update was successful
                    if ($result) {
                        // Respond with success (used by SweetAlert for AJAX success)
                        echo json_encode(['status' => 'success', 'message' => 'Service updated successfully!']);
                    } else {
                        // Respond with failure (used by SweetAlert for AJAX error)
                        echo json_encode(['status' => 'error', 'message' => 'Failed to update the service. Please try again.']);
                    }
                } else {
                    // If not a POST request, show an error (for security)
                    show_error('Invalid request method');
                }

            }
            public function categoryupdate(){
                // print_r($_REQUEST);
                $categories = $this->input->post('category');
                $oldcategories = $this->input->post('oldcategory');


                $data = array(
                    'category' => $categories,
                );
                $condition=array(
                   'category' => $oldcategories,
                );
                // print_r($condition);
    
                
            //     // Update service in the database using the model
            //     // $result = $this->ServiceModel->update_service($id, $data);
                $apimodel = new Apimodel();
               $apimodel->tablename = 'services';
                $result = $apimodel->updateData($condition, $data);
                // log_message('debug',json_encode($result));
               
            }





            public function providerupdate(){
                // print_r($_REQUEST);
                $categories = $this->input->post('category');
                $oldcategories = $this->input->post('oldcategory');


                $data = array(
                    'cname' => $categories,
                );
                $condition=array(
                   'cname' => $oldcategories,
                );
                // print_r($condition);
    
                
            //     // Update service in the database using the model
            //     // $result = $this->ServiceModel->update_service($id, $data);
                $apimodel = new Apimodel();
               $apimodel->tablename = 'services';
                $result = $apimodel->updateData($condition, $data);
                // log_message('debug',json_encode($result));
               
            }

            public function filter_category() {
                $cname = $this->input->post('category');
                $apimodel = new Apimodel();
                $apimodel->tablename = 'services_import';
                $data=[
                    'cname'=>$cname
                ];
                $data['services_import'] = $apimodel->getMultipleData($data); // Adjust to your DB logic
                // print_r($data);
                log_message('debug',json_encode($data));
                $this->load->view('services_table', $data); // View will only contain the table
            }


            public function categorycreate() {
                $category = $this->input->post('category');
            
                if (empty($category)) {
                    echo json_encode(['success' => false, 'message' => 'Category is required']);
                    return;
                }
            
                $data = ['category' => $category];
                $insert = $this->db->insert('services', $data);
            
                if ($insert) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Insert failed']);
                }
            }

            public function categories_delete()
            {

// log_message('debug',print_r($_REQUEST));
//                 print_r($this->input->post('category'));
$data=[
                'category' => $this->input->post('category')
];
                $apimodel = new Apimodel();
                $apimodel->tablename = 'services';
                $result = $apimodel->deleteData($data);
                echo $result;
                // log_message('debug',json_encode($result));
                // $this->load->view('services_table'); // View will only contain the table
            }
            
            
		}
