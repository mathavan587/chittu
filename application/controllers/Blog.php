<?php 
class Blog extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->helper('url'); // Load the URL helper
			$this->load->helper('form'); // (optional) Load form helper if using forms
			$this->load->library('session'); // (optional) if using flashdata
			$this->load->model('Blog_model');
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

        $blogs= $this->Blog_model->get_all();

           $data=[
                'dashboard' => 'Blogs',
                'path' => 'General/Blogs',
                'content'=>'',
                 'container'=>'0',
                'include'=> 'blog/index',
                'blogs'=> $blogs
            ];
        // $this->load->view('admin/blog/index', $data);
                $this->load->view('admin/include/header',$data);
				$this->load->view('admin/body');
                // print_r($data);
				$this->load->view('admin/include/footer');

    }

    public function create() {
                $this->check_session();

        // $this->load->view('admin/blog/create');

$data=[
                'dashboard' => 'Dashboard',
                'path' => 'General/Dashboard',
                'content'=>'',
                 'container'=>'0',
                'include'=> 'blog/edit',
                // 'blogs'=> $blogs
            ];

                $this->load->view('admin/include/header',$data);
				$this->load->view('admin/body');
                // include()
                // print_r($data);
				$this->load->view('admin/include/footer');
    }

   public function store()
{
                $this->check_session();

    // Load the upload library with config
    $config['upload_path'] = './uploads/blogs/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg|webp';
    $config['encrypt_name'] = TRUE;

    $this->load->library('upload', $config);

    $imageName = '';

    // Check if image is uploaded
    if (!empty($_FILES['image']['name'])) {
        if ($this->upload->do_upload('image')) {
            $uploadData = $this->upload->data();
            $imageName = $uploadData['file_name'];
        } else {
            // Optional: handle upload error
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('blog/create');
            return;
        }
    }

    // Prepare blog data
    $data = [
        'title'   => $this->input->post('title'),
        'content' => $this->input->post('content'),
        'image'   => $imageName,
        'created_at' => date('Y-m-d H:i:s')
    ];

    // Insert into DB
    $this->Blog_model->insert($data);
    // $this->session->set_flashdata('success', 'Blog post created successfully.');
    redirect('blog');
}


    public function edit($id) {
                $this->check_session();

        $blog = $this->Blog_model->get($id);
        $data=[
                'dashboard' => 'Dashboard',
                'path' => 'General/Dashboard',
                'content'=>'',
                 'container'=>'0',
                'include'=> 'blog/edit',
                'blog'=> $blog
            ];

                $this->load->view('admin/include/header',$data);
				$this->load->view('admin/body');
                // include()
                // $this->load->view('admin/blog/edit', $data);
                // print_r($data);
				$this->load->view('admin/include/footer');

    }

    public function update($id) {
                $this->check_session();

        $data = [
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
        ];
        $this->Blog_model->update($id, $data);
        redirect('blog/edit/'.$id);
    }

    public function delete($id) {
                $this->check_session();

        $this->Blog_model->delete($id);
        redirect('blog');
    }
}
