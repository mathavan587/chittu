<?php 
class Announcement extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); // Load the URL helper
			$this->load->helper('form'); // (optional) Load form helper if using forms
        $this->load->model('Announcement_model');
			$this->load->model('apimodel');

			$this->load->library('session'); // (optional) if using flashdata

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



            // $terms = $this->Term_model->get_all();

         $data=[
                'dashboard' => 'Announcements',
                'path' => 'General/Announcements',
                'content'=>'',
                 'container'=>'0',
                'include'=> 'announcements/index',
                // 'terms'=> $terms
            ];

        // $this->load->view('admin/terms/index', $data);
          $this->load->view('admin/include/header',$data);
				$this->load->view('admin/body');
                // print_r($data);
				$this->load->view('admin/include/footer');


        // $this->load->view('announcements/index');
    }

    public function fetch() {
        $this->check_session();

        $data = $this->Announcement_model->get_all();
        echo json_encode($data);
    }

    public function save() {
        $this->check_session();

        $data = [
            'title' => $this->input->post('title'),
            'message' => $this->input->post('message'),
            'status' => $this->input->post('status'),
        ];
        $id = $this->input->post('id');

        if ($id) {
            $this->Announcement_model->update($id, $data);
        } else {
            $this->Announcement_model->insert($data);
        }
        echo json_encode(['status' => true]);
    }

    public function edit($id) {
        $this->check_session();

        $data = $this->Announcement_model->get($id);
        echo json_encode($data);
    }

    public function delete($id) {
        $this->check_session();

        $this->Announcement_model->delete($id);
        echo json_encode(['status' => true]);
    }
}
