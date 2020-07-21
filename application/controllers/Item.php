<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Item extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Item_model','Unit_model'));
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }

    public function index()
    {
        $item = $this->Item_model->get_all();

        $data = array(
            'item_data' => $item
        );

        $this->template->load('template','item/item_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Item_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'category' => $row->category,
		'unit_id' => $row->unit_id,
        'unit' => $row->unit,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->template->load('template','item/item_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/item');
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/item/create_action'),
            'get_all_unit' => $this->Unit_model->get_all(),
            'unit_id' => set_value('unit_id'),
      	    'id' => set_value('id'),
      	    'name' => set_value('name'),
      	    'category' => set_value('category'),
      	    'unit_id' => set_value('unit_id')
      	);
        $this->template->load('template','item/item_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

          $description=$this->input->post('name',TRUE);
          $category= $this->input->post('category',TRUE);

          if($category=="motor"){

            $code_unit = $description;
            $code_unit_detail=explode(' ', $code_unit);
            $varian=explode(")", $code_unit_detail[0]);
            $code_warna=explode('-', $code_unit_detail[1]);
            preg_match_all('/\(([^\)]*)\)/', $code_unit_detail[0], $type);
            //echo "Jenis Kendaraan: ".$type[1][0]."</br>";
            //echo "Varian: ".$varian[1]."</br>";
            //echo "Transimi: ".$code_warna[0]."</br>";
            //echo "Warna: ".$code_warna[1]."</br>";
            $type_unit=$type[1][0];
            $color_unit=$code_warna[1];
            $varian_unit=$varian[1];
            $transmisi_unit=$code_warna[0];

            $data = array(
              'name' => $this->input->post('name',TRUE),
              'category' => $this->input->post('category',TRUE),
              'unit_id' => $this->input->post('unit_id',TRUE),
              'type_unit' => $type_unit,
              'color_unit' => $color_unit,
              'varian_unit' => $varian_unit,
              'transmisi_unit' =>$transmisi_unit,
              'create_at' => date('Y-m-d h:m:s'),
            );

          }
          else{
            $data = array(
              'name' => $this->input->post('name',TRUE),
              'category' => $this->input->post('category',TRUE),
              'unit_id' => $this->input->post('unit_id',TRUE),
              'create_at' => date('Y-m-d h:m:s'),
            );
          }
          

            $this->Item_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');            
            redirect(base_url().'index.php/item');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Item_model->get_by_id($id);
        // echo json_encode($row);

        if ($row) {
            $data = array(
              'button' => 'Update',
              'action' => site_url('index.php/item/update_action'),
          		'id' => set_value('id', $row->id),
                'get_all_unit' => $this->Unit_model->get_all(),
          		'name' => set_value('name', $row->name),
          		'category' => set_value('category', $row->category),
          		'unit_id' => set_value('unit_id', $row->unit_id),
                'unit' => set_value('unit', $row->unit),

          	    );
            $this->template->load('template','item/item_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/item');
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
        		'category' => $this->input->post('category',TRUE),
        		'unit_id' => $this->input->post('unit_id',TRUE),
            'update_at' => date('Y-m-d h:m:s')
        	    );

            $this->Item_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url().'index.php/item');
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Item_model->get_by_id($id);

        if ($row) {
            $this->Item_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url().'index.php/item');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url().'index.php/item');
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('category', 'category', 'trim|required');
	$this->form_validation->set_rules('unit_id', 'satuan id', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Item.php */
/* Location: ./application/controllers/Item.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-19 01:31:22 */
/* http://harviacode.com */