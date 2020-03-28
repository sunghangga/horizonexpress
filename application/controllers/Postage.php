<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Postage extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Postage_model');
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('login', 'refresh');}
    }

    public function index()
    {
        $postage = $this->Postage_model->get_all();

        $data = array(
            'postage_data' => $postage
        );

        $this->template->load('template','postage_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Postage_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'first_district_id' => $row->first_district_id,
		'last_district_id' => $row->last_district_id,
		'emount' => $row->emount,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->template->load('template','postage_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/postage');
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/postage/create_action'),
	    'id' => set_value('id'),
	    'first_district_id' => set_value('first_district_id'),
	    'last_district_id' => set_value('last_district_id'),
	    'emount' => set_value('emount'),
	    'create_at' => set_value('create_at'),
	    'update_at' => set_value('update_at'),
	);
        $this->template->load('template','postage_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'first_district_id' => $this->input->post('first_district_id',TRUE),
		'last_district_id' => $this->input->post('last_district_id',TRUE),
		'emount' => $this->input->post('emount',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
	    );

            $this->Postage_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url().'index.php/postage');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Postage_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/postage/update_action'),
		'id' => set_value('id', $row->id),
		'first_district_id' => set_value('first_district_id', $row->first_district_id),
		'last_district_id' => set_value('last_district_id', $row->last_district_id),
		'emount' => set_value('emount', $row->emount),
		'create_at' => set_value('create_at', $row->create_at),
		'update_at' => set_value('update_at', $row->update_at),
	    );
            $this->template->load('template','postage_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/postage');
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'first_district_id' => $this->input->post('first_district_id',TRUE),
		'last_district_id' => $this->input->post('last_district_id',TRUE),
		'emount' => $this->input->post('emount',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
	    );

            $this->Postage_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url().'index.php/postage');
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Postage_model->get_by_id($id);

        if ($row) {
            $this->Postage_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url().'index.php/postage');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/postage');
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('first_district_id', 'first district id', 'trim|required');
	$this->form_validation->set_rules('last_district_id', 'last district id', 'trim|required');
	$this->form_validation->set_rules('emount', 'emount', 'trim|required');
	$this->form_validation->set_rules('create_at', 'create at', 'trim|required');
	$this->form_validation->set_rules('update_at', 'update at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Postage.php */
/* Location: ./application/controllers/Postage.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-19 04:30:52 */
/* http://harviacode.com */