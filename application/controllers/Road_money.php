<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Road_money extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Road_money_model','Delivery_model','Receive_model','Company_model','Driver_model','Truck_model'));
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }

    public function index()
    {
        $road_money = $this->Road_money_model->get_all();

        $data = array(
            'road_money_data' => $road_money
        );

        $this->template->load('template','roadmoney/road_money_list', $data);
    }

    public function get_all_kode($id=null){
        if (isset($_GET['term'])) {
            $result = $this->Delivery_model->search_kode($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
              $arr_result[] = array(
              'label' => $row->kode,
            );
              echo json_encode($arr_result);
          }
        }
    }

    public function range(){
        $first = $_GET['first'];
        $last = $_GET['last'];
        $data = $this->Road_money_model->get_range($first,$last);
        echo json_encode($data);
    }

    public function pdfJalan($id=null){
        $company = $this->Company_model->get_all();
        $row = $this->Road_money_model->get_by_id_complete($id);
        $row_del = $this->Delivery_model->get_by_id($row->kode);
        $row_driver = $this->Driver_model->get_by_id($row_del->driver);
        $row_truck = $this->Truck_model->get_by_id($row_del->nopol);
        $row_price = $this->Road_money_model->get_price($row->kode);
        $dt = new DateTime($row->create_at);
        $date = $dt->format('Y-m-d');
        if ($row) {
            $data = array(
                'logo' => $company->logo,
                'name' => $company->name,
                'tlp' => $company->tlp,
            'kode' => $row->kode,
            'table' => $row->table_money,
            'nopol' => $row_truck->nopol,
            'driver' => $row_driver->name,
            'pulse' => $row->pulse,
            'price' => $row_price['price'] + $row->table_money + $row->pulse,
            'kota' => $row_del->name_regency,
            'create_at' => date_indo($date),
            'update_at' => $row->update_at,
            'get_roadmoney_detail_by_id' => $this->Road_money_model->get_roadmoney_detail_by_id($row->kode),
            'kode_month'=>date('m', strtotime($row->create_kode)),
            'kode_year'=>date('Y', strtotime($row->create_kode)),
        );
            $this->load->library("mypdf");
            $this->mypdf->generate("laporan/uangJalan","A5","landscape","Bukti Uang Jalan - ".$data['kode'],$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/road_money'));
        }
    }

    public function read($id) 
    {
        $row = $this->Road_money_model->get_by_id($id);
        $row_detail = $this->Road_money_model->get_roadmoney_detail_by_id($row->kode);
        if ($row) {
            $data = array(
            'button' => 'Update',
            'action' => site_url('index.php/road_money/update_action'),
            'id' => set_value('id', $row->id),
            'kode' => set_value('kode', $row->kode),
            'table_money' => set_value('table_money', $row->table_money),
            'pulse' => set_value('pulse', $row->pulse),
            'postage' => set_value('postage', $row_detail[0]->postage),
            'price' => set_value('price', $row_detail[0]->price),
            'get_roadmoney_detail_by_id' => $row_detail,
		      'create_at' => $row->create_at,
	    );
            $this->template->load('template','roadmoney/road_money_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/road_money'));

        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/road_money/create_action'),
	    'id' => set_value('id'),
	    'kode' => set_value('kode'),
	    'table_money' => set_value('table_money'),
	    'pulse' => set_value('pulse'),
        'get_all_kode' => $this->Delivery_model->get_kode_by_status_road_money("driver","received"),
	);
        $this->template->load('template','roadmoney/road_money_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            if(!$this->Road_money_model->exist_row_check('kode',$this->input->post('kode',TRUE))>0){
              $data = array(
                'kode' => $this->input->post('kode',TRUE),
                'table_money' => $this->input->post('table_money',TRUE),
                'pulse' => $this->input->post('pulse',TRUE),
                'create_at' => date('Y-m-d h:m:s')
                );

                $this->Road_money_model->insert($data);

                $kode = $this->input->post('kode');
                $postage = $this->input->post('postage'); 
                $money = $this->input->post('money'); 
                $roadmoney = array();
                
                $index = 0; // Set index array awal dengan 0
                foreach($postage as $postages){ // Kita buat perulangan berdasarkan nis sampai data terakhir
                  array_push($roadmoney, array(
                    'kode'=>$kode,
                    'postage'=>$postage[$index],  
                    'price'=>$money[$index],
                  ));
                  
                  $index++;
                }
                
                $this->Road_money_model->insert_batch($roadmoney); 

                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('index.php/road_money'));
            }
            else {
                
                $this->create();
            }
        }
    }

    public function check_default($value)
    {
        if(!$this->Road_money_model->exist_row_check('kode',$value)>0){
            return TRUE;
        }
        else{
            $this->form_validation->set_message('check_default', 'Kode has been created');
            return FALSE;
        }
    }
    
    public function update($id) 
    {
        $row = $this->Road_money_model->get_by_id($id);
        $row_detail = $this->Road_money_model->get_roadmoney_detail_by_id($row->kode);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/road_money/update_action'),
        		'id' => set_value('id', $row->id),
        		'kode' => set_value('kode', $row->kode),
        		'table_money' => set_value('table_money', $row->table_money),
        		'pulse' => set_value('pulse', $row->pulse),
                'postage' => set_value('postage', $row_detail[0]->postage),
                'price' => set_value('price', $row_detail[0]->price),
                'get_roadmoney_detail_by_id' => $row_detail,
	    );
            $this->template->load('template','roadmoney/road_money_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/road_money'));
        }
    }
    
    public function update_action() 
    {
      $this->_update_rules(); 

      

      if ($this->form_validation->run() == FALSE) {
          $this->update($this->input->post('id', TRUE));
      } else {

        $row = $this->Road_money_model->get_by_id($this->input->post('id', TRUE));

      $this->Road_money_model->deleteKode($row->kode);
      $this->Road_money_model->deleteKodeDetail($row->kode);

            $data = array(
              'kode' => $row->kode,
              'table_money' => $this->input->post('table_money',TRUE),
              'pulse' => $this->input->post('pulse',TRUE),
              'create_at' => date('Y-m-d h:m:s')
              );

              $this->Road_money_model->insert($data);

              $kode = $row->kode;
              $postage = $this->input->post('postage'); 
              $money = $this->input->post('money'); 
              $roadmoney = array();
              
              $index = 0; // Set index array awal dengan 0
              foreach($postage as $postages){ // Kita buat perulangan berdasarkan nis sampai data terakhir
                array_push($roadmoney, array(
                  'kode'=>$kode,
                  'postage'=>$postage[$index],  
                  'price'=>$money[$index],
                ));
                
                $index++;
              }
              
              $this->Road_money_model->insert_batch($roadmoney); 

              $this->session->set_flashdata('message', 'Create Record Success');
              redirect(site_url('index.php/road_money'));
      }
     //    $this->_update_rules();

     //    $row = $this->Road_money_model->get_by_id($this->input->post('id', TRUE));

     //    if ($this->form_validation->run() == FALSE) {
     //        $this->update($this->input->post('id', TRUE));
     //    } else {
     //        $data = array(
    	// 	'kode' => $row->kode,
    	// 	'table_money' => $this->input->post('table_money',TRUE),
    	// 	'pulse' => $this->input->post('pulse',TRUE),
	    // );

     //        $this->Road_money_model->update($this->input->post('id', TRUE), $data);

     //        $kode = $row->kode;
     //        $id_detail = $this->input->post('id_detail');
     //        $postage = $this->input->post('postage'); 
     //        $money = $this->input->post('money'); 
     //        $roadmoney = array();
            
     //        $index = 0; // Set index array awal dengan 0
     //        foreach($postage as $postages){ // Kita buat perulangan berdasarkan nis sampai data terakhir
     //          array_push($roadmoney, array(
     //            'id'=>$id_detail[$index],
     //            'kode'=>$kode,
     //            'postage'=>$postage[$index],  
     //            'price'=>$money[$index],
     //          ));
              
     //          $index++;
     //        }
     //        echo json_encode($roadmoney);
     //        $this->Road_money_model->update_batch($roadmoney); 

     //        $this->session->set_flashdata('message', 'Update Record Success');
     //        redirect(site_url('index.php/road_money'));
     //    }
    }
    
    public function delete($id) 
    {
        $row = $this->Road_money_model->get_by_id($id);

        if ($row) {
            $this->Road_money_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('index.php/road_money'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/road_money'));
        }
    }

    public function deleteAll($id){
          $this->Road_money_model->deleteKode($id);
          $this->Road_money_model->deleteKodeDetail($id);
          $this->session->set_flashdata('message', 'Delete Record Success');
          redirect(site_url('index.php/road_money'));
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('kode','kode','trim|required|callback_check_default');
    	// $this->form_validation->set_rules('kode', 'kode', 'trim|required');
    	$this->form_validation->set_rules('table_money', 'table money', 'trim|required');
    	$this->form_validation->set_rules('pulse', 'pulse', 'trim|required');

    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _update_rules() 
    {
        $this->form_validation->set_rules('table_money', 'table money', 'trim|required');
        $this->form_validation->set_rules('pulse', 'pulse', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Road_money.php */
/* Location: ./application/controllers/Road_money.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-28 01:52:21 */
/* http://harviacode.com */