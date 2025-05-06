<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// namespace App\Controllers;
// use CodeIgniter\Controller;
// use App\Models\ServiceModel;

class SmmController extends CI_Controller 
{
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
 
    public function importServices()
    {
        $this->check_session();
        $api_url=$this->input->post('api');
        $api_key=$this->input->post('key');
        $cname=$this->input->post('cname');
        $per=$this->input->post('percentage');


    
        $post_fields = [    
            'key'    => $api_key,
            'action' => 'services'
        ];


        $data = [
            'api_url' => $api_url,
            'api_key'       => $api_key,
            'cname'       => $cname
        ];

        $apimodel = new Apimodel();
        $apimodel->tablename = 'import_logs';
        $result=$apimodel->insertData($data);
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // set to false temporarily if you're getting SSL errors
    
        $result = curl_exec($ch);
    
        if (curl_errno($ch)) {
            // Show cURL error
            echo 'cURL Error: ' . curl_error($ch);
            curl_close($ch);
            return;
        }
    
        curl_close($ch);
    
        $services = json_decode($result, true);
    
        if (!is_array($services)) {
            echo "Invalid response or decoding error.";
            return;
        }
        $grouped = [];
    $i=0;
            //    $r=array($services); 
          
            $per=$this->input->post('percentage');
    

            foreach ($services as $service) {
                $i++;
                $category = $service['category'];
                $grouped[$category][] = $service;
                $set=($service['rate']*$per)/100;
                $set_rate=$service['rate']+$set;
                $data = [
                                    'service_id' => $service['service'],
                                    'name'       => $service['name'],
                                    'category'   => $service['category'],
                                    'percentage'       => $per,
                                    'cname'       => $cname,
                                    'rate'       => $service['rate'],
                                    'set_rate'       => $set_rate,
                                    'min'        => $service['min'],
                                    'max'        => $service['max'],
                                    'type'       => $service['type'],
                                    'desc'       => $service['desc'] ?? null
                ];
                // var_dump($data);                                                                                
                 
                // log_message('debug',json_encode($data));


                $apimodel = new Apimodel();
                $apimodel->tablename = 'services_import';      
                $result=$apimodel->insertData($data);
                
            }

        // $categories = array_keys($grouped);

        //         // print_r($categories);
            
        //         foreach ($categories as $category) {
        //             $data = [
        //                 'categories' => $category,
        //                 'percentage'       => $per
        //             ];
        //             $apimodel->tablename = 'categories_import';
        //             $result=$apimodel->insertData($data);
        //             $getid=array('id'=>$result);
        //             $getdata=$apimodel->getSingleData($getid);
        //             $apimodel->tablename = 'services_import';
        //             $updateda=array(
        //                 'category'=>$getdata->categories
        //             );
        //             $updateda1=array(
        //                 'category'=>$result
        //             );
        //             $apimodel->updateData($updateda,$updateda1);
    // }

            


                                //    log_message('debug',json_encode($result));

        // $result=$apimodel->insertData($data);
 echo $result;


        }
 

        public function submit_selected_services(){
            // log_message('debug',json_encode('submit_selected_services'));
            $ids=$this->input->post('service_ids');
            $per=$this->input->post('percentage');
            $cname=$this->input->post('cname');
            $category=$this->input->post('category');
            // echo $cname;
            foreach ($ids as $id) {

            // echo $id; //use getsigledata to get the data from the table
            
            $apimodel = new Apimodel();
            $apimodel->tablename = 'services_import';
            $condition = [
                'id' => $id,
                'imported' => '0'
            ];
            $service=$apimodel->getSingleData($condition);
            // log_message('debug',json_encode($service));
            if ($service) {
            $service=$apimodel->getSingleData($getid);
            $set=($service->rate*$per)/100;
            $set_rate=$service->rate+$set;


            // print_r($service);

            $data = [
                                'service_id' => $service->service_id,
                                'name'       => $service->name,
                                'category'   => $category,
                                'percentage'       => $per,
                                'cname'       => $cname,
                                'rate'       => $service->rate,
                                'set_rate'       => $set_rate,
                                'min'        => $service->min,
                                'max'        => $service->max,
                                'type'       => $service->type,
                                'desc'       => $service->desc ?? null
            ];
            // var_dump($data);                                                                                
            
            $apimodel = new Apimodel();
            $apimodel->tablename = 'services';
            $result=$apimodel->insertData($data);
            echo $result;

            $apimodel->tablename = 'services_import';
            $condition=array(
                'id'=>$id
            );
            $data=array(
                'imported'=>1
            );
            $services_import=$apimodel->updateData($condition,$data);
            
            echo  1; 
        
        }else {
          echo  0; 
        }
            
            }    
        }

        public function importServices_view()
        {


            $data=array(
                'title'=>'verification eamil id',
                'carde_title'=>'Account verify'
            );
            $this->load->view('importServices_view',$data);
        }
      
    
}