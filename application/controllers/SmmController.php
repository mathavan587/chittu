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
    // public function importServices()
    // {
    //     $api_url = 'https://www.cheapsmmhub.com/api/v2';
    //     $api_key = '4c514bc5d240393a9f4f357d132aea17ce59937c';
 
    //     $post_fields = [
    //         'key' => $api_key,
    //         'action' => 'services'
    //     ];

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $api_url);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);

    //     $result = curl_exec($ch);
    //     curl_close($ch);

    //     $services = json_decode($result, true);

    //     if (is_array($services)) {
    //         $serviceModel = new ServiceModel();

    //         foreach ($services as $service) {
    //             $data = [
    //                 'service_id' => $service['service'],
    //                 'name'       => $service['name'],
    //                 'category'   => $service['category'],
    //                 'rate'       => $service['rate'],
    //                 'min'        => $service['min'],
    //                 'max'        => $service['max'],
    //                 'type'       => $service['type'],
    //                 'desc'       => $service['desc'] ?? null
    //             ];

    //             // Check if the service exists
    //             $existing = $serviceModel->where('service_id', $service['service'])->first();

    //             if ($existing) {
    //                 $serviceModel->update($existing['id'], $data);
    //             } else {
    //                 $serviceModel->insert($data);
    //             }
    //         }

    //         return $this->response->setJSON(['status' => 'success', 'message' => 'Services imported successfully.']);
    //     } else {
    //         return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid API response.']);
    //     }
    // }
    public function importServices()
    {
        $api_url = 'https://smmpur.in/api/v2';
        $api_key = 'f383d221ddb88e8dbfd0419647a89ef6b14a7619';
    
        $post_fields = [    
            'key'    => $api_key,
            'action' => 'services'
        ];
    
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


            foreach ($services as $service) {
                $i++;
                $category = $service['category'];
                $grouped[$category][] = $service;
                $apimodel = new Apimodel();
                $apimodel->tablename = 'services';
                $data = [
                                    'service_id' => $service['service'],
                                    'name'       => $service['name'],
                                    'category'   => $service['category'],
                                    'rate'       => $service['rate'],
                                    'min'        => $service['min'],
                                    'max'        => $service['max'],
                                    'type'       => $service['type'],
                                    'desc'       => $service['desc'] ?? null
                ];
                // var_dump($data);                                                                                
                                
                $result=$apimodel->insertData($data);
                
            }

        $categories = array_keys($grouped);

                print_r($categories);
            
                foreach ($categories as $category) {
                    $data = [
                        'categories' => $category
                    ];
                    $apimodel = new Apimodel();
                    $apimodel->tablename = 'categories';
                    $result=$apimodel->insertData($data);
                    $getid=array('id'=>$result);
                    $getdata=$apimodel->getSingleData($getid);
                    $apimodel->tablename = 'services';
                    $updateda=array(
                        'category'=>$getdata->categories
                    );
                    $updateda1=array(
                        'category'=>$result
                    );
                    $apimodel->updateData($updateda,$updateda1);
    }

            


                                //    log_message('debug',json_encode($result));

        $result=$apimodel->insertData($data);
//  echo $result;


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