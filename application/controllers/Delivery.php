<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Delivery extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Delivery_model','Customer_model','User_model','Warehouse_model','Company_model','Pending_bike_model'));
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

    public function get_cutomer($id=null){
      $data = $this->Customer_model->get_by_id($id);
      echo json_encode($data);
    }

    public function get_cutomer_withlocation($id=null){
      $data = $this->Customer_model->get_cutomer_withlocation($id);
      echo json_encode($data);
    }

    public function get_delivery_by_id($id=null){
      $data = $this->Delivery_model->get_delivery_detail_by_id($id);
      //$data = $this->Delivery_model->get_check_item_by_id($id);
      echo json_encode($data);
    }

    public function get_check_item_by_id($id){
      $data = $this->Delivery_model->get_check_item_by_id($id);
      echo json_encode($data);
    }

    public function get_check_item_read($id){
      $data = $this->Delivery_model->get_check_item_read($id);
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
        $company = $this->Company_model->get_all();
        $row = $this->Delivery_model->get_by_id($id);
        if ($row) {
            $data = $this->Delivery_model->get_price($row->kode);
            $user = $this->User_model->get_by_id($row->user_id);
            $data = array(
                'logo' => $company->logo,
                'name' => $company->name,
                'tlp' => $company->tlp,
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
            'received_date'=>date_indo($row->received_date),
            'kode_month'=>date('m', strtotime($row->create_at)),
            'kode_year'=>date('Y', strtotime($row->create_at)),
            'update_at' => $row->update_at,
            'no_identitas' => $row->no_identitas,
            'get_delivery_detail_by_id' => $this->Delivery_model->get_delivery_detail_by_id($id),
            'get_delivery_detail_motor'=> $this->Delivery_model->get_delivery_detail_motor($id),
            'get_count_motor'=> $this->Delivery_model->get_count_motor($id),
            'get_count_kelengkapan'=> $this->Delivery_model->get_count_kelengkapan($id),
            'get_count_other'=> $this->Delivery_model->get_count_other($id)
        );
            $this->load->library("mypdf");
            $this->mypdf->generate("laporan/tandaTerima","A4","potrait","Bukti Tanda Terima Pengiriman - ".$data['kode'],$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/delivery'));
        }
    }

    public function pdfInvoice($id=null){
        $company = $this->Company_model->get_all();
        $row = $this->Delivery_model->get_by_id($id);
        if ($row) {
            $data = $this->Delivery_model->get_price($row->kode);
            $user = $this->User_model->get_by_id($row->user_id);
            $data = array(
                'logo' => $company->logo,
                'name' => $company->name,
                'tlp' => $company->tlp,
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
            'totalprice' => $data['price'],
            'terbilang' => ucwords(to_word($data['price'])),
            'name_regency' => $row->name_regency,
            'name_district' => $row->name_district,
            'name_village' => $row->name_village,
            'create_at' => date_indo($row->create_at),
            'received_date'=>date_indo($row->received_date),
            'kode_month'=>date('m', strtotime($row->create_at)),
            'kode_year'=>date('Y', strtotime($row->create_at)),
            'update_at' => $row->update_at,
            'no_identitas' => $row->no_identitas,
            'get_delivery_detail_by_id' => $this->Delivery_model->get_delivery_detail_by_id($id),
            'get_delivery_detail_motor'=> $this->Delivery_model->get_delivery_detail_motor($id),
            'get_delivery_detail_invoice'=> $this->Delivery_model->get_delivery_detail_invoice($id),
            'get_count_motor'=> $this->Delivery_model->get_count_motor($id),
            'get_count_kelengkapan'=> $this->Delivery_model->get_count_kelengkapan($id),
            'get_count_other'=> $this->Delivery_model->get_count_other($id)
        );
            $this->load->library("mypdf");
            $this->mypdf->generate("laporan/invoice","A4","potrait","Invoice Pengiriman - ".$data['kode'],$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/delivery'));
        }
    }


    public function pdfKirim($id=null){
        $company = $this->Company_model->get_all();
        $row = $this->Delivery_model->get_by_id($id);
        if ($row) {
            $data = $this->Delivery_model->get_price($row->kode);
            $user = $this->User_model->get_by_id($row->user_id);
            $data = array(
                'logo' => $company->logo,
                'name' => $company->name,
                'tlp' => $company->tlp,
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
            'kode_month'=>date('m', strtotime($row->create_at)),
            'kode_year'=>date('Y', strtotime($row->create_at)),
            'update_at' => $row->update_at,
            'get_delivery_detail_by_id' => $this->Delivery_model->get_delivery_detail_by_id($id),
            'get_delivery_detail_motor'=> $this->Delivery_model->get_delivery_detail_motor($id),
            'get_count_motor'=> $this->Delivery_model->get_count_motor($id),
            'get_count_kelengkapan'=> $this->Delivery_model->get_count_kelengkapan($id),
            'get_count_other'=> $this->Delivery_model->get_count_other($id)
        );
            $this->load->library("mypdf");
            $this->mypdf->generate("laporan/tandaPengiriman","A4","potrait","Bukti Tanda Terima Pengiriman - ".$data['kode'],$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/delivery'));
        }
    }


    public function pdfTerimaDetail($id=null){
        $company = $this->Company_model->get_all();
        $row = $this->Delivery_model->get_by_id($id);
        if ($row) {
            $data = $this->Delivery_model->get_price($row->kode);
            $user = $this->User_model->get_by_id($row->user_id);
            $data = array(
                'logo' => $company->logo,
                'name' => $company->name,
                'tlp' => $company->tlp,
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
            'kode_month'=>date('m', strtotime($row->create_at)),
            'kode_year'=>date('Y', strtotime($row->create_at)),
            'update_at' => $row->update_at,
            'get_delivery_detail_by_id' => $this->Delivery_model->get_delivery_detail_barcode_id($id),
            'get_delivery_detail_motor'=> $this->Delivery_model->get_delivery_detail_motor($id),
           

        );
            $this->load->library("mypdf");
            $this->mypdf->generate("laporan/tandaTerimaDetail","A6","landscape","Bukti Tanda Terima Pengiriman - ".$data['kode'],$data);
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
            'regencies_id' => set_value('regencies_id', $row->id_regency),
            'districts_id' => set_value('districts_id', $row->id_district),
            'villages_id' => set_value('villages_id', $row->id_village),
            'regencies_name' => set_value('regencies_id', $row->name_regency),
            'districts_name' => set_value('districts_id', $row->name_district),
            'villages_name' => set_value('villages_id', $row->name_village),
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
        $delivery_jml=$this->Delivery_model->get_count();
        if($delivery_jml>0){
          $lastprimary=$this->Delivery_model->get_delivery_last_kode();
          $kode_inv=$lastprimary->kode;
          $kode_inv=$kode_inv+1;
        }
        else{
          $kode_inv=42;
        }


        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/delivery/create_action'),
            'kode' => $kode_inv,
            'name_pengirim' => set_value('name_pengirim'),
            'pengirim_id' => set_value('pengirim_id'),
            'address_pengirim' => set_value('address_pengirim'),
            'telephone_pengirim' => set_value('telephone_pengirim'),
            'wr_pengirim_id' => set_value('wr_pengirim_id'),
            'wr_pengirim_name' => set_value('wr_pengirim_name'),
            'name_penerima' => set_value('name_penerima'),
            'penerima_id' => set_value('penerima_id'),
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
            'get_regencies' => $this->Delivery_model->get_regencies(),
            'get_wr' => $this->Warehouse_model->get_all(),
            'get_cutomer'=>$this->Customer_model->get_all(),
            'get_pending_bike'=>$this->Pending_bike_model->get_all_waiting(),
            'get_pending_bike_model'=>$this->Pending_bike_model->get_all_waiting_model(),
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
            if($_POST['driver'] != NULL && $_POST['nopol'] != NULL){
              $data = array(
              'kode' => $this->input->post('kode'),
              'name_pengirim' => $this->input->post('name_pengirim',TRUE),
              'pengirim_id' => $this->input->post('pengirim_id',TRUE),
              'address_pengirim' => $this->input->post('address_pengirim',TRUE),
              'telephone_pengirim' => $this->input->post('telephone_pengirim',TRUE),
              'wr_pengirim_id' => $this->input->post('wr_pengirim_id',TRUE),
              'name_penerima' => $this->input->post('name_penerima',TRUE),
              'penerima_id' => $this->input->post('penerima_id',TRUE),
              'address_penerima' => $this->input->post('address_penerima',TRUE),
              'telephone_penerima' => $this->input->post('telephone_penerima',TRUE),
              'wr_penerima_id' => $this->input->post('wr_penerima_id',TRUE),
              'user_id' => $this->session->userdata('user_id'),
              'driver' => $this->input->post('driver',TRUE),
              'nopol' => $this->input->post('nopol',TRUE),
              'status' => 'driver',
              // 'price' => $this->input->post('price'),
              'regencies_id' => $this->input->post('regencies_id',TRUE),
              'districts_id' => $this->input->post('districts_id',TRUE),
              'villages_id' => $this->input->post('villages_id',TRUE),
              'create_at' => $date
              );
            }
            else{
                $data = array(
              'kode' => $this->input->post('kode'),
              'name_pengirim' => $this->input->post('name_pengirim',TRUE),
              'pengirim_id' => $this->input->post('pengirim_id',TRUE),
              'address_pengirim' => $this->input->post('address_pengirim',TRUE),
              'telephone_pengirim' => $this->input->post('telephone_pengirim',TRUE),
              'wr_pengirim_id' => $this->input->post('wr_pengirim_id',TRUE),
              'name_penerima' => $this->input->post('name_penerima',TRUE),
              'penerima_id' => $this->input->post('penerima_id',TRUE),
              'address_penerima' => $this->input->post('address_penerima',TRUE),
              'telephone_penerima' => $this->input->post('telephone_penerima',TRUE),
              'wr_penerima_id' => $this->input->post('wr_penerima_id',TRUE),
              'user_id' => $this->session->userdata('user_id'),
              //'driver' => $this->input->post('driver',TRUE),
              //'nopol' => $this->input->post('nopol',TRUE),
              // 'price' => $this->input->post('price'),
              'regencies_id' => $this->input->post('regencies_id',TRUE),
              'districts_id' => $this->input->post('districts_id',TRUE),
              'villages_id' => $this->input->post('villages_id',TRUE),
              'create_at' => $date
              );
            }

           // echo json_encode($this->input->post('name_item'));

            $this->Delivery_model->insert($data);

            if((!$this->Customer_model->exist_row_check('telephone',$this->input->post('telephone_pengirim',TRUE))>0)
              || (!$this->Customer_model->exist_row_check('name',$this->input->post('name_pengirim',TRUE))>0)){
              $data = array(
              'name' => $this->input->post('name_pengirim',TRUE),
              'address' => $this->input->post('address_pengirim',TRUE),
              'telephone' => $this->input->post('telephone_pengirim',TRUE),
              'create_at' => date('Y-m-d h:m:s')
                );
              $this->Customer_model->insert($data);
            }
            if((!$this->Customer_model->exist_row_check('telephone',$this->input->post('telephone_penerima',TRUE))>0)
              || (!$this->Customer_model->exist_row_check('name',$this->input->post('name_penerima',TRUE))>0)){
              $data = array(
              'name' => $this->input->post('name_penerima',TRUE),
              'address' => $this->input->post('address_penerima',TRUE),
              'telephone' => $this->input->post('telephone_penerima',TRUE),
              'create_at' => date('Y-m-d h:m:s')
                );
              $this->Customer_model->insert($data);
            }

            $kode = $this->input->post('kode');
            $itemfaktur = $this->input->post('faktur_item');
            $itemname = $this->input->post('name_item'); // Ambil data nis dan masukkan ke variabel item
            $itemnomesin = $this->input->post('nomesin_item');
            $itemnorangka = $this->input->post('norangka_item');
            $itemqyt = $this->input->post('qty_item'); // Ambil data nama dan masukkan ke variabel qyt
            $itemunit = $this->input->post('unit_item'); // Ambil data telp dan masukkan ke variabel satuan
            $itemprice = $this->input->post('price_item');
            $bike_id = $this->input->post('bike_id_item');
            $itemdata = array();
            $itemdata_barcode = array();
            //$pending_update= array();

            
            
            $delivery_jml=$this->Delivery_model->get_count_delivery_detail();
            if($delivery_jml>0){

              $lastprimary=$this->Delivery_model->get_delivery_detail_last_id();
              $lastId=$lastprimary->id;
              $index = 0; // Set index array awal dengan 0
              foreach($itemname as $itemnames){ // Kita buat perulangan berdasarkan nis sampai data terakhir
                
                /*if($itemnomesin[$index]!=null){
                    $this->load->library('zend');
                    $this->zend->load('Zend/Barcode');
                    $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$itemnomesin[$index]), array())->draw();
                    $image_name     = $itemnomesin[$index].'.jpg';
                    $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                    imagejpeg($image_resource, $image_dir.$image_name); 

                }
                else{
                    $image_name="default.jpg";
                }*/
                $lastId++;

                $this->load->library('zend');
                $this->zend->load('Zend/Barcode');
                $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$kode.$lastId), array())->draw();
                $image_name     = $kode.$lastId.'.jpg';
                $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                imagejpeg($image_resource, $image_dir.$image_name); 

                if ($bike_id[$index]==0 || $bike_id[$index]==""){
                  $bike_id[$index]=null;
                }
                array_push($itemdata, array(
                  'id'=>$lastId,
                  'kode'=>$kode,
                  'faktur'=>$itemfaktur[$index],
                  'category'=>'1',
                  'name'=>$itemnames,
                  'no_mesin'=>$itemnomesin[$index],
                  'no_rangka'=>$itemnorangka[$index],
                  'qty'=>$itemqyt[$index],  
                  'price'=>$itemprice[$index],// Ambil dan set data nama sesuai index array dari $index
                  'unit'=>$itemunit[$index],  // Ambil dan set data telepon sesuai index array dari $index
                  'barcode'=>$image_name,
                  'bike_id'=>$bike_id[$index],
                ));


                /*array_push($pending_update, array(
                  'bike_id'=>$bike_id[$index],
                  'status' => 'booked',
                ));*/

                array_push($itemdata_barcode, array(
                  'id'=>$lastId,
                  'kode'=>$kode,
                  'barcode'=>$image_name
                ));
                
                $index++;
              }
              
            }
            else{
              $lastId=0;
              $index = 0; // Set index array awal dengan 0
              foreach($itemname as $itemnames){ // Kita buat perulangan berdasarkan nis sampai data terakhir
                
                /*if($itemnomesin[$index]!=null){
                    $this->load->library('zend');
                    $this->zend->load('Zend/Barcode');
                    $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$itemnomesin[$index]), array())->draw();
                    $image_name     = $itemnomesin[$index].'.jpg';
                    $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                    imagejpeg($image_resource, $image_dir.$image_name); 

                }
                else{
                    $image_name="default.jpg";
                }*/
                $lastId++;

                $this->load->library('zend');
                $this->zend->load('Zend/Barcode');
                $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$kode.$lastId), array())->draw();
                $image_name     = $kode.$lastId.'.jpg';
                $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                imagejpeg($image_resource, $image_dir.$image_name); 

                if ($bike_id[$index]==0 || $bike_id[$index]==""){
                  $bike_id[$index]=null;
                }
                array_push($itemdata, array(
                  'id'=>$lastId,
                  'kode'=>$kode,
                  'faktur'=>$itemfaktur[$index],
                  'category'=>'1',
                  'name'=>$itemnames,
                  'no_mesin'=>$itemnomesin[$index],
                  'no_rangka'=>$itemnorangka[$index],
                  'qty'=>$itemqyt[$index],  
                  'price'=>$itemprice[$index],// Ambil dan set data nama sesuai index array dari $index
                  'unit'=>$itemunit[$index],  // Ambil dan set data telepon sesuai index array dari $index
                  'barcode'=>$image_name,
                  'bike_id'=>$bike_id[$index],
                ));
                array_push($itemdata_barcode, array(
                  'id'=>$lastId,
                  'kode'=>$kode,
                  'barcode'=>$image_name
                ));

                $index++;
              }
              
            }
            
            
            
            $this->Delivery_model->insert_batch($itemdata); 
            
            if(!empty($itemdata_barcode)){
            $this->Delivery_model->insert_batch_barcode($itemdata_barcode); 
            }
            //$this->Pending_bike_model->update_batch($pending_update); 
            $this->Pending_bike_model->change_bike_status($kode,'booked');


            $kelengkapanname = $this->input->post('name_kelengkapan'); // Ambil data nis dan masukkan ke variabel item
            $kelengkapanqty = $this->input->post('qty_kelengkapan'); // Ambil data nama dan masukkan ke variabel qyt
            $kelengkapanunit = $this->input->post('unit_kelengkapan'); // Ambil data telp dan masukkan ke variabel satuan
            $kelengkapanprice = $this->input->post('price_kelengkapan');
            $kelengkapandata = array();
            $kelengkapandata_barcode = array();
            $lastprimary=$this->Delivery_model->get_delivery_detail_last_id();
            $lastId=$lastprimary->id;
            $index = 0; // Set index array awal dengan 0
            foreach($kelengkapanname as $kelengkapannames){ // Kita buat perulangan berdasarkan nis sampai data terakhir
              $lastId++;

              $this->load->library('zend');
              $this->zend->load('Zend/Barcode');

              array_push($kelengkapandata, array(
                'id'=>$lastId,
                'kode'=>$kode,
                'category'=>'2',
                'name'=>$kelengkapannames,
                'qty'=>$kelengkapanqty[$index],  // Ambil dan set data nama sesuai index array dari $index
                'price'=>$kelengkapanprice[$index], 
                'unit'=>$kelengkapanunit[$index],  // Ambil dan set data telepon sesuai index array dari $index
                'barcode'=>"default.jpg"
              ));
              

              for ($jml_kelengkapan = 1; $jml_kelengkapan <= $kelengkapanqty[$index]; $jml_kelengkapan++){
                $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$kode.$lastId.$jml_kelengkapan), array())->draw();
                $image_name     = $kode.$lastId.$jml_kelengkapan.'.jpg';
                $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                imagejpeg($image_resource, $image_dir.$image_name); 
                  array_push($kelengkapandata_barcode, array(
                  'id'=>$lastId,
                  'kode'=>$kode,
                  'barcode'=>$image_name
                ));
              }


              $index++;
            }
            
            $this->Delivery_model->insert_batch($kelengkapandata); 
            
            if(!empty($kelengkapandata_barcode)){
            $this->Delivery_model->insert_batch_barcode($kelengkapandata_barcode); 
            }

            $othername = $this->input->post('name_other'); // Ambil data nis dan masukkan ke variabel item
            $otherqty = $this->input->post('qty_other'); // Ambil data nama dan masukkan ke variabel qty
            $otherunit = $this->input->post('unit_other'); // Ambil data telp dan masukkan ke variabel satuan
            $otherprice = $this->input->post('price_other'); 
            $otherdata = array();
            $otherdata_barcode = array();
            
            $index = 0; // Set index array awal dengan 0
            foreach($othername as $othernames){ // Kita buat perulangan berdasarkan nis sampai data terakhir
              $lastId++;

              $this->load->library('zend');
              $this->zend->load('Zend/Barcode');
              $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$kode.$lastId), array())->draw();
              $image_name     = $kode.$lastId.'.jpg';
              $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
              imagejpeg($image_resource, $image_dir.$image_name); 

              array_push($otherdata, array(
                'id'=>$lastId,
                'kode'=>$kode,
                'category'=>'0',
                'name'=>$othernames,
                'qty'=>$otherqty[$index],  // Ambil dan set data nama sesuai index array dari $index
                'price'=>$otherprice[$index],
                'unit'=>$otherunit[$index],  // Ambil dan set data telepon sesuai index array dari $index
                'barcode'=>$image_name
              ));

              for ($jml_other = 1; $jml_other <= $otherqty[$index]; $jml_other++){
                  $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$kode.$lastId.$jml_other), array())->draw();
                  $image_name     = $kode.$lastId.$jml_other.'.jpg';
                  $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                  imagejpeg($image_resource, $image_dir.$image_name); 
                    array_push($otherdata_barcode, array(
                    'id'=>$lastId,
                    'kode'=>$kode,
                    'barcode'=>$image_name
                  ));
                }
              
              $index++;
            }
            
            $this->Delivery_model->insert_batch($otherdata);
            
            if(!empty($otherdata_barcode)){
             $this->Delivery_model->insert_batch_barcode($otherdata_barcode);
            }
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
            'pengirim_id' => set_value('pengirim_id', $row->pengirim_id),
            'pengirim_name' => set_value('pengirim_name', $row->name_pengirim),
            'address_pengirim' => set_value('address_pengirim', $row->address_pengirim),
            'telephone_pengirim' => set_value('telephone_pengirim', $row->telephone_pengirim),
            'wr_pengirim_id' => set_value('wr_pengirim_id', $wr_pengirim->id),
            'wr_pengirim_name' => set_value('wr_pengirim_name', $wr_pengirim->name),
            'name_penerima' => set_value('name_penerima', $row->name_penerima),
            'penerima_id' => set_value('penerima_id', $row->penerima_id),
            'penerima_name' => set_value('penerima_name', $row->name_penerima),
            'address_penerima' => set_value('address_penerima', $row->address_penerima),
            'telephone_penerima' => set_value('telephone_penerima', $row->telephone_penerima),
            'wr_penerima_id' => set_value('wr_penerima_id', $wr_penerima->id),
            'wr_penerima_name' => set_value('wr_penerima_name', $wr_penerima->name),
            // 'weight' => set_value('weight', $row->weight),
            // 'amount' => set_value('amount', $row->amount),
            // 'price' => set_value('price', $row->price),
            'regencies_id' => set_value('regencies_id', $row->id_regency),
            'regencies_name' => set_value('regencies_name', $row->name_regency),
            'get_regencies' => $this->Delivery_model->get_regencies(),

            'districts_id' => set_value('districts_id', $row->id_district),
            'districts_name' => set_value('districts_name', $row->name_district),
            'get_districts' => $this->Delivery_model->get_districts($row->id_regency),

            'villages_id' => set_value('villages_id', $row->id_village),
            'villages_name' => set_value('villages_name', $row->name_village),
            'get_villages' => $this->Delivery_model->get_villages($row->id_district),

            //'villages_id' => set_value('villages_id', $row->id_village),
            'get_delivery_detail_by_id' => $this->Delivery_model->get_delivery_detail_by_id($id),
            //'get_wr' => $this->Warehouse_model->get_by_id($id),
            'get_wr' => $this->Warehouse_model->get_all(),
            'get_cutomer'=>$this->Customer_model->get_all(),
            // 'create_at' => set_value('create_at', $row->create_at),
            // 'update_at' => set_value('update_at', $row->update_at),
            'get_pending_bike'=>$this->Pending_bike_model->get_all_waiting_update($id),
            'get_pending_bike_model'=>$this->Pending_bike_model->get_all_waiting_model(),
        );
           $this->template->load('template','delivery/delivery_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/delivery'));
        }
    }
    
    public function update_action() 
    {
        $date = $this->Delivery_model->get_delivery_by_id($this->input->post('kode', TRUE));

        $date = $date[0]->create_at;

        $barcode_img=$this->Delivery_model->get_delivery_detail_barcode($this->input->post('kode', TRUE));
        foreach ($barcode_img as $row_imgs) {
          if ($row_imgs->barcode != "default.jpg") {
              $path = './assets/img/barcode/'.$row_imgs->barcode;
              unlink($path);
          }
        }
        $this->Delivery_model->delete($this->input->post('kode', TRUE));
        $this->Delivery_model->deleteDetail($this->input->post('kode', TRUE));
        $this->Delivery_model->deleteDetailBarcode($this->input->post('kode', TRUE));


        
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kode', TRUE));
        } else {
            if($_POST['driver'] != NULL && $_POST['nopol'] != NULL){
              $data = array(
              'kode' => $this->input->post('kode'),
              'name_pengirim' => $this->input->post('name_pengirim',TRUE),
              'pengirim_id' => $this->input->post('pengirim_id',TRUE),
              'address_pengirim' => $this->input->post('address_pengirim',TRUE),
              'telephone_pengirim' => $this->input->post('telephone_pengirim',TRUE),
              'wr_pengirim_id' => $this->input->post('wr_pengirim_id',TRUE),
              'name_penerima' => $this->input->post('name_penerima',TRUE),
              'penerima_id' => $this->input->post('penerima_id',TRUE),
              'address_penerima' => $this->input->post('address_penerima',TRUE),
              'telephone_penerima' => $this->input->post('telephone_penerima',TRUE),
              'wr_penerima_id' => $this->input->post('wr_penerima_id',TRUE),
              'user_id' => $this->session->userdata('user_id'),
              'driver' => $this->input->post('driver',TRUE),
              'nopol' => $this->input->post('nopol',TRUE),
              'status' => 'driver',
              // 'price' => $this->input->post('price'),
              'regencies_id' => $this->input->post('regencies_id',TRUE),
              'districts_id' => $this->input->post('districts_id',TRUE),
              'villages_id' => $this->input->post('villages_id',TRUE),
              'create_at' => $date
              );
            }
            else{
                $data = array(
              'kode' => $this->input->post('kode'),
              'name_pengirim' => $this->input->post('name_pengirim',TRUE),
              'pengirim_id' => $this->input->post('pengirim_id',TRUE),
              'address_pengirim' => $this->input->post('address_pengirim',TRUE),
              'telephone_pengirim' => $this->input->post('telephone_pengirim',TRUE),
              'wr_pengirim_id' => $this->input->post('wr_pengirim_id',TRUE),
              'name_penerima' => $this->input->post('name_penerima',TRUE),
              'penerima_id' => $this->input->post('penerima_id',TRUE),
              'address_penerima' => $this->input->post('address_penerima',TRUE),
              'telephone_penerima' => $this->input->post('telephone_penerima',TRUE),
              'wr_penerima_id' => $this->input->post('wr_penerima_id',TRUE),
              'user_id' => $this->session->userdata('user_id'),
              //'driver' => $this->input->post('driver',TRUE),
              //'nopol' => $this->input->post('nopol',TRUE),
              // 'price' => $this->input->post('price'),
              'regencies_id' => $this->input->post('regencies_id',TRUE),
              'districts_id' => $this->input->post('districts_id',TRUE),
              'villages_id' => $this->input->post('villages_id',TRUE),
              'create_at' => $date
              );
            }

           // echo json_encode($this->input->post('name_item'));

            $this->Delivery_model->insert($data);

             if((!$this->Customer_model->exist_row_check('telephone',$this->input->post('telephone_pengirim',TRUE))>0)
              || (!$this->Customer_model->exist_row_check('name',$this->input->post('name_pengirim',TRUE))>0)){
              $data = array(
              'name' => $this->input->post('name_pengirim',TRUE),
              'address' => $this->input->post('address_pengirim',TRUE),
              'telephone' => $this->input->post('telephone_pengirim',TRUE),
              'create_at' => date('Y-m-d h:m:s')
                );
              $this->Customer_model->insert($data);
            }
            if((!$this->Customer_model->exist_row_check('telephone',$this->input->post('telephone_penerima',TRUE))>0)
              || (!$this->Customer_model->exist_row_check('name',$this->input->post('name_penerima',TRUE))>0)){
              $data = array(
              'name' => $this->input->post('name_penerima',TRUE),
              'address' => $this->input->post('address_penerima',TRUE),
              'telephone' => $this->input->post('telephone_penerima',TRUE),
              'create_at' => date('Y-m-d h:m:s')
                );
              $this->Customer_model->insert($data);
            }

            $kode = $this->input->post('kode');
            $itemfaktur = $this->input->post('faktur_item');
            $itemname = $this->input->post('name_item'); // Ambil data nis dan masukkan ke variabel item
            $itemnomesin = $this->input->post('nomesin_item');
            $itemnorangka = $this->input->post('norangka_item');
            $itemqyt = $this->input->post('qty_item'); // Ambil data nama dan masukkan ke variabel qyt
            $itemunit = $this->input->post('unit_item'); // Ambil data telp dan masukkan ke variabel satuan
            $itemprice = $this->input->post('price_item');
            $itemid = $this->input->post('id_item');
            $bike_id = $this->input->post('bike_id_item');
            $itemdata = array();
            $itemdata_barcode = array();
            $itemdata_new = array();
            $itemdata_barcode_new = array();
            //$pending_update= array();
            
            $index = 0; // Set index array awal dengan 0
            foreach($itemname as $itemnames){ // Kita buat perulangan berdasarkan nis sampai data terakhir
              
              /*if($itemnomesin[$index]!=null){
                  $this->load->library('zend');
                  $this->zend->load('Zend/Barcode');
                  $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$itemnomesin[$index]), array())->draw();
                  $image_name     = $itemnomesin[$index].'.jpg';
                  $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                  imagejpeg($image_resource, $image_dir.$image_name); 

              }
              else{
                  $image_name="default.jpg";
              }*/
              /*array_push($pending_update, array(
                  'bike_id'=>$bike_id[$index],
                  'status' => 'booked',
                ));*/

              if($itemid[$index]!=0){
                $this->load->library('zend');
                $this->zend->load('Zend/Barcode');
                $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$kode.$itemid[$index]), array())->draw();
                $image_name     = $kode.$itemid[$index].'.jpg';
                $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                imagejpeg($image_resource, $image_dir.$image_name); 
                if ($bike_id[$index]==0 || $bike_id[$index]==""){
                  $bike_id[$index]=null;
                }
                array_push($itemdata, array(
                  'id'=>$itemid[$index],
                  'kode'=>$kode,
                  'faktur'=>$itemfaktur[$index],
                  'category'=>'1',
                  'name'=>$itemnames,
                  'no_mesin'=>$itemnomesin[$index],
                  'no_rangka'=>$itemnorangka[$index],
                  'qty'=>$itemqyt[$index],  
                  'price'=>$itemprice[$index],// Ambil dan set data nama sesuai index array dari $index
                  'unit'=>$itemunit[$index],  // Ambil dan set data telepon sesuai index array dari $index
                  'barcode'=>$image_name,
                  'bike_id'=>$bike_id[$index],
                ));

                array_push($itemdata_barcode, array(
                  'id'=>$itemid[$index],
                  'kode'=>$kode,
                  'barcode'=>$image_name
                ));
                
              }
                             
              $index++;
            }
            //$this->Pending_bike_model->update_batch($pending_update); 
            $this->Delivery_model->insert_batch($itemdata);
            $this->Delivery_model->insert_batch_barcode($itemdata_barcode); 
            $this->Pending_bike_model->change_bike_status($kode,'booked');


            
            
           

            $kelengkapanname = $this->input->post('name_kelengkapan'); // Ambil data nis dan masukkan ke variabel item
            $kelengkapanid = $this->input->post('id_kelengkapan');
            $kelengkapanqty = $this->input->post('qty_kelengkapan'); // Ambil data nama dan masukkan ke variabel qyt
            $kelengkapanunit = $this->input->post('unit_kelengkapan'); // Ambil data telp dan masukkan ke variabel satuan
            $kelengkapanprice = $this->input->post('price_kelengkapan');
            $kelengkapandata = array();
            $kelengkapandata_new = array();
            $kelengkapandata_barcode = array();
            $kelengkapandata_barcode_new = array();
 

            $index = 0; // Set index array awal dengan 0
            foreach($kelengkapanname as $kelengkapannames){ // Kita buat perulangan berdasarkan nis sampai data terakhir

              if($kelengkapanid[$index]!=0){
               
                $this->load->library('zend');
                $this->zend->load('Zend/Barcode');
               

                array_push($kelengkapandata, array(
                  'id'=>$kelengkapanid[$index],
                  'kode'=>$kode,
                  'category'=>'2',
                  'name'=>$kelengkapannames,
                  'qty'=>$kelengkapanqty[$index], 
                  'price'=>$kelengkapanprice[$index], 
                  'unit'=>$kelengkapanunit[$index],  
                  'barcode'=>"default.jpg"
                ));
                
               for ($jml_kelengkapan = 1; $jml_kelengkapan <= $kelengkapanqty[$index]; $jml_kelengkapan++){
                  $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$kode.$kelengkapanid[$index].$jml_kelengkapan), array())->draw();
                  $image_name     = $kode.$kelengkapanid[$index].$jml_kelengkapan.'.jpg';
                  $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                  imagejpeg($image_resource, $image_dir.$image_name); 
                    array_push($kelengkapandata_barcode, array(
                    'id'=>$kelengkapanid[$index],
                    'kode'=>$kode,
                    'barcode'=>$image_name
                  ));
                }

              }
              $index++;
            }

            
            $this->Delivery_model->insert_batch($kelengkapandata);
            if(!empty($kelengkapandata_barcode)){
            $this->Delivery_model->insert_batch_barcode($kelengkapandata_barcode);
            }

            $othername = $this->input->post('name_other'); // Ambil data nis dan masukkan ke variabel item
            $otherid = $this->input->post('id_other');
            $otherqty = $this->input->post('qty_other'); // Ambil data nama dan masukkan ke variabel qty
            $otherunit = $this->input->post('unit_other'); // Ambil data telp dan masukkan ke variabel satuan
            $otherprice = $this->input->post('price_other'); 
            $otherdata = array();
            $otherdata_new = array();
            $otherdata_barcode = array();
            $otherdata_barcode_new = array();
            
            $index = 0; // Set index array awal dengan 0
            foreach($othername as $othernames){ // Kita buat perulangan berdasarkan nis sampai data terakhir
              if($otherid[$index]!=0){
                $this->load->library('zend');
                $this->zend->load('Zend/Barcode');
                
                imagejpeg($image_resource, $image_dir.$image_name); 
                array_push($otherdata, array(
                  'id'=>$otherid[$index],
                  'kode'=>$kode,
                  'category'=>'0',
                  'name'=>$othernames,
                  'qty'=>$otherqty[$index],  // Ambil dan set data nama sesuai index array dari $index
                  'price'=>$otherprice[$index],
                  'unit'=>$otherunit[$index],  // Ambil dan set data telepon sesuai index array dari $index
                  'barcode'=>$image_name
                ));

                for ($jml_other = 1; $jml_other <= $otherqty[$index]; $jml_other++){
                  $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$kode.$otherid[$index].$jml_other), array())->draw();
                  $image_name     = $kode.$otherid[$index].$jml_other.'.jpg';
                  $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                  imagejpeg($image_resource, $image_dir.$image_name); 
                    array_push($otherdata_barcode, array(
                    'id'=>$otherid[$index],
                    'kode'=>$kode,
                    'barcode'=>$image_name
                  ));
                }
              }
              $index++;
            }
              $this->Delivery_model->insert_batch($otherdata);
              if(!empty($otherdata_barcode)){
               $this->Delivery_model->insert_batch_barcode($otherdata_barcode);
              }
              




            $lastprimary=$this->Delivery_model->get_delivery_detail_last_id();
            $lastId=$lastprimary->id;

            $index = 0; // Set index array awal dengan 0
            foreach($itemname as $itemnames){ // Kita buat perulangan berdasarkan nis sampai data terakhir

              if($itemid[$index]==0){

                $lastId++;

                $this->load->library('zend');
                $this->zend->load('Zend/Barcode');
                $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$kode.$lastId), array())->draw();
                $image_name     = $kode.$lastId.'.jpg';
                $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                imagejpeg($image_resource, $image_dir.$image_name); 
                if ($bike_id[$index]==0 || $bike_id[$index]==""){
                  $bike_id[$index]=null;
                }
                array_push($itemdata_new, array(
                  'kode'=>$kode,
                  'faktur'=>$itemfaktur[$index],
                  'category'=>'1',
                  'name'=>$itemnames,
                  'no_mesin'=>$itemnomesin[$index],
                  'no_rangka'=>$itemnorangka[$index],
                  'qty'=>$itemqyt[$index],  
                  'price'=>$itemprice[$index],// Ambil dan set data nama sesuai index array dari $index
                  'unit'=>$itemunit[$index],  // Ambil dan set data telepon sesuai index array dari $index
                  'barcode'=>$image_name,
                  'bike_id'=>$bike_id[$index],
                ));

                array_push($itemdata_barcode_new, array(
                  'id'=>$lastId,
                  'kode'=>$kode,
                  'barcode'=>$image_name
                ));
              }

              $index++;
            }
            if(!empty($itemdata_new)){
              $this->Delivery_model->insert_batch($itemdata_new);       
            }
            if(!empty($itemdata_barcode_new)){
              $this->Delivery_model->insert_batch_barcode($itemdata_barcode_new);  
            }
            

            $lastprimary=$this->Delivery_model->get_delivery_detail_last_id();
            $lastId=$lastprimary->id;

            $index = 0; // Set index array awal dengan 0
            foreach($kelengkapanname as $kelengkapannames){ // Kita buat perulangan berdasarkan nis sampai data terakhir

              if($kelengkapanid[$index]==0){

                $lastId++;

                $this->load->library('zend');
                $this->zend->load('Zend/Barcode');
 

                array_push($kelengkapandata_new, array(
                  'id'=>$lastId,
                  'kode'=>$kode,
                  'category'=>'2',
                  'name'=>$kelengkapannames,
                  'qty'=>$kelengkapanqty[$index], 
                  'price'=>$kelengkapanprice[$index], 
                  'unit'=>$kelengkapanunit[$index],  
                  'barcode'=>"default.jpg"
                ));

                for ($jml_kelengkapan = 1; $jml_kelengkapan <= $kelengkapanqty[$index]; $jml_kelengkapan++){
                  $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$kode.$lastId.$jml_kelengkapan), array())->draw();
                  $image_name     = $kode.$lastId.$jml_kelengkapan.'.jpg';
                  $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                  imagejpeg($image_resource, $image_dir.$image_name); 
                    array_push($kelengkapandata_barcode_new, array(
                    'id'=>$lastId,
                    'kode'=>$kode,
                    'barcode'=>$image_name
                  ));
                }
              }

              $index++;
            }

            if(!empty($kelengkapandata_new)){
              $this->Delivery_model->insert_batch($kelengkapandata_new);               
            }
            if(!empty($kelengkapandata_barcode_new)){
             $this->Delivery_model->insert_batch_barcode($kelengkapandata_barcode_new); 
            }

            
            $lastprimary=$this->Delivery_model->get_delivery_detail_last_id();
            $lastId=$lastprimary->id;

            $index = 0; // Set index array awal dengan 0
            foreach($othername as $othernames){ // Kita buat perulangan berdasarkan nis sampai data terakhir
              if($otherid[$index]==0){
                $lastId++;

                $this->load->library('zend');
                $this->zend->load('Zend/Barcode');
                $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$kode.$lastId), array())->draw();
                $image_name     = $kode.$lastId.'.jpg';
                $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                imagejpeg($image_resource, $image_dir.$image_name); 
                array_push($otherdata_new, array(
                  'id'=>$lastId,
                  'kode'=>$kode,
                  'category'=>'0',
                  'name'=>$othernames,
                  'qty'=>$otherqty[$index],  // Ambil dan set data nama sesuai index array dari $index
                  'price'=>$otherprice[$index],
                  'unit'=>$otherunit[$index],  // Ambil dan set data telepon sesuai index array dari $index
                  'barcode'=>$image_name
                ));

                for ($jml_other = 1; $jml_other <= $otherqty[$index]; $jml_other++){
                  $image_resource = Zend_Barcode::factory('code128', 'image', array('text'=>$kode.$lastId.$jml_other), array())->draw();
                  $image_name     = $kode.$lastId.$jml_other.'.jpg';
                  $image_dir      = './assets/img/barcode/'; // penyimpanan file barcode
                  imagejpeg($image_resource, $image_dir.$image_name); 
                    array_push($otherdata_barcode_new, array(
                    'id'=>$lastId,
                    'kode'=>$kode,
                    'barcode'=>$image_name
                  ));
                }
              }
              $index++;
            }
            
            if(!empty($otherdata_new)){
              $this->Delivery_model->insert_batch($otherdata_new);   
            }
            if(!empty($otherdata_barcode_new)){
             $this->Delivery_model->insert_batch_barcode($otherdata_barcode_new);
            }

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('index.php/delivery'));

            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('index.php/delivery'));
        }

        // $data = array(
        //     'driver' => $this->input->post('driver',TRUE),
        //     'nopol' => $this->input->post('nopol',TRUE),
        //     'status' => 'driver',
        // );


        // $this->Delivery_model->update($this->input->post('kode', TRUE), $data);
    }

    public function deleteAll($id){
      $row = $this->Delivery_model->get_by_id($id);


      if ($row) {
          $this->Pending_bike_model->change_bike_status($id,'waiting');  
          $barcode_img=$this->Delivery_model->get_delivery_detail_barcode($id);
          foreach ($barcode_img as $row_imgs) {
            if ($row_imgs->barcode != "default.jpg") {
                $path = './assets/img/barcode/'.$row_imgs->barcode;
                unlink($path);
            }
          $this->Delivery_model->delete($id);
          }
          $this->Delivery_model->deleteDetailBarcode($id);
          $this->Delivery_model->deleteDetail($id);
          $this->Delivery_model->deleteReceive($id);
          $this->Delivery_model->deleteReceiveItem($id);
          $this->Delivery_model->deleteRoadMoney($id);
          $this->Delivery_model->deleteRoadMoneyDetail($id);
          $this->Delivery_model->deleteCheck($id);
          $this->Delivery_model->deleteCheckItem($id);

          $this->session->set_flashdata('message', 'Delete Record Success');
          redirect(site_url('index.php/delivery'));
      } else {
          $this->session->set_flashdata('message', 'Record Not Found');
          redirect(site_url('index.php/delivery'));
      }
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