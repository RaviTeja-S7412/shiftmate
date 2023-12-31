<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends CI_Controller {

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

	public function insertRequest()
	{
		$user_id = $this->session->userdata('user_id');
		$employee_id = $this->input->post('employee_id');
		$document_type = $this->input->post('document_type');

		$chkSchedule = $this->db->get_where("tbl_documents", ["employee_id"=>$employee_id, "document_type"=>$document_type])->num_rows();

		if($chkSchedule > 0){
			echo json_encode(["status"=>false, "msg"=>"Request Already Sent"]);
			exit;
		}

		$d = $this->db->insert("tbl_documents", ["created_by"=>$user_id,"document_type"=>$document_type,"employee_id"=>$employee_id]);

		if($d){
			redirect('dashboard/documents');
		}else{
			redirect('dashboard/documents');
		}

	}

	public function uploadDocument(){

		$user_id = $this->session->userdata('user_id');
		$id = $this->input->post('id');
		$file = "";

		$config['upload_path']          = 'uploads/documents/';
		$config['allowed_types']        = '*';
		$config['encrypt_name']        = true;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file'))
		{
			$this->session->set_flashdata('error', $this->upload->display_errors());
			redirect('dashboard/documents');
		}
		else
		{
			$fd=$this->upload->data();
			
			// $oName = $fd['client_name'];
			$file = "uploads/documents/".$fd['file_name'];

		}

		$d = $this->db->where("id", $id)->update("tbl_documents", ["document"=>$file]);

		if($d){
			redirect('dashboard/documents');
		}else{
			$this->session->set_flashdata('error', "Error Occured");
			redirect('dashboard/documents');
		}

	}
	
}
