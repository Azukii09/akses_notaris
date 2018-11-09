<?php
  /**
   *
   */
  class Menu_u extends CI_Model
  {

    public function tampil_menu()
    {
      return $this->db->get('menu')->result();
    }
  }
