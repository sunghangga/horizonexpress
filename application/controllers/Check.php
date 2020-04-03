<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Check extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Check_model','Delivery_model'));
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }

    public function index()
    {
        $check = $this->Check_model->get_all();

        $data = array(
            'check_data' => $check
        );

        $this->template->load('template','check/check_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Check_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode' => $row->kode,
		'examiner' => $row->examiner,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->template->load('template','check/check_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/check'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/check/create_action'),
	    'id' => set_value('id'),
	    'kode' => set_value('kode'),
	    'examiner' => set_value('examiner'),
        'get_all_kode' => $this->Delivery_model->get_all_kode_by_status("received"),
        'get_all_status' => array('RUSAK','TIDAK RUSAK')
	);
        $this->template->load('template','check/check_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode' => $this->input->post('kode',TRUE),
		'examiner' => $this->input->post('examiner',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
	    );

            $this->Check_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('index.php/check'));
        }
    }

    public function pdfPeriksa($id=null){
        $row = $this->Road_money_model->get_by_id($id);
        $row_del = $this->Delivery_model->get_by_id($row->kode);
        $row_price = $this->Road_money_model->get_price($row->kode);
        $dt = new DateTime($row->create_at);
        $date = $dt->format('Y-m-d');
        if ($row) {
            $data = array(
            'kode' => $row->kode,
            'table' => $row->table_money,
            'driver' => $row_del->driver,
            'nopol' => $row_del->nopol,
            'pulse' => $row->pulse,
            'price' => $row_price['price'] + $row->table_money + $row->pulse,
            'kota' => $row_del->name_regency,
            'create_at' => date_indo($date),
            'update_at' => $row->update_at,
            'get_roadmoney_detail_by_id' => $this->Road_money_model->get_roadmoney_detail_by_id($row->kode),
        );
            $this->load->library("mypdf");
            $this->mypdf->generate("laporan/uangJalan","A5","landscape","Bukti Uang Jalan - ".$data['kode'],$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/check'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Check_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/check/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('kode', $row->kode),
		'examiner' => set_value('examiner', $row->examiner),
		'create_at' => set_value('create_at', $row->create_at),
		'update_at' => set_value('update_at', $row->update_at),
	    );
            $this->template->load('template','check/check_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/check'));
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
		'examiner' => $this->input->post('examiner',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
	    );

            $this->Check_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('index.php/check'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Check_model->get_by_id($id);

        if ($row) {
            $this->Check_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('index.php/check'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/check'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('examiner', 'examiner', 'trim|required');
	$this->form_validation->set_rules('create_at', 'create at', 'trim|required');
	$this->form_validation->set_rules('update_at', 'update at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Check.php */
/* Location: ./application/controllers/Check.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-31 04:41:27 */
/* http://harviacode.com */