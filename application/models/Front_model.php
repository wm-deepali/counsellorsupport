<?php
class Front_model extends CI_model
{

	function get_courses()
	{
		$this->db->select("*");
		$this->db->from("course");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function get_fees()
	{

		$this->db->select("*");

		$this->db->from("fees");

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->result();

		}

	}
	function insert_contact($data)
	{
		$query = $this->db->insert("contact_us", $data);
		return $query;
	}
	function insert_feedback($data)
	{
		$query = $this->db->insert("feedback", $data);
		return $query;
	}
	function get_slider()
	{
		$this->db->select("*");
		$this->db->from("slider");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function get_services()
	{
		$this->db->select("*");
		$this->db->from("service");
		$this->db->where("status", "Active");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function get_home()
	{
		$this->db->select("*");
		$this->db->from("home_content");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function get_feedback()
	{
		$this->db->select("*");
		$this->db->from("feedback");
		$this->db->where("status", "Approved");
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	function get_service($slug)
	{
		$this->db->select("*");
		$this->db->from("service");
		$this->db->where("slug", $slug);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function consult_service()
	{
		$this->db->select("*");
		$this->db->from("service");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function latest_services()
	{
		$this->db->select("*");
		$this->db->from("service");
		//$this->db->limit("3");
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function get_timeslot()
	{
		$this->db->select("*");
		$this->db->from("timing");
		$this->db->where("status", "Open");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function count_appointments()
	{
		$this->db->count_all('appointment');
	}
	function insert_appointment($data)
	{
		$query = $this->db->insert("appointment", $data);
		return $query;
	}
	function get_faqs()
	{
		$this->db->select("*");
		$this->db->from("faqs");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function get_aboutus()
	{
		$this->db->select("*");
		$this->db->from("about_us");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function get_social()
	{
		$this->db->select("*");
		$this->db->from("social_setting");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function get_header()
	{
		$this->db->select("*");
		$this->db->from("header");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function get_footer()
	{
		$this->db->select("*");
		$this->db->from("footer");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function get_cancellation()
	{

		$this->db->select("*");

		$this->db->from("cancellation");

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->result();

		}

	}

	function get_privacy()
	{

		$this->db->select("*");

		$this->db->from("privacy_policy");

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->result();

		}

	}
	function get_disclaimer()
	{

		$this->db->select("*");

		$this->db->from("disclaimer");

		$query = $this->db->get();

		if ($query->num_rows() > 0) {

			return $query->result();

		}

	}

	function get_popup()
	{
		$this->db->select("*");
		$this->db->from("popup");
		$this->db->where("status", "Active");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	public function get_appoint($id)
	{
		$this->db->select("
        appointment.*, 
        service.name AS service_name, 
        
        consult_packages.name AS package_name,
        consult_categories.name AS category_name,
        
        timing.from_, 
        timing.to_,
        timing.date, 
        timing.days
    ");
		$this->db->from("appointment");
		$this->db->join("service", "service.id = appointment.service_id", "left");
		$this->db->join("consult_packages", "consult_packages.id = appointment.package_id", "left");
		$this->db->join("consult_categories", "consult_categories.id = consult_packages.category_id", "left");
		$this->db->join("timing", "timing.id = appointment.timeslot_id", "left");
		$this->db->where("appointment.id", $id);

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}

	function insert_payment($data)
	{
		$query = $this->db->insert("payment_online", $data);
		return $query;
	}
	function get_payment($id)
	{
		$this->db->select("payment_online.*, service.name as service_name, appointment.email, appointment.mobile, appointment.name, appointment.timeslot_id, timing.date,timing.days, timing.to_, timing.from_");
		$this->db->from("payment_online");
		$this->db->join("appointment", "appointment.id = payment_online.appointment_id", "left");
		$this->db->join("service", "service.id = appointment.service_id");
		$this->db->join("timing", "timing.id = appointment.timeslot_id");
		$this->db->where("payment_online.id", $id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function update_appointment($data, $id)
	{
		$this->db->where("id", $id);
		if ($this->db->update("appointment", $data)) {
			return 1;
		}
	}
	function fetch_timeslot($date)
	{
		$this->db->where('date', $date);
		$this->db->order_by('date', 'ASC');
		$query = $this->db->get('timing');
		$output = '<option value="">Select time</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="' . $row->id . '">' . $row->to_ . ' - ' . $row->from_ . '</option>';
		}
		return $output;
	}
	function get_date()
	{
		$this->db->select("*");
		$this->db->from("timing");
		$this->db->where('date >=', date("Y-m-d"));
		$this->db->group_by("date");
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	function update_timeslot($data, $id)
	{
		$this->db->where("id", $id);
		if ($this->db->update("timing", $data)) {
			return 1;
		}
	}
	/* ACTIVE CATEGORIES */
	public function get_active_consult_categories()
	{
		return $this->db
			->where('status', 1)
			->order_by('sort_order', 'ASC')
			->get('consult_categories')
			->result();
	}
	public function get_all_packages()
	{
		return $this->db
			->select('consult_packages.*, consult_categories.name AS category_name')
			->from('consult_packages')
			->join('consult_categories', 'consult_categories.id = consult_packages.category_id', 'left')
			->where('consult_packages.status', 1)
			->order_by('consult_packages.sort_order', 'ASC')
			->get()
			->result();
	}

	public function get_packages_by_category($category_id)
	{
		return $this->db
			->select('consult_packages.*, consult_categories.name AS category_name')
			->from('consult_packages')
			->join('consult_categories', 'consult_categories.id = consult_packages.category_id', 'left')
			->where('consult_packages.category_id', $category_id)
			->where('consult_packages.status', 1)
			->order_by('consult_packages.sort_order', 'ASC')
			->get()
			->result();
	}


	public function get_package_features($package_id)
	{
		return $this->db
			->where('package_id', $package_id)
			->get('consult_package_features')
			->result();
	}

	public function get_category_by_slug($slug)
	{
		return $this->db
			->where('slug', $slug)
			->where('status', 1)
			->get('consult_categories')
			->row();
	}

	public function get_package_by_id($id)
	{
		return $this->db
			->where('id', $id)
			->where('status', 1)
			->get('consult_packages')
			->row();
	}

}