<?php
class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
            $this->load->helper('url'); // Load the URL helper
			$this->load->helper('form'); // (optional) Load form helper if using forms
			$this->load->library('session'); // (optional) if using flashdata
            $this->load->model('Setting_model'); // Make sure this line is there
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
    
    // Fetch settings from the model (uncomment when the model is available)
    $settings = $this->Setting_model->get_all();

    // Prepare the data to pass to the view
    $data = [
        'dashboard' => 'Settings',
        'path' => 'General/Settings',
        'content' => '',  // You can set content to some view or data
        'container' => '0',  // Adjust this value based on your layout needs
        'include' => 'settings/settings_view',  // Path to the view that should be included
        // 'terms' => $terms,  // Uncomment this if you have terms data
        // 'settings' => $settings  // Uncomment this when fetching settings data
    ];

    // Load the header, content view, and footer
    $this->load->view('admin/include/header', $data); 
    $this->load->view('admin/body'); // Optional: if you have body content to load
    $this->load->view('admin/include/footer');
}

  public function get_settings() {
        $settings = $this->Setting_model->get_all();
        echo json_encode(['data' => $settings]);
    }

    public function edit($id) {
        $data = $this->Setting_model->get($id);
        echo json_encode($data);
    }

    public function save() {
        $id = $this->input->post('id');
        $data = [
            'categories' => $this->input->post('categories'),
            'link'       => $this->input->post('link')
        ];

        if (!empty($_FILES['file']['name'])) {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = '*';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $uploadData = $this->upload->data();
                $data['file_name'] = $uploadData['file_name'];
            } else {
                echo json_encode(['error' => $this->upload->display_errors()]);
                return;
            }
        }

        if ($id) {
            $this->Setting_model->update($id, $data);
        } else {
            $this->Setting_model->insert($data);
        }

        echo json_encode(['success' => true]);
    }

    public function delete($id) {
        $this->Setting_model->delete($id);
        echo json_encode(['success' => true]);
    }
}