<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }

    public function index()
    {
        $customer = $this->Customer_model->get_all();

        $data = array(
            'customer_data' => $customer
        );

        $this->template->load('template','customer/customer_list', $data);
    }

    public function get_all_customer($id=null){
        if (isset($_GET['term'])) {
            $result = $this->Customer_model->search_driver($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
              $arr_result[] = array(
              'label' => $row->name,
              'address' => $row->address,
              'telephone' => $row->telephone,
            );
              echo json_encode($arr_result);
          }
        }
    }
    
    public function read($id) 
    {
        $row = $this->Customer_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id' => $row->id,
        		'name' => $row->name,
        		'address' => $row->address,
        		'telephone' => $row->telephone,
                'nip' => $row->nip,
                'photo' => $row->photo,
                'create_at' => $row->create_at,
                'update_at' => $row->update_at
        	    );
            $this->template->load('template','customer/customer_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/customer'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('index.php/customer/create_action'),
    	    'id' => set_value('id'),
    	    'name' => set_value('name'),
    	    'address' => set_value('address'),
    	    'telephone' => set_value('telephone'),
            'nip' => set_value('nip'),
            'photo' => set_value('photo'),
	    );
        $this->template->load('template','customer/customer_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        
        

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $config['upload_path']          = './assets/img/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['file_name']            = 'profile-'.date('ymd').'-'.substr(md5(rand()), 0, 10);
            $config['overwrite']            = true;
            $config['max_size']             = 2048;
            $this->load->library('upload', $config);

            //upload file
            if ($this->upload->do_upload('photo')) {
              $uploadData = $this->upload->data(); 
              $filename = $uploadData['file_name'];
              $data = array(
              'name' => $this->input->post('name',TRUE),
              'address' => $this->input->post('address',TRUE),
              'telephone' => $this->input->post('telephone',TRUE),
              'nip' => $this->input->post('nip',TRUE),
              'photo' => $filename,
              'create_at' => date('Y-m-d h:m:s')
                );

                $this->Customer_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
            }else{
                echo "gagal upload";
            }
            
            redirect(site_url('index.php/customer'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('index.php/customer/update_action'),
        		'id' => set_value('id', $row->id),
                'nip' => set_value('id', $row->nip),
                'photo' => set_value('photo', $row->photo),
        		'name' => set_value('name', $row->name),
        		'address' => set_value('address', $row->address),
        		'telephone' => set_value('telephone', $row->telephone)
        	    );
            $this->template->load('template','customer/customer_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/customer'));
        }
    }
    
    public function _updateImage()
    {
        $row = $this->Customer_model->get_by_id($this->input->post('id', TRUE));

        $config['upload_path']          = './assets/img/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = 'profile-'.date('ymd').'-'.substr(md5(rand()), 0, 10);
        $config['overwrite']            = true;
        $config['max_size']             = 2048;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('photo')) {
          $uploadData = $this->upload->data(); 
          return $uploadData['file_name'];
        }
        else{
            return $row->photo;
        }
    }

    public function update_action() 
    {
        $this->_rules();

        $row = $this->Customer_model->get_by_id($this->input->post('id', TRUE));

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            if ($_FILES['photo']['size'] != 0) {
                if ($row->photo != "default.jpg") {
                    $path = './assets/img/'.$row->photo;
                    unlink($path);
                }
                $present_photo = $this->_updateImage();
            } else {
                $present_photo = $row->photo;
            }

          $data = array(
          'name' => $this->input->post('name',TRUE),
          'address' => $this->input->post('address',TRUE),
          'telephone' => $this->input->post('telephone',TRUE),
          'nip' => $this->input->post('nip',TRUE),
          'photo' => $present_photo,
            );

          
            $this->Customer_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('index.php/customer'));
        }
        
    }
    
    public function delete($id) 
    {
        $row = $this->Customer_model->get_by_id($id);

        if ($row->photo != "default.jpg") {
            $path = './assets/img/'.$row->photo;
            unlink($path);
        }

        if ($row) {
            $this->Customer_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('index.php/customer'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('index.php/customer'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('telephone', 'telephone', 'trim');
	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "customer.xls";
        $judul = "customer";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Name");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Telephone");
	xlsWriteLabel($tablehead, $kolomhead++, "Create At");
	xlsWriteLabel($tablehead, $kolomhead++, "Update At");

	foreach ($this->Customer_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteNumber($tablebody, $kolombody++, $data->telephone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->create_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->update_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-14 05:52:24 */
/* http://harviacode.com */