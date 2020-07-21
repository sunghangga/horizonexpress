<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Handover extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Handover_model','Delivery_model','Warehouse_model','Company_model'));
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }

    public function index()
    {
        $receive = $this->Handover_model->get_all_delivery();

        $data = array(
            'receive_data' => $receive
        );

        $this->template->load('template','handover/handover_list', $data);
    }

    public function read_receive($kode=null)
    {
        $data = $this->Handover_model->get_detail_by_kode($kode);
        echo json_encode($data);
    }

    public function pdfReceive($id=null){
        $company = $this->Company_model->get_all();
        $row = $this->Handover_model->get_by_id($id);
        $row_del = $this->Delivery_model->get_by_id($row->kode);
        $row_wr = $this->Warehouse_model->get_by_id($row_del->wr_pengirim_id);
        $dt = new DateTime($row->create_at);
        $date = $dt->format('Y-m-d');
        if ($row) {
            $data = array(
                'logo' => $company->logo,
                'name' => $company->name,
                'tlp' => $company->tlp,
            'kode' => $row->kode,
            'receiver' => $row->receiver,
            'pdi' => $row->pdi,
            'pic' => $row->pic,
            'catatan' => $row->catatan,
            'dealer' => $row_wr->name,
            'nopol' => $row_del->nopol,
            'supir' => $row_del->driver,
            'create_at' => date_indo($date),
            'get_delivery_detail_by_id' => $this->Handover_model->get_detail_by_kode($row->kode),
        );
            $this->load->library("mypdf");
            $this->mypdf->generate("laporan/kondisiKSU","A4","portrait","Laporan Kondisi KSU - ".$data['kode'],$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/handover'));
        }
    }

    public function read($id) 
    {
        $row = $this->Handover_model->get_by_id($id);

        if ($row) {
            $data = array(
        'button' => 'Update',
        'action' => site_url('index.php/handover/update_action'),
        'id' => set_value('id', $row->id),
        'kode' => set_value('kode', $row->kode),
        'receiver' => set_value('receiver', $row->receiver),
        'pdi' => set_value('pdi', $row->pdi),
        'pic' => set_value('pic', $row->pic),
        'catatan' => set_value('catatan', $row->catatan),
        'create_at' => set_value('create_at', $row->create_at),
        'update_at' => set_value('update_at', $row->update_at),
        );
            $this->template->load('template','handover/handover_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/handover_read'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/handover/create_action'),
    	    'id' => set_value('id'),
    	    'kode' => set_value('kode'),
    	    
            'get_all_kode' => $this->Delivery_model->get_all_kode_by_rcstatus(),
	);
        $this->template->load('template','handover/handover_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if(!$this->Handover_model->exist_row_check('kode',$this->input->post('kode',TRUE))>0){
            $data = array(
          		'kode' => $this->input->post('kode',TRUE),
          		'create_at' => date('Y-m-d h:m:s'),
          	    );

            $this->Handover_model->insert($data);

            $kode=$kode = $this->input->post('kode');
            $data = array(
              'received_date' => date('Y-m-d h:m:s'),
              'receipt' => '1'
            );
            $this->Delivery_model->update($kode, $data);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('index.php/handover'));
            }
            else {
                
                $this->create();
             }
        }
    }

    public function range(){
        $first = $_GET['first'];
        $last = $_GET['last'];
        $data = $this->Handover_model->get_range($first,$last);
        echo json_encode($data);
    }
    
    public function update($id) 
    {
        $row = $this->Handover_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/handover/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('kode', $row->kode),
		'create_at' => set_value('create_at', $row->create_at),
	    );
            $this->template->load('template','handover/handover_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/handover'));
        }
    }
    
    public function update_action() 
    {
        $this->_update_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'receiver' => $this->input->post('receiver',TRUE),
		'pdi' => $this->input->post('pdi',TRUE),
		'pic' => $this->input->post('pic',TRUE),
        'catatan' => $this->input->post('catatan',TRUE),
	    );

        $this->Handover_model->update($this->input->post('id', TRUE), $data);

        $id_detail = $this->input->post('id_detail'); // Ambil data nis dan masukkan ke variabel item
        $qty = $this->input->post('qty'); // Ambil data nama dan masukkan ke variabel qyt
        $keterangan = $this->input->post('keterangan');
        $itemdata = array();

        $index = 0; // Set index array awal dengan 0
        foreach($keterangan as $keterangans){ // Kita buat perulangan berdasarkan nis sampai data terakhir
          array_push($itemdata, array(
            'id'=>$id_detail[$index],
            'qty_received'=>$qty[$index],  
            'keterangan'=>$keterangan[$index]
          ));
          
          $index++;
        }
        // echo json_encode($itemdata);
        $this->Handover_model->update_batch($itemdata);

        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('index.php/handover'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Handover_model->get_by_id($id);

        if ($row) {

            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('index.php/handover'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/handover'));
        }
    }

    public function deleteAll($id){
       $data = array(
              'received_date' => '',
              'receipt' => '0'
            );
      $this->Delivery_model->update($id, $data);
      //$this->Delivery_model->updateStatus($id);
      $this->Delivery_model->deleteHandover($id);
      //$this->Delivery_model->deleteHandoverItem($id);
      //$this->Delivery_model->deleteReceiveItem($id);
      //$this->Delivery_model->deleteReceive($id);
      //$this->Delivery_model->deleteReceiveItem($id);
      //$this->Delivery_model->deleteRoadMoney($id);
      //$this->Delivery_model->deleteRoadMoneyDetail($id);
      //$this->Delivery_model->deleteCheck($id);
      //$this->Delivery_model->deleteCheckItem($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('index.php/handover')); 
    }

    public function check_default($value)
    {
        if(!$this->Handover_model->exist_row_check('kode',$value)>0){
            return TRUE; 
        }
        else{
            $this->form_validation->set_message('check_default', 'Kode has been created');
            return FALSE;
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode', 'kode', 'trim|required|callback_check_default');
	

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _update_rules() 
    {
    $this->form_validation->set_rules('receiver', 'receiver', 'trim|required');
    
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Receive.php */
/* Location: ./application/controllers/Receive.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-30 05:47:25 */
/* http://harviacode.com */