<?php
  /**
   *
   */
  class Order_model extends CI_Model
  {

    public function tampil_data_order()
    {
      $this->db->select('*');
      $this->db->from('request');
      $this->db->join('detail_request','detail_request.ID_REQUEST=request.ID_REQUEST');
      $this->db->join('agunan','agunan.ID_AGUNAN=detail_request.ID_AGUNAN');

      $query = $this->db->get();
      return $query->result();
    }
  }
