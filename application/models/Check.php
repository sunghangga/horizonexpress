<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Check extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Check_model','Delivery_model','Company_model'));
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }

    public function index()
    {
        $check = $this->Check_model->get_all();

        $data = array(
            'check_data' => $check
        );


        $this->template->load('template','check/check_list', $data);
    }

    public function range(){
        $first = $_GET['first'];
        $last = $_GET['last'];
        //echo json_encode($last);
        $data = $this->Check_model->get_range($first,$last);
        echo json_encode($data);
    }

    public function read($id) 
    {
        $row = $this->Check_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id' => $row->id,
        		'kode' => $row->kode,
        		'examiner' => $row->examiner,
                'date_check' => $row->date_check,
        		'create_at' => $row->create_at,
        	    );
            $this->template->load('template','check/check_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/check'));
        }
    }

    public function create() 
    {
        $data = array(
          'button' => 'Create',
          'action' => site_url('index.php/check/create_action'),
    	    'id' => set_value('id'),
    	    'kode' => set_value('kode'),
    	    'examiner' => set_value('examiner'),
          'date_check' => set_value('date_check'),
          'get_all_kode' => $this->Delivery_model->get_all_kode_by_status("received"),
            //'get_all_kode' => $this->Delivery_model->get_all_kode(),
          'get_all_status' => array('RUSAK','TIDAK RUSAK')
	);
        $this->template->load('template','check/check_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'kode' => $this->input->post('kode',TRUE),
        		'examiner' => $this->input->post('examiner',TRUE),
                'date_check' => $this->input->post('date_item',TRUE),
        		'create_at' => $this->input->post('date_item',TRUE)
        	    );

            $this->Check_model->insert($data);

            $status = $this->input->post('status_item');
            $kode = $this->input->post('kode');
            // $fotos = $_FILES['foto']['name'];
            $itemID = $this->input->post('itemID'); 
            $name = $this->input->post('name_item'); 
            $gejala = $this->input->post('gejala_item');
            $penyebab = $this->input->post('penyebab_item');
            $engine = $this->input->post('engine_item'); 
            $frame = $this->input->post('frame_item'); 
            $type = $this->input->post('type_item');
            $solusi = $this->input->post('solusi_item'); 
            $keterangan = $this->input->post('keterangan_item');
            $category= $this->input->post('category_item');

            $itemdata = array();
            $index = 0; // Set index array awal dengan 0

            $files = $_FILES; 
            
            foreach($name as $names){ // Kita buat perulangan berdasarkan nis sampai data terakhir
              if($status[$index] =="1"){

                $config['upload_path']          = './upload/check/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = 'check-'.date('ymd').'-'.substr(md5(rand()), 0, 10);
                $config['overwrite']            = true;
                $config['max_size']             = 2048;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $_FILES['foto']['name'] = $files['foto']['name'][$index];
                $_FILES['foto']['type'] = $files['foto']['type'][$index];
                $_FILES['foto']['tmp_name'] = $files['foto']['tmp_name'][$index];
                $_FILES['foto']['error'] = $files['foto']['error'][$index];
                $_FILES['foto']['size'] = $files['foto']['size'][$index];

                //upload file
                if ($this->upload->do_upload('foto')) {
                  $uploadData = $this->upload->data(); 
                  $foto = $uploadData['file_name'];
                }else{
                  $error = array('error' => $this->upload->display_errors());
                  echo json_encode($error);
                  $foto = null;
                }

                array_push($itemdata, array(
                  //'id' => $itemID[$index],
                  'kode'=>$kode,
                  'status'=>$status[$index],
                  'item'=>$name[$index],  
                  'foto'=>$foto,
                  'gejala'=>$gejala[$index],
                  'penyebab'=>$penyebab[$index],  
                  'engine'=>$engine[$index],
                  'frame'=>$frame[$index],
                  'type'=>$type[$index],  
                  'solusi'=>$solusi[$index],
                  'keterangan'=>$keterangan[$index],
                  'category'=>$category[$index]
                ));
                
              }
              else{
                array_push($itemdata, array(
                  //'id' => $itemID[$index],
                  'kode'=>$kode,
                  'status'=>$status[$index],
                  'item'=>$name[$index],  
                  'foto'=>null,
                  'gejala'=>null,
                  'penyebab'=>null,  
                  'engine'=>null,
                  'frame'=>null,
                  'type'=>null,  
                  'solusi'=>null,
                  'keterangan'=>null,
                  'category'=>$category[$index]
                ));
              }
              $index++;
            }
            $this->Check_model->insert_batch($itemdata); 
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('index.php/check'));
        }
    }

    public function pdfPeriksa($id=null){
        $company = $this->Company_model->get_all();
        $row = $this->Check_model->get_by_id($id);
        $row_del = $this->Delivery_model->get_by_id($row->kode);
        $row_detail = $this->Check_model->get_detail($row->kode);
        $dt = new DateTime($row->create_at);
        $dt2 = new DateTime($row->date_check);
        $date = $dt->format('Y-m-d');
        $date2 = $dt2->format('Y-m-d');

        if ($row) {
            $data = array(
                'logo' => $company->logo,
                'name' => $company->name,
                'tlp' => $company->tlp,
            'kode' => $row->kode,
            'examiner' => $row->examiner,
            'date_check' => date_indo($date2),
            'create_at' => date_indo($date),
            'nopol' => $row_del->nopol,
            'driver' => $row_del->driver,
            'get_check_detail_by_id' => $row_detail,
        );
            $this->load->library("mypdf");
            $this->mypdf->generate("laporan/periksaUnit","A4","landscape","Pemeriksaan Unit - ".$data['kode'],$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/check'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Check_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/check/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('kode', $row->kode),
		'examiner' => set_value('examiner', $row->examiner),
        'date_check' => set_value('date_check', $row->date_check),
	    );
            $this->template->load('template','check/check_update_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/check'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
            'kode' => $this->input->post('kode',TRUE),
            'examiner' => $this->input->post('examiner',TRUE),
            'date_check' => $this->input->post('date_item',TRUE),
            'create_at' => $this->input->post('date_item',TRUE)
              );

            $this->Check_model->update($this->input->post('id', TRUE), $data);

            $status = $this->input->post('status_item');
            $itemID = $this->input->post('itemID'); 
            $name = $this->input->post('name_item'); 
            $gejala = $this->input->post('gejala_item');
            $penyebab = $this->input->post('penyebab_item');
            $engine = $this->input->post('engine_item'); 
            $frame = $this->input->post('frame_item'); 
            $type = $this->input->post('type_item');
            $solusi = $this->input->post('solusi_item'); 
            $keterangan = $this->input->post('keterangan_item');

            $itemdata = array();
            $index = 0; // Set index array awal dengan 0

            $files = $_FILES; 
           
            $row = $this->Delivery_model->get_check_item_by_id($this->input->post('kode',TRUE));

            foreach($name as $names){ // Kita buat perulangan berdasarkan nis sampai data terakhir
              //get nama file foto

              if($files['foto']['name'][$index]!="" && $status[$index] =="1"){  
                $config['upload_path']          = './upload/check/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                
                $dapatFoto = $row[$index]->foto;
                if($dapatFoto!=null){
                  $config['file_name']  = $dapatFoto;
                }
                else{
                  $config['file_name']  = 'check-'.date('ymd').'-'.substr(md5(rand()), 0, 10);
                }
                
                $config['overwrite']            = true;
                $config['max_size']             = 2048;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $_FILES['foto']['name'] = $files['foto']['name'][$index];
                $_FILES['foto']['type'] = $files['foto']['type'][$index];
                $_FILES['foto']['tmp_name'] = $files['foto']['tmp_name'][$index];
                $_FILES['foto']['error'] = $files['foto']['error'][$index];
                $_FILES['foto']['size'] = $files['foto']['size'][$index];

                //upload file
                if ($this->upload->do_upload('foto')) {
                  $uploadData = $this->upload->data(); 
                  $foto = $uploadData['file_name'];
                }else{
                   $error = array('error' => $this->upload->display_errors());
                   echo json_encode($error);
                  $foto = null;
                }
              }
              else{
                $foto = $row[$index]->foto;
              }

              if($status[$index] =="1"){
                $itemdata = array(
                  //'id' => $itemID[$index],
                  'status'=>$status[$index],
                  'item'=>$name[$index],  
                  'foto'=>$foto,
                  'gejala'=>$gejala[$index],
                  'penyebab'=>$penyebab[$index],  
                  'engine'=>$engine[$index],
                  'frame'=>$frame[$index],
                  'type'=>$type[$index],  
                  'solusi'=>$solusi[$index],
                  'keterangan'=>$keterangan[$index]
                );
              }
              else{
                $itemdata = array(
                  //'id' => $itemID[$index],
                  'status'=>$status[$index],
                  'item'=>$name[$index],  
                  'foto'=>null,
                  'gejala'=>null,
                  'penyebab'=>null,  
                  'engine'=>null,
                  'frame'=>null,
                  'type'=>null,  
                  'solusi'=>null,
                  'keterangan'=>null
                );
              }
              
              $this->Check_model->update_batch($itemID[$index],$itemdata); 

              $index++;
             }

            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('index.php/check'));    
         }
    }
    
    public function delete($id) 
    {
        $row = $this->Check_model->get_by_id($id);

        if ($row) {
            $this->Check_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('index.php/check'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/check'));
        }
    }

    public function deleteAll($id){
      $this->Check_model->deleteKode($id);
      $this->Check_model->deleteKodeDetail($id);
      $this->session->set_flashdata('message', 'Delete Record Success');
      redirect(site_url('index.php/check'));
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('examiner', 'examiner', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Check.php */
/* Location: ./application/controllers/Check.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-31 04:41:27 */
/* http://harviacode.com */