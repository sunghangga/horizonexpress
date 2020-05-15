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
    }

    public function api($id)
    {
      //$data = 'JMB26.200102.0003733';
        $data = $this->Survey_model->get_survey($id);
        if($data!= null){
            $survey = array(
            'sv_id'=>$data->sv_id,
            'sv_no'=>$data->sv_no,
            'sv_date'=>$data->sv_date,
            'sv_dpsetor'=>''.round($data->sv_dpsetor).'',
            'ic_color'=>$data->ic_color,
            'cust_name'=>$data->cust_name,
            'itm_name'=>$data->itm_name,
            'slm_name'=>$data->slm_name,
            'fc_code'=>$data->fc_code,
          );
          }else{
            $survey = array(
              'sv_id'=>null,
              'sv_no'=>null,
              'sv_date'=>null,
              'sv_dpsetor'=>null,
              'ic_color'=>null,
              'cust_name'=>null,
              'itm_name'=>null,
              'slm_name'=>null,
          );
          }
        
        echo json_encode($survey);
    }

    public function index()
    {
        $survey = $this->Survey_model->get_all();
        $data = array(
            'survey_data' => $survey,
            'data'=>$survey
        );

        $this->template->load('template','survey/survey_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Survey_model->get_by_id($id);
        if ($row) {
            $data = array(
		'buka_do' => $row->buka_do,
		'date' => $row->date,
		'hasil_survey' => $row->hasil_survey,
		'id' => $row->id,
		'indent_date' => $row->indent_date,
		'input_soda' => $row->input_soda,
		'note' => $row->note,
		'rencana_do' => $row->rencana_do,
		'status' => $row->status,
		'sv_no' => $row->sv_no,
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
	    'buka_do' => set_value('buka_do'),
	    'date' => set_value('date'),
	    'hasil_survey' => set_value('hasil_survey'),
	    'id' => set_value('id'),
	    'indent_date' => set_value('indent_date'),
	    'input_soda' => set_value('input_soda'),
	    'note' => set_value('note'),
	    'rencana_do' => set_value('rencana_do'),
	    'status' => set_value('status'),
	    'sv_no' => set_value('sv_no'),
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
		'buka_do' => $this->input->post('buka_do',TRUE),
		'date' => $this->input->post('date',TRUE),
		'hasil_survey' => $this->input->post('hasil_survey',TRUE),
		'indent_date' => $this->input->post('indent_date',TRUE),
		'input_soda' => $this->input->post('input_soda',TRUE),
		'note' => $this->input->post('note',TRUE),
		'rencana_do' => $this->input->post('rencana_do',TRUE),
		'status' => $this->input->post('status',TRUE),
		'sv_no' => $this->input->post('sv_no',TRUE),
	    );

            $this->Survey_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('survey'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Survey_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('survey/update_action'),
		'buka_do' => set_value('buka_do', $row->buka_do),
		'date' => set_value('date', $row->date),
		'hasil_survey' => set_value('hasil_survey', $row->hasil_survey),
		'id' => set_value('id', $row->id),
		'indent_date' => set_value('indent_date', $row->indent_date),
		'input_soda' => set_value('input_soda', $row->input_soda),
		'note' => set_value('note', $row->note),
		'rencana_do' => set_value('rencana_do', $row->rencana_do),
		'status' => set_value('status', $row->status),
		'sv_no' => set_value('sv_no', $row->sv_no),
	    );
            $this->template->load('template','survey/survey_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('survey'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'buka_do' => $this->input->post('buka_do',TRUE),
		'date' => $this->input->post('date',TRUE),
		'hasil_survey' => $this->input->post('hasil_survey',TRUE),
		'indent_date' => $this->input->post('indent_date',TRUE),
		'input_soda' => $this->input->post('input_soda',TRUE),
		'note' => $this->input->post('note',TRUE),
		'rencana_do' => $this->input->post('rencana_do',TRUE),
		'status' => $this->input->post('status',TRUE),
		'sv_no' => $this->input->post('sv_no',TRUE),
	    );

            $this->Survey_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('survey'));
        }
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
	$this->form_validation->set_rules('buka_do', 'buka do', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('hasil_survey', 'hasil survey', 'trim|required');
	$this->form_validation->set_rules('indent_date', 'indent date', 'trim|required');
	$this->form_validation->set_rules('input_soda', 'input soda', 'trim|required');
	$this->form_validation->set_rules('note', 'note', 'trim|required');
	$this->form_validation->set_rules('rencana_do', 'rencana do', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('sv_no', 'sv no', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Survey.php */
/* Location: ./application/controllers/Survey.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-24 08:47:35 */
/* http://harviacode.com */