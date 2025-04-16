<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// namespace App\Controllers;
// use CodeIgniter\Controller;
// use App\Models\ServiceModel;

class SmmController extends CI_Controller 
{
    public function importServices()
    {
        $api_url = 'https://www.cheapsmmhub.com/api/v2';
        $api_key = '4c514bc5d240393a9f4f357d132aea17ce59937c';
 
        $post_fields = [
            'key' => $api_key,
            'action' => 'services'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);

        $result = curl_exec($ch);
        curl_close($ch);

        $services = json_decode($result, true);

        if (is_array($services)) {
            $serviceModel = new ServiceModel();

            foreach ($services as $service) {
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

                // Check if the service exists
                $existing = $serviceModel->where('service_id', $service['service'])->first();

                if ($existing) {
                    $serviceModel->update($existing['id'], $data);
                } else {
                    $serviceModel->insert($data);
                }
            }

            return $this->response->setJSON(['status' => 'success', 'message' => 'Services imported successfully.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid API response.']);
        }
    }
//     public function importServices()
// {
//     // echo "importServices";
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

//     echo "<pre>";
//     print_r(json_decode($result, true));
//     echo "</pre>";
// }

}
