<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Truck extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Truck_model');
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }

    public function index()
    {
        $truck = $this->Truck_model->get_all();

        $data = array(
            'truck_data' => $truck
        );

        $this->template->load('template','truck/truck_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Truck_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'nopol' => $row->nopol,
		'nosin' => $row->nosin,
		'norangka' => $row->norangka,
		'production_year' => $row->production_year,
		'jto_samsat' => $row->jto_samsat,
		'kir' => $row->kir,
		'km' => $row->km,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->template->load('template','truck/truck_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/truck');
        }
    }

    public function get_all_nopol($id=null){
        if (isset($_GET['term'])) {
            $result = $this->Truck_model->search_nopol($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
              $arr_result[] = array(
              'label' => $row->nopol,
              'km_before' => $row->km,
            );
              echo json_encode($arr_result);
          }
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/truck/create_action'),
    	    'id' => set_value('id'),
    	    'name' => set_value('name'),
    	    'nopol' => set_value('nopol'),
    	    'nosin' => set_value('nosin'),
    	    'norangka' => set_value('norangka'),
    	    'production_year' => set_value('production_year'),
    	    'jto_samsat' => set_value('jto_samsat'),
    	    'kir' => set_value('kir'),
    	    'km' => set_value('km')
	);
        $this->template->load('template','truck/truck_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'nopol' => $this->input->post('nopol',TRUE),
		'nosin' => $this->input->post('nosin',TRUE),
		'norangka' => $this->input->post('norangka',TRUE),
		'production_year' => $this->input->post('production_year',TRUE),
		'jto_samsat' => $this->input->post('jto_samsat',TRUE),
		'kir' => $this->input->post('kir',TRUE),
		'km' => $this->input->post('km',TRUE),
        'create_at' => date('Y-m-d h:m:s')
	    );

            $this->Truck_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(base_url().'index.php/truck');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Truck_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/truck/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'nopol' => set_value('nopol', $row->nopol),
		'nosin' => set_value('nosin', $row->nosin),
		'norangka' => set_value('norangka', $row->norangka),
		'production_year' => set_value('production_year', $row->production_year),
		'jto_samsat' => set_value('jto_samsat', $row->jto_samsat),
		'kir' => set_value('kir', $row->kir),
		'km' => set_value('km', $row->km)
	    );
            $this->template->load('template','truck/truck_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/truck');
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
		'nopol' => $this->input->post('nopol',TRUE),
		'nosin' => $this->input->post('nosin',TRUE),
		'norangka' => $this->input->post('norangka',TRUE),
		'production_year' => $this->input->post('production_year',TRUE),
		'jto_samsat' => $this->input->post('jto_samsat',TRUE),
		'kir' => $this->input->post('kir',TRUE),
		'km' => $this->input->post('km',TRUE)
	    );

            $this->Truck_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url().'index.php/truck');
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Truck_model->get_by_id($id);

        if ($row) {
            $this->Truck_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url().'index.php/truck');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/truck');
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('nopol', 'nopol', 'trim|required');
	$this->form_validation->set_rules('nosin', 'nosin', 'trim|required');
	$this->form_validation->set_rules('norangka', 'norangka', 'trim|required');
	$this->form_validation->set_rules('production_year', 'production year', 'trim|required');
	$this->form_validation->set_rules('jto_samsat', 'jto samsat', 'trim|required');
	$this->form_validation->set_rules('kir', 'kir', 'trim|required');
	$this->form_validation->set_rules('km', 'km', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Truck.php */
/* Location: ./application/controllers/Truck.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-21 03:31:10 */
/* http://harviacode.com */