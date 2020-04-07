<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tire_out extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Tire_out_model','Tire_model','Driver_model'));
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }

    public function index()
    {
        $tire_out = $this->Tire_out_model->get_all();
        $data = array(
            'tire_out_data' => $tire_out
        );

        $this->template->load('template','tireout/tire_out_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tire_out_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tire_id' => $row->tire_id,
		'amount' => $row->amount,
		'driver_id' => $row->driver_id,
		'nopol' => $row->nopol,
		'km_before' => $row->km_before,
		'km_after' => $row->km_after,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->template->load('template','tireout/tire_out_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/tire_out');
        }
    }

    public function pdfBarangKeluar($id=null){
        $row = $this->Tire_out_model->get_by_id($id);
        $dt = new DateTime($row->create_at);
        $date = $dt->format('Y-m-d');
        echo json_encode($row);
        if ($row) {
            $data = array(
            'driver' => $row->driver_name,
            'nopol' => $row->nopol,
            'km_after' => $row->km_after,
            'km_before' => $row->km_before,
            'tire_name' => $row->tire_name,
            'keterangan' => $row->keterangan,
            'create_at' => date_indo($date),
            'amount' => $row->amount,
        );
        $this->load->library("mypdf");
        $this->mypdf->generate("laporan/barangKeluar","A5","landscape","Laporan Pengeluaran Barang - ".$data['nopol'],$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/tire_out'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/tire_out/create_action'),
    	    'id' => set_value('id'),
    	    'tire_id' => set_value('tire_id'),
    	    'amount' => set_value('amount'),
            'get_all_tire' => $this->Tire_model->get_all(),
            'get_all_driver' => $this->Driver_model->get_all(),
            'driver_name' => set_value('driver_name'),
    	    'driver_id' => set_value('driver_id'),
            'keterangan' => set_value('keterangan'),
    	    'nopol' => set_value('nopol'),
    	    'km_before' => set_value('km_before'),
    	    'km_after' => set_value('km_after'),
	);
        $this->template->load('template','tireout/tire_out_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
    		'tire_id' => $this->input->post('tire_id',TRUE),
    		'amount' => $this->input->post('amount',TRUE),
    		'driver_id' => $this->input->post('driver_id',TRUE),
    		'nopol' => $this->input->post('nopol',TRUE),
    		'km_before' => $this->input->post('km_before',TRUE),
    		'km_after' => $this->input->post('km_after',TRUE),
    		'user_id' => $this->session->userdata('user_id'),
            'keterangan' => $this->input->post('keterangan',TRUE),
            'create_at' => date('Y-m-d h:m:s'),
	    );
            $ids = $this->input->post('tire_id',TRUE);
            $mount = $this->input->post('amount',TRUE);
            $tires = $this->Tire_model->get_by_id($ids);
            $stok = array('stock' => ($tires->stock - $mount));
            $this->Tire_model->update($this->input->post('tire_id', TRUE), $stok);

            $this->Tire_out_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url().'index.php/tire_out');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tire_out_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/tire_out/update_action/'.$row->amount),
        		'id' => set_value('id', $row->id),
        		'tire_id' => set_value('tire_id', $row->tire_id),
        		'amount' => set_value('amount', $row->amount),
        		'driver_id' => set_value('driver_id', $row->driver_id),
        		'nopol' => set_value('nopol', $row->nopol),
                'tire_name' => set_value('tire_name', $row->tire_name),
                'get_all_tire' => $this->Tire_model->get_all(),
                'get_all_driver' => $this->Driver_model->get_all(),
                'driver_name' => set_value('driver_name', $row->driver_name),
        		'km_before' => set_value('km_before', $row->km_before),
        		'km_after' => set_value('km_after', $row->km_after),
                'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','tireout/tire_out_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/tire_out');
        }
    }
    
    public function update_action($tambah) 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
    		'tire_id' => $this->input->post('tire_id',TRUE),
    		'amount' => $this->input->post('amount',TRUE),
    		'driver_id' => $this->input->post('driver_id',TRUE),
    		'nopol' => $this->input->post('nopol',TRUE),
    		'km_before' => $this->input->post('km_before',TRUE),
    		'km_after' => $this->input->post('km_after',TRUE),
            'keterangan' => $this->input->post('keterangan',TRUE),
	    );
            $ids = $this->input->post('tire_id',TRUE);
            $mount = $this->input->post('amount',TRUE);
            $tires = $this->Tire_model->get_by_id($ids);
            $hasil = $tambah - $mount;
            if ($hasil < 0) {
                $mount = abs($hasil);
                $stok = array('stock' => ($tires->stock - $mount));
            }
            else {
                $mount = abs($hasil);
                $stok = array('stock' => ($tires->stock + $mount));
            }
            $this->Tire_model->update($this->input->post('tire_id', TRUE), $stok);

            $this->Tire_out_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            rredirect(base_url().'index.php/tire_out');
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tire_out_model->get_by_id($id);

        if ($row) {
            $this->Tire_out_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url().'index.php/tire_out');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/tire_out');
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tire_id', 'tire id', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required');
	// $this->form_validation->set_rules('driver_id', 'driver id', 'trim|required');
	$this->form_validation->set_rules('nopol', 'nopol', 'trim|required');
	$this->form_validation->set_rules('km_before', 'km before', 'trim|required');
	$this->form_validation->set_rules('km_after', 'km after', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tire_out.php */
/* Location: ./application/controllers/Tire_out.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-21 03:31:29 */
/* http://harviacode.com */