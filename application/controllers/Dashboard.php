<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('user_id')){
			redirect('home/login');
		}
    } 

	public function index()
	{
		$this->load->view('index');
	}

	public function employees()
	{
		$this->load->view('employees');
	}

	public function help()
	{
		$this->load->view('help');
	}

	public function documents()
	{
		$this->load->view('documents');
	}

	public function mngrequests()
	{
		$this->load->view('mngrequests');
	}

	public function adminrequests()
	{
		$this->load->view('adminrequests');
	}

	public function emprequests()
	{
		$this->load->view('emprequests');
	}

	public function profile()
	{
		$this->load->view('profile');
	}

	public function schedules()
	{
		$this->load->view('schedules');
	}
	
	public function createSchedule()
	{
		$this->load->view('createSchedule');
	}
	
	public function getEmployees()
	{
		$stime = $this->input->post('start_time');
		$etime = $this->input->post('end_time');
		$station = $this->input->post('station');
		$day = $this->input->post('day');

		$html = '<option value="">Select Employee</option>';

		$users = $this->db->order_by("id","desc")->get_where("tbl_users", ["station"=>$station])->result(); 

		foreach($users as $k => $u){

			$cCount = $this->db->get_where("tbl_employee_class_timings", ["employee_id"=>$u->id]);

			$sttime = date("H:i:s", strtotime($stime));
			$ettime = date("H:i:s", strtotime($etime));
 
			$cTimings = $this->db->query("SELECT * FROM `tbl_employee_class_timings` WHERE `day` = '$day' AND `employee_id` = '$u->id' AND (`start_time` > '$sttime' AND `start_time` < '$ettime' OR `end_time` > '$sttime' AND `end_time` < '$ettime')");

			$this->db->where("start_time <=", $sttime);
			$this->db->where("end_time >=", $sttime);
			$cTimings1 = $this->db->get_where("tbl_employee_class_timings", ["day"=>$day,"employee_id"=>$u->id]);
			// if($cTimings1 == 0){
			// 	$html .= '<option value="'.$u->id.'">'.$u->first_name." ".$u->last_name.'</option>';
			// }

			if($cCount->num_rows() > 0 && $cTimings->num_rows() == 0 && $cTimings1->num_rows() == 0){
				$html .= '<option value="'.$u->id.'">'.$u->first_name." ".$u->last_name.'</option>';
			}else{
				
			}
		}
		echo $html;
	}
	
	public function deleteEmployee($eid)
	{

		$d = $this->db->delete("tbl_users", ["id"=>$eid]);

		if($d){
			$this->db->delete("tbl_schedules", ["employee_id"=>$eid]);
			$this->db->delete("tbl_employee_class_timings", ["employee_id"=>$eid]);
			echo json_encode(["status"=>true, "msg"=>"Successfully Deleted"]);
			exit;
		}else{
			echo json_encode(["status"=>false, "msg"=>"Error Occured"]);
			exit;
		}

	}

	public function updateStation()
	{
		$station = $this->input->post('station');
		$employee_id = $this->input->post('eid');

		if($station == ""){
			echo json_encode(["status"=>false, "msg"=>"Station Is Required"]);
			exit;
		}
		if($employee_id == ""){
			echo json_encode(["status"=>false, "msg"=>"Employee ID Is Required"]);
			exit;
		}

		$d = $this->db->where("id",$employee_id)->update("tbl_users",["station"=>$station]);

		if($d){
			echo json_encode(["status"=>true, "msg"=>"Successfully Updated"]);
			exit;
		}else{
			echo json_encode(["status"=>false, "msg"=>"Error Occured"]);
			exit;
		}
	}
	
	public function insertSchedule()
	{
		$user_id = $this->session->userdata('user_id');
		$start_time = $this->input->post('start_time');
		$end_time = $this->input->post('end_time');
		$station = $this->input->post('station');
		$employee_id = $this->input->post('employee_id');

		$chkSchedule = $this->db->get_where("tbl_schedules", ["employee_id"=>$employee_id, "start_time"=>$start_time, "end_time"=>$end_time])->num_rows();

		if($chkSchedule > 0){
			echo json_encode(["status"=>false, "msg"=>"Schedule Already Created"]);
			exit;
		}

		$d = $this->db->insert("tbl_schedules", ["created_by"=>$user_id,"station"=>$station,"start_time"=>$start_time,"end_time"=>$end_time,"employee_id"=>$employee_id]);

		if($d){
			echo json_encode(["status"=>true, "msg"=>"Successfully Created"]);
			exit;
		}else{
			echo json_encode(["status"=>false, "msg"=>"Error Occured"]);
			exit;
		}

	}

	public function updateTimings()
	{

		$days = ["Mon", "Tue", "Wed", "Thu", "Fri"];
		$eid = $this->session->userdata("user_id");

		foreach($days as $d){

			$stime = $this->input->post($d."startTime");
			$etime = $this->input->post($d."endTime");

			$count = $this->db->get_where("tbl_employee_class_timings", ["employee_id" => $eid, "day" => $d])->num_rows();
			
			$data = [
				"employee_id" => $eid,
				"day" => $d,
				"start_time" => $stime,
				"end_time" => $etime,
			];

			if($count > 0){
				$d1 = $this->db->where(["employee_id" => $eid, "day" => $d])->update("tbl_employee_class_timings", $data);
			}else{
				$d1 = $this->db->insert("tbl_employee_class_timings", $data);
			}

		}

		if($d1){
			echo json_encode(["status"=>true, "msg"=>"Successfully Updated Class Timings"]);
			exit;
		}else{
			echo json_encode(["status"=>false, "msg"=>"Error Occured"]);
			exit;
		}
	}
	
}
