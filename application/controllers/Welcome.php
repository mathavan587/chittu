<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('home/include/header');
		$this->load->view('home/body');
		$this->load->view('home/include/footer');
	}
	public function register()
{

	echo "register";
    $this->load->model('Apimodel');
    $this->Apimodel->tablename = 'users';
    $data = [
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'password' => $this->input->post('password'),
        'mobile' => $this->input->post('mobile'),
        'usertype' => 'user',
        'otp' => rand(100000, 999999)
    ];

    $result = $this->Apimodel->addUser($data);

    echo json_encode($result); // Return JSON for AJAX
}

}
