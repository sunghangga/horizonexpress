<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tire_in extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Tire_in_model','Tire_model'));
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }

    public function index()
    {
        $tire_in = $this->Tire_in_model->get_all();

        $data = array(
            'tire_in_data' => $tire_in
        );

        $this->template->load('template','tirein/tire_in_list', $data);
    }

    public function range(){
        $first = $_GET['first'];
        $last = $_GET['last'];
        $data = $this->Tire_in_model->get_range($first,$last);
        echo json_encode($data);
    }

    public function read($id) 
    {
        $row = $this->Tire_in_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'tire_id' => $row->tire_name,
		'amount' => $row->amount,
        'user_name' => $row->user_name,
		'create_at' => $row->create_at,
	    );
            $this->template->load('template','tirein/tire_in_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/tire_in');
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/tire_in/create_action'),
    	    'id' => set_value('id'),
            'get_all_tire' => $this->Tire_model->get_all(),
    	    // 'tire_id' => set_value('tire_id'),
    	    'amount' => set_value('amount'),
    	    'create_at' => set_value('create_at'),
	);
        $this->template->load('template','tirein/tire_in_form', $data);
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
            'user_id' => $this->session->userdata('user_id'),
            'create_at' => date('Y-m-d h:m:s'),
	    );
            $ids = $this->input->post('tire_id',TRUE);
            $mount = $this->input->post('amount',TRUE);
            $tires = $this->Tire_model->get_by_id($ids);
            $stok = array('stock' => ($tires->stock + $mount));
            $this->Tire_model->update($this->input->post('tire_id', TRUE), $stok);

            $this->Tire_in_model->insert($data);
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url().'index.php/tire_in');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tire_in_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/tire_in/update_action/'.$row->amount),
        		'id' => set_value('id', $row->id),
        		'tire_id' => set_value('tire_id', $row->tire_id),
                'tire_name' => set_value('tire_name', $row->tire_name),
                'get_all_tire' => $this->Tire_model->get_all(),
        		'amount' => set_value('amount', $row->amount),
	    );
            $this->template->load('template','tirein/tire_in_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/tire_in');
        }
    }
    
    public function update_action($tambah) 
    {
        $this->_update_rules();
        $row = $this->Tire_in_model->get_by_id($this->input->post('id', TRUE));

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
    		'tire_id' => $row->tire_id,
    		'amount' => $this->input->post('amount',TRUE),
            'user_id' => $this->session->userdata('user_id'),
	    );
            $ids = $row->tire_id;
            $mount = $this->input->post('amount',TRUE);
            $tires = $this->Tire_model->get_by_id($ids);
            $hasil = $tambah - $mount;
            if ($hasil < 0) {
                $mount = abs($hasil);
                $stok = array('stock' => ($tires->stock + $mount));
            }
            else {
                $mount = abs($hasil);
                $stok = array('stock' => ($tires->stock - $mount));
            }
            $this->Tire_model->update($row->tire_id, $stok);

            $this->Tire_in_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url().'index.php/tire_in');
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tire_in_model->get_by_id($id);
        $tires = $this->Tire_model->get_by_id($row->tire_id);
        
        $stok = array('stock' => ($tires->stock - $row->amount));

        if ($row) {
            $this->Tire_model->update($row->tire_id, $stok);
            $this->Tire_in_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url().'index.php/tire_in');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/tire_in');
        }
    }

    public function _update_rules() 
    {
        $this->form_validation->set_rules('amount', 'amount', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tire_id', 'tire id', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tire_in.php */
/* Location: ./application/controllers/Tire_in.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-21 03:31:24 */
/* http://harviacode.com */