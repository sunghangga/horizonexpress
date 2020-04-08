<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Delivery_model','Customer_model','Driver_model'));
        if($this->session->userdata('user_logedin') != 'TRUE'){ redirect('index.php/login', 'refresh');}
    }

  
    function index(){
      $this->template->load('template','beranda');
    }


    public function get_count(){
      $data =
        array(
          'delivery'=> $this->Delivery_model->get_count(),
          'driver'=> $this->Driver_model->get_count(),
          'customer'=> $this->Customer_model->get_count(),
        );
      echo json_encode($data);
    }

    public function data_delivery(){
      $data = $this->Delivery_model->get_count_week();
      echo json_encode($data);
    }
}