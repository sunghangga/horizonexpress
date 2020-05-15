<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('login', 'refresh');}
    }

    public function index()
    {
        $user = $this->User_model->get_all();

        $data = array(
            'user_data' => $user
        );

         $this->template->load('template','user/user_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'username' => $row->username,
		'password' => $row->password,
		'nama' => $row->nama,
		'telpon' => $row->telpon,
		'alamat' => $row->alamat,
		'level' => $row->level,
	    );
            $this->template->load('template','user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'id' => set_value('id'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'nama' => set_value('nama'),
	    'telpon' => set_value('telpon'),
	    'alamat' => set_value('alamat'),
	    'level' => set_value('level'),
	);
        $this->template->load('template','user/user_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->bcrypt->hash_password($this->input->post('password')),
		'nama' => $this->input->post('nama',TRUE),
		'telpon' => $this->input->post('telpon',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'id' => set_value('id', $row->id),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'nama' => set_value('nama', $row->nama),
		'telpon' => set_value('telpon', $row->telpon),
		'alamat' => set_value('alamat', $row->alamat),
		'level' => set_value('level', $row->level),
	    );
            $this->template->load('template','user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'password' => $this->bcrypt->hash_password($this->input->post('password')),
		'nama' => $this->input->post('nama',TRUE),
		'telpon' => $this->input->post('telpon',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'level' => $this->input->post('level',TRUE),
	    );

            $this->User_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('telpon', 'telpon', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function pdf()
    {
        $data = array(
            'user_data' => $this->User_model->get_all(),
            'start' => 0
        );
        
        ini_set('memory_limit', '32M');
        $html = $this->load->view('user_pdf', $data, true);
        $this->load->library('pdf');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html);
        $pdf->Output('user.pdf', 'D'); 
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-16 13:59:02 */
/* http://harviacode.com */