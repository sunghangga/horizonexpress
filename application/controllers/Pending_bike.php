<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pending_bike extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pending_bike_model');
        $this->load->library('form_validation');
         $this->load->library('excel');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }

    public function index()
    {
        $pending_bike = $this->Pending_bike_model->get_all();

        $data = array(
            'pending_bike_data' => $pending_bike
        );
        $data['action'] = site_url('pending_bike/process');
        $data['actionmpm'] = site_url('pending_bike/importMPMFile');
        $data['info_upload']= '';
        $this->template->load('template','pending_bike/pending_bike_list', $data);
    }

    public function show($info)
    {
        $pending_bike = $this->Pending_bike_model->get_all();

        $data = array(
            'pending_bike_data' => $pending_bike
        );
        $data['action'] = site_url('pending_bike/process');
        $data['info_upload']= $info;
        $this->template->load('template','pending_bike/pending_bike_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Pending_bike_model->get_by_id($id);
        if ($row) {
            $data = array(
		'bike_id' => $row->bike_id,
		'bike_code' => $row->bike_code,
		'bike_color' => $row->bike_color,
		'bike_no_rangka' => $row->bike_no_rangka,
		'bike_no_mesin' => $row->bike_no_mesin,
		'bike_year' => $row->bike_year,
		'bike_faktur' => $row->bike_faktur,
	    );
            $this->template->load('template','pending_bike/pending_bike_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pending_bike'));
        }
    }


    public function process()
    {
      if ( isset($_POST['import'])) {

          $file = $_FILES['umsl']['tmp_name'];

            // Medapatkan ekstensi file csv yang akan diimport.
            $ekstensi  = explode('.', $_FILES['umsl']['name']);

            // Tampilkan peringatan jika submit tanpa memilih menambahkan file.
            if (empty($file)) {
              echo 'File tidak boleh kosong!';
            } else {
              // Validasi apakah file yang diupload benar-benar file csv.
              if (strtolower(end($ekstensi)) === 'umsl' && $_FILES["umsl"]["size"] > 0) {

                $i = 0;
                $handle = fopen($file, "r");
                while (($row = fgetcsv($handle, 0, ";"))) {
                  //$i++;
                  //if ($i == 1) continue;
                  
                  // Data yang akan disimpan ke dalam databse
                  $data = [
                    'bike_code' => $row[4],
                    'bike_color' => $row[5],
                    'bike_no_rangka' => $row[6],
                    'bike_no_mesin' => $row[7],
                    'bike_year' => $row[8],
                    'bike_faktur' => $row[12],
                  ];

                  // Simpan data ke database.
                  $this->Pending_bike_model->insert($data);
                }

                fclose($handle);
                $this->session->set_userdata('messageumsl', 'Upload File Success');
                redirect(site_url('pending_bike'));

              } else {
                $this->session->set_userdata('messageumsl', 'Upload Failed Because Invalid Format file');
                redirect(site_url('pending_bike'));
              }
            }
          }
    }

    public function importMPMFile(){
  
      //if ($this->input->post('importmpm')) {
        if ( isset($_POST['importmpm'])) {         
                $path = './upload/excel/';
                require_once APPPATH . "/third_party/PHPExcel.php";
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'xlsx|xls|csv';
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);            
                if (!$this->upload->do_upload('uploadFile')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                if(empty($error)){
                  if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;
                 
                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true,true,true);
                    $flag = true;
                    $i=0;
                    foreach ($allDataInSheet as $value) {
                      if($flag){
                        $flag =false;
                        continue;
                      }
                      $code_unit = $value['C'];
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

                      $inserdata[$i]['bike_faktur'] = $value['B'];
                      $inserdata[$i]['bike_code'] = "(".$type[1][0].")".$varian[1];
                      $inserdata[$i]['bike_no_rangka'] = $value['D'];
                      $inserdata[$i]['bike_no_mesin'] = $value['E'];
                      $inserdata[$i]['bike_color'] = $code_warna[1];
                      $inserdata[$i]['bike_year'] = $value['F'];
                      $i++;
                    }               
                    $result = $this->Pending_bike_model->insert_batch($inserdata);   
                    if($result){
                        $this->session->set_userdata('messagempm', 'Upload File Success');
                        redirect(site_url('pending_bike'));
                    }else{
                        $this->session->set_userdata('messagempm', 'Upload Failed Because Invalid Format file');
                        redirect(site_url('pending_bike'));
                    }             
      
              } catch (Exception $e) {
                   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                            . '": ' .$e->getMessage());
                }
              }else{
                  //echo $error['error'];
                $this->session->set_userdata('messagempm', 'Upload Failed Because Invalid Format file');
                redirect(site_url('pending_bike'));
                }
                 
                 
        }
        redirect(site_url('pending_bike'));
    }


    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pending_bike/create_action'),
	    'bike_id' => set_value('bike_id'),
	    'bike_code' => set_value('bike_code'),
	    'bike_color' => set_value('bike_color'),
	    'bike_no_rangka' => set_value('bike_no_rangka'),
	    'bike_no_mesin' => set_value('bike_no_mesin'),
	    'bike_year' => set_value('bike_year'),
	    'bike_faktur' => set_value('bike_faktur'),
	);
        $this->template->load('template','pending_bike/pending_bike_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'bike_code' => $this->input->post('bike_code',TRUE),
		'bike_color' => $this->input->post('bike_color',TRUE),
		'bike_no_rangka' => $this->input->post('bike_no_rangka',TRUE),
		'bike_no_mesin' => $this->input->post('bike_no_mesin',TRUE),
		'bike_year' => $this->input->post('bike_year',TRUE),
		'bike_faktur' => $this->input->post('bike_faktur',TRUE),
	    );

            $this->Pending_bike_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pending_bike'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pending_bike_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pending_bike/update_action'),
		'bike_id' => set_value('bike_id', $row->bike_id),
		'bike_code' => set_value('bike_code', $row->bike_code),
		'bike_color' => set_value('bike_color', $row->bike_color),
		'bike_no_rangka' => set_value('bike_no_rangka', $row->bike_no_rangka),
		'bike_no_mesin' => set_value('bike_no_mesin', $row->bike_no_mesin),
		'bike_year' => set_value('bike_year', $row->bike_year),
		'bike_faktur' => set_value('bike_faktur', $row->bike_faktur),
	    );
            $this->template->load('template','pending_bike/pending_bike_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pending_bike'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('bike_id', TRUE));
        } else {
            $data = array(
		'bike_code' => $this->input->post('bike_code',TRUE),
		'bike_color' => $this->input->post('bike_color',TRUE),
		'bike_no_rangka' => $this->input->post('bike_no_rangka',TRUE),
		'bike_no_mesin' => $this->input->post('bike_no_mesin',TRUE),
		'bike_year' => $this->input->post('bike_year',TRUE),
		'bike_faktur' => $this->input->post('bike_faktur',TRUE),
	    );

            $this->Pending_bike_model->update($this->input->post('bike_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pending_bike'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pending_bike_model->get_by_id($id);

        if ($row) {
            $this->Pending_bike_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pending_bike'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pending_bike'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('bike_code', 'bike code', 'trim|required');
	$this->form_validation->set_rules('bike_color', 'bike color', 'trim|required');
	$this->form_validation->set_rules('bike_no_rangka', 'bike no rangka', 'trim|required');
	$this->form_validation->set_rules('bike_no_mesin', 'bike no mesin', 'trim|required');
	$this->form_validation->set_rules('bike_year', 'bike year', 'trim|required');
	$this->form_validation->set_rules('bike_faktur', 'bike faktur', 'trim|required');

	$this->form_validation->set_rules('bike_id', 'bike_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pending_bike.php */
/* Location: ./application/controllers/Pending_bike.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-06-19 08:42:20 */
/* http://harviacode.com */