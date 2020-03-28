<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Driver extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Driver_model');
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('login', 'refresh');}
    }

    public function index()
    {
        $driver = $this->Driver_model->get_all();

        $data = array(
            'driver_data' => $driver
        );

        $this->template->load('template','driver/driver_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Driver_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'address' => $row->address,
		'telephone' => $row->telephone,
		'name_wife' => $row->name_wife,
		'telephone_wife' => $row->telephone_wife,
		'sim_expire' => $row->sim_expire,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->template->load('template','driver/driver_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/driver');
        }
    }

    public function get_all_driver($id=null){
        if (isset($_GET['term'])) {
            $result = $this->Driver_model->search_driver($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
              $arr_result[] = array(
              'label' => $row->name,
            );
              echo json_encode($arr_result);
          }
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/driver/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'address' => set_value('address'),
	    'telephone' => set_value('telephone'),
	    'name_wife' => set_value('name_wife'),
	    'telephone_wife' => set_value('telephone_wife'),
	    'sim_expire' => set_value('sim_expire'),
	    'create_at' => set_value('create_at'),
	    'update_at' => set_value('update_at'),
	);
        $this->template->load('template','driver/driver_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'address' => $this->input->post('address',TRUE),
		'telephone' => $this->input->post('telephone',TRUE),
		'name_wife' => $this->input->post('name_wife',TRUE),
		'telephone_wife' => $this->input->post('telephone_wife',TRUE),
		'sim_expire' => $this->input->post('sim_expire',TRUE),
		'create_at' => date('Y-m-d h:m:s')
	    );

            $this->Driver_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url().'index.php/driver');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Driver_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/driver/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'address' => set_value('address', $row->address),
		'telephone' => set_value('telephone', $row->telephone),
		'name_wife' => set_value('name_wife', $row->name_wife),
		'telephone_wife' => set_value('telephone_wife', $row->telephone_wife),
		'sim_expire' => set_value('sim_expire', $row->sim_expire),
		'create_at' => set_value('create_at', $row->create_at),
		'update_at' => set_value('update_at', $row->update_at),
	    );
            $this->template->load('template','driver/driver_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/driver');
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'address' => $this->input->post('address',TRUE),
		'telephone' => $this->input->post('telephone',TRUE),
		'name_wife' => $this->input->post('name_wife',TRUE),
		'telephone_wife' => $this->input->post('telephone_wife',TRUE),
		'sim_expire' => $this->input->post('sim_expire',TRUE)
	    );

            $this->Driver_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url().'index.php/driver');
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Driver_model->get_by_id($id);

        if ($row) {
            $this->Driver_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url().'index.php/driver');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/driver');
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('telephone', 'telephone', 'trim|required');
	$this->form_validation->set_rules('name_wife', 'name wife', 'trim|required');
	$this->form_validation->set_rules('telephone_wife', 'telephone wife', 'trim|required');
	$this->form_validation->set_rules('sim_expire', 'sim expire', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Driver.php */
/* Location: ./application/controllers/Driver.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-21 03:30:58 */
/* http://harviacode.com */