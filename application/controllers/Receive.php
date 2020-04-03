<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Receive extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Receive_model','Delivery_model'));
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }

    public function index()
    {
        $receive = $this->Receive_model->get_all();

        $data = array(
            'receive_data' => $receive
        );

        $this->template->load('template','receive/receive_list', $data);
    }

    public function pdfReceive($id=null){
        // $row = $this->Receive_model->get_by_id($id);
        // $row_del = $this->Delivery_model->get_by_id($row->kode);
        // $dt = new DateTime($row->create_at);
        // $date = $dt->format('Y-m-d');
        // if ($row) {
        //     $data = array(
        //     'kode' => $row->kode,
        //     'table' => $row->table_money,
        //     'driver' => $row_del->driver,
        //     'nopol' => $row_del->nopol,
        //     'pulse' => $row->pulse,
        //     'price' => $row_price['price'] + $row->table_money + $row->pulse,
        //     'kota' => $row_del->name_regency,
        //     'create_at' => date_indo($date),
        //     'update_at' => $row->update_at,
        //     'get_roadmoney_detail_by_id' => $this->Road_money_model->get_roadmoney_detail_by_id($row->kode),
        // );
            $this->load->library("mypdf");
            $this->mypdf->generate("laporan/kondisiKSU","A4","portrait","Laporan Kondisi KSU - "/*.$data['kode'],$data*/);
        // } else {
        //     $this->session->set_flashdata('message', 'Record Not Found');
        //     redirect(site_url('index.php/receive'));
        // }
    }

    public function read($id) 
    {
        $row = $this->Receive_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode' => $row->kode,
		'receiver' => $row->receiver,
		'pdi' => $row->pdi,
		'pic' => $row->pic,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    );
            $this->template->load('template','receive/receive_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/receive'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/receive/create_action'),
    	    'id' => set_value('id'),
    	    'kode' => set_value('kode'),
    	    'receiver' => set_value('receiver'),
    	    'pdi' => set_value('pdi'),
    	    'pic' => set_value('pic'),
            'get_all_kode' => $this->Delivery_model->get_all_kode_by_status("driver"),
	);
        $this->template->load('template','receive/receive_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
          		'kode' => $this->input->post('kode',TRUE),
          		'receiver' => $this->input->post('receiver',TRUE),
          		'pdi' => $this->input->post('pdi',TRUE),
          		'pic' => $this->input->post('pic',TRUE),
          		'create_at' => date('Y-m-d h:m:s'),
          	    );

            $this->Receive_model->insert($data);

            $kode = $this->input->post('kode');
            $id = $this->input->post('id'); // Ambil data nis dan masukkan ke variabel item
            $qty = $this->input->post('qty'); // Ambil data nama dan masukkan ke variabel qyt
            $keterangan = $this->input->post('keterangan');
            $itemdata = array();
            
            $index = 0; // Set index array awal dengan 0
            foreach($keterangan as $keterangans){ // Kita buat perulangan berdasarkan nis sampai data terakhir
              array_push($itemdata, array(
                'delivery_detail_id'=>$kode,
                'qty_received'=>$qty[$index],  
                'keterangan'=>$keterangan[$index]
              ));
              
              $index++;
            }
            
            $this->Receive_model->insert_batch($itemdata); 

            $data = array('status' => 'received');
            $this->Delivery_model->update($kode, $data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('index.php/receive'));
        }
    }

    public function range(){
        $first = $_GET['first'];
        $last = $_GET['last'];
        $data = $this->Receive_model->get_range($first,$last);
        echo json_encode($data);
    }
    
    public function update($id) 
    {
        $row = $this->Receive_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/receive/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('kode', $row->kode),
		'receiver' => set_value('receiver', $row->receiver),
		'pdi' => set_value('pdi', $row->pdi),
		'pic' => set_value('pic', $row->pic),
		'create_at' => set_value('create_at', $row->create_at),
		'update_at' => set_value('update_at', $row->update_at),
	    );
            $this->template->load('template','receive/receive_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/receive'));
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
		'receiver' => $this->input->post('receiver',TRUE),
		'pdi' => $this->input->post('pdi',TRUE),
		'pic' => $this->input->post('pic',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
	    );

            $this->Receive_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('index.php/receive'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Receive_model->get_by_id($id);

        if ($row) {
            $this->Receive_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('index.php/receive'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/receive'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('receiver', 'receiver', 'trim|required');
	$this->form_validation->set_rules('pdi', 'pdi', 'trim|required');
	$this->form_validation->set_rules('pic', 'pic', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Receive.php */
/* Location: ./application/controllers/Receive.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-30 05:47:25 */
/* http://harviacode.com */