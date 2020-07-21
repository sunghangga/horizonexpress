<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Delivery_model extends CI_Model
{

    public $table = 'delivery';
    public $id = 'kode';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function get_count()
    {
      return $this->db->count_all_results($this->table);
    }

    function get_count_delivery_detail()
    {
      return $this->db->count_all_results('delivery_detail');
    }

    function get_count_motor($id)
    {
      $this->db->where('delivery_detail.kode', $id);
      $this->db->where('qty>', '0');
      $this->db->where('category', '1');
      return $this->db->count_all_results('delivery_detail');
    }

    function get_count_kelengkapan($id)
    {
      $this->db->where('delivery_detail.kode', $id);
      $this->db->where('qty>', '0');
      $this->db->where('category', '2');
      return $this->db->count_all_results('delivery_detail');
    }

    function get_count_other($id)
    {
      $this->db->where('delivery_detail.kode', $id);
      $this->db->where('qty>', '0');
      $this->db->where('category', '0');
      return $this->db->count_all_results('delivery_detail');
    }

    function get_regencies()
    {
        // $this->db->where('province_id', '51');
        $this->db->order_by('name', 'ASC');
        return $this->db->get('regencies')->result();
    }

    function get_districts($id)
    {
        $this->db->where('regency_id', $id);
        $this->db->order_by('name', 'ASC');
        return $this->db->get('districts')->result();
    }


    function get_villages($id)
    {
        $this->db->where('district_id', $id);
        $this->db->order_by('name', 'ASC');
        return $this->db->get('villages')->result();
    }

    function get_count_month($month)
    {
        $this->db->select('create_at as tanggal,COUNT(*) AS jumlah_harian');
        $this->db->where('MONTH(create_at)', $month);
        $this->db->group_by('create_at');
        return $this->db->get($this->table)->result();
    }

    function get_count_week()
    {
        $this->db->select('create_at as tanggal,COUNT(*) AS jumlah_harian');
        $this->db->where('create_at>CURDATE() -INTERVAL 7 DAY AND NOW()');
        $this->db->group_by('create_at');
        $this->db->order_by('create_at', 'DESC');
        return $this->db->get($this->table)->result();
    }

    function search_kode($title)
    {
        $this->db->like('kode', $title , 'both');
        $this->db->order_by('kode', 'ASC');
        $this->db->limit(10);
        return $this->db->get($this->table)->result();
    }

    function get_all_kode()
    {
        $this->db->order_by('kode', 'ASC');
        $this->db->limit(10);
        return $this->db->get($this->table)->result();
    }

    function get_all_kode_by_status($status)
    {
        $this->db->where('delivery.status', $status);
        $this->db->order_by('kode', 'ASC');
        //$this->db->limit(10);
        return $this->db->get($this->table)->result();
    }


    function get_all_kode_by_rcstatus()
    {
        $this->db->where('receipt','0');
        $this->db->order_by('kode', 'ASC');
        //$this->db->limit(10);
        return $this->db->get($this->table)->result();
    }

    function get_kode_by_status_check($status)
    {
        $this->db->select('delivery.status status, delivery.kode kode');
        $this->db->from('delivery');
        $this->db->join('check','delivery.kode=check.kode', 'LEFT');
        $this->db->where('delivery.status', $status);
        $this->db->where('check.kode', NULL, FALSE);
        $this->db->order_by('delivery.kode', 'DESC');
        $this->db->limit(10);
        return $this->db->get()->result();
    }

    function get_kode_by_status_road_money($status1,$status2)
    {
        $this->db->select('delivery.status status, delivery.kode kode');
        $this->db->from('delivery');
        $this->db->join('road_money','delivery.kode=road_money.kode', 'LEFT');
        $this->db->where("(delivery.status='".$status1."' OR delivery.status='".$status2."')", NULL, FALSE);
        $this->db->where('road_money.kode', NULL, FALSE);
        $this->db->order_by('delivery.kode', 'DESC');
        $this->db->limit(10);
        return $this->db->get()->result();
    }

    function get_kode_by_some_status($status1,$status2)
    {
        $this->db->where("(delivery.status='".$status1."' OR delivery.status='".$status2."')", NULL, FALSE);
        $this->db->order_by('kode', 'ASC');
        $this->db->limit(10);
        return $this->db->get($this->table)->result();
    }

    // get all
    function get_all()
    {
        $this->db->select('delivery.kode, delivery.name_pengirim, delivery.address_pengirim, delivery.telephone_pengirim, delivery.name_penerima, delivery.address_penerima, delivery.telephone_penerima,delivery.driver,delivery.nopol,delivery.price, regencies.name, districts.name, villages.name, delivery.create_at, delivery.update_at');
        $this->db->from('delivery');
        $this->db->join('regencies','delivery.regencies_id=regencies.id', 'LEFT');
        $this->db->join('districts','delivery.districts_id=districts.id', 'LEFT');
        $this->db->join('villages','delivery.villages_id=villages.id', 'LEFT');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    function get_delivery_by_id($id){
        $this->db->where('kode', $id);
        return $this->db->get($this->table)->result();
    }

    function get_driver_location($id){
        $this->db->select('driver_location');
        $this->db->where('kode', $id);
        return $this->db->get($this->table)->result();
    }

    function get_delivery_detail_by_id($id)
    {
        $this->db->where('delivery_detail.kode', $id);
        $this->db->order_by('kode', 'ASC');
        return $this->db->get('delivery_detail')->result();
    }

    function get_delivery_detail_barcode($id)
    {
        $this->db->select('barcode');
        $this->db->where('delivery_detail.kode', $id);
        $this->db->order_by('kode', 'ASC');
        return $this->db->get('delivery_detail')->result();
    }


    function get_delivery_detail_last_id()
    {   
        $this->db->select('id');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        return $this->db->get('delivery_detail')->row();
    }

    function get_delivery_last_kode()
    {   
        $this->db->select('kode');
        $this->db->order_by('kode', 'DESC');
        $this->db->limit(1);
        return $this->db->get('delivery')->row();
    }


    function get_check_item_by_id($id){
      $this->db->select('delivery_detail.qty as qty, delivery_detail.id as id, delivery_detail.category as category, delivery_detail.name as name, 
          check_item.status as status, check_item.foto as foto, check_item.gejala as gejala, check_item.penyebab as penyebab, check_item.engine as engine, check_item.frame as frame, check_item.type as type, check_item.solusi as solusi, check_item.keterangan as keterangan');
      $this->db->from('delivery_detail');
      $this->db->join('check_item','check_item.kode = delivery_detail.kode','left');
      $this->db->where('delivery_detail.kode', $id);
      $this->db->order_by('delivery_detail.kode', 'ASC');
       
        return $this->db->get()->result();
        

    }

    function get_check_item_read($id){
      /*$this->db->select('check_item.id as id, check_item.category as category, check_item.item as name, 
          check_item.status as status, check_item.foto as foto, check_item.gejala as gejala, check_item.penyebab as penyebab, check_item.engine as engine, check_item.frame as frame, check_item.type as type, check_item.solusi as solusi, check_item.keterangan as keterangan');
      $this->db->from('check_item');
      //$this->db->join('check_item','check_item.kode = delivery_detail.kode','left');
      $this->db->where('check_item.kode', $id);
      $this->db->order_by('delivery_detail.id', 'ASC');*/
       $this->db->select('check_item.id as id, check_item.category as category, check_item.item as name, 
          check_item.status as status, check_item.foto as foto, check_item.gejala as gejala, check_item.penyebab as penyebab, check_item.engine as engine, check_item.frame as frame, check_item.type as type, check_item.solusi as solusi, check_item.keterangan as keterangan');
      $this->db->from('check_item');
      //$this->db->join('check_item','check_item.kode = delivery_detail.kode','left');
      $this->db->where('check_item.kode', $id);
      $this->db->order_by('check_item.id', 'ASC');
        return $this->db->get()->result();
    }

    function get_item($target=null,$search=null){
        $this->db->select('item.id, item.name, item.category, item.unit_id, item.create_at, item.update_at, unit.id id_u, unit.name name_u');
        $this->db->from('item');
        $this->db->join('unit','item.unit_id=unit.id', 'LEFT');
        if ($target != null) {
            $this->db->where('item.category=', $target);
            $this->db->like('item.name', $search, 'both');
        }
        $this->db->order_by('item.id', 'ASC');
        return $this->db->get()->result();
    }

    function get_range($first,$last)
    {
        $this->db->select('delivery.kode, delivery.name_pengirim, delivery.address_pengirim, delivery.telephone_pengirim, delivery.wr_pengirim_id wr_pengirim_id, delivery.wr_penerima_id wr_penerima_id, delivery.name_penerima, delivery.address_penerima, delivery.telephone_penerima,delivery.driver,delivery.user_id, delivery.nopol,(SELECT SUM(qty*price) FROM delivery_detail WHERE kode=delivery.kode) as price, regencies.name, districts.name, villages.name, delivery.create_at, delivery.update_at,delivery.status,user.name as admin');
        $this->db->from('delivery');
        $this->db->join('regencies','delivery.regencies_id=regencies.id', 'LEFT');
        $this->db->join('districts','delivery.districts_id=districts.id', 'LEFT');
        $this->db->join('villages','delivery.villages_id=villages.id', 'LEFT');
        $this->db->join('user','user.id=delivery.user_id', 'LEFT');
        $this->db->where('delivery.create_at>=', $first);
        $this->db->where('delivery.create_at<=', $last);
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    function get_range_track($first,$last)
    {
        $this->db->select('delivery.kode, delivery.name_pengirim, delivery.address_pengirim, delivery.telephone_pengirim, delivery.wr_pengirim_id wr_pengirim_id, delivery.wr_penerima_id wr_penerima_id, delivery.name_penerima, delivery.address_penerima, delivery.telephone_penerima,delivery.driver,delivery.user_id, delivery.nopol,(SELECT SUM(qty*price) FROM delivery_detail WHERE kode=delivery.kode) as price, regencies.name, districts.name, villages.name, delivery.create_at, delivery.update_at,delivery.status,user.name as admin');
        $this->db->from('delivery');
        $this->db->join('regencies','delivery.regencies_id=regencies.id', 'LEFT');
        $this->db->join('districts','delivery.districts_id=districts.id', 'LEFT');
        $this->db->join('villages','delivery.villages_id=villages.id', 'LEFT');
        $this->db->join('user','user.id=delivery.user_id', 'LEFT');
        $this->db->where('delivery.create_at>=', $first);
        $this->db->where('delivery.create_at<=', $last);
        $this->db->where('delivery.status', 'warehouse');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    function get_range_update_track($first,$last)
    {
      $zero = '00:00:00';
      $final = '23:59:59';
      $first = $first." ".$zero;
      $last = $last." ".$final;

        $this->db->select('delivery.kode, delivery.name_pengirim, delivery.address_pengirim, delivery.telephone_pengirim, delivery.wr_pengirim_id wr_pengirim_id, delivery.wr_penerima_id wr_penerima_id, delivery.name_penerima, delivery.address_penerima, delivery.telephone_penerima,delivery.driver,delivery.user_id, delivery.nopol,(SELECT SUM(qty*price) FROM delivery_detail WHERE kode=delivery.kode) as price, regencies.name, districts.name, villages.name, delivery.create_at, delivery.update_at,delivery.status,user.name as admin');
        $this->db->from('delivery');
        $this->db->join('regencies','delivery.regencies_id=regencies.id', 'LEFT');
        $this->db->join('districts','delivery.districts_id=districts.id', 'LEFT');
        $this->db->join('villages','delivery.villages_id=villages.id', 'LEFT');
        $this->db->join('user','user.id=delivery.user_id', 'LEFT');
        $this->db->where('delivery.update_at>=', $first);
        $this->db->where('delivery.update_at<=', $last);
        $this->db->where('delivery.status', 'warehouse');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    function get_range_track_pengiriman($first,$last)
    {
        $this->db->select('delivery.kode, delivery.name_pengirim, delivery.address_pengirim, delivery.telephone_pengirim, delivery.wr_pengirim_id wr_pengirim_id, delivery.wr_penerima_id wr_penerima_id, delivery.name_penerima, delivery.address_penerima, delivery.telephone_penerima,delivery.driver,delivery.user_id, delivery.nopol,(SELECT SUM(qty*price) FROM delivery_detail WHERE kode=delivery.kode) as price, regencies.name, districts.name, villages.name, delivery.create_at, delivery.update_at,delivery.status,user.name as admin');
        $this->db->from('delivery');
        $this->db->join('regencies','delivery.regencies_id=regencies.id', 'LEFT');
        $this->db->join('districts','delivery.districts_id=districts.id', 'LEFT');
        $this->db->join('villages','delivery.villages_id=villages.id', 'LEFT');
        $this->db->join('user','user.id=delivery.user_id', 'LEFT');
        $this->db->where('delivery.create_at>=', $first);
        $this->db->where('delivery.create_at<=', $last);
        $this->db->where('delivery.status', 'driver');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    function get_range_track_update_pengiriman($first,$last)
    {
      $zero = '00:00:00';
      $final = '23:59:59';
      $first = $first." ".$zero;
      $last = $last." ".$final;
      
        $this->db->select('delivery.kode, delivery.name_pengirim, delivery.address_pengirim, delivery.telephone_pengirim, delivery.wr_pengirim_id wr_pengirim_id, delivery.wr_penerima_id wr_penerima_id, delivery.name_penerima, delivery.address_penerima, delivery.telephone_penerima,delivery.driver,delivery.user_id, delivery.nopol,(SELECT SUM(qty*price) FROM delivery_detail WHERE kode=delivery.kode) as price, regencies.name, districts.name, villages.name, delivery.create_at, delivery.update_at,delivery.status,user.name as admin');
        $this->db->from('delivery');
        $this->db->join('regencies','delivery.regencies_id=regencies.id', 'LEFT');
        $this->db->join('districts','delivery.districts_id=districts.id', 'LEFT');
        $this->db->join('villages','delivery.villages_id=villages.id', 'LEFT');
        $this->db->join('user','user.id=delivery.user_id', 'LEFT');
        $this->db->where('delivery.update_at>=', $first);
        $this->db->where('delivery.update_at<=', $last);
        $this->db->where('delivery.status', 'driver');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get()->result();
    }

    function get_price($kode)
    {
        $this->db->select('SUM(qty*price)as price');
        $this->db->from('delivery_detail');
        $this->db->where('kode', $kode);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function get_delivery_detail_motor($kode)
    {
        $this->db->select('name, SUM(qty) AS jumlah, SUM(price) AS harga, unit,category');
        $this->db->from('delivery_detail');
        $this->db->where('kode', $kode);
        $this->db->group_by("name");
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('delivery.kode kode, delivery.pengirim_id, delivery.penerima_id, delivery.name_pengirim name_pengirim,delivery.received_date, delivery.address_pengirim address_pengirim, delivery.telephone_pengirim telephone_pengirim, delivery.wr_pengirim_id wr_pengirim_id, delivery.wr_penerima_id wr_penerima_id, delivery.name_penerima name_penerima, delivery.address_penerima address_penerima, delivery.telephone_penerima telephone_penerima, delivery.user_id user_id, delivery.driver driver, delivery.nopol nopol, regencies.id id_regency, districts.id id_district, villages.id id_village, regencies.name name_regency, districts.name name_district, villages.name name_village, delivery.create_at create_at, delivery.update_at update_at,customer.no_identitas');
        $this->db->from('delivery');
        $this->db->join('customer','delivery.penerima_id=customer.id ', 'LEFT');
        $this->db->join('regencies','delivery.regencies_id=regencies.id', 'LEFT');
        $this->db->join('districts','delivery.districts_id=districts.id', 'LEFT');
        $this->db->join('villages','delivery.villages_id=villages.id', 'LEFT');
        $this->db->where('delivery.kode', $id);
        $this->db->order_by('delivery.kode', $this->order);
        return $this->db->get()->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kode', $q);
    $this->db->or_like('name_driver', $q);
    $this->db->or_like('address_driver', $q);
    $this->db->or_like('telephone_driver', $q);
    $this->db->or_like('name_customer', $q);
    $this->db->or_like('address_customer', $q);
    $this->db->or_like('telephone_customer', $q);
    $this->db->or_like('regencies_id', $q);
    $this->db->or_like('districts_id', $q);
    $this->db->or_like('villages_id', $q);
    $this->db->or_like('create_at', $q);
    $this->db->or_like('update_at', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kode', $q);
    $this->db->or_like('name_driver', $q);
    $this->db->or_like('address_driver', $q);
    $this->db->or_like('telephone_driver', $q);
    $this->db->or_like('name_customer', $q);
    $this->db->or_like('address_customer', $q);
    $this->db->or_like('telephone_customer', $q);
    $this->db->or_like('regencies_id', $q);
    $this->db->or_like('districts_id', $q);
    $this->db->or_like('villages_id', $q);
    $this->db->or_like('create_at', $q);
    $this->db->or_like('update_at', $q);
    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    public function insert_batch($data){
      return $this->db->insert_batch('delivery_detail', $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    function updateStatus($id){
        $this->db->set('status', 'warehouse'); 
        $this->db->where($this->id, $id);
        $this->db->update($this->table);
    }

    function updateDriver($id, $driver, $nopol){
        $this->db->set('status', 'driver');
        $this->db->set('driver', $driver);
        $this->db->set('nopol', $nopol); 
        $this->db->where($this->id, $id);
        $this->db->update($this->table); 
    }

    function update_alamat($data, $id){
      $this->db->set('address_penerima',$data);
      $this->db->where($this->id, $id);
      $this->db->update($this->table); 
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function deleteDetail($id){
      $this->db->where('kode', $id);
      $this->db->delete('delivery_detail');
    }

    function deleteReceive($id){
      $this->db->where('kode', $id);
      $this->db->delete('receive'); 
    }

    function deleteReceiveItem($id){
      $this->db->where('kode', $id);
      $this->db->delete('receive_item');
    }

    function deleteHandover($id){
      $this->db->where('kode', $id);
      $this->db->delete('handover'); 
    }

    function deleteHandoverItem($id){
      $this->db->where('kode', $id);
      $this->db->delete('handover_item');
    }

    function deleteRoadMoney($id){
      $this->db->where('kode', $id);
      $this->db->delete('road_money');
    }

    function deleteRoadMoneyDetail($id){
      $this->db->where('kode', $id);
      $this->db->delete('road_money_detail');
    }

    function deleteCheck($id){
      $this->db->where('kode', $id);
      $this->db->delete('check');
    }

    function deleteCheckItem($id){
      $this->db->where('kode', $id);
      $this->db->delete('check_item');
    }

}

/* End of file Delivery_model.php */
/* Location: ./application/models/Delivery_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-14 06:05:00 */
/* http://harviacode.com */