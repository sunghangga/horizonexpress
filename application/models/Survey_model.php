<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Survey_model extends CI_Model
{

    public $table1 = 'survey';
    public $table = 'sales_credit_lists';
    public $id = 'sv_no';
    public $order = 'DESC';
    private $db_jmb;

    function __construct()
    {
        parent::__construct();
        $this->db_jmb = $this->load->database('jmb', TRUE);
    }

    function get_team()
    {
      $this->db_jmb->select('sgm_code,sgm_account');
      $this->db_jmb->where('sgm_code!=', 'TL_JMB');
      $this->db_jmb->where('sgm_code!=', 'SPV_TL_JMB');
      $this->db_jmb->order_by('sgm_account', $this->order);
      return $this->db_jmb->get('salesmangroup_masters')->result();
    }

    function get_svno($svno)
    {
      $this->db_jmb->where('sv_no', $svno);
      $this->db_jmb->where('ori_code', 'JMB');
      $this->db_jmb->order_by('modi_date', $this->order);
      $query =$this->db_jmb->get($this->table);

      $array = array();
      foreach ($query->result() as $row)
      {
        // jumlah warna
        $this->db->join('user', 'user.id=warna.user_id');
        $this->db->where('user.sgm_code', $row->sgm_code);
        $count = $this->db->count_all_results('warna');
        //cek jumlah warna
        if($count>0){
          $this->db->join('user', 'user.id=warna.user_id');
          $this->db->where('user.sgm_code', $row->sgm_code);
          $warna = $this->db->get('warna')->row();
          $label = $warna->nama;
          $color = $warna->kode;
        }else{
          $label = null;
          $color = null;
        }
        $array[] = array(
          'sv_date'=> $row->sv_date,
          'sv_result'=> $row->sv_result,
          'cust_name'=> $row->cust_name,
          'slm_name'=> $row->slm_name,
          'itm_name'=> $row->itm_name,
          'cl_name'=> $row->cl_name,
          'sv_dpsetor'=> $row->sv_dpsetor,
          'fc_code'=> $row->fc_code,
          'sv_no'=> $row->sv_no,
          'leader'=> $row->leader,
          'sgm_code'=> $row->sgm_code,
          'ori_by'=> $row->ori_by,
          'label'=> $label,
          'color'=> $color
        );
      }

      return $array;
    }
    
    function get_range($first,$last,$status,$team=null)
    {
        if($status != 'ALL'){
          $this->db_jmb->where('sv_result', $status);
        }
        $this->db_jmb->where('sv_date>=', $first);
        $this->db_jmb->where('sv_date<=', $last);
        $this->db_jmb->where('ori_code', 'JMB');
        if ($this->session->userdata('user_level') == '2') {
          $this->db_jmb->where('sgm_code', $team);
        }
        $this->db_jmb->order_by('sv_date', $this->order);
        return $this->db_jmb->get($this->table)->result();
    }

      function get_status($date,$status,$team)
    {
      $tgl = explode("-", $date);
      $this->db_jmb->where("date_part('year', sv_date)=", $tgl[0]);
      // cek status ditolak
      if($status == "CANCEL"){
        $this->db_jmb->where("date_part('month', sv_date)=", $tgl[1]);
      }
      $this->db_jmb->where('sv_result', $status);
      $this->db_jmb->where('ori_code', 'JMB');
       // cek team leader
      if($team!='ALL'){
        $this->db_jmb->where('sgm_code', $team);
      }
      $this->db_jmb->order_by('modi_date', $this->order);
      $query =$this->db_jmb->get($this->table);

      $array = array();
      foreach ($query->result() as $row)
      {
        // jumlah comment
        $this->db->where('sv_no', $row->sv_no);
        $count = $this->db->count_all_results('comment');
        //cek jumlah comment
        if($count>0){
          $this->db->where('sv_no', $row->sv_no);
          $this->db->order_by('create_at', 'DESC');
          $this->db->limit(1);
          $comment = $this->db->get('comment')->row();
          $tgl_comment = $comment->create_at;
        }else{
          $tgl_comment = null;
        }

        // jumlah warna
        $this->db->join('user', 'user.id=warna.user_id');
        $this->db->where('user.sgm_code', $row->sgm_code);
        $count_warna = $this->db->count_all_results('warna');
        //cek jumlah warna
        if($count_warna>0){
          $this->db->join('user', 'user.id=warna.user_id');
          $this->db->where('user.sgm_code', $row->sgm_code);
          $warna = $this->db->get('warna')->row();
          $color = $warna->kode;
        }else{
          $color = null;
        }

        $array[] = array(
          'sv_date'=> $row->sv_date,
          'sv_result'=> $row->sv_result,
          'itm_name'=> $row->itm_name,
          'cl_name'=> $row->cl_name,
          'sv_dpsetor'=> $row->sv_dpsetor,
          'fc_code'=> $row->fc_code,
          'sv_no'=> $row->sv_no,
          'leader'=> $row->leader,
          'sgm_code'=> $row->sgm_code,
          'ori_by'=> $row->ori_by,
          'cust_name'=> $row->cust_name,
          'slm_name'=> $row->slm_name,
          'tgl_cm' => $tgl_comment,
          'count'=>$count,
          'color'=>$color
        );
      }

      return $array;
    }

    function get_acc($date,$team)
    {
      $tgl = explode("-", $date);
      //$this->db_jmb->where("date_part('month', sv_date)=", $tgl[1]);
      $this->db_jmb->where("date_part('year', sv_date)=", $tgl[0]);
      $this->db_jmb->where('sv_result', 'ACC');
      $this->db_jmb->where('ori_code', 'JMB');
      $this->db_jmb->where('astate', '0');
      // cek team leader
      if($team!='ALL'){
        $this->db_jmb->where('sgm_code', $team);
      }
      $this->db_jmb->order_by('modi_date', $this->order);
      $query =$this->db_jmb->get($this->table);

      $array = array();
      foreach ($query->result() as $row)
      {
        // jumlah comment
        $this->db->where('sv_no', $row->sv_no);
        $count = $this->db->count_all_results('comment');
        //cek jumlah comment
        if($count>0){
          $this->db->where('sv_no', $row->sv_no);
          $this->db->order_by('create_at', 'DESC');
          $this->db->limit(1);
          $comment = $this->db->get('comment')->row();
          $tgl_comment = $comment->create_at;
        }else{
          $tgl_comment = null;
        }

        // jumlah warna
        $this->db->join('user', 'user.id=warna.user_id');
        $this->db->where('user.sgm_code', $row->sgm_code);
        $count_warna = $this->db->count_all_results('warna');
        //cek jumlah warna
        if($count_warna>0){
          $this->db->join('user', 'user.id=warna.user_id');
          $this->db->where('user.sgm_code', $row->sgm_code);
          $warna = $this->db->get('warna')->row();
          $color = $warna->kode;
        }else{
          $color = null;
        }

        $array[] = array(
          'sv_date'=> $row->sv_date,
          'sv_result'=> $row->sv_result,
          'itm_name'=> $row->itm_name,
          'cl_name'=> $row->cl_name,
          'sv_dpsetor'=> $row->sv_dpsetor,
          'fc_code'=> $row->fc_code,
          'sv_no'=> $row->sv_no,
          'leader'=> $row->leader,
          'sgm_code'=> $row->sgm_code,
          'ori_by'=> $row->ori_by,
          'cust_name'=> $row->cust_name,
          'slm_name'=> $row->slm_name,
          'tgl_cm' => $tgl_comment,
          'count'=>$count,
          'color'=>$color
        );
      }
      return $array;
    }

    function get_do($date,$team)
    {
      $tgl = explode("-", $date);
      $this->db_jmb->where("date_part('year', sv_date)=", $tgl[0]);
      $this->db_jmb->where("date_part('month', sv_date)=", $tgl[1]);
      $this->db_jmb->where('sv_result', 'ACC');
      $this->db_jmb->where('astate', '1');
      $this->db_jmb->where('ori_code', 'JMB');
      // cek team leader
      if($team!='ALL'){
        $this->db_jmb->where('sgm_code', $team);
      }
      $this->db_jmb->order_by('modi_date', $this->order);
      $query =$this->db_jmb->get($this->table);

      $array = array();
      foreach ($query->result() as $row)
      {
        // jumlah comment
        $this->db->where('sv_no', $row->sv_no);
        $count = $this->db->count_all_results('comment');
        //cek jumlah comment
        if($count>0){
          $this->db->where('sv_no', $row->sv_no);
          $this->db->order_by('create_at', 'DESC');
          $this->db->limit(1);
          $comment = $this->db->get('comment')->row();
          $tgl_comment = $comment->create_at;
        }else{
          $tgl_comment = null;
        }

        // jumlah warna
        $this->db->join('user', 'user.id=warna.user_id');
        $this->db->where('user.sgm_code', $row->sgm_code);
        $count_warna = $this->db->count_all_results('warna');
        //cek jumlah warna
        if($count_warna>0){
          $this->db->join('user', 'user.id=warna.user_id');
          $this->db->where('user.sgm_code', $row->sgm_code);
          $warna = $this->db->get('warna')->row();
          $color = $warna->kode;
        }else{
          $color = null;
        }

        $array[] = array(
         'sv_date'=> $row->sv_date,
          'sv_result'=> $row->sv_result,
          'itm_name'=> $row->itm_name,
          'cl_name'=> $row->cl_name,
          'sv_dpsetor'=> $row->sv_dpsetor,
          'fc_code'=> $row->fc_code,
          'sv_no'=> $row->sv_no,
          'leader'=> $row->leader,
          'sgm_code'=> $row->sgm_code,
          'ori_by'=> $row->ori_by,
          'cust_name'=> $row->cust_name,
          'slm_name'=> $row->slm_name,
          'tgl_cm' => $tgl_comment,
          'count'=>$count,
          'color'=>$color
        );
      }

      return $array;
    }

    /*function get_data($date,$team)
    {
      $tgl = explode("-", $date);
      $this->db_jmb->select('sv_date,sv_result,cust_name,slm_name,itm_name,cl_name,sv_dpsetor,fc_code,sv_no,sv_plandate,leader,astate,ori_by');
      $this->db_jmb->where("date_part('year', sv_date)=", $tgl[0]);
      $this->db_jmb->where("date_part('month', sv_date)=", $tgl[1]);
      $this->db_jmb->where('ori_code', 'JMB');
      if($team!='ALL'){
        $this->db_jmb->where('sgm_code', $team);
      }
      $this->db_jmb->order_by('modi_date', $this->order);
      return $this->db_jmb->get($this->table)->result();
    }

    function get_count($date,$team)
    {
      $tgl = explode("-", $date);
      $this->db_jmb->where("date_part('year', sv_date)=", $tgl[0]);
      $this->db_jmb->where("date_part('month', sv_date)=", $tgl[1]);
      $this->db_jmb->where('sv_result', $status);
      $this->db_jmb->where('ori_code', 'JMB');
      if($team!='ALL'){
        $this->db_jmb->where('sgm_code', $team);
      }
      return $this->db_jmb->count_all_results($this->table);
    }

    function get_status($date,$status,$team)
    {
      $tgl = explode("-", $date);
      $this->db_jmb->select('sv_date,sv_result,cust_name,slm_name,itm_name,cl_name,sv_dpsetor,fc_code,sv_no,sv_plandate,leader,ori_by');
      $this->db_jmb->where("date_part('year', sv_date)=", $tgl[0]);
      // cek status ditolak
      if($status == "CANCEL"){
        $this->db_jmb->where("date_part('month', sv_date)=", $tgl[1]);
      }
      $this->db_jmb->where('sv_result', $status);
      $this->db_jmb->where('ori_code', 'JMB');
       // cek team leader
      if($team!='ALL'){
        $this->db_jmb->where('sgm_code', $team);
      }
      $this->db_jmb->order_by('modi_date', $this->order);
      return $this->db_jmb->get($this->table)->result();
    }

    function get_count_status($date,$status,$team)
    {
      $tgl = explode("-", $date);
      $this->db_jmb->where("date_part('year', sv_date)=", $tgl[0]);
      // cek status ditolak
      if($status == "CANCEL"){
        $this->db_jmb->where("date_part('month', sv_date)=", $tgl[1]);
      }
      $this->db_jmb->where('sv_result', $status);
      $this->db_jmb->where('ori_code', 'JMB');
      // cek team leader
      if($team!='ALL'){
        $this->db_jmb->where('sgm_code', $team);
      }
      return $this->db_jmb->count_all_results($this->table);
    }

    function get_do($date,$team)
    {
      $tgl = explode("-", $date);
      $this->db_jmb->select('sv_date,sv_result,cust_name,slm_name,itm_name,cl_name,sv_dpsetor,fc_code,sv_no,sv_plandate,leader,allproc,ori_by');
      $this->db_jmb->where("date_part('year', sv_date)=", $tgl[0]);
      $this->db_jmb->where("date_part('month', sv_date)=", $tgl[1]);
      $this->db_jmb->where('sv_result', 'ACC');
      $this->db_jmb->where('astate', '1');
      $this->db_jmb->where('ori_code', 'JMB');
      // cek team leader
      if($team!='ALL'){
        $this->db_jmb->where('sgm_code', $team);
      }
      $this->db_jmb->order_by('modi_date', $this->order);
      return $this->db_jmb->get('sales_credit_lists')->result();
    }

    function get_count_do($date,$team)
    {
      $tgl = explode("-", $date);
      $this->db_jmb->where("date_part('year', sv_date)=", $tgl[0]);
      $this->db_jmb->where("date_part('month', sv_date)=", $tgl[1]);
      $this->db_jmb->where('sv_result', 'ACC');
      $this->db_jmb->where('astate', '1');
      $this->db_jmb->where('ori_code', 'JMB');
      // cek team leader
      if($team!='ALL'){
        $this->db_jmb->where('sgm_code', $team);
      }
      return $this->db_jmb->count_all_results('sales_credit_lists');
    }

    function get_acc($date,$team)
    {
      $tgl = explode("-", $date);
      $this->db_jmb->select('sv_date,sv_result,cust_name,slm_name,itm_name,cl_name,sv_dpsetor,fc_code,sv_no,sv_plandate,leader,allproc,ori_by');
      $this->db_jmb->where("date_part('year', sv_date)=", $tgl[0]);
      //$this->db_jmb->where("date_part('month', sv_date)=", $tgl[1]);
      $this->db_jmb->where('sv_result', 'ACC');
      
      $this->db_jmb->where('ori_code', 'JMB');
      $this->db_jmb->or_where('astate', '0');
      // cek team leader
      if($team!='ALL'){
        $this->db_jmb->where('sgm_code', $team);
      }
      $this->db_jmb->order_by('modi_date', $this->order);
      return $this->db_jmb->get('sales_credit_lists')->result();
    }

    function get_count_acc($date,$team)
    {
      $tgl = explode("-", $date);
      $this->db_jmb->where("date_part('year', sv_date)=", $tgl[0]);
     // $this->db_jmb->where("date_part('month', sv_date)=", $tgl[1]);
      $this->db_jmb->where('sv_result', 'ACC');
      $this->db_jmb->where('ori_code', 'JMB');
      $this->db_jmb->or_where('astate', '0');
      // cek team leader
      if($team!='ALL'){
        $this->db_jmb->where('sgm_code', $team);
      }
      return $this->db_jmb->count_all_results('sales_credit_lists');
    }*/


    function get_all()
    {
      $this->db->select('sv_date,sv_result,cust_name,slm_name,itm_name,cl_name,sv_dpsetor,fc_code,sv_no,sv_plandate,leader,ori_by');
        //$this->db_jmb->where('sv_date', '2020-01-02');
        $this->db_jmb->order_by('sv_date', $this->order);
        return $this->db_jmb->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db_jmb->where($this->id, $id);
        return $this->db_jmb->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db_jmb->like('sv_id', $q);
      	$this->db_jmb->or_like('sv_no', $q);
      	$this->db_jmb->or_like('cust_code', $q);
      	$this->db_jmb->or_like('slm_code', $q);
      	$this->db_jmb->or_like('sv_result', $q);
      	$this->db_jmb->or_like('cust_name', $q);
      	$this->db_jmb->or_like('cust_idcardno', $q);
      	$this->db_jmb->from($this->table);
        return $this->db_jmb->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db_jmb->order_by($this->id, $this->order);
        $this->db_jmb->like('sv_id', $q);
	$this->db_jmb->or_like('sv_no', $q);
	$this->db_jmb->or_like('cust_code', $q);
	$this->db_jmb->or_like('slm_code', $q);
	$this->db_jmb->or_like('sv_result', $q);
	$this->db_jmb->or_like('cust_name', $q);
	$this->db_jmb->or_like('cust_idcardno', $q);
	$this->db_jmb->limit($limit, $start);
        return $this->db_jmb->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db_jmb->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db_jmb->where($this->id, $id);
        $this->db_jmb->update($this->table1, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db_jmb->where($this->id, $id);
        $this->db_jmb->delete($this->table);
    }

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-08-16 13:59:02 */
/* http://harviacode.com */