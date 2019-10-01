<?php 
 class Posts extends CI_Controller{
 	public function index($offset = 0){
 		// Pagination Config
 		$config['base_url'] = base_url().'posts/index/';
		$config['total_rows'] = $this->db->count_all('posts');
		$config['per_page'] = 2;
		$config['uri_segment'] = 3;
		$config['attributes'] = array('class' => 'pagination-links');

		// Init Pagination 
		$this->pagination->initialize($config);

 		$data['title'] = 'Latest Posts';

 		$data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'] = 2, $offset);

 		// print_r($data['posts']);

 		$this->load->view('templates/header');
 		$this->load->view('posts/index', $data);
 		$this->load->view('templates/footer');
 	}

 	public function view ($slug = NULL){
 		$data['post'] = $this->post_model->get_posts($slug);
 		$post_id = $data['post']['id'];
 		$data['comments'] = $this->Comment_model->get_comments($post_id);
 		// print_r($data['comments']); die;
		if(empty($data['post'])){
			show_404();
		}
		$data['title'] = $data['post']['title'];
		$data['name'] = $data['post']['name'];

		 $this->load->view('templates/header');
 		$this->load->view('posts/view', $data);
 		$this->load->view('templates/footer');
 	}

 	public function create(){
 		// check logged in
 		if(!$this->session->userdata('logged_in')){
 			redirect ('users/login');
 		}

		$data['title'] = 'Create Post';
		$data['categories'] = $this->post_model->get_categories();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
	 		$this->load->view('posts/create', $data);
	 		$this->load->view('templates/footer');
		} else {
			// Upload Image
			$config['upload_path'] = './assets/images/posts';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
			$config['max_width'] = '50000';
			$config['max_height'] = '50000';

			$this->load->library('upload', $config);

			if(!$this->upload->do_upload()){
				$errors = array ('error' => $this->upload->display_errors());
				$post_image = 'no_image.jpg';
				// print_r( $post_image); die;
			}else{
				$data = array ('upload_data' => $this->upload->data());
				$temp = $_FILES['userfile']['name'];
				$post_image = str_replace(' ', '_', $temp);
				// echo $temp; die;
				// echo $post_image;
			}

			$this->post_model->create_post($post_image);
			// $this->load->view('posts/success');	

			// set message
			$this->session->set_flashdata('post_created', 'Your post has been created!');

			redirect('posts');
		}
 	}
 	public function delete($id){
 		// check logged in
 		if(!$this->session->userdata('logged_in')){
 			redirect ('users/login');
 		}

 		// echo $id;
 		$this->post_model->delete_post($id);
		// set message
		$this->session->set_flashdata('post_delated', 'Your post has been deleted!');
 		redirect('posts');
 	}
 	public function edit($slug){
 		// check logged in
 		if(!$this->session->userdata('logged_in')){
 			redirect ('users/login');
 		}

 		$temp = $data['post'] = $this->post_model->get_posts($slug);
 		// print_r($temp); die;

 		if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
 			redirect ('posts');
 		}

		if(empty($data['post'])){
			show_404();
		}
		$data['categories'] = $this->post_model->get_categories();
		$data['title'] = 'Edit Post';

		$this->load->view('templates/header');
 		$this->load->view('posts/edit', $data);
 		$this->load->view('templates/footer');
 	}
 	public function update(){
 		// check logged in
 		if(!$this->session->userdata('logged_in')){
 			redirect ('users/login');
 		}

 		// echo 'submitted';
 		$this->post_model->update_post();
		// set message
		$this->session->set_flashdata('post_updated', 'Your post has been updated!');
 		redirect('posts');
 	}
 }