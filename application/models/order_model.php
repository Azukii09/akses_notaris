<?php
  /**
   *
   */
  class Order_model extends CI_Model
  {

    public function tampil_data_order($kolom)
    {
      $this->db->select($kolom);
      $this->db->from('request');
      $this->db->join('detail_request','detail_request.ID_REQUEST=request.ID_REQUEST');
      $this->db->join('agunan','agunan.ID_AGUNAN=detail_request.ID_AGUNAN');

      $query = $this->db->get();
      return $query->result();
    }

    public function tampil_data_detail($kolom)
    {
      $this->db->select($kolom);
      $this->db->from('detail_request');
      $this->db->join('agunan','agunan.ID_AGUNAN=detail_request.ID_AGUNAN');
      $query = $this->db->get();
      return $query->result();
    }
    public function tampil_data_order_req($kolom,$table)
    {
      $this->db->select($kolom);
      $this->db->from($table);
      $query = $this->db->get();
      return $query->result();
    }

    public function hitung_data_order($kolom,$where)
    {
      $this->db->select($kolom);
      $this->db->from('request');
      $this->db->join('detail_request','detail_request.ID_REQUEST=request.ID_REQUEST');
      $this->db->join('agunan','agunan.ID_AGUNAN=detail_request.ID_AGUNAN');
      $this->db->where($where);
      $query = $this->db->get();
      return $query->num_rows();
    }
    public function hitung_data_order_req($kolom,$where)
    {
      $this->db->select($kolom);
      $this->db->from('request');
      $this->db->where($where);
      $query = $this->db->get();
      return $query->num_rows();
    }
    public function hitung_data_order_rep($kolom)
    {
      $this->db->select($kolom);
      $this->db->from('request');
      $query = $this->db->get();
      return $query->num_rows();
    }
  }
