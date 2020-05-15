<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Survey extends CI_Controller
{    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Survey_model');
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('login', 'refresh');}
        
    }

    public function index(){

      $this->template->load('template','survey/survey_list');
    }

    function data_survey($first=null,$last=null,$status=null){

      $first = $_GET['first'];
      $last = $_GET['last'];
      $status = $_GET['status'];
      $team = $this->session->userdata('user_sgm');
      
      $data=$this->Survey_model->get_range($first,$last,$status,$team);
      echo json_encode($data);
    }

    public function range($first=null,$last=null,$status=null)
    {
        if($first == null){
          $survey = $this->Survey_model->get_all();
          $first=date('Y-m-d');
          $last=date('Y-m-d');
          $status =set_value('status');
        }else{
          $survey = $this->Survey_model->get_range($first,$last,$status);
          $first=$first;
          $last=$last;
          $status =$status;
        }
        $data = array(
          'first'=>$first,
          'last'=>$last,
          'status'=> $status,
          'survey_data' => $survey
        );
       // echo json_encode($survey);
        $this->template->load('template','survey/survey_list_backup', $data);
    }

        public function api($first=null,$last=null,$status=null)
    {
        if($first == null){
          $survey = $this->Survey_model->get_all();
        }else{
          $survey = $this->Survey_model->get_range($first,$last,$status);
        }
        echo json_encode($survey);
    }

    function read($id) 
    {
        $row = $this->Survey_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'sv_date' => $row->sv_date,
          		'sv_result' => $row->sv_result,
          		'cust_name' => $row->cust_name,
          		'slm_name' => $row->slm_name,
          		'itm_name' => $row->itm_name,
          		'cl_name' => $row->cl_name,
          		'sv_dpsetor' => $row->sv_dpsetor,
              'fc_code' => $row->fc_code,
              'sv_no' => $row->sv_no,
              'sv_plandate' => $row->sv_plandate,
              'ori_by' => $row->ori_by,
	    );
            $this->template->load('template','survey/survey_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('survey/create_action'),
      	    'create_at' => set_value('create_at'),
      	    'get_all_group' => $this->Group_model->get_all(),
      	    'id' => set_value('id'),
            'group_id' => set_value('group_id'),
      	    'nama' => set_value('nama'),
      	    'password' => set_value('password'),
      	    'username' => set_value('username'),
	);
        $this->template->load('template','survey/survey_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'group_id' => $this->input->post('group_id',TRUE),
        		'nama' => $this->input->post('nama',TRUE),
            'password' => $this->bcrypt->hash_password($this->input->post('password'),TRUE),
        		'username' => $this->input->post('username',TRUE),
            'update_at' => date('Y-m-d h:m:s'),
	    );

            $this->Survey_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('survey'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Survey_model->get_by_id($id);
        // $group = $this->Group_model->get_by_id($row->group_id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('survey/update_action'),
                'sv_date' => $row->sv_date,
                'sv_result' => $row->sv_result,
                'cust_name' => $row->cust_name,
                'slm_name' => $row->slm_name,
                'itm_name' => $row->itm_name,
                'cl_name' => $row->cl_name,
                'sv_dpsetor' => $row->sv_dpsetor,
                'fc_code' => $row->fc_code,
                'sv_no' => $row->sv_no,
                'sv_plandate' => $row->sv_plandate,
      	    );
            $this->template->load('template','survey/survey_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }
    
    public function update_action() 
    {
      $id = $this->input->post('id');
      $data = array('sv_result' => $this->input->post('sv_result'));

      $this->Survey_model->update($this->input->post('id', TRUE), $data);
      $this->session->set_flashdata('message', 'Update Record Success');
      redirect(site_url('survey'));
        
    }
    
    public function delete($id) 
    {
        $row = $this->Survey_model->get_by_id($id);

        if ($row) {
            $this->Survey_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('survey'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('group_id', 'group id', 'trim');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/survey.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-22 02:24:38 */
/* http://harviacode.com */