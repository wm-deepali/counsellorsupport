<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Admin extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->model('Admin_model');

		//	$this->load->helper('ckeditor_helper');



	}



	public function login()
	{

		$this->load->view('admin/login');

	}

	public function auth()
	{

		if ($this->session->userdata('status') == "logged" && $this->session->userdata('login_as') == 'Admin') {

			return 1;

		}

	}

	public function admin_login()
	{



		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");

		$this->form_validation->set_rules("password", "Password", "required");

		if ($this->form_validation->run() == FALSE) {

			$this->login();

		} else {

			$email = xss_clean($this->input->post("email"));

			$password = xss_clean($this->input->post("password"));

			$result = $this->Admin_model->get_admin_info($email, $password);

			if ($result == 1) {

				$details = $this->Admin_model->get_admin_detail_by_email($this->input->post("email"));

				$array = array(

					'login_as' => 'Admin',

					'id' => $details[0]['id'],

					'role' => $details[0]['role'],

					'status' => 'logged',

				);

				$this->session->set_userdata($array);

				$this->session->set_flashdata('succ_msg', 'Login Successfull');

				redirect('Admin', 'refresh');

			} else

				redirect('Admin/login', 'refresh');

		}

	}





	public function logout()
	{

		$this->session->sess_destroy();

		redirect('Admin/login', 'refresh');

	}

	public function index()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['home'] = $this->Admin_model->get_home();

			$data['appointment'] = $this->Admin_model->count_appointments();
			$data['total_payment'] = $this->Admin_model->total_payment();
			$data['enquiries'] = $this->Admin_model->count_enquiries();

			$this->load->view('admin/index', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function profile()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$id = $this->session->userdata('id');

			$data['profile'] = $this->Admin_model->get_profile($id);

			// print_r($data['profile']);

			// exit();

			$this->load->view('admin/profile', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function update_profile()
	{

		if ($this->auth() == 1) {

			$this->form_validation->set_rules("company_name", "Comapny Name", "required");

			$this->form_validation->set_rules("name", "Name", "required");

			$this->form_validation->set_rules(

				"email",
				"Email",

				"trim|required|valid_email"

			);

			$this->form_validation->set_rules(

				"contact_number",
				"Mobile Number",

				"trim|required|min_length[10]|max_length[10]"

			);

			if ($this->form_validation->run()) {

				$data = array(

					"company_name" => $this->input->post("company_name"),

					"name" => $this->input->post("name"),

					"email" => $this->input->post("email"),

					"contact_number" => $this->input->post("contact_number")

				);



				if (!empty($_FILES["image"]["name"])) {

					$path = './uploads/logo/';

					$thumb_path = './uploads/logo/thumb/';

					$height = 500;

					$width = 500;

					if (!is_dir('uploads/logo')) {

						mkdir('./uploads/logo', 0777, TRUE);

						mkdir('./uploads/logo/thumb', 0777, TRUE);

					}

					$new_name = str_replace(" ", "", 'admin' . time() . $_FILES['image']['name']);

					$_FILES['file']['name'] = $new_name;

					$_FILES['file']['type'] = $_FILES['image']['type'];

					$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];

					$_FILES['file']['error'] = $_FILES['image']['error'];

					$_FILES['file']['size'] = $_FILES['image']['size'];

					$config['upload_path'] = $path;

					$config['allowed_types'] = 'jpg|jpeg|png|gif';

					$this->load->library('upload', $config);

					$this->upload->initialize($config);

					if ($this->upload->do_upload('file')) {

						$data['logo'] = $path . $new_name;

						$this->resizeImage($new_name, $path, $thumb_path, $height, $width);

						$data['logo_thumb'] = $thumb_path . $new_name;

					} else {

						$this->session->set_flashdata('err_msg', $this->upload->display_errors());

						redirect('admin/profile', 'refresh');

					}

				}

				$return = $this->Admin_model->update_profile($this->session->userdata('id'), $data);

				if ($return) {

					$this->session->set_flashdata("profile_succ", "Update Successfull");

					redirect('admin/profile', 'refresh');

				} else {

					$this->session->set_flashdata("profile_err", "Update Failed");

					redirect('admin/profile', 'refresh');

				}



			} else {

				$this->profile();

			}

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function resizeImage($new_name, $path, $thumb_path, $height, $width)
	{

		$this->load->library('image_lib');

		$config_manip = array(

			'image_library' => 'gd2',

			'source_image' => $path . $new_name,

			'new_image' => $thumb_path,

			'maintain_ratio' => FALSE,

			'create_thumb' => FALSE,

			'thumb_marker' => '_thumb',

			'width' => $height,

			'height' => $width

		);

		$this->image_lib->initialize($config_manip);

		if (!$this->image_lib->resize()) {

			echo $this->image_lib->display_errors();

		}

		$this->image_lib->clear();

	}

	public function change_password()
	{

		$this->form_validation->set_rules('old_password', 'New Password', 'required');

		$this->form_validation->set_rules('password', 'New Password', 'required');

		$this->form_validation->set_rules('con_pass', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == false) {

			$this->profile();

		} else {

			$id = $this->input->post('id');

			$user = $this->Admin_model->get_user_details_by_id($id);

			$old_pass = md5($this->input->post('old_password'));

			if ($old_pass == $user[0]['password']) {

				$password = md5($this->input->post('password'));

				$data = array('password' => $password);

				$return = $this->Admin_model->update_profile($id, $data);

				if ($return) {



					$this->session->set_flashdata('pass_succ', 'Password Updated Successfully!');

					redirect('admin/profile', 'refresh');

				} else {



					$this->session->set_flashdata('pass_err', 'Password Update Failed!');

					redirect('admin/profile', 'refresh');

				}

			} else {

				$this->session->set_flashdata('pass_err', 'Old Password is Incorrect!');

				redirect('admin/profile', 'refresh');

			}

		}

	}

	public function header_setting()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['header'] = $this->Admin_model->get_header();

			$this->load->view('admin/header-settings', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function update_header()
	{

		$path = './uploads/logo/';

		$height = 500;

		$width = 500;

		if (!is_dir('uploads/logo')) {

			mkdir('./uploads/logo', 0777, TRUE);

		}

		$data = array(

			"mobile" => $this->input->post("contact"),

			"logo_link" => $this->input->post("logo_link"),
			"map_link" => $this->input->post("map_link"),

			"location" => $this->input->post("location"),



		);

		if (!empty($_FILES["logo"]["name"])) {

			$new_name_old = str_replace(" ", "", 'logo' . time() . $_FILES['logo']['name']);

			$new_name = $new_name_old;

			$_FILES['file']['name'] = $new_name;

			$_FILES['file']['type'] = $_FILES['logo']['type'];

			$_FILES['file']['tmp_name'] = $_FILES['logo']['tmp_name'];

			$_FILES['file']['error'] = $_FILES['logo']['error'];

			$_FILES['file']['size'] = $_FILES['logo']['size'];

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				$data['logo'] = $path . $new_name;

			} else {



				$this->session->set_flashdata('err_msg', $this->upload->display_errors());

				redirect('Admin/header_setting', 'refresh');

			}

		}

		$about_us = $this->Admin_model->get_header($data);

		if (empty($about_us)) {

			$return = $this->Admin_model->add_header($data);

			if ($return) {

				$this->session->set_flashdata("succ_msg", "Add Successfull");

				redirect('Admin/header_setting', 'refresh');

			} else {

				$this->session->set_flashdata("err_msg", "Add Failed");

				redirect('Admin/header_setting', 'refresh');

			}

		} else {

			$return = $this->Admin_model->update_header($data);

			if ($return) {

				$this->session->set_flashdata("succ_msg", "Update Successfull");

				redirect('Admin/header_setting', 'refresh');

			} else {

				$this->session->set_flashdata("err_msg", "Update Failed");

				redirect('Admin/header_setting', 'refresh');

			}

		}



	}

	public function footer_setting()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['footer'] = $this->Admin_model->get_footer();

			$this->load->view('admin/footer-settings', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function update_footer()
	{
		$path = './uploads/logo/';
		$height = 500;
		$width = 500;

		if (!is_dir('uploads/logo')) {

			mkdir('./uploads/logo', 0777, TRUE);

		}

		$data = array(

			"contact" => $this->input->post("contact"),

			"logo_link" => $this->input->post("logo_link"),

			"address" => $this->input->post("address"),

			"email" => $this->input->post("email"),

			"copyright_text" => $this->input->post("copyright_text"),
			"marque_text" => $this->input->post("marque_text"),

		);

		if (!empty($_FILES["logo"]["name"])) {

			$new_name_old = str_replace(" ", "", 'logo' . time() . $_FILES['logo']['name']);

			$new_name = $new_name_old;

			$_FILES['file']['name'] = $new_name;

			$_FILES['file']['type'] = $_FILES['logo']['type'];

			$_FILES['file']['tmp_name'] = $_FILES['logo']['tmp_name'];

			$_FILES['file']['error'] = $_FILES['logo']['error'];

			$_FILES['file']['size'] = $_FILES['logo']['size'];

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				$data['logo'] = $path . $new_name;

			} else {



				$this->session->set_flashdata('err_msg', $this->upload->display_errors());

				redirect('Admin/footer_setting', 'refresh');

			}

		}
		if (!empty($_FILES["image"]["name"])) {

			$new_name_old = str_replace(" ", "", 'footer_image' . time() . $_FILES['image']['name']);

			$new_name = $new_name_old;

			$_FILES['file']['name'] = $new_name;

			$_FILES['file']['type'] = $_FILES['image']['type'];

			$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];

			$_FILES['file']['error'] = $_FILES['image']['error'];

			$_FILES['file']['size'] = $_FILES['image']['size'];

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				$data['image'] = $path . $new_name;

			} else {



				$this->session->set_flashdata('err_msg', $this->upload->display_errors());

				redirect('Admin/header_setting', 'refresh');

			}

		}
		if (!empty($_FILES["popup_image"]["name"])) {

			$new_name_old = str_replace(" ", "", 'popup_image_image' . time() . $_FILES['popup_image']['name']);

			$new_name = $new_name_old;

			$_FILES['file']['name'] = $new_name;

			$_FILES['file']['type'] = $_FILES['popup_image']['type'];

			$_FILES['file']['tmp_name'] = $_FILES['popup_image']['tmp_name'];

			$_FILES['file']['error'] = $_FILES['popup_image']['error'];

			$_FILES['file']['size'] = $_FILES['popup_image']['size'];

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				$data['popup_image'] = $path . $new_name;

			} else {



				$this->session->set_flashdata('err_msg', $this->upload->display_errors());

				redirect('Admin/header_setting', 'refresh');

			}

		}


		$about_us = $this->Admin_model->get_footer($data);

		if (empty($about_us)) {

			$return = $this->Admin_model->add_footer($data);

			if ($return) {

				$this->session->set_flashdata("succ_msg", "Add Successfull");

				redirect('Admin/footer_setting', 'refresh');

			} else {

				$this->session->set_flashdata("err_msg", "Add Failed");

				redirect('Admin/footer_setting', 'refresh');

			}

		} else {

			$return = $this->Admin_model->update_footer($data);

			if ($return) {

				$this->session->set_flashdata("succ_msg", "Update Successfull");

				redirect('Admin/footer_setting', 'refresh');

			} else {

				$this->session->set_flashdata("err_msg", "Update Failed");

				redirect('Admin/footer_setting', 'refresh');

			}

		}



	}



	public function social_setting()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['social'] = $this->Admin_model->get_social();

			$this->load->view('admin/social-setting', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function update_social_setting()
	{
		$data = array(

			"fb" => $this->input->post("fb"),
			"fb_link" => $this->input->post("fb_link"),

			"twitter" => $this->input->post("twitter"),
			"twitter_link" => $this->input->post("twitter_link"),

			"utube" => $this->input->post("utube"),
			"utube_link" => $this->input->post("utube_link"),

			"insta" => $this->input->post("insta"),
			"insta_link" => $this->input->post("insta_link"),

			"linkedin" => $this->input->post("linked"),
			"linkedin_link" => $this->input->post("linked_link"),

			// 🟢 NEW WhatsApp icon + link
			"whatsapp" => $this->input->post("whatsapp"),
			"whatsapp_link" => $this->input->post("whatsapp_link"),
		);

		$about_us = $this->Admin_model->get_social($data);

		if (empty($about_us)) {

			$return = $this->Admin_model->add_social($data);

			if ($return) {
				$this->session->set_flashdata("succ_msg", "Add Successfull");
			} else {
				$this->session->set_flashdata("err_msg", "Add Failed");
			}

		} else {

			$return = $this->Admin_model->update_social($data);

			if ($return) {
				$this->session->set_flashdata("succ_msg", "Update Successfull");
			} else {
				$this->session->set_flashdata("err_msg", "Update Failed");
			}
		}

		redirect('Admin/social_setting', 'refresh');
	}


	public function home_page_content()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['home'] = $this->Admin_model->get_home();

			$this->load->view('admin/home-page-content', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function update_home_content()
	{

		$path = './uploads/home/';

		$height = 500;

		$width = 500;

		if (!is_dir('uploads/home')) {

			mkdir('./uploads/home', 0777, TRUE);

		}

		$data = array(

			"title" => $this->input->post("title"),

			"content" => $this->input->post("editor1"),

		);

		if (!empty($_FILES["image"]["name"])) {

			$new_name_old = str_replace(" ", "", 'image' . time() . $_FILES['image']['name']);

			$new_name = $new_name_old;

			$_FILES['file']['name'] = $new_name;

			$_FILES['file']['type'] = $_FILES['image']['type'];

			$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];

			$_FILES['file']['error'] = $_FILES['image']['error'];

			$_FILES['file']['size'] = $_FILES['image']['size'];

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				$data['image'] = $path . $new_name;

			} else {



				$this->session->set_flashdata('err_msg', $this->upload->display_errors());

				redirect('Admin/home_page_content', 'refresh');

			}

		}
		if (!empty($_FILES["image1"]["name"])) {
			$new_name_old = str_replace(" ", "", 'image1' . time() . $_FILES['image1']['name']);
			$new_name = $new_name_old;
			$_FILES['file']['name'] = $new_name;
			$_FILES['file']['type'] = $_FILES['image1']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['image1']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['image1']['error'];
			$_FILES['file']['size'] = $_FILES['image1']['size'];
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('file')) {
				$data['image1'] = $path . $new_name;
			} else {
				$this->session->set_flashdata('err_msg', $this->upload->display_errors());
				redirect('Admin/manage_aboutus', 'refresh');
			}
		}

		$about_us = $this->Admin_model->get_home($data);

		if (empty($about_us)) {

			$return = $this->Admin_model->add_home($data);

			if ($return) {

				$this->session->set_flashdata("succ_msg", "Add Successfull");

				redirect('Admin/home_page_content', 'refresh');

			} else {

				$this->session->set_flashdata("err_msg", "Add Failed");

				redirect('Admin/home_page_content', 'refresh');

			}
		} else {
			$return = $this->Admin_model->update_home($data);
			if ($return) {
				$this->session->set_flashdata("succ_msg", "Update Successfull");
				redirect('Admin/home_page_content', 'refresh');
			} else {
				$this->session->set_flashdata("err_msg", "Update Failed");
				redirect('Admin/home_page_content', 'refresh');
			}
		}

	}
	public function slider_setting()
	{
		$ret = $this->auth();
		if ($ret == 1) {
			$data['sliders'] = $this->Admin_model->get_slider();
			$this->load->view('admin/slider-setting', $data);
		} else {
			redirect('Admin/login', 'refresh');
		}
	}
	public function add_slider()
	{
		$ret = $this->auth();
		if ($ret == 1) {
			$this->load->view('admin/add-slider');
		} else {
			redirect('Admin/login', 'refresh');
		}
	}
	public function insert_slider()
	{
		$path = './uploads/slider/';
		$thumb_path = './uploads/slider/thumb/';
		$height = 500;
		$width = 500;
		if (!is_dir('uploads/slider')) {
			mkdir('./uploads/slider', 0777, TRUE);
			mkdir('./uploads/slider/thumb', 0777, TRUE);
		}
		$data = array(
			"title" => $this->input->post("title"),
			"hindi_title" => $this->input->post("hindi_title"),
			"text_color" => $this->input->post("text_color"),
			"content" => $this->input->post("content"),
			"status" => "Active"
		);
		if (!empty($_FILES["image"]["name"])) {
			$new_name_old = str_replace(" ", "", 'slider' . time() . $_FILES['image']['name']);
			$new_name = $new_name_old;
			$_FILES['file']['name'] = $new_name;
			$_FILES['file']['type'] = $_FILES['image']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['image']['error'];
			$_FILES['file']['size'] = $_FILES['image']['size'];
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('file')) {
				$data['image'] = $path . $new_name;
				$this->resizeImage($new_name, $path, $thumb_path, $height, $width);
				$data['image_thumb'] = $thumb_path . $new_name;
			} else {

				$this->session->set_flashdata('err_msg', $this->upload->display_errors());
				redirect('Admin/add_slider', 'refresh');
			}
		}

		$return = $this->Admin_model->add_slider($data);
		if ($return) {
			$this->session->set_flashdata("succ_msg", "Add Successfull");
			redirect('Admin/slider_setting', 'refresh');
		} else {
			$this->session->set_flashdata("err_msg", "Add Failed");
			redirect('Admin/add_slider', 'refresh');
		}
	}
	public function edit_slider($id)
	{
		$ret = $this->auth();
		if ($ret == 1) {
			$data['slider'] = $this->Admin_model->get_slider_by_id($id);
			$this->load->view('admin/edit-slider', $data);
		} else {
			redirect('Admin/login', 'refresh');
		}
	}
	public function update_slider()
	{
		$path = './uploads/slider/';
		$thumb_path = './uploads/slider/thumb/';
		$height = 500;
		$width = 500;
		if (!is_dir('uploads/slider')) {
			mkdir('./uploads/slider', 0777, TRUE);
			mkdir('./uploads/slider/thumb', 0777, TRUE);
		}
		$id = $this->input->post('id');
		$data = array(
			"title" => $this->input->post("title"),
			"hindi_title" => $this->input->post("hindi_title"),
			"text_color" => $this->input->post("text_color"),
			"content" => $this->input->post("content"),
		);
		if (!empty($_FILES["image"]["name"])) {
			$new_name_old = str_replace(" ", "", 'image' . time() . $_FILES['image']['name']);
			$new_name = $new_name_old;
			$_FILES['file']['name'] = $new_name;
			$_FILES['file']['type'] = $_FILES['image']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['image']['error'];
			$_FILES['file']['size'] = $_FILES['image']['size'];
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('file')) {
				$data['image'] = $path . $new_name;
				$this->resizeImage($new_name, $path, $thumb_path, $height, $width);
				$data['image_thumb'] = $thumb_path . $new_name;
			} else {

				$this->session->set_flashdata('err_msg', $this->upload->display_errors());
				redirect('Admin/slider_setting', 'refresh');
			}
		}
		$return = $this->Admin_model->update_slider($data, $id);
		if ($return) {
			$this->session->set_flashdata("succ_msg", "Update Successfull");
			redirect('Admin/slider_setting', 'refresh');
		} else {
			$this->session->set_flashdata("err_msg", "Update Failed");
			redirect('Admin/slider_setting', 'refresh');
		}
	}
	public function delete_slider($id)
	{
		$return = $this->Admin_model->delete_slider($id);
		if ($return > 0) {
			$this->session->set_flashdata("succ_msg", "Delete Successfull");
			redirect('admin/slider_setting', 'refresh');
		} else {
			$this->session->set_flashdata("err_msg", "Delete Failed");
			redirect('admin/slider_setting', 'refresh');
		}
	}

	public function manage_timeslot()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['timing'] = $this->Admin_model->get_timing();

			// print_r($data['locations']);

			// exit;

			$this->load->view('admin/manage-timing', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function add_timeslot()
	{
		$ret = $this->auth();
		if ($ret == 1) {
			$data['timing'] = $this->Admin_model->get_timing();
			// print_r($data['locations']);
			// exit;
			$this->load->view('admin/add-time-slot', $data);
		} else {
			redirect('Admin/login', 'refresh');
		}
	}
	public function add_timing()
	{
		$date = $this->input->post("date");
		$unixTimestamp = strtotime($date);
		$day = date("l", $unixTimestamp);
		$to = $this->input->post('to');
		$from = $this->input->post('from');
		for ($i = 0; $i < count($to); $i++) {
			$data['date'] = $this->input->post("date");
			$data['to_'] = date('h:i A', strtotime($to[$i]));
			$data['from_'] = date('h:i A', strtotime($from[$i]));
			$data['days'] = $day;
			$data['status'] = 'Open';
			$return = $this->Admin_model->add_timing($data);
		}
		//print_r($data);
		if ($return) {
			$this->session->set_flashdata("succ_msg", "Add Successfull");
			redirect('Admin/manage_timeslot', 'refresh');
		} else {
			$this->session->set_flashdata("err_msg", "Add Failed");
			redirect('Admin/manage_timeslot', 'refresh');
		}
	}
	public function update_timeslot()
	{

		$id = $this->input->post('id');

		$from = date('h:i A', strtotime($this->input->post("from")));

		$to = date('h:i A', strtotime($this->input->post("to")));

		$data = array(

			"from_" => $from,

			"to_" => $to,

			"days" => implode(',', $this->input->post("days")),

		);

		$return = $this->Admin_model->update_timeslot($data, $id);

		if ($return == 1) {

			$this->session->set_flashdata("succ_msg", "Update Successfull");

			redirect('Admin/manage_timeslot', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Update Failed");

			redirect('Admin/manage_timeslot', 'refresh');

		}

	}

	public function delete_timeslot($id)
	{

		$return = $this->Admin_model->delete_timeslot($id);

		if ($return > 0) {

			$this->session->set_flashdata("succ_msg", "Delete Successfull");

			redirect('admin/manage_timeslot', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Delete Failed");

			redirect('admin/manage_timeslot', 'refresh');

		}

	}

	public function manage_consultation_fees()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['fees'] = $this->Admin_model->get_fees();

			// print_r($data['locations']);

			// exit;

			$this->load->view('admin/manage-consult-fee', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function add_fee()
	{

		$data = array(

			"fee" => $this->input->post('fees'),

			"status" => "Active"

		);



		$return = $this->Admin_model->add_fee($data);

		if ($return) {

			$this->session->set_flashdata("succ_msg", "Add Successfull");

			redirect('Admin/manage_consultation_fees', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Add Failed");

			redirect('Admin/manage_consultation_fees', 'refresh');

		}

	}

	public function update_fee()
	{

		$id = $this->input->post('id');

		$data = array(

			"fee" => $this->input->post('fees'),

		);

		$return = $this->Admin_model->update_fee($data, $id);

		if ($return == 1) {

			$this->session->set_flashdata("succ_msg", "Update Successfull");

			redirect('Admin/manage_consultation_fees', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Update Failed");

			redirect('Admin/manage_consultation_fees', 'refresh');

		}

	}

	public function delete_fee($id)
	{

		$return = $this->Admin_model->delete_fee($id);

		if ($return > 0) {

			$this->session->set_flashdata("succ_msg", "Delete Successfull");

			redirect('admin/manage_consultation_fees', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Delete Failed");

			redirect('admin/manage_consultation_fees', 'refresh');

		}

	}

	public function manage_aboutus()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['about_us'] = $this->Admin_model->get_aboutus();

			// print_r($data['locations']);

			// exit;

			$this->load->view('admin/manage-aboutus', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function about_us()
	{



		$path = './uploads/about_us/';

		$thumb_path = './uploads/about_us/thumb/';

		$height = 500;

		$width = 500;

		if (!is_dir('uploads/about_us')) {

			mkdir('./uploads/about_us', 0777, TRUE);

			mkdir('./uploads/about_us/thumb', 0777, TRUE);

		}

		$data = array(

			"title" => $this->input->post("title"),

			"content" => $this->input->post("content"),

		);

		if (!empty($_FILES["image1"]["name"])) {

			$new_name_old = str_replace(" ", "", 'image1' . time() . $_FILES['image1']['name']);

			$new_name = $new_name_old;

			$_FILES['file']['name'] = $new_name;

			$_FILES['file']['type'] = $_FILES['image1']['type'];

			$_FILES['file']['tmp_name'] = $_FILES['image1']['tmp_name'];

			$_FILES['file']['error'] = $_FILES['image1']['error'];

			$_FILES['file']['size'] = $_FILES['image1']['size'];

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				$data['image1'] = $path . $new_name;

				$this->resizeImage($new_name, $path, $thumb_path, $height, $width);

				$data['image1_thumb'] = $thumb_path . $new_name;

			} else {



				$this->session->set_flashdata('err_msg', $this->upload->display_errors());

				redirect('Admin/manage_aboutus', 'refresh');

			}

		}

		if (!empty($_FILES["image2"]["name"])) {

			$new_name_old = str_replace(" ", "", 'image2' . time() . $_FILES['image2']['name']);

			$new_name = $new_name_old;

			$_FILES['file']['name'] = $new_name;

			$_FILES['file']['type'] = $_FILES['image2']['type'];

			$_FILES['file']['tmp_name'] = $_FILES['image2']['tmp_name'];

			$_FILES['file']['error'] = $_FILES['image2']['error'];

			$_FILES['file']['size'] = $_FILES['image2']['size'];

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				$data['image2'] = $path . $new_name;

				$this->resizeImage($new_name, $path, $thumb_path, $height, $width);

				$data['image2_thumb'] = $thumb_path . $new_name;

			} else {



				$this->session->set_flashdata('err_msg', $this->upload->display_errors());

				redirect('Admin/manage_aboutus', 'refresh');

			}

		}

		$about_us = $this->Admin_model->get_aboutus($data);

		if (empty($about_us)) {

			$return = $this->Admin_model->add_aboutus($data);

			if ($return) {

				$this->session->set_flashdata("succ_msg", "Add Successfull");

				redirect('Admin/manage_aboutus', 'refresh');

			} else {

				$this->session->set_flashdata("err_msg", "Add Failed");

				redirect('Admin/manage_aboutus', 'refresh');

			}

		} else {

			$return = $this->Admin_model->update_aboutus($data);

			if ($return) {

				$this->session->set_flashdata("succ_msg", "Update Successfull");

				redirect('Admin/manage_aboutus', 'refresh');

			} else {

				$this->session->set_flashdata("err_msg", "Update Failed");

				redirect('Admin/manage_aboutus', 'refresh');

			}

		}



	}
	public function cancellation_policy()
	{
		$ret = $this->auth();

		if ($ret == 1) {

			$data['cancellation'] = $this->Admin_model->get_cancellation();
			$this->load->view('admin/cancellation-policy', $data);
		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function update_cancellation()
	{

		$data = array(
			"content" => $this->input->post("content"),
		);
		$cancel = $this->Admin_model->get_cancellation($data);
		if (empty($cancel)) {

			$return = $this->Admin_model->add_cancellation($data);

			if ($return) {
				$this->session->set_flashdata("succ_msg", "Add Successfull");

				redirect('Admin/cancellation_policy', 'refresh');
			} else {
				$this->session->set_flashdata("err_msg", "Add Failed");
				redirect('Admin/cancellation_policy', 'refresh');
			}
		} else {
			$return = $this->Admin_model->update_cancellation($data);
			if ($return) {
				$this->session->set_flashdata("succ_msg", "Update Successfull");
				redirect('Admin/cancellation_policy', 'refresh');
			} else {
				$this->session->set_flashdata("err_msg", "Update Failed");
				redirect('Admin/cancellation_policy', 'refresh');
			}
		}
	}
	public function privacy_policy()
	{
		$ret = $this->auth();

		if ($ret == 1) {

			$data['privacy'] = $this->Admin_model->get_privacy();
			$this->load->view('admin/privacy-policy', $data);
		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function update_privacy()
	{

		$data = array(
			"content" => $this->input->post("content"),
		);
		$cancel = $this->Admin_model->get_privacy($data);
		if (empty($cancel)) {

			$return = $this->Admin_model->add_privacy($data);

			if ($return) {
				$this->session->set_flashdata("succ_msg", "Add Successfull");

				redirect('Admin/privacy_policy', 'refresh');
			} else {
				$this->session->set_flashdata("err_msg", "Add Failed");
				redirect('Admin/privacy_policy', 'refresh');
			}
		} else {
			$return = $this->Admin_model->update_privacy($data);
			if ($return) {
				$this->session->set_flashdata("succ_msg", "Update Successfull");
				redirect('Admin/privacy_policy', 'refresh');
			} else {
				$this->session->set_flashdata("err_msg", "Update Failed");
				redirect('Admin/privacy_policy', 'refresh');
			}
		}
	}
	public function disclaimer()
	{
		$ret = $this->auth();

		if ($ret == 1) {

			$data['disclaimer'] = $this->Admin_model->get_disclaimer();
			$this->load->view('admin/disclaimer', $data);
		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function update_disclaimer()
	{

		$data = array(
			"content" => $this->input->post("content"),
		);
		$cancel = $this->Admin_model->get_disclaimer($data);
		if (empty($cancel)) {

			$return = $this->Admin_model->add_disclaimer($data);

			if ($return) {
				$this->session->set_flashdata("succ_msg", "Add Successfull");

				redirect('Admin/disclaimer', 'refresh');
			} else {
				$this->session->set_flashdata("err_msg", "Add Failed");
				redirect('Admin/disclaimer', 'refresh');
			}
		} else {
			$return = $this->Admin_model->update_disclaimer($data);
			if ($return) {
				$this->session->set_flashdata("succ_msg", "Update Successfull");
				redirect('Admin/disclaimer', 'refresh');
			} else {
				$this->session->set_flashdata("err_msg", "Update Failed");
				redirect('Admin/disclaimer', 'refresh');
			}
		}
	}

	public function manage_services()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['services'] = $this->Admin_model->get_services();

			$this->load->view('admin/manage-services', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function add_service()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$this->load->view('admin/add-service');

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function insert_service()
	{

		$path = './uploads/service/';

		$thumb_path = './uploads/service/thumb/';

		$height = 500;

		$width = 500;

		if (!is_dir('uploads/service')) {

			mkdir('./uploads/service', 0777, TRUE);

			mkdir('./uploads/service/thumb', 0777, TRUE);

		}

		$data = array(

			"name" => $this->input->post("name"),

			"hindi_name" => $this->input->post("hindi_name"),

			"slug" => $this->input->post("slug"),

			"content" => $this->input->post("content"),

			"status" => "Active"

		);

		if (!empty($_FILES["image"]["name"])) {

			$new_name_old = str_replace(" ", "", 'image' . time() . $_FILES['image']['name']);

			$new_name = $new_name_old;

			$_FILES['file']['name'] = $new_name;

			$_FILES['file']['type'] = $_FILES['image']['type'];

			$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];

			$_FILES['file']['error'] = $_FILES['image']['error'];

			$_FILES['file']['size'] = $_FILES['image']['size'];

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				$data['image'] = $path . $new_name;

				$this->resizeImage($new_name, $path, $thumb_path, $height, $width);

				$data['image_thumb'] = $thumb_path . $new_name;

			} else {



				$this->session->set_flashdata('err_msg', $this->upload->display_errors());

				redirect('Admin/manage_services', 'refresh');

			}

		}



		$return = $this->Admin_model->add_service($data);

		if ($return) {

			$this->session->set_flashdata("succ_msg", "Add Successfull");

			redirect('Admin/manage_services', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Add Failed");

			redirect('Admin/manage_services', 'refresh');

		}

	}

	public function edit_service($id)
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['service'] = $this->Admin_model->get_service_by_id($id);



			$this->load->view('admin/update-service', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function update_service()
	{

		$path = './uploads/service/';

		$thumb_path = './uploads/service/thumb/';

		$height = 500;

		$width = 500;

		if (!is_dir('uploads/service')) {

			mkdir('./uploads/service', 0777, TRUE);

			mkdir('./uploads/service/thumb', 0777, TRUE);

		}

		$id = $this->input->post('id');

		$data = array(

			"name" => $this->input->post("name"),

			"hindi_name" => $this->input->post("hindi_name"),

			"slug" => $this->input->post("slug"),

			"content" => $this->input->post("content"),

			"status" => "Active"

		);

		if (!empty($_FILES["image"]["name"])) {

			$new_name_old = str_replace(" ", "", 'image' . time() . $_FILES['image']['name']);

			$new_name = $new_name_old;

			$_FILES['file']['name'] = $new_name;

			$_FILES['file']['type'] = $_FILES['image']['type'];

			$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];

			$_FILES['file']['error'] = $_FILES['image']['error'];

			$_FILES['file']['size'] = $_FILES['image']['size'];

			$config['upload_path'] = $path;

			$config['allowed_types'] = 'jpg|jpeg|png|gif';

			$this->load->library('upload', $config);

			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				$data['image'] = $path . $new_name;

				$this->resizeImage($new_name, $path, $thumb_path, $height, $width);

				$data['image_thumb'] = $thumb_path . $new_name;

			} else {



				$this->session->set_flashdata('err_msg', $this->upload->display_errors());

				redirect('Admin/manage_services', 'refresh');

			}

		}

		$return = $this->Admin_model->update_service($data, $id);

		if ($return) {

			$this->session->set_flashdata("succ_msg", "Add Successfull");

			redirect('Admin/manage_services', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Add Failed");

			redirect('Admin/manage_services', 'refresh');

		}

	}

	// 	public function download($filename = NULL) {

	// 		print_r($filename);

	// 		exit;

	//     // load download helder

	//     $this->load->helper('download');

	//     // read file contents

	//     $data = file_get_contents(base_url('/uploads/'.$filename));

	//     force_download($filename, $data);

	// }

	public function delete_service($id)
	{

		$return = $this->Admin_model->delete_service($id);

		if ($return > 0) {

			$this->session->set_flashdata("succ_msg", "Delete Successfull");

			redirect('admin/manage_services', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Delete Failed");

			redirect('admin/manage_services', 'refresh');

		}

	}

	public function manage_faqs()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['faqs'] = $this->Admin_model->get_faqs();

			$this->load->view('admin/manage-faqs', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function add_faqs()
	{

		$data = array(

			"question" => $this->input->post("question"),

			"answer" => $this->input->post("answer"),

			"status" => "Active"

		);

		$return = $this->Admin_model->add_faqs($data);

		if ($return) {

			$this->session->set_flashdata("succ_msg", "Add Successfull");

			redirect('Admin/manage_faqs', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Add Failed");

			redirect('Admin/manage_faqs', 'refresh');

		}

	}

	public function update_faqs()
	{

		$id = $this->input->post('id');

		$data = array(

			"question" => $this->input->post("question"),

			"answer" => $this->input->post("answer"),

		);

		$return = $this->Admin_model->update_faqs($data, $id);

		if ($return == 1) {

			$this->session->set_flashdata("succ_msg", "Update Successfull");

			redirect('Admin/manage_faqs', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Update Failed");

			redirect('Admin/manage_faqs', 'refresh');

		}

	}

	public function change_status($id)
	{

		$data = array('status' => "Deactive");

		$this->db->where("id", $id);

		if ($this->db->update("faqs", $data)) {

			$this->session->set_flashdata("succ_msg", "Update Successfull");

			redirect('admin/manage_faqs', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Update Failed");

			redirect('admin/manage_faqs', 'refresh');

		}

	}

	public function delete_faqs($id)
	{

		$return = $this->Admin_model->delete_faqs($id);

		if ($return > 0) {

			$this->session->set_flashdata("succ_msg", "Delete Successfull");

			redirect('admin/manage_faqs', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Delete Failed");

			redirect('admin/manage_faqs', 'refresh');

		}

	}

	public function manage_contact()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['contact_us'] = $this->Admin_model->get_contact_us();

			$this->load->view('admin/manage-contactform', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function delete_contact($id)
	{

		$return = $this->Admin_model->delete_contact($id);

		if ($return > 0) {

			$this->session->set_flashdata("succ_msg", "Delete Successfull");

			redirect('admin/manage_contact', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Delete Failed");

			redirect('admin/manage_contact', 'refresh');

		}

	}

	public function manage_appointments()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['appointments'] = $this->Admin_model->get_appointment();
			// 			print_r($data);
// 			exit;

			$this->load->view('admin/manage-appointments', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}

	public function delete_appointment($id)
	{

		$return = $this->Admin_model->delete_appointment($id);

		if ($return > 0) {

			$this->session->set_flashdata("succ_msg", "Delete Successfull");

			redirect('admin/manage_appointments', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Delete Failed");

			redirect('admin/manage_appointments', 'refresh');

		}

	}

	public function manage_feedbacks()
	{

		$ret = $this->auth();

		if ($ret == 1) {

			$data['feedbacks'] = $this->Admin_model->get_feedback();

			$this->load->view('admin/manage-feedback', $data);

		} else {

			redirect('Admin/login', 'refresh');

		}

	}
	public function approved_feedback($id)
	{
		$data = array('status' => "Approved");
		$this->db->where("id", $id);
		if ($this->db->update("feedback", $data)) {
			$this->session->set_flashdata("succ_msg", "Update Successfull");
			redirect('admin/manage_feedbacks', 'refresh');
		} else {
			$this->session->set_flashdata("err_msg", "Update Failed");
			redirect('admin/manage_feedbacks', 'refresh');
		}
	}

	public function delete_feedback($id)
	{

		$return = $this->Admin_model->delete_feedback($id);

		if ($return > 0) {

			$this->session->set_flashdata("succ_msg", "Delete Successfull");

			redirect('admin/manage_feedbacks', 'refresh');

		} else {

			$this->session->set_flashdata("err_msg", "Delete Failed");

			redirect('admin/manage_feedbacks', 'refresh');

		}

	}

	public function popup()
	{
		$ret = $this->auth();
		if ($ret == 1) {
			$data['popup'] = $this->Admin_model->get_popup();
			$this->load->view('admin/pop-up', $data);
		} else {
			redirect('Admin/login', 'refresh');
		}
	}
	public function update_popup()
	{
		$path = './uploads/home/';
		$height = 500;
		$width = 500;
		if (!is_dir('uploads/home')) {
			mkdir('./uploads/home', 0777, TRUE);
		}
		$data = array(
			"content" => $this->input->post("content"),
			"status" => $this->input->post("status")
		);
		if (!empty($_FILES["image"]["name"])) {
			$new_name_old = str_replace(" ", "", 'image' . time() . $_FILES['image']['name']);
			$new_name = $new_name_old;
			$_FILES['file']['name'] = $new_name;
			$_FILES['file']['type'] = $_FILES['image']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['image']['error'];
			$_FILES['file']['size'] = $_FILES['image']['size'];
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if ($this->upload->do_upload('file')) {
				$data['image'] = $path . $new_name;
			} else {

				$this->session->set_flashdata('err_msg', $this->upload->display_errors());
				redirect('Admin/popup', 'refresh');
			}
		}

		$about_us = $this->Admin_model->get_popup($data);
		if (empty($about_us)) {
			$return = $this->Admin_model->add_popup($data);
			if ($return) {
				$this->session->set_flashdata("succ_msg", "Add Successfull");
				redirect('Admin/popup', 'refresh');
			} else {
				$this->session->set_flashdata("err_msg", "Add Failed");
				redirect('Admin/popup', 'refresh');
			}
		} else {
			$return = $this->Admin_model->update_popup($data);
			if ($return) {
				$this->session->set_flashdata("succ_msg", "Update Successfull");
				redirect('Admin/popup', 'refresh');
			} else {
				$this->session->set_flashdata("err_msg", "Update Failed");
				redirect('Admin/popup', 'refresh');
			}
		}
	}

	// ===============================
// CONSULT CATEGORIES
// ===============================

	public function consult_categories()
	{
		$ret = $this->auth();
		if ($ret == 1) {
			$data['categories'] = $this->Admin_model->get_consult_categories();
			$this->load->view('admin/manage-consult-categories', $data);
		} else {
			redirect('Admin/login', 'refresh');
		}
	}

	public function add_consult_category()
	{
		$ret = $this->auth();
		if ($ret == 1) {
			$this->load->view('admin/add-consult-category');
		} else {
			redirect('Admin/login', 'refresh');
		}
	}

	public function insert_consult_category()
	{
		$path = './uploads/consult_categories/';
		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
		}

		$data = [
			'name' => $this->input->post('name'),
			'slug' => url_title($this->input->post('name'), '-', true),
			'status' => $this->input->post('status'),
			'sort_order' => $this->input->post('sort_order')
		];

		/* IMAGE UPLOAD */
		if (!empty($_FILES['image']['name'])) {

			// ✅ CLEAN FILE NAME (SPACE + SPECIAL CHAR FIX)
			$clean_name = $this->clean_file_name($_FILES['image']['name']);
			$new_name = 'cat_' . time() . '_' . $clean_name;

			$_FILES['file']['name'] = $new_name;
			$_FILES['file']['type'] = $_FILES['image']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['image']['error'];
			$_FILES['file']['size'] = $_FILES['image']['size'];

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = 2048;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {
				$data['image'] = 'uploads/consult_categories/' . $new_name;
			} else {
				$this->session->set_flashdata('err_msg', $this->upload->display_errors());
				redirect('Admin/add_consult_category', 'refresh');
			}
		}

		$this->Admin_model->add_consult_category($data);
		$this->session->set_flashdata("succ_msg", "Category Added Successfully");
		redirect('Admin/consult_categories', 'refresh');
	}



	public function edit_consult_category($id)
	{
		$ret = $this->auth();
		if ($ret == 1) {
			$data['category'] = $this->Admin_model->get_consult_category_by_id($id);
			$this->load->view('admin/edit-consult-category', $data);
		} else {
			redirect('Admin/login', 'refresh');
		}
	}

	public function update_consult_category()
	{
		$id = $this->input->post('id');

		$data = [
			'name' => $this->input->post('name'),
			'slug' => url_title($this->input->post('name'), '-', true),
			'status' => $this->input->post('status'),
			'sort_order' => $this->input->post('sort_order')
		];

		$path = './uploads/consult_categories/';
		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
		}

		/* IMAGE UPDATE */
		if (!empty($_FILES['image']['name'])) {

			// 🔹 OLD IMAGE (FOR DELETE)
			$old = $this->Admin_model->get_consult_category_by_id($id);

			// ✅ CLEAN FILE NAME
			$clean_name = $this->clean_file_name($_FILES['image']['name']);
			$new_name = 'cat_' . time() . '_' . $clean_name;

			$_FILES['file']['name'] = $new_name;
			$_FILES['file']['type'] = $_FILES['image']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['image']['error'];
			$_FILES['file']['size'] = $_FILES['image']['size'];

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['max_size'] = 2048;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				// 🧹 DELETE OLD IMAGE
				if (!empty($old->image) && file_exists('./' . $old->image)) {
					unlink('./' . $old->image);
				}

				$data['image'] = 'uploads/consult_categories/' . $new_name;

			} else {
				$this->session->set_flashdata('err_msg', $this->upload->display_errors());
				redirect('Admin/edit_consult_category/' . $id, 'refresh');
			}
		}

		$this->Admin_model->update_consult_category($data, $id);
		$this->session->set_flashdata("succ_msg", "Category Updated Successfully");
		redirect('Admin/consult_categories', 'refresh');
	}


	public function delete_consult_category($id)
	{
		$cat = $this->Admin_model->get_consult_category_by_id($id);

		// 🧹 DELETE IMAGE FILE
		if (!empty($cat->image) && file_exists('./' . $cat->image)) {
			unlink('./' . $cat->image);
		}

		$this->Admin_model->delete_consult_category($id);

		$this->session->set_flashdata("succ_msg", "Category Deleted Successfully");
		redirect('Admin/consult_categories', 'refresh');
	}


	// ===============================
// CONSULT packages
// ===============================

	public function consult_packages()
	{
		$ret = $this->auth();
		if ($ret == 1) {
			$data['packages'] = $this->Admin_model->get_consult_packages();
			$this->load->view('admin/manage-consult-packages', $data);
		} else {
			redirect('Admin/login');
		}
	}

	public function add_consult_package()
	{
		$ret = $this->auth();
		if ($ret == 1) {
			$data['categories'] = $this->Admin_model->get_consult_categories();
			$this->load->view('admin/add-consult-package', $data);
		} else {
			redirect('Admin/login');
		}
	}

	public function insert_consult_package()
	{
		$path = './uploads/consult_packages/';
		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
		}

		$data = [
			'category_id' => $this->input->post('category_id'),
			'name' => $this->input->post('name'),
			'sessions' => $this->input->post('sessions'),
			'price' => $this->input->post('price'),
			'status' => $this->input->post('status'),
			'sort_order' => $this->input->post('sort_order'),
			'price_type' => $this->input->post('price_type'),
		];

		/* IMAGE UPLOAD */
		if (!empty($_FILES['image']['name'])) {

			$clean_name = $this->clean_file_name($_FILES['image']['name']);
			$new_name = 'pkg_' . time() . '_' . $clean_name;

			$_FILES['file']['name'] = $new_name;
			$_FILES['file']['type'] = $_FILES['image']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['image']['error'];
			$_FILES['file']['size'] = $_FILES['image']['size'];

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2048;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {
				$data['image'] = 'uploads/consult_packages/' . $new_name;
			} else {
				$this->session->set_flashdata('err_msg', $this->upload->display_errors());
				redirect('Admin/add_consult_package', 'refresh');
			}
		}

		$package_id = $this->Admin_model->add_consult_package($data);

		/* FEATURES */
		if (!empty($_POST['features'])) {
			foreach ($_POST['features'] as $feature) {
				if ($feature != '') {
					$this->Admin_model->add_package_feature([
						'package_id' => $package_id,
						'feature' => $feature
					]);
				}
			}
		}

		$this->session->set_flashdata('succ_msg', 'Package Added Successfully');
		redirect('Admin/consult_packages', 'refresh');
	}

	public function edit_consult_package($id)
	{
		if ($this->auth() == 1) {
			$data['package'] = $this->Admin_model->get_consult_package_by_id($id);
			$data['features'] = $this->Admin_model->get_package_features($id);
			$data['categories'] = $this->Admin_model->get_consult_categories();
			$this->load->view('admin/edit-consult-package', $data);
		} else {
			redirect('Admin/login');
		}
	}

	public function update_consult_package()
	{
		$id = $this->input->post('id');

		$data = [
			'category_id' => $this->input->post('category_id'),
			'name' => $this->input->post('name'),
			'sessions' => $this->input->post('sessions'),
			'price' => $this->input->post('price'),
			'status' => $this->input->post('status'),
			'price_type' => $this->input->post('price_type'),
			'sort_order' => $this->input->post('sort_order')
		];

		$path = './uploads/consult_packages/';
		if (!is_dir($path)) {
			mkdir($path, 0777, TRUE);
		}

		/* IMAGE UPDATE */
		if (!empty($_FILES['image']['name'])) {

			$old = $this->Admin_model->get_consult_package_by_id($id);

			$clean_name = $this->clean_file_name($_FILES['image']['name']);
			$new_name = 'pkg_' . time() . '_' . $clean_name;

			$_FILES['file']['name'] = $new_name;
			$_FILES['file']['type'] = $_FILES['image']['type'];
			$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];
			$_FILES['file']['error'] = $_FILES['image']['error'];
			$_FILES['file']['size'] = $_FILES['image']['size'];

			$config['upload_path'] = $path;
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 2048;

			$this->load->library('upload');
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				// delete old image
				if (!empty($old->image) && file_exists('./' . $old->image)) {
					unlink('./' . $old->image);
				}

				$data['image'] = 'uploads/consult_packages/' . $new_name;

			} else {
				$this->session->set_flashdata('err_msg', $this->upload->display_errors());
				redirect('Admin/edit_consult_package/' . $id, 'refresh');
			}
		}

		$this->Admin_model->update_consult_package($data, $id);

		/* FEATURES RESET */
		$this->Admin_model->delete_package_features($id);
		if (!empty($_POST['features'])) {
			foreach ($_POST['features'] as $feature) {
				if ($feature != '') {
					$this->Admin_model->add_package_feature([
						'package_id' => $id,
						'feature' => $feature
					]);
				}
			}
		}

		$this->session->set_flashdata('succ_msg', 'Package Updated Successfully');
		redirect('Admin/consult_packages', 'refresh');
	}

	public function delete_consult_package($id)
	{
		// get package (for image)
		$pkg = $this->Admin_model->get_consult_package_by_id($id);

		// delete image
		if (!empty($pkg->image) && file_exists('./' . $pkg->image)) {
			unlink('./' . $pkg->image);
		}

		// delete features first
		$this->Admin_model->delete_package_features($id);

		// delete package
		$this->Admin_model->delete_consult_package($id);

		$this->session->set_flashdata('succ_msg', 'Package Deleted Successfully');
		redirect('Admin/consult_packages', 'refresh');
	}


	private function clean_file_name($filename)
	{
		$filename = strtolower($filename);
		$filename = preg_replace('/\s+/', '_', $filename); // spaces → _
		$filename = preg_replace('/[^a-z0-9\._-]/', '', $filename); // remove special chars
		return $filename;
	}

	public function mark_whatsapp_payment()
	{
		$appoint_id = $this->input->post('appoint_id');
		$payment_status = $this->input->post('payment_status');
		$transaction_id = $this->input->post('transaction_id');

		if (!$appoint_id || !$payment_status) {
			echo 0;
			return;
		}

		/* ===============================
		   1️⃣ UPDATE appointment TABLE
		   =============================== */
		$this->db->where('id', $appoint_id);
		$this->db->update('appointment', [
			'payment_status' => $payment_status
		]);

		/* ===============================
		   2️⃣ INSERT / UPDATE payment_online
		   =============================== */
		$payment = [
			'appointment_id' => $appoint_id,
			'transaction_id' => $transaction_id ?: null,
			'status' => $payment_status,
			'added_on' => date('Y-m-d H:i:s')
		];

		$exists = $this->db
			->where('appointment_id', $appoint_id)
			->get('payment_online')
			->row();

		if ($exists) {
			$this->db->where('appointment_id', $appoint_id);
			$this->db->update('payment_online', $payment);
		} else {
			$this->db->insert('payment_online', $payment);
		}

		echo 1;
	}


}