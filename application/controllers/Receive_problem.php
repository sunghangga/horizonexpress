<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Receive_problem extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Receive_problem_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $receive_problem = $this->Receive_problem_model->get_all();

        $data = array(
            'receive_problem_data' => $receive_problem
        );

        $this->template->load('template','receive_problem_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Receive_problem_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode' => $row->kode,
		'item' => $row->item,
		'foto' => $row->foto,
		'gejala' => $row->gejala,
		'penyebab' => $row->penyebab,
		'engine' => $row->engine,
		'frame' => $row->frame,
		'type' => $row->type,
		'solusi' => $row->solusi,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','receive_problem_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('receive_problem'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('receive_problem/create_action'),
	    'id' => set_value('id'),
	    'kode' => set_value('kode'),
	    'item' => set_value('item'),
	    'foto' => set_value('foto'),
	    'gejala' => set_value('gejala'),
	    'penyebab' => set_value('penyebab'),
	    'engine' => set_value('engine'),
	    'frame' => set_value('frame'),
	    'type' => set_value('type'),
	    'solusi' => set_value('solusi'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','receive_problem_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'item' => $this->input->post('item',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'gejala' => $this->input->post('gejala',TRUE),
		'penyebab' => $this->input->post('penyebab',TRUE),
		'engine' => $this->input->post('engine',TRUE),
		'frame' => $this->input->post('frame',TRUE),
		'type' => $this->input->post('type',TRUE),
		'solusi' => $this->input->post('solusi',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Receive_problem_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('receive_problem'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Receive_problem_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('receive_problem/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('kode', $row->kode),
		'item' => set_value('item', $row->item),
		'foto' => set_value('foto', $row->foto),
		'gejala' => set_value('gejala', $row->gejala),
		'penyebab' => set_value('penyebab', $row->penyebab),
		'engine' => set_value('engine', $row->engine),
		'frame' => set_value('frame', $row->frame),
		'type' => set_value('type', $row->type),
		'solusi' => set_value('solusi', $row->solusi),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','receive_problem_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('receive_problem'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'item' => $this->input->post('item',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'gejala' => $this->input->post('gejala',TRUE),
		'penyebab' => $this->input->post('penyebab',TRUE),
		'engine' => $this->input->post('engine',TRUE),
		'frame' => $this->input->post('frame',TRUE),
		'type' => $this->input->post('type',TRUE),
		'solusi' => $this->input->post('solusi',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Receive_problem_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('receive_problem'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Receive_problem_model->get_by_id($id);

        if ($row) {
            $this->Receive_problem_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('receive_problem'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('receive_problem'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('item', 'item', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('gejala', 'gejala', 'trim|required');
	$this->form_validation->set_rules('penyebab', 'penyebab', 'trim|required');
	$this->form_validation->set_rules('engine', 'engine', 'trim|required');
	$this->form_validation->set_rules('frame', 'frame', 'trim|required');
	$this->form_validation->set_rules('type', 'type', 'trim|required');
	$this->form_validation->set_rules('solusi', 'solusi', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Receive_problem.php */
/* Location: ./application/controllers/Receive_problem.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-30 02:52:35 */
/* http://harviacode.com */