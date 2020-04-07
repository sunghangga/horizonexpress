<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Delivery extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Delivery_model','Customer_model','User_model','Warehouse_model'));
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }

    public function get_regencies(){
      $data = $this->Delivery_model->get_regencies();
      echo json_encode($data);
    }

    public function get_districts($id=null){
      $data = $this->Delivery_model->get_districts($id);
      echo json_encode($data);
    }

    public function get_villages($id=null){
      $data = $this->Delivery_model->get_villages($id);
      echo json_encode($data);
    }

    public function get_delivery_by_id($id=null){
      $data = $this->Delivery_model->get_delivery_detail_by_id($id);
      echo json_encode($data);
    }

    // buat testing aja
    public function get_price(){
      $data = $this->Delivery_model->get_price('158527678129');
      $row = $this->Delivery_model->get_by_id('158527678129');
      $user = $this->User_model->get_by_id($row->user_id);

      echo $user->name;//$data['price'];
      //echo json_encode($data);
    }
    
    public function pdfTerima($id=null){
        $row = $this->Delivery_model->get_by_id($id);
        if ($row) {
            $data = $this->Delivery_model->get_price($row->kode);
            $user = $this->User_model->get_by_id($row->user_id);
            $data = array(
            'kode' => $row->kode,
            'name_pengirim' => $row->name_pengirim,
            'address_pengirim' => $row->address_pengirim,
            'telephone_pengirim' => $row->telephone_pengirim,
            'name_penerima' => $row->name_penerima,
            'address_penerima' => $row->address_penerima,
            'telephone_penerima' => $row->telephone_penerima,
            'admin' => $user->name,
            'driver' => $row->driver,
            'nopol' => $row->nopol,
            'price' => $data['price'],
            'terbilang' => ucwords(to_word($data['price'])),
            'name_regency' => $row->name_regency,
            'name_district' => $row->name_district,
            'name_village' => $row->name_village,
            'create_at' => date_indo($row->create_at),
            'update_at' => $row->update_at,
            'get_delivery_detail_by_id' => $this->Delivery_model->get_delivery_detail_by_id($id),
        );
            $this->load->library("mypdf");
            $this->mypdf->generate("laporan/tandaTerima","A5","landscape","Bukti Tanda Terima Pengiriman - ".$data['kode'],$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/delivery'));
        }
    }
    
    public function index()
    {
        $this->template->load('template','delivery/delivery_list');
    }

    public function range(){
        $first = $_GET['first'];
        $last = $_GET['last'];
        $data = $this->Delivery_model->get_range($first,$last);
        echo json_encode($data);
    }

    public function get_item($target=null){
        if (isset($_GET['term'])) {
            $result = $this->Delivery_model->get_item($target,$_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
              $arr_result[] = array(
              'label' => $row->name,
              'unit' => $row->name_u,
            );
            echo json_encode($arr_result);
          }
        }
    }

    public function get_wr_name($id){
        $data = $this->Warehouse_model->get_by_id($id);
        echo json_encode($data->name);
    }

    public function read($id) 
    {
        $row = $this->Delivery_model->get_by_id($id);
        $wr_pengirim = $this->Warehouse_model->get_by_id($row->wr_pengirim_id);
        $wr_penerima = $this->Warehouse_model->get_by_id($row->wr_penerima_id);

        if ($row) {
            $data = array(
            'button' => 'Update',
            'action' => site_url('index.php/delivery/update_action'),
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
            $this->template->load('template','delivery/delivery_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/delivery'));
        }
    }

    public function create() 
    {
        $time = time();
        $time .= mt_rand(00, 99);

        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/delivery/create_action'),
            'kode' => $time,
            'name_pengirim' => set_value('name_pengirim'),
            'address_pengirim' => set_value('address_pengirim'),
            'telephone_pengirim' => set_value('telephone_pengirim'),
            'wr_pengirim_id' => set_value('wr_pengirim_id'),
            'wr_pengirim_name' => set_value('wr_pengirim_name'),
            'name_penerima' => set_value('name_penerima'),
            'address_penerima' => set_value('address_penerima'),
            'telephone_penerima' => set_value('telephone_penerima'),
            'wr_penerima_id' => set_value('wr_penerima_id'),
            'wr_penerima_name' => set_value('wr_penerima_name'),
            'driver' => set_value('driver'),
            'nopol' => set_value('nopol'),
            'price' => set_value('price'),
            'regencies_id' => set_value('regencies_id'),
            'districts_id' => set_value('districts_id'),
            'villages_id' => set_value('villages_id'),
            'get_wr' => $this->Warehouse_model->get_all(),
            // 'create_at' => $date,
            // 'update_at' => set_value('update_at'),
    );
        // echo json_encode($data);
        $this->template->load('template','delivery/delivery_form', $data);
    }
    
    public function create_action() 
    {
        $date = date('Y-m-d');

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'kode' => $this->input->post('kode'),
            'name_pengirim' => $this->input->post('name_pengirim',TRUE),
            'address_pengirim' => $this->input->post('address_pengirim',TRUE),
            'telephone_pengirim' => $this->input->post('telephone_pengirim',TRUE),
            'wr_pengirim_id' => $this->input->post('wr_pengirim_id',TRUE),
            'name_penerima' => $this->input->post('name_penerima',TRUE),
            'address_penerima' => $this->input->post('address_penerima',TRUE),
            'telephone_penerima' => $this->input->post('telephone_penerima',TRUE),
            'wr_penerima_id' => $this->input->post('wr_penerima_id',TRUE),
            'user_id' => $this->session->userdata('user_id'),
            /*'driver' => $this->input->post('driver',TRUE),
            'nopol' => $this->input->post('nopol',TRUE),*/
            // 'price' => $this->input->post('price'),
            'regencies_id' => $this->input->post('regencies_id',TRUE),
            'districts_id' => $this->input->post('districts_id',TRUE),
            'villages_id' => $this->input->post('villages_id',TRUE),
            'create_at' => $date
            );

           // echo json_encode($this->input->post('name_item'));

            $this->Delivery_model->insert($data);

            if(!$this->Customer_model->exist_row_check('telephone',$this->input->post('telephone_pengirim',TRUE))>0){
              $data = array(
              'name' => $this->input->post('name_pengirim',TRUE),
              'address' => $this->input->post('address_pengirim',TRUE),
              'telephone' => $this->input->post('telephone_pengirim',TRUE),
              'create_at' => date('Y-m-d h:m:s')
                );
              $this->Customer_model->insert($data);
            }
            if(!$this->Customer_model->exist_row_check('telephone',$this->input->post('telephone_penerima',TRUE))>0){
              $data = array(
              'name' => $this->input->post('name_penerima',TRUE),
              'address' => $this->input->post('address_penerima',TRUE),
              'telephone' => $this->input->post('telephone_penerima',TRUE),
              'create_at' => date('Y-m-d h:m:s')
                );
              $this->Customer_model->insert($data);
            }

            $kode = $this->input->post('kode');
            $itemname = $this->input->post('name_item'); // Ambil data nis dan masukkan ke variabel item
            $itemqyt = $this->input->post('qty_item'); // Ambil data nama dan masukkan ke variabel qyt
            $itemunit = $this->input->post('unit_item'); // Ambil data telp dan masukkan ke variabel satuan
            $itemprice = $this->input->post('price_item');
            $itemdata = array();
            
            $index = 0; // Set index array awal dengan 0
            foreach($itemname as $itemnames){ // Kita buat perulangan berdasarkan nis sampai data terakhir
              array_push($itemdata, array(
                'kode'=>$kode,
                'category'=>'1',
                'name'=>$itemnames,
                'qty'=>$itemqyt[$index],  
                'price'=>$itemprice[$index],// Ambil dan set data nama sesuai index array dari $index
                'unit'=>$itemunit[$index]  // Ambil dan set data telepon sesuai index array dari $index
              ));
              
              $index++;
            }
            
            $this->Delivery_model->insert_batch($itemdata); 

            $kelengkapanname = $this->input->post('name_kelengkapan'); // Ambil data nis dan masukkan ke variabel item
            $kelengkapanqyt = $this->input->post('qty_kelengkapan'); // Ambil data nama dan masukkan ke variabel qyt
            $kelengkapanunit = $this->input->post('unit_kelengkapan'); // Ambil data telp dan masukkan ke variabel satuan
            $kelengkapanprice = $this->input->post('price_kelengkapan');
            $kelengkapandata = array();
            
            $index = 0; // Set index array awal dengan 0
            foreach($kelengkapanname as $kelengkapannames){ // Kita buat perulangan berdasarkan nis sampai data terakhir
              array_push($kelengkapandata, array(
                'kode'=>$kode,
                'category'=>'2',
                'name'=>$kelengkapannames,
                'qty'=>$kelengkapanqyt[$index],  // Ambil dan set data nama sesuai index array dari $index
                'price'=>$kelengkapanprice[$index], 
                'unit'=>$kelengkapanunit[$index]  // Ambil dan set data telepon sesuai index array dari $index
              ));
              
              $index++;
            }
            
            $this->Delivery_model->insert_batch($kelengkapandata); 

            $othername = $this->input->post('name_other'); // Ambil data nis dan masukkan ke variabel item
            $otherqyt = $this->input->post('qty_other'); // Ambil data nama dan masukkan ke variabel qty
            $otherunit = $this->input->post('unit_other'); // Ambil data telp dan masukkan ke variabel satuan
            $otherprice = $this->input->post('price_other'); 
            $otherdata = array();
            
            $index = 0; // Set index array awal dengan 0
            foreach($othername as $othernames){ // Kita buat perulangan berdasarkan nis sampai data terakhir
              array_push($otherdata, array(
                'kode'=>$kode,
                'category'=>'0',
                'name'=>$othernames,
                'qty'=>$otherqyt[$index],  // Ambil dan set data nama sesuai index array dari $index
                'price'=>$otherprice[$index],
                'unit'=>$otherunit[$index]  // Ambil dan set data telepon sesuai index array dari $index
              ));
              
              $index++;
            }
            
            $this->Delivery_model->insert_batch($otherdata);

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('index.php/delivery'));
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
            'action' => site_url('index.php/delivery/update_action'),
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
            $this->template->load('template','delivery/delivery_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/delivery'));
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
        redirect(site_url('index.php/delivery'));
    }
    
    public function delete($id) 
    {
        $row = $this->Delivery_model->get_by_id($id);

        if ($row) {
            $this->Delivery_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('index.php/delivery'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/delivery'));
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

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "delivery.xls";
        $judul = "delivery";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
    xlsWriteLabel($tablehead, $kolomhead++, "Name Driver");
    xlsWriteLabel($tablehead, $kolomhead++, "Address Driver");
    xlsWriteLabel($tablehead, $kolomhead++, "Telephone Driver");
    xlsWriteLabel($tablehead, $kolomhead++, "Name Customer");
    xlsWriteLabel($tablehead, $kolomhead++, "Address Customer");
    xlsWriteLabel($tablehead, $kolomhead++, "Telephone Customer");
    xlsWriteLabel($tablehead, $kolomhead++, "Regencies Id");
    xlsWriteLabel($tablehead, $kolomhead++, "Districts Id");
    xlsWriteLabel($tablehead, $kolomhead++, "Villages Id");
    xlsWriteLabel($tablehead, $kolomhead++, "Create At");
    xlsWriteLabel($tablehead, $kolomhead++, "Update At");

    foreach ($this->Delivery_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->name_driver);
        xlsWriteLabel($tablebody, $kolombody++, $data->address_driver);
        xlsWriteNumber($tablebody, $kolombody++, $data->telephone_driver);
        xlsWriteLabel($tablebody, $kolombody++, $data->name_customer);
        xlsWriteLabel($tablebody, $kolombody++, $data->address_customer);
        xlsWriteNumber($tablebody, $kolombody++, $data->telephone_customer);
        xlsWriteLabel($tablebody, $kolombody++, $data->regencies_id);
        xlsWriteLabel($tablebody, $kolombody++, $data->districts_id);
        xlsWriteLabel($tablebody, $kolombody++, $data->villages_id);
        xlsWriteLabel($tablebody, $kolombody++, $data->create_at);
        xlsWriteLabel($tablebody, $kolombody++, $data->update_at);

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    



}

/* End of file Delivery.php */
/* Location: ./application/controllers/Delivery.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-14 06:05:00 */
/* http://harviacode.com */