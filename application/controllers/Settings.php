<?php
class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
            $this->load->helper('url'); // Load the URL helper
			$this->load->helper('form'); // (optional) Load form helper if using forms
			$this->load->library('session'); // (optional) if using flashdata
        $this->load->model('Setting_model');
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
        $this->load->view('settings/list');
    }

    public function get_settings() {
        $data = $this->Setting_model->get_all();
        echo json_encode(['data' => $data]);
    }

    public function save() {
        $data = [
            'categories' => $this->input->post('categories'),
            'link' => $this->input->post('link'),
        ];

        $id = $this->input->post('id');

        if ($id) {
            $this->Setting_model->update($id, $data);
        } else {
            $this->Setting_model->insert($data);
        }

        echo json_encode(['status' => true]);
    }

    public function get_single($id) {
        $setting = $this->Setting_model->get_by_id($id);
        echo json_encode($setting);
    }

    public function delete($id) {
        $this->Setting_model->delete($id);
        echo json_encode(['status' => true]);
    }
}
