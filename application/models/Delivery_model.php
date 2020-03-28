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

    function get_regencies()
    {
        $this->db->where('province_id', '51');
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

    function get_delivery_detail_by_id($id)
    {
        $this->db->where('delivery_detail.kode', $id);
        $this->db->order_by('kode', 'ASC');
        return $this->db->get('delivery_detail')->result();
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
        $this->db->select('delivery.kode, delivery.name_pengirim, delivery.address_pengirim, delivery.telephone_pengirim, delivery.name_penerima, delivery.address_penerima, delivery.telephone_penerima,delivery.driver,delivery.user_id, delivery.nopol,(SELECT SUM(qty*price) FROM delivery_detail WHERE kode=delivery.kode) as price, regencies.name, districts.name, villages.name, delivery.create_at, delivery.update_at');
        $this->db->from('delivery');
        $this->db->join('regencies','delivery.regencies_id=regencies.id', 'LEFT');
        $this->db->join('districts','delivery.districts_id=districts.id', 'LEFT');
        $this->db->join('villages','delivery.villages_id=villages.id', 'LEFT');
        $this->db->where('delivery.create_at>=', $first);
        $this->db->where('delivery.create_at<=', $last);
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

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('delivery.kode kode, delivery.name_pengirim name_pengirim, delivery.address_pengirim address_pengirim, delivery.telephone_pengirim telephone_pengirim, delivery.name_penerima name_penerima, delivery.address_penerima address_penerima, delivery.telephone_penerima telephone_penerima, delivery.user_id user_id, delivery.driver driver, delivery.nopol nopol, delivery.price price, regencies.name name_regency, districts.name name_district, villages.name name_village, delivery.create_at create_at, delivery.update_at update_at');
        $this->db->from('delivery');
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

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Delivery_model.php */
/* Location: ./application/models/Delivery_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-03-14 06:05:00 */
/* http://harviacode.com */