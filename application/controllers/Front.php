<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Front extends CI_Controller {

	public function __construct()

	{

		parent::__construct();

		//$this->load->helper('url','form');

		$this->load->model('Front_model');

	}

	public function index()

	{

		$data['popup']=$this->Front_model->get_popup();
		
		$data['feedbacks']=$this->Front_model->get_feedback();
       
		$data['about']=$this->Front_model->get_aboutus();

		$data['header']=$this->Front_model->get_header();
         $data['services']=$this->Front_model->get_services();
		$data['footer']=$this->Front_model->get_footer();

		$data['social']=$this->Front_model->get_social();
		$data['home']=$this->Front_model->get_home();
		$data['sliders']=$this->Front_model->get_slider();

		$this->load->view('front/index', $data);

	}

	public function about_us()

	{

		$data['services']=$this->Front_model->get_services();

		$data['about']=$this->Front_model->get_aboutus();

		$data['header']=$this->Front_model->get_header();

		$data['footer']=$this->Front_model->get_footer();

		$data['social']=$this->Front_model->get_social();
		

		$this->load->view('front/about-us', $data);

	}

	public function services()

	{

		$data['services']=$this->Front_model->get_services();
		$data['header']=$this->Front_model->get_header();

		$data['footer']=$this->Front_model->get_footer();

		$data['social']=$this->Front_model->get_social();

		$this->load->view('front/services',$data);

		

	}

	public function service_detail($slug)

	{
    $data['timeslot']=$this->Front_model->get_timeslot();
		$data['services']=$this->Front_model->get_services();

		$data['service_detail']=$this->Front_model->get_service($slug);

		$data['latest_service']=$this->Front_model->latest_services();

		$data['header']=$this->Front_model->get_header();

		$data['footer']=$this->Front_model->get_footer();
        $data['fees']=$this->Front_model->get_fees();
		$data['social']=$this->Front_model->get_social();

		// print_r($data['service_detail']);

		// exit;

		$this->load->view('front/service-detail', $data);

	}

	public function contact()

	{

		$data['services']=$this->Front_model->get_services();

		$data['timeslot']=$this->Front_model->get_timeslot();

		$data['header']=$this->Front_model->get_header();

		$data['footer']=$this->Front_model->get_footer();

		$data['social']=$this->Front_model->get_social();

		$this->load->view('front/contact', $data);

	}

	public function insert_contact()

	{	

		$this->form_validation->set_rules("name","Name","required");

		$this->form_validation->set_rules("mobile","Contact Number","required");

		$this->form_validation->set_rules(

			"email","Email",

			"trim|required|valid_email"

		);

		if($this->form_validation->run())

		{

			$data=array(

				"name"=>$this->input->post("name"),

				"email"=>$this->input->post("email"),

				"mobile"=>$this->input->post("mobile"),

				"service_id"=>$this->input->post("service"),

				"time"=>$this->input->post("timeslot"),

				"description"=>$this->input->post("description")

			);



			if(!empty($_FILES["document"]["name"]))

			{

				$path='./uploads/document/';

				$thumb_path='./uploads/document/thumb/';

				$height=500;

				$width=500;

				if (!is_dir('uploads/document')) {

					mkdir('./uploads/document', 0777, TRUE);

					mkdir('./uploads/document/thumb', 0777, TRUE);

				}

				$new_name=str_replace(" ","",'contact'.time().$_FILES['document']['name']);

				$_FILES['file']['name']     = $new_name;

				$_FILES['file']['type']     = $_FILES['document']['type'];

				$_FILES['file']['tmp_name'] = $_FILES['document']['tmp_name'];

				$_FILES['file']['error']    = $_FILES['document']['error'];

				$_FILES['file']['size']     = $_FILES['document']['size'];

				$config['upload_path'] = $path;

				$config['allowed_types'] = 'jpg|jpeg|png|gif';

				$this->load->library('upload', $config);

				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {

					$data['document'] = $path.$new_name;

					$this->resizeImage($new_name,$path,$thumb_path,$height,$width);

					$data['document_thumb'] = $thumb_path.$new_name;

				} else {

					$this->session->set_flashdata('err_msg',$this->upload->display_errors());

					redirect('contact','refresh');

				}

			}

			$return=$this->Front_model->insert_contact($data);

			if ($return) {

				$this->session->set_flashdata("success","Add Successfull");

				redirect('contact-us','refresh');

			} else {

				$this->session->set_flashdata("error","Add Failed");

				redirect('contact-us','refresh');

			}



		}else{



			$this->session->set_flashdata('errors',validation_errors());

			redirect('contact-us','refresh');

		}

	}



	public function resizeImage($new_name,$path,$thumb_path,$height,$width)

	{

		$this->load->library('image_lib');

		$config_manip = array(

			'image_library' => 'gd2',

			'source_image' => $path.$new_name,

			'new_image' => $thumb_path,

			'maintain_ratio' => FALSE,

			'create_thumb' => FALSE,

			'thumb_marker' => '_thumb',

			'width' => $height,

			'height' => $width

		);

		$this->image_lib->initialize($config_manip);

		if (!$this->image_lib->resize())

		{

			echo $this->image_lib->display_errors();

		}

		$this->image_lib->clear();

	}

	public function consult_online()

	{

		$data['services']=$this->Front_model->get_services();
		$data['consult_services']=$this->Front_model->consult_service();
        $data['dates']=$this->Front_model->get_date();
        // print_r($data['dates']);exit;
		$data['faqs']=$this->Front_model->get_faqs();
		$data['timeslot']=$this->Front_model->get_timeslot();
		$data['header']=$this->Front_model->get_header();
		$data['footer']=$this->Front_model->get_footer();
		$data['social']=$this->Front_model->get_social();
		$data['fees']=$this->Front_model->get_fees();
		$this->load->view('front/consult-online',$data);

	}
	
	public function consult_details()

	{

		$data['services']=$this->Front_model->get_services();
		$data['consult_services']=$this->Front_model->consult_service();
        $data['dates']=$this->Front_model->get_date();
        // print_r($data['dates']);exit;
		$data['faqs']=$this->Front_model->get_faqs();
		$data['timeslot']=$this->Front_model->get_timeslot();
		$data['header']=$this->Front_model->get_header();
		$data['footer']=$this->Front_model->get_footer();
		$data['social']=$this->Front_model->get_social();
		$data['fees']=$this->Front_model->get_fees();
		$this->load->view('front/consult-details',$data);

	}
	public function fetch_timeslot()
	{
		
		$date = $this->input->post('date');
		if($date)
		{
			echo $this->Front_model->fetch_timeslot($date);
		}
	}

	public function feedback()

	{

		$data['services']=$this->Front_model->get_services();

	   $data['feedbacks']=$this->Front_model->get_feedback();

	   $data['header']=$this->Front_model->get_header();

		$data['footer']=$this->Front_model->get_footer();

		$data['social']=$this->Front_model->get_social();

		$this->load->view('front/feedback',$data

	);

	}

	public function insert_feedback()

	{	

		$this->form_validation->set_rules("name"," Name","required");

		$this->form_validation->set_rules("email","Email","trim|required|valid_email");

		if($this->form_validation->run())

		{

			$data=array(

				"type"=>$this->input->post("type"),

				"name"=>$this->input->post("name"),

				"email"=>$this->input->post("email"),

				"message"=>$this->input->post("message"),
				"status"=>"Pending"

			);

			if(!empty($_FILES["image"]["name"]))

			{

				$path='./uploads/feedback/';

				$thumb_path='./uploads/feedback/thumb/';

				$height=500;

				$width=500;

				if (!is_dir('uploads/feedback')) {

					mkdir('./uploads/feedback', 0777, TRUE);

					mkdir('./uploads/feedback/thumb', 0777, TRUE);

				}

				$new_name=str_replace(" ","",'feedback'.time().$_FILES['image']['name']);

				$_FILES['file']['name']     = $new_name;

				$_FILES['file']['type']     = $_FILES['image']['type'];

				$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'];

				$_FILES['file']['error']    = $_FILES['image']['error'];

				$_FILES['file']['size']     = $_FILES['image']['size'];

				$config['upload_path'] = $path;

				$config['allowed_types'] = 'jpg|jpeg|png|gif';

				$this->load->library('upload', $config);

				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {

					$data['image'] = $path.$new_name;

					$this->resizeImage($new_name,$path,$thumb_path,$height,$width);

					$data['image_thumb'] = $thumb_path.$new_name;

				} else {

					$this->session->set_flashdata('error',$this->upload->display_errors());

					redirect('feedback','refresh');

				}

			}

			$return=$this->Front_model->insert_feedback($data);

			if ($return) {

				$this->session->set_flashdata("success","Add Successfull");

				redirect('feedback','refresh');

			} else {

				$this->session->set_flashdata("error","Add Failed");

				redirect('feedback','refresh');

			}



		}else{

			$this->session->set_flashdata('errors',validation_errors());

			redirect('feedback','refresh');

		}

	}
	public function add_feedback()
	{	
		
		$data=array(
			"name"=>$this->input->post("name"),
			"email"=>$this->input->post("email"),
			"type"=>$this->input->post("type"),
			"message"=>$this->input->post("message"),	
		);
		$result=$this->Front_model->insert_feedback($data);
		if($result){
		echo  1;	
		}
		else{
		echo  0;	
		}
	}

	public function appointment()

	{

		$data['services']=$this->Front_model->get_services();
        $data['dates']=$this->Front_model->get_date();
		$data['timeslot']=$this->Front_model->get_timeslot();

		$data['header']=$this->Front_model->get_header();

		$data['footer']=$this->Front_model->get_footer();

		$data['social']=$this->Front_model->get_social();

		$this->load->view('front/appointment', $data);

	}


	public function add_appointment()

	{	

		$this->form_validation->set_rules("name","Name","required");

		$this->form_validation->set_rules("mobile","Contact Number","required");

		$this->form_validation->set_rules("email","Email","trim|required|valid_email");

		if($this->form_validation->run())

		{

	

			$data=array(

				"name"=>$this->input->post("name"),

				"email"=>$this->input->post("email"),

				"mobile"=>$this->input->post("mobile"),

				"service_id"=>$this->input->post("service"),

				"timeslot_id"=>$this->input->post("timeslot"),

				"description"=>$this->input->post("description"),
			    "amount"=>$this->input->post("amount"),
				"payment_proceed"=>"No",
				"payment_status"=>"Pending",
				"appoint_type"=>"online"

			);

			if(!empty($_FILES["document"]["name"]))

			{

				$path='./uploads/document/';

				$thumb_path='./uploads/document/thumb/';

				$height=500;

				$width=500;

				if (!is_dir('uploads/document')) {

					mkdir('./uploads/document', 0777, TRUE);

					mkdir('./uploads/document/thumb', 0777, TRUE);

				}

				$new_name=str_replace(" ","",'contact'.time().$_FILES['document']['name']);

				$_FILES['file']['name']     = $new_name;

				$_FILES['file']['type']     = $_FILES['document']['type'];

				$_FILES['file']['tmp_name'] = $_FILES['document']['tmp_name'];

				$_FILES['file']['error']    = $_FILES['document']['error'];

				$_FILES['file']['size']     = $_FILES['document']['size'];

				$config['upload_path'] = $path;

				$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);

				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {

					$data['image'] = $path.$new_name;

					$this->resizeImage($new_name,$path,$thumb_path,$height,$width);

					$data['image_thumb'] = $thumb_path.$new_name;

				} else {

					$this->session->set_flashdata('errors',$this->upload->display_errors());

					redirect('consult-online','refresh');

				}

			}

			$return=$this->Front_model->insert_appointment($data);

			if ($return) {
              $id = $this->db->insert_id();
				$this->session->set_userdata("appoint_id",$id);
				redirect('front/proceed_to_payment','refresh');

			} else {

				$this->session->set_flashdata("errors","Add Failed");
				    redirect('consult-online','refresh');
			}

		}else{

			$this->session->set_flashdata('errors',validation_errors());

				    redirect('consult-online','refresh');
			
		}

	}
	
		public function insert_appointment()
    {
	
		$this->form_validation->set_rules("name","Name","required");

		$this->form_validation->set_rules("mobile","Contact Number","required");

		$this->form_validation->set_rules("email","Email","trim|required|valid_email");

		if($this->form_validation->run())

		{

	

			$data=array(

				"amount"=>$this->input->post("amount"),

				"name"=>$this->input->post("name"),

				"email"=>$this->input->post("email"),

				"mobile"=>$this->input->post("mobile"),

				"service_id"=>$this->input->post("service"),

				"timeslot_id"=>$this->input->post("timeslot"),

				"description"=>$this->input->post("description"),
				"appoint_type"=>"visit us"

			);

			if(!empty($_FILES["document"]["name"]))

			{

				$path='./uploads/document/';

				$thumb_path='./uploads/document/thumb/';

				$height=500;

				$width=500;

				if (!is_dir('uploads/document')) {

					mkdir('./uploads/document', 0777, TRUE);

					mkdir('./uploads/document/thumb', 0777, TRUE);

				}

				$new_name=str_replace(" ","",'contact'.time().$_FILES['document']['name']);

				$_FILES['file']['name']     = $new_name;

				$_FILES['file']['type']     = $_FILES['document']['type'];

				$_FILES['file']['tmp_name'] = $_FILES['document']['tmp_name'];

				$_FILES['file']['error']    = $_FILES['document']['error'];

				$_FILES['file']['size']     = $_FILES['document']['size'];

				$config['upload_path'] = $path;

				$config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx';

				$this->load->library('upload', $config);

				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {

					$data['image'] = $path.$new_name;

					$this->resizeImage($new_name,$path,$thumb_path,$height,$width);

					$data['image_thumb'] = $thumb_path.$new_name;

				} else {

					$this->session->set_flashdata('errors',$this->upload->display_errors());

					redirect('appointment','refresh');

				}

			}

			$return=$this->Front_model->insert_appointment($data);

			if ($return) {
              
				$this->session->set_flashdata("success","Add Successfull");
			
				   redirect('appointment','refresh');
				
			
			} else {
				$this->session->set_flashdata("errors","Add Failed");
				   redirect('appointment','refresh');
			}
		}else{

			$this->session->set_flashdata('errors',validation_errors());
            redirect('appointment','refresh');
		}

	}
	

	public function disclaimer()
	{

		$data['header']=$this->Front_model->get_header();

		$data['footer']=$this->Front_model->get_footer();
        $data['services']=$this->Front_model->get_services();
		$data['social']=$this->Front_model->get_social();
		$data['disclaimer']=$this->Front_model->get_disclaimer();

		$this->load->view('front/disclaimer', $data);
	}
	
	public function privacy_policy()
	{

		$data['header']=$this->Front_model->get_header();

		$data['footer']=$this->Front_model->get_footer();
		$data['social']=$this->Front_model->get_social();
		$data['privacy']=$this->Front_model->get_privacy();
        $data['services']=$this->Front_model->get_services();
		$this->load->view('front/privacy-policy', $data);
	}
	
	public function cancellation_policy()
	{

		$data['header']=$this->Front_model->get_header();
		$data['footer']=$this->Front_model->get_footer();
    	$data['services']=$this->Front_model->get_services();
		$data['social']=$this->Front_model->get_social();
		$data['cancellation']=$this->Front_model->get_cancellation();

		$this->load->view('front/cancellation-policy', $data);
	}
	
	
	public function detail()
	{

		$data['header']=$this->Front_model->get_header();
		$data['footer']=$this->Front_model->get_footer();
    	$data['services']=$this->Front_model->get_services();
		$data['social']=$this->Front_model->get_social();
		$data['cancellation']=$this->Front_model->get_cancellation();

		$this->load->view('front/detail', $data);
	}
	public function proceed_to_payment(){
		$id= $this->session->userdata('appoint_id');		
		$data['user'] = $this->Front_model->get_appoint($id);
		$data['services']=$this->Front_model->get_services();
		$data['header']=$this->Front_model->get_header();
		$data['footer']=$this->Front_model->get_footer();
		$data['social']=$this->Front_model->get_social();
		$this->load->view('front/detail',$data);
	}
	public function add_payment_detail()
	{	
		
		$data=array(
			"appointment_id"=>$this->input->post("appoint_id"),
			"transaction_id"=>$this->input->post("txnid"),
			"hash"=>$this->input->post("hash"),
			"service_provider"=>$this->input->post("service_provider"),
			"amount"=>$this->input->post("amount"),
		);
		$result=$this->Front_model->insert_payment($data);
		if($result){
			$id = $this->db->insert_id();
			$this->session->set_userdata("payment_id",$id);
		echo  1;	
		}
		else{
		echo  0;	
		}
	}
	public function success()
	{
		$id= $this->session->userdata('payment_id');
		$data = array("status"=>"Success");
		$this->db->where("id", $id);
		$this->db->update("payment_online",$data);
		$data['payment'] = $this->Front_model->get_payment($id);
		$appoint_id =$data['payment'][0]->appointment_id;
		$timeslot_id =$data['payment'][0]->timeslot_id;
		$data = array("payment_status"=>"Success");
		$this->Front_model->update_appointment($data, $appoint_id);

		$data = array("status"=>"Booked", "booking_id"=>$appoint_id);
		$this->Front_model->update_timeslot($data, $timeslot_id);
		$data['services']=$this->Front_model->get_services();
		$data['header']=$this->Front_model->get_header();
		$data['footer']=$this->Front_model->get_footer();
		$data['social']=$this->Front_model->get_social();
		$data['payment'] = $this->Front_model->get_payment($id);
		$this->load->view('front/success',$data);
	}
	public function failure()
	{
	    $id= $this->session->userdata('payment_id');
		$data = array("status"=>"Failed");
		$this->db->where("id", $id);
		$this->db->update("payment_online",$data);
		$data['payment'] = $this->Front_model->get_payment($id);
		$appoint_id =$data['payment'][0]->appointment_id;
		$data = array("payment_status"=>"Failed");
		$this->Front_model->update_appointment($data, $appoint_id);
		$data['services']=$this->Front_model->get_services();
		$data['header']=$this->Front_model->get_header();
		$data['footer']=$this->Front_model->get_footer();
		$data['social']=$this->Front_model->get_social();
		$data['payment'] = $this->Front_model->get_payment($id);
		$this->load->view('front/failure',$data);
	}

}

