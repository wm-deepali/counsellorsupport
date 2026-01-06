<?php

class Admin_model extends CI_model

{

	function get_admin_info($email,$password)

	{

		$data=array("email"=>$email,

			"password"=>md5($password));

		$query=	$this->db->get_where('admin' ,$data);

		if($query->num_rows()>0){

			return 1;

		}

		else{

			return 0;

		}

	}
	function total_payment(){
		$this->db->select('SUM(amount) AS amount');
        $query = $this->db->get('appointment');
        	if($query->num_rows()>0) {

			return $query->result_array();

		}
}
	function get_admin_detail_by_email($email)

	{

		$this->db->select("*");

		$this->db->from("admin");

		$this->db->where("email",$email);

		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result_array();

		}

	}

	function get_profile($id)

	{

		$this->db->select("*");

		$this->db->from("admin");

		$this->db->where("id",$id);

		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function update_profile($id,$data)

	{

		$this->db->trans_start();

		$this->db->where("id",$id);

		$this->db->update("admin",$data);

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {

			return false;

		} else {

			return true;

		}

	}

	function get_user_details_by_id($user_id)

	{

		$this->db->select("*");

		$this->db->from("admin");

		$this->db->where("id",$user_id);

		$query=$this->db->get();

		if($query->num_rows()>0)

		{

			return $query->result_array();

		}

	}

	function get_header()

	{

		$this->db->select("*");

		$this->db->from("header");

		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function add_header($data)

	{

		$query=$this->db->insert("header",$data);

		return $query;

	}

	function update_header($data)

	{

		$this->db->where("id","1");

		if($this->db->update("header",$data))

		{

			return 1;

		}

	}

	function get_footer()

	{

		$this->db->select("*");

		$this->db->from("footer");

		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function add_footer($data)

	{

		$query=$this->db->insert("footer",$data);

		return $query;

	}

	function update_footer($data)

	{

		$this->db->where("id","1");

		if($this->db->update("footer",$data))

		{

			return 1;

		}

	}

	function get_social()

	{

		$this->db->select("*");

		$this->db->from("social_setting");

		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function add_social($data)

	{

		$query=$this->db->insert("social_setting",$data);

		return $query;

	}

	function update_social($data)

	{

		$this->db->where("id","1");

		if($this->db->update("social_setting",$data))

		{

			return 1;

		}

	}

	function add_fee($data)

	{

		$query=$this->db->insert("fees",$data);

		return $query;

	}

	function get_fees()

	{

		$this->db->select("*");

		$this->db->from("fees");

		$query=$this->db->get();

		if($query->num_rows()>0)

		{

			return $query->result();

		}

	}

	function update_fee($data, $id)

	{

		$this->db->where("id",$id);

		if($this->db->update("fees",$data))

		{

			return 1;

		}

	}

	function delete_fee($id)

	{

		$this->db->where("id",$id);

		if($this->db->delete("fees")){

			return 1;

		}	

	}

	function add_timing($data)

	{

		$query=$this->db->insert("timing",$data);

		return $query;

	}

	function get_timing()

	{

		$this->db->select("*");

		$this->db->from("timing");

		$query=$this->db->get();

		if($query->num_rows()>0)

		{

			return $query->result();

		}

	}

	function update_timeslot($data,  $id)

	{

		$this->db->where("id",$id);

		if($this->db->update("timing",$data))

		{

			return 1;

		}

	}

	function delete_timeslot($id)

	{

		$this->db->where("id",$id);

		if($this->db->delete("timing")){

			return 1;

		}	

	}

	function get_aboutus()

	{

		$this->db->select("*");

		$this->db->from("about_us");

		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function add_aboutus($data)

	{

		$query=$this->db->insert("about_us",$data);

		return $query;

	}

	function update_aboutus($data)

	{

		$this->db->where("id","1");

		if($this->db->update("about_us",$data))

		{

			return 1;

		}

	}
	function get_cancellation()

	{

		$this->db->select("*");

		$this->db->from("cancellation");

		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function add_cancellation($data)

	{

		$query=$this->db->insert("cancellation",$data);

		return $query;

	}

	function update_cancellation($data)

	{

		$this->db->where("id","1");

		if($this->db->update("cancellation",$data))

		{

			return 1;

		}

	}
		function get_privacy()

	{

		$this->db->select("*");

		$this->db->from("privacy_policy");

		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function add_privacy($data)

	{

		$query=$this->db->insert("privacy_policy",$data);

		return $query;

	}

	function update_privacy($data)

	{

		$this->db->where("id","1");

		if($this->db->update("privacy_policy",$data))

		{

			return 1;

		}

	}
	
		function get_disclaimer()

	{

		$this->db->select("*");

		$this->db->from("disclaimer");

		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function add_disclaimer($data)

	{

		$query=$this->db->insert("disclaimer",$data);

		return $query;

	}

	function update_disclaimer($data)

	{

		$this->db->where("id","1");

		if($this->db->update("disclaimer",$data))

		{

			return 1;

		}

	}


	function add_service($data)

	{

		$query=$this->db->insert("service",$data);

		return $query;

	}

	function get_services()

	{

		$this->db->select("*");

		$this->db->from("service");
        $this->db->where("status", "Active");
		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function get_service_by_id($id)

	{

		$this->db->select("*");

		$this->db->from("service");



		$this->db->where("id",$id);

		$query=$this->db->get();

		if($query->num_rows()>0)

		{

			return $query->result_array();

		}

	}

	function update_service($data, $id)

	{

		$this->db->where("id", $id);

		if($this->db->update("service",$data))

		{

			return 1;

		}

	}

	function delete_service($id)

	{

		$this->db->where("id",$id);

		if($this->db->delete("service")){

			return 1;

		}	

	}

	function count_appointments()

	{

	return $this->db->count_all('appointment');

	}

	function count_enquiries()

	{

	return $this->db->count_all('contact_us');

	}

	function add_faqs($data)

	{

		$query=$this->db->insert("faqs",$data);

		return $query;

	}

	function get_faqs()

	{

		$this->db->select("*");

		$this->db->from("faqs");

		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function update_faqs($data, $id)

	{

		$this->db->where("id", $id);

		if($this->db->update("faqs",$data))

		{

			return 1;

		}

	}

	function delete_faqs($id)

	{

		$this->db->where("id",$id);

		if($this->db->delete("faqs")){

			return 1;

		}	

	}

	function get_contact_us()

	{

		$this->db->select("contact_us.*, service.name as service_name, timing.from_ , timing.to_");

		$this->db->from("contact_us");

		$this->db->join("service","service.id = contact_us.service_id","left");

		$this->db->join("timing","timing.id = contact_us.timeslot_id","left");
        $this->db->order_by('id','desc');
		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function delete_contact($id)

	{

		$this->db->where("id",$id);

		if($this->db->delete("contact_us")){

			return 1;

		}	

	}

	function get_appointment()

	{

		$this->db->select("appointment.*, service.name as service_name, timing.from_ , timing.to_,timing.date as appoint_date, timing.days as day, payment_online.added_on as date, payment_online.status, payment_online.transaction_id");

		$this->db->from("appointment");

		$this->db->join("service","service.id = appointment.service_id","left");

		$this->db->join("timing","timing.id = appointment.timeslot_id","left");
		$this->db->join("payment_online","payment_online.appointment_id = appointment.id","left");
        $this->db->group_by('payment_online.appointment_id ');
		$this->db->order_by('id','desc');

		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function get_feedback()

	{

		$this->db->select("*");

		$this->db->from("feedback");
        $this->db->order_by('id','desc');
		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function delete_appointment($id)

	{

		$this->db->where("id",$id);

		if($this->db->delete("appointment")){

			return 1;

		}	

	}

	function delete_feedback($id)

	{

		$this->db->where("id",$id);

		if($this->db->delete("feedback")){

			return 1;

		}	

	}

	function get_home()

	{

		$this->db->select("*");

		$this->db->from("home_content");

		$query=$this->db->get();

		if($query->num_rows()>0) {

			return $query->result();

		}

	}

	function add_home($data)

	{

		$query=$this->db->insert("home_content",$data);

		return $query;

	}

	function update_home($data)

	{

		$this->db->where("id","1");

		if($this->db->update("home_content",$data))

		{

			return 1;

		}

	}
	function add_slider($data)
	{
		$query=$this->db->insert("slider",$data);
		return $query;
	}
	function get_slider()
	{
		$this->db->select("*");
		$this->db->from("slider");
		$query=$this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	function get_slider_by_id($id)
	{
		$this->db->select("*");
		$this->db->from("slider");
		$this->db->where("id",$id);
		$query=$this->db->get();
		if($query->num_rows()>0)
		{
			return $query->result();
		}
	}
	function update_slider($data, $id)
	{
		$this->db->where("id", $id);
		if($this->db->update("slider",$data))
		{
			return 1;
		}
	}
	function delete_slider($id)
	{
		$this->db->where("id",$id);
		if($this->db->delete("slider")){
			return 1;
		}	
	}

    function get_popup()
	{
		$this->db->select("*");
		$this->db->from("popup");
		$query=$this->db->get();
		if($query->num_rows()>0) {
			return $query->result();
		}
	}
	function add_popup($data)
	{
		$query=$this->db->insert("popup",$data);
		return $query;
	}
	function update_popup($data)
	{
		$this->db->where("id","1");
		if($this->db->update("popup",$data))
		{
			return 1;
		}
	}

}

