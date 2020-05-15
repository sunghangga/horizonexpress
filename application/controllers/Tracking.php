<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tracking extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Delivery_model','Customer_model','User_model','Warehouse_model','Company_model'));
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }
    
    public function index()
    {
        $this->template->load('template','tracking/tracking_list');
    }

    public function range(){
        $first = $_GET['first'];
        $last = $_GET['last'];
        $data = $this->Delivery_model->get_range_track($first,$last);
        echo json_encode($data);
    }

    public function search(){
        $this->template->load('template','tracking/cek_alamat');
    }

    public function read($id) 
    {
        $row = $this->Delivery_model->get_by_id($id);
        $wr_pengirim = $this->Warehouse_model->get_by_id($row->wr_pengirim_id);
        $wr_penerima = $this->Warehouse_model->get_by_id($row->wr_penerima_id);

        if ($row) {
            $data = array(
            'button' => 'Update',
            'action' => site_url('index.php/tracking/update_action'),
            'kode' => set_value('kode', $row->kode),
            'driver' => set_value('driver', $row->driver),
            'nopol' => set_value('driver', $row->nopol),
            'name_pengirim' => set_value('name_pengirim', $row->name_pengirim),
            'address_pengirim' => set_value('address_pengirim', $row->address_pengirim),
            'telephone_pengirim' => set_value('telephone_pengirim', $row->telephone_pengirim),
            'wr_pengirim_id' => set_value('wr_pengirim_id', $wr_pengirim->id),
            'wr_pengirim_name' => set_value('wr_pengirim_name', $wr_pengirim->name),
            'name_penerima' => set_value('name_penerima', $row->name_penerima),
            'address_penerima' => set_value('address_penerima', $row->address_penerima),
            'telephone_penerima' => set_value('telephone_penerima', $row->telephone_penerima),
            'wr_penerima_id' => set_value('wr_penerima_id', $wr_penerima->id),
            'wr_penerima_name' => set_value('wr_penerima_name', $wr_penerima->name),
            // 'weight' => set_value('weight', $row->weight),
            // 'amount' => set_value('amount', $row->amount),
            // 'price' => set_value('price', $row->price),
            'regencies_id' => set_value('regencies_id', $row->name_regency),
            'districts_id' => set_value('districts_id', $row->name_district),
            'villages_id' => set_value('villages_id', $row->name_village),
            'get_delivery_detail_by_id' => $this->Delivery_model->get_delivery_detail_by_id($id),
            'get_wr' => $this->Warehouse_model->get_by_id($id),
            // 'create_at' => set_value('create_at', $row->create_at),
            // 'update_at' => set_value('update_at', $row->update_at),
        );
            $this->template->load('template','tracking/tracking_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/tracking'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Delivery_model->get_by_id($id);
        $wr_pengirim = $this->Warehouse_model->get_by_id($row->wr_pengirim_id);
        $wr_penerima = $this->Warehouse_model->get_by_id($row->wr_penerima_id);

        if ($row) {
            $data = array(
            'button' => 'Update',
            'action' => site_url('index.php/tracking/update_action'),
            'kode' => set_value('kode', $row->kode),
            'driver' => set_value('driver', $row->driver),
            'nopol' => set_value('nopol', $row->nopol),
            'name_pengirim' => set_value('name_pengirim', $row->name_pengirim),
            'address_pengirim' => set_value('address_pengirim', $row->address_pengirim),
            'telephone_pengirim' => set_value('telephone_pengirim', $row->telephone_pengirim),
            'wr_pengirim_id' => set_value('wr_pengirim_id', $wr_pengirim->id),
            'wr_pengirim_name' => set_value('wr_pengirim_name', $wr_pengirim->name),
            'name_penerima' => set_value('name_penerima', $row->name_penerima),
            'address_penerima' => set_value('address_penerima', $row->address_penerima),
            'telephone_penerima' => set_value('telephone_penerima', $row->telephone_penerima),
            'wr_penerima_id' => set_value('wr_penerima_id', $wr_penerima->id),
            'wr_penerima_name' => set_value('wr_penerima_name', $wr_penerima->name),
            // 'weight' => set_value('weight', $row->weight),
            // 'amount' => set_value('amount', $row->amount),
            // 'price' => set_value('price', $row->price),
            'regencies_id' => set_value('regencies_id', $row->name_regency),
            'districts_id' => set_value('districts_id', $row->name_district),
            'villages_id' => set_value('villages_id', $row->name_village),
            'get_delivery_detail_by_id' => $this->Delivery_model->get_delivery_detail_by_id($id),
            'get_wr' => $this->Warehouse_model->get_by_id($id),
            // 'create_at' => set_value('create_at', $row->create_at),
            // 'update_at' => set_value('update_at', $row->update_at),
        );
            $this->template->load('template','tracking/tracking_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/tracking'));
        }
    }
    
    public function update_action() 
    {
        $data = array(
            'driver' => $this->input->post('driver',TRUE),
            'nopol' => $this->input->post('nopol',TRUE),
            'status' => 'driver',
        );

        $this->Delivery_model->update($this->input->post('kode', TRUE), $data);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('index.php/tracking'));
    }
    
    public function delete($id) 
    {
        $row = $this->Delivery_model->get_by_id($id);

        if ($row) {
            $this->Delivery_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('index.php/tracking'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/tracking'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('name_pengirim', 'name pengirim', 'trim|required');
    $this->form_validation->set_rules('address_pengirim', 'address pengirim', 'trim|required');
    $this->form_validation->set_rules('telephone_pengirim', 'telephone pengirim', 'trim|required');
    $this->form_validation->set_rules('name_penerima', 'name penerima', 'trim|required');
    $this->form_validation->set_rules('address_penerima', 'address penerima', 'trim|required');
    $this->form_validation->set_rules('telephone_penerima', 'telephone penerima', 'trim|required');
    $this->form_validation->set_rules('regencies_id', 'regencies name', 'trim|required');
    $this->form_validation->set_rules('districts_id', 'districts name', 'trim|required');
    //$this->form_validation->set_rules('price', 'price', 'trim|required');
    // $this->form_validation->set_rules('villages_id', 'villages id', 'trim|required');

    $this->form_validation->set_rules('kode', 'kode', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Delivery.php */
/* Location: ./application/controllers/Delivery.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-14 06:05:00 */
/* http://harviacode.com */