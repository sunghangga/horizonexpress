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
            'survey'=>$data->sv_no,
            'date'=>$data->sv_date,
            'dp'=>''.round($data->sv_dpsetor).'',
            'color'=>$data->cl_name,
            'customer'=>$data->cust_name,
            'item'=>$data->itm_name,
            'sales'=>$data->slm_name,
            'fincoy'=>$data->fc_code,
            'itm_code'=>$data->itm_code,
          );
          }else{
            $survey = array(
              'survey'=>null,
              'date'=>null,
              'dp'=>null,
              'color'=>null,
              'customer'=>null,
              'item'=>null,
              'sales'=>null,
              'fincoy'=>null,
              'itm_code'=>null,
          );
          }
        
        echo json_encode($survey);
    }

    function get_autocomplete(){
      if (isset($_GET['term'])) {
          $result = $this->Survey_model->search_survey($_GET['term']);
          if (count($result) > 0) {
          foreach ($result as $row)
            $arr_result[] = array(
            'label'=>$row->sv_no,
          );
            echo json_encode($arr_result);
          }
      }
    }

    public function index()
    {
        $survey = $this->Survey_model->get_all();

        $data = array(
            'survey_data' => $survey
        );

        $this->template->load('template','survey/survey_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Survey_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'buka_do' => $row->buka_do,
        		'customer' => $row->customer,
        		'date' => $row->date,
        		'dp' => $row->dp,
        		'fincoy' => $row->fincoy,
        		'id' => $row->id,
        		'indent_date' => $row->indent_date,
        		'input_soda' => $row->input_soda,
        		'motor' => $row->motor,
        		'note' => $row->note,
        		'rencana_do' => $row->rencana_do,
        		'sales' => $row->sales,
        		'status' => $row->status,
        		'sv_no' => $row->sv_no,
        		'tgl_survey' => $row->tgl_survey,
        		'warna' => $row->warna,
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
      	    'customer' => set_value('customer'),
      	    'date' => set_value('date'),
      	    'dp' => set_value('dp'),
      	    'fincoy' => set_value('fincoy'),
      	    'id' => set_value('id'),
      	    'indent_date' => set_value('indent_date'),
      	    'input_soda' => set_value('input_soda'),
      	    'motor' => set_value('motor'),
      	    'note' => set_value('note'),
      	    'rencana_do' => set_value('rencana_do'),
      	    'sales' => set_value('sales'),
      	    'status' => set_value('status'),
      	    'sv_no' => set_value('sv_no'),
      	    'tgl_survey' => set_value('tgl_survey'),
      	    'warna' => set_value('warna'),
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
          		'customer' => $this->input->post('customer',TRUE),
          		'date' => date('Y-m-d'),
          		'dp' => $this->input->post('dp',TRUE),
          		'fincoy' => $this->input->post('fincoy',TRUE),
          		'indent_date' => $this->input->post('indent_date',TRUE),
          		'input_soda' => $this->input->post('input_soda',TRUE),
          		'motor' => $this->input->post('motor',TRUE),
          		'note' => $this->input->post('note',TRUE),
          		'rencana_do' => $this->input->post('rencana_do',TRUE),
          		'sales' => $this->input->post('sales',TRUE),
          		'status' => $this->input->post('status',TRUE),
          		'sv_no' => $this->input->post('sv_no',TRUE),
          		'tgl_survey' => $this->input->post('tgl_survey',TRUE),
          		'warna' => $this->input->post('warna',TRUE),
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
            		'customer' => set_value('customer', $row->customer),
            		'date' => set_value('date', $row->date),
            		'dp' => set_value('dp', $row->dp),
            		'fincoy' => set_value('fincoy', $row->fincoy),
            		'id' => set_value('id', $row->id),
            		'indent_date' => set_value('indent_date', $row->indent_date),
            		'input_soda' => set_value('input_soda', $row->input_soda),
            		'motor' => set_value('motor', $row->motor),
            		'note' => set_value('note', $row->note),
            		'rencana_do' => set_value('rencana_do', $row->rencana_do),
            		'sales' => set_value('sales', $row->sales),
            		'status' => set_value('status', $row->status),
            		'sv_no' => set_value('sv_no', $row->sv_no),
            		'tgl_survey' => set_value('tgl_survey', $row->tgl_survey),
            		'warna' => set_value('warna', $row->warna),
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
        		'customer' => $this->input->post('customer',TRUE),
        		'date' => $this->input->post('date',TRUE),
        		'dp' => $this->input->post('dp',TRUE),
        		'fincoy' => $this->input->post('fincoy',TRUE),
        		'indent_date' => $this->input->post('indent_date',TRUE),
        		'input_soda' => $this->input->post('input_soda',TRUE),
        		'motor' => $this->input->post('motor',TRUE),
        		'note' => $this->input->post('note',TRUE),
        		'rencana_do' => $this->input->post('rencana_do',TRUE),
        		'sales' => $this->input->post('sales',TRUE),
        		'status' => $this->input->post('status',TRUE),
        		'sv_no' => $this->input->post('sv_no',TRUE),
        		'tgl_survey' => $this->input->post('tgl_survey',TRUE),
        		'warna' => $this->input->post('warna',TRUE),
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
    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Survey.php */
/* Location: ./application/controllers/Survey.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-02-24 23:36:34 */
/* http://harviacode.com */