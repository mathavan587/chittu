<?php
class Terms extends CI_Controller {
    public function __construct() {
        
        parent::__construct();
        $this->load->helper('url'); // Load the URL helper
        $this->load->model('Term_model');
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

    public function index() {
        $this->check_session();
        $terms = $this->Term_model->get_all();

         $data=[
                'dashboard' => 'Terms',
                'path' => 'General/Terms',
                'content'=>'',
                 'container'=>'0',
                'include'=> 'terms/index',
                'terms'=> $terms
            ];

        // $this->load->view('admin/terms/index', $data);
          $this->load->view('admin/include/header',$data);
				$this->load->view('admin/body');
                // print_r($data);
				$this->load->view('admin/include/footer');
    }

    public function create() {
        $data=[
                'dashboard' => 'Dashboard',
                'path' => 'General/Dashboard',
                'content'=>'',
                 'container'=>'0',
                'include'=> 'terms/form',
                // 'blogs'=> $blogs
            ];
        $this->check_session();
        // $this->load->view('terms/form');
         // $this->load->view('admin/terms/index', $data);
          $this->load->view('admin/include/header',$data);
				$this->load->view('admin/body');
                // print_r($data);
				$this->load->view('admin/include/footer');
    }

    public function store() {
        $this->check_session();
        $data = [
            'title'   => $this->input->post('title'),
            'content' => $this->input->post('content'),
        ];
        $this->Term_model->insert($data);
        redirect('terms');
    }

    public function edit($id) {
        $this->check_session();
        $term = $this->Term_model->get($id);


        
$data=[
                'dashboard' => 'Dashboard',
                'path' => 'General/Dashboard',
                'content'=>'',
                 'container'=>'0',
                'include'=> 'terms/form',
                'term'=> $term
            ];

                $this->load->view('admin/include/header',$data);
				$this->load->view('admin/body');
                // include()
                // print_r($data);
				$this->load->view('admin/include/footer');

        // $this->load->view('admin/terms/form', $data);
    }

    public function update($id) {
        $this->check_session();
        $data = [
            'title'   => $this->input->post('title'),
            'content' => $this->input->post('content'),
        ];
        $this->Term_model->update($id, $data);
        redirect('terms');
    }

    public function delete($id) {
        $this->check_session();
        $this->Term_model->delete($id);
        redirect('terms');
    }
}
